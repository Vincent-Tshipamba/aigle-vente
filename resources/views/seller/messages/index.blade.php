@extends('seller.layouts.app')

@section('content')
    <div class="flex flex-col md:flex-row h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-full md:w-1/4 bg-white border-r border-gray-300 md:flex-shrink-0">
            <!-- Sidebar Header -->
            <header class="p-4 border-b border-gray-300 flex justify-between items-center bg-[#e38407] text-white">
                <h1 class="text-lg md:text-2xl font-semibold">Chat Web</h1>
            </header>

            <!-- Contact List -->
            <div class="overflow-y-auto h-full md:h-screen p-3 pb-20" id="contactList">
                @foreach ($contacts as $contact)
                    <div data-contact-id="{{ $contact->id }}"
                        class="contact-item flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md">
                        <div class="w-10 h-10 md:w-12 md:h-12 bg-gray-300 rounded-full mr-3">
                            <img src="{{ $contact->profile_picture_url }}" alt="{{ $contact->name }}"
                                class="w-full h-full rounded-full">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-md md:text-lg font-semibold">{{ $contact->name }}</h2>
                            <p class="text-gray-600 text-sm">
                                @php
                                    $latestMessage = $messages->firstWhere(function ($message) use ($contact) {
                                        return ($message->sender_id === $contact->id &&
                                            $message->receiver_id === Auth::id()) ||
                                            ($message->sender_id === Auth::id() &&
                                                $message->receiver_id === $contact->id);
                                    });
                                @endphp
                                {{ $latestMessage ? \Illuminate\Support\Str::limit($latestMessage->message, 30) : 'Aucun message' }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1 flex flex-col">
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700 border-b border-gray-300">
                <h1 id="chatHeader" class="text-2xl font-semibold">Sélectionnez une conversation</h1>
            </header>

            <!-- Chat Messages -->
            <div class="flex-1 overflow-y-auto p-4 pb-36" id="messageContainer">
                <!-- Messages go here -->
            </div>

            <!-- Chat Input -->
            <footer id="chatInputFooter"
                class="bg-white border-t border-gray-300 p-4 fixed bottom-0 w-full md:relative hidden">
                <div class="flex items-center">
                    <form id="messageForm" class="flex items-center w-full" action="" method="POST">
                        @csrf
                        <input type="text" name="message" id="messageInput" placeholder="Type a message..."
                            class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500"
                            required>
                        <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                    </form>
                </div>
            </footer>
        </div>
    </div>

@section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const userId = @json(auth()->id());
            const contactList = document.getElementById('contactList');
            const messageContainer = document.getElementById('messageContainer');
            const chatHeader = document.getElementById('chatHeader');
            const messageForm = document.getElementById('messageForm');
            const messageInput = document.getElementById('messageInput');
            let currentContactId = null;

            // Gestion du clic sur un contact
            contactList.addEventListener('click', async (e) => {
                const contactItem = e.target.closest('.contact-item');
                if (!contactItem) return;

                currentContactId = contactItem.getAttribute('data-contact-id');
                chatHeader.innerText = contactItem.querySelector('.font-semibold').innerText;
                messageContainer.innerHTML = '';

                chatInputFooter.classList.remove('hidden');

                try {
                    const response = await fetch(`/messages/${currentContactId}`);
                    if (!response.ok) throw new Error('Erreur lors du chargement des messages');

                    const data = await response.json();
                    const messages = data.messages;

                    messages.forEach(message => {
                        const messageDiv = document.createElement('div');
                        messageDiv.classList.add('mb-4');

                        if (message.sender_id === userId) {
                            messageDiv.classList.add('flex', 'justify-end', 'mb-4');
                            messageDiv.innerHTML = `
                            <div class="flex max-w-96 bg-[#e38407] text-white rounded-lg p-3">
                                <p>${message.message}</p>
                            </div>
                            <div class="w-9 h-9 rounded-full ml-2">
                                <img src="${message.sender.profile_picture_url ?? 'https://placehold.co/200x200'}"
                                     alt="My Avatar" class="w-8 h-8 rounded-full">
                            </div>
                        `;
                        } else {
                            messageDiv.innerHTML = `
                            <div class="flex items-center mb-4">
                                <div class="w-9 h-9 rounded-full mr-2">
                                    <img src="${message.sender.profile_picture_url ?? 'https://placehold.co/200x200'}"
                                         alt="User Avatar" class="w-8 h-8 rounded-full">
                                </div>
                                <div class="flex max-w-96 bg-sky-200 text-gray-700 rounded-lg p-3">
                                    <p>${message.message}</p>
                                </div>
                            </div>
                        `;
                        }

                        if (message.product && message.product.photos && message.product.photos
                            .length > 0) {
                            const firstPhoto = message.product.photos[0];
                            messageDiv.innerHTML += `
                            <div class="product-image">
                                <img class="w-20 h-20 rounded-md mb-4 object-cover"
                                     src="${firstPhoto.image ? '/storage/' + firstPhoto.image : 'https://placehold.co/200x200'}"
                                     alt="${message.product.name}">
                            </div>
                        `;
                        }

                        messageContainer.appendChild(messageDiv);
                    });
                } catch (error) {
                    console.error('Erreur lors du chargement des messages:', error);
                }

                window.Echo.channel(`chat.${currentContactId}`)
                    .listen('.NewMessage', (e) => {
                        const receivedMessageDiv = document.createElement('div');
                        receivedMessageDiv.classList.add('mb-4', 'flex', 'justify-start');
                        receivedMessageDiv.innerHTML = `
                        <div class="w-9 h-9 rounded-full mr-2">
                            <img src="${e.message.sender.profile_picture_url ?? 'https://placehold.co/200x200'}"
                                 alt="Avatar" class="w-8 h-8 rounded-full">
                        </div>
                        <div class="flex max-w-96 bg-gray-300 text-black rounded-lg p-3">
                            <p>${e.message.content}</p>
                        </div>
                    `;
                        messageContainer.appendChild(receivedMessageDiv);
                    });
            });

            // Gestion de l'envoi du message
            messageForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const messageText = messageInput.value.trim();
                if (!messageText || !currentContactId) return;

                try {
                    const response = await fetch(`/seller/shop/message/${currentContactId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            message: messageText
                        })
                    });

                    if (!response.ok) throw new Error("Erreur lors de l'envoi du message");

                    const data = await response.json();
                    const profilePictureUrl = data.sender?.profile_picture_url ??
                        'https://placehold.co/200x200';


                    // Ajouter le message envoyé à l'affichage
                    const newMessageDiv = document.createElement('div');
                    newMessageDiv.classList.add('mb-4', 'flex', 'justify-end');
                    newMessageDiv.innerHTML = `
                    <div class="flex max-w-96 bg-[#e38407] text-white rounded-lg p-3">
                        <p>${messageText}</p>
                    </div>
                    <div class="w-9 h-9 rounded-full ml-2">
                        <img src="${profilePictureUrl}" alt="My Avatar" class="w-8 h-8 rounded-full">
                    </div>
                `;
                    messageContainer.appendChild(newMessageDiv);

                    messageInput.value = '';
                } catch (error) {
                    console.log(error);

                }




            });
        });
    </script>
@endsection
@endsection
