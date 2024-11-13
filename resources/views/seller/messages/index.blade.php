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
                            <h2 class="text-md md:text-lg font-semibold">
                                {{ $contact->name }}
                                @if (isset($unreadCounts[$contact->id]) && $unreadCounts[$contact->id] > 0)
                                    <span class="bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full ml-2">
                                        {{ $unreadCounts[$contact->id] }}
                                    </span>
                                @endif
                            </h2>
                            <p class="text-gray-600 text-sm">
                                @php
                                    $latestMessage = $messages->firstWhere(function ($message) use ($contact, $userId) {
                                        return ($message->sender_id === $contact->id &&
                                            $message->receiver_id === $userId) ||
                                            ($message->sender_id === $userId && $message->receiver_id === $contact->id);
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
        messageContainer.scrollTop = messageContainer.scrollHeight;

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

                    // Réinitialisez l'indicateur de messages non lus pour ce contact
                    const unreadBadge = contactItem.querySelector('.bg-red-500');
                    if (unreadBadge) unreadBadge.remove(); // Supprime l'indicateur de messages non lus

                    const messagesByDate = {};

                    // Regrouper les messages par date
                    messages.forEach(message => {
                        const messageDate = new Date(message.created_at);
                        const today = new Date();
                        const yesterday = new Date(today);
                        yesterday.setDate(today.getDate() - 1);

                        let dateKey = '';

                        // Vérifie si le message est aujourd'hui, hier ou une autre date
                        if (messageDate.toDateString() === today.toDateString()) {
                            dateKey = 'Aujourd\'hui';
                        } else if (messageDate.toDateString() === yesterday.toDateString()) {
                            dateKey = 'Hier';
                        } else {
                            // Sinon, on affiche la date complète
                            dateKey = messageDate.toLocaleDateString([], {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric'
                            });
                        }

                        // Ajouter le message à la bonne section par date
                        if (!messagesByDate[dateKey]) {
                            messagesByDate[dateKey] = [];
                        }

                        messagesByDate[dateKey].push(message);
                    });

                    // Parcourir les groupes de messages et les afficher
                    for (const [date, groupMessages] of Object.entries(messagesByDate)) {
                        // Afficher l'en-tête de la date
                        const dateHeader = document.createElement('div');
                        dateHeader.classList.add('text-center', 'text-gray-500', 'my-4');
                        dateHeader.innerHTML = `<strong>${date}</strong>`;
                        messageContainer.appendChild(dateHeader);

                        // Afficher les messages de cette date
                        groupMessages.forEach(message => {
                            const messageDiv = document.createElement('div');
                            messageDiv.classList.add('mb-4');

                            const formattedTime = new Date(message.created_at)
                                .toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

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
                <span class="text-xs text-gray-400 ml-2">${formattedTime}</span>
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
                <span class="text-xs text-gray-400 ml-2">${formattedTime}</span>
            `;
                            }

                            // Affichage des photos de produit, si présentes
                            // Afficher les détails du produit et l'image
                            if (message.product && message.product.photos && message.product
                                .photos.length > 0) {
                                const firstPhoto = message.product.photos[0];
                                messageDiv.innerHTML += `
                <div class="max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">                
                    <a href="#">
                        <img class="rounded-t-lg" src="${firstPhoto.image ? '/storage/' + firstPhoto.image : 'https://placehold.co/200x200'}" alt="${message.product.name}" />
                    </a>
                    <div class="p-5">
                        <a href="#">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">${message.product.name}</h5>
                        </a>
                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">${message.product.description || 'Aucune description disponible.'}</p>
                        
                        <!-- Réponse pré-enregistrée -->
                        <div class="flex space-x-4">
                            <button class="w-full text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2 default-message-btn" data-message="oui">
                                Oui
                            </button>
                            <button class="w-full text-gray-900 bg-gray-100 hover:bg-gray-200 focus:ring-4 focus:outline-none focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-gray-500 me-2 mb-2 default-message-btn" data-message="non">
                                Non
                            </button>
                        </div>
                    </div>
             </div>
        `;
                            }



                            // Ajouter le message au conteneur
                            messageContainer.appendChild(messageDiv);
                        });
                    }


                } catch (error) {
                    console.error('Erreur lors du chargement des messages:', error);
                }

                // Listener pour les nouveaux messages
                window.Echo.channel(`chat.${currentContactId}`)
                    .listen('.NewMessage', async (e) => {
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

                        // Met à jour l'indicateur de messages non lus dans la liste de contacts
                        const contactBadge = contactItem.querySelector('.bg-red-500');
                        if (contactBadge) {
                            contactBadge.innerText = parseInt(contactBadge.innerText) + 1;
                        } else {
                            const unreadIndicator = document.createElement('span');
                            unreadIndicator.className =
                                'bg-red-500 text-white text-xs font-bold px-2 py-1 rounded-full ml-2';
                            unreadIndicator.innerText = '1';
                            contactItem.querySelector('.font-semibold').appendChild(
                                unreadIndicator);
                        }

                        // Marquer instantanément le nouveau message comme lu
                        await fetch(`/seller/shop/message/${e.message.id}/mark-as-read`, {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': document.querySelector(
                                    'meta[name="csrf-token"]').getAttribute(
                                    'content')
                            }
                        });
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

            // Fonction pour envoyer un message prédéfini
            async function sendDefaultMessage(defaultMessage) {
                if (!currentContactId) return;

                try {
                    const response = await fetch(`/seller/shop/message/${currentContactId}`, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')
                                .getAttribute('content')
                        },
                        body: JSON.stringify({
                            message: defaultMessage
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
                <p>${defaultMessage}</p>
            </div>
            <div class="w-9 h-9 rounded-full ml-2">
                <img src="${profilePictureUrl}" alt="My Avatar" class="w-8 h-8 rounded-full">
            </div>
        `;
                    messageContainer.appendChild(newMessageDiv);
                } catch (error) {
                    console.error(error);
                }
            }

            // Ajouter les écouteurs d'événements sur les boutons "Oui" et "Non"
            document.querySelectorAll('.default-message-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const defaultMessage = this.getAttribute('data-message');
                    sendDefaultMessage(defaultMessage);
                });
            });

        });
    </script>
@endsection
@endsection
