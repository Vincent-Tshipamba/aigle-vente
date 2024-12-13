@extends('seller.layouts.app')

@section('content')

    <!-- component -->
    <div class="flex h-screen antialiased text-gray-800">
        <div class="flex flex-row h-full w-full overflow-x-hidden">
            <div class="flex flex-col py-8 pl-6 pr-2 w-64 bg-white dark:bg-gray-800 flex-shrink-0">
                <div class="flex flex-row items-center justify-center h-12 w-full">
                    <div class="flex items-center justify-center rounded-2xl text-primary bg-indigo-100 h-10 w-10">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                            xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z">
                            </path>
                        </svg>
                    </div>
                    <div class="ml-2 font-bold text-2xl">AigleVente</div>
                </div>
                <div
                    class="flex flex-col items-center bg-indigo-100 border border-gray-200 mt-4 w-full py-6 px-4 rounded-lg">
                    <div class="h-20 w-20 rounded-full border overflow-hidden">
                        <img src="https://placehold.co/200x200" alt="Avatar" class="h-full w-full" />
                    </div>
                    <div class="text-sm font-semibold mt-2"> {{ Auth::user()->name }} </div>
                    <div class="text-xs text-gray-500">Vendeur</div>
                    <div class="flex flex-row items-center mt-3">
                        <div class="flex flex-col justify-center h-4 w-8 bg-primary rounded-full">
                            <div class="h-3 w-3 bg-white rounded-full self-end mr-1"></div>
                        </div>
                        <div class="leading-none ml-1 text-xs">Active</div>
                    </div>
                </div>
                <div class="flex flex-col mt-8">
                    <div class="flex flex-row items-center justify-between text-xs">
                        <span class="font-bold">Active Conversations</span>
                        <span
                            class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">{{ $contacts->count() }}</span>
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2 h-48 overflow-y-auto" id="contactList">
                        @foreach ($contacts as $contact)
                            <button data-contact-id="{{ $contact->id }}"
                                class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2 contact-item">
                                <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                    {{ strtoupper(substr($contact->name, 0, 1)) }}
                                </div>
                                <div class="ml-2 text-sm font-semibold">{{ $contact->name }}</div>
                                @if (isset($unreadCounts[$contact->id]) && $unreadCounts[$contact->id] > 0)
                                    <div
                                        class="flex items-center justify-center ml-auto text-xs text-white bg-red-500 h-4 w-4 rounded leading-none">
                                        {{ $unreadCounts[$contact->id] }}
                                    </div>
                                @endif
                            </button>
                        @endforeach


                    </div>
                    <div class="flex flex-row items-center justify-between text-xs mt-6">
                        <span class="font-bold">Archivied</span>
                        <span class="flex items-center justify-center bg-gray-300 h-4 w-4 rounded-full">7</span>
                    </div>
                    <div class="flex flex-col space-y-1 mt-4 -mx-2">
                        <button class="flex flex-row items-center hover:bg-gray-100 rounded-xl p-2">
                            <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                                H
                            </div>
                            <div class="ml-2 text-sm font-semibold">Henry Boyd</div>
                        </button>
                    </div>
                </div>
            </div>
            <div class="flex flex-col flex-auto h-full p-6">
                <div class="flex flex-col flex-auto flex-shrink-0 rounded-2xl bg-gray-100 dark:bg-gray-700 h-full p-4">
                    <div class="flex flex-col h-full overflow-x-auto mb-4">
                        <div class="flex flex-col h-full">
                            <div class="grid grid-cols-12 gap-y-2" id="messageContainer">

                            </div>
                        </div>
                    </div>
                    <form id="messageForm" action="" method="POST">
                        @csrf
                        <div class="flex flex-row items-center h-16 rounded-xl bg-white w-full px-4 hidden"
                            id="chatInputFooter">

                            <div>
                                <button class="flex items-center justify-center text-gray-400 hover:text-gray-600">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13">
                                        </path>
                                    </svg>
                                </button>
                            </div>
                            <div class="flex-grow ml-4">

                                <div class="relative w-full">
                                    <input type="text"
                                        class="flex w-full border rounded-xl focus:outline-none focus:border-indigo-300 pl-4 h-10" id="messageInput" />
                                    <button
                                        class="absolute flex items-center justify-center h-full w-12 right-0 top-0 text-gray-400 hover:text-gray-600">
                                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M14.828 14.828a4 4 0 01-5.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="ml-4">
                                <button
                                    class="flex items-center justify-center bg-primary hover:bg-indigo-600 rounded-xl text-white px-4 py-1 flex-shrink-0">
                                    <span>Send</span>
                                    <span class="ml-2">
                                        <svg class="w-4 h-4 transform rotate-45 -mt-px" fill="none" stroke="currentColor"
                                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"></path>
                                        </svg>
                                    </span>
                                </button>
                            </div>

                        </div>
                    </form>
                </div>
            </div>
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
                if (!contactItem) return alert('null');

                currentContactId = contactItem.getAttribute('data-contact-id');
                // chatHeader.innerText = contactItem.querySelector('.font-semibold').innerText;
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
                        dateHeader.classList.add('col-start-6', 'col-end-6' ,'p-3', 'rounded-lg');
                        dateHeader.innerHTML = `<strong>${date}</strong>`;
                        messageContainer.appendChild(dateHeader);

                        // Afficher les messages de cette date
                        groupMessages.forEach(message => {
                            const messageDiv = document.createElement('div');
                            messageDiv.classList.add('col-start-1', 'col-end-8' ,'p-3', 'rounded-lg');

                            const formattedTime = new Date(message.created_at)
                                .toLocaleTimeString([], {
                                    hour: '2-digit',
                                    minute: '2-digit'
                                });

                            if (message.sender_id === userId) {
                                messageDiv.classList.add('col-start-6', 'col-end-13', 'p-3',
                                    'rounded-lg');
                                messageDiv.innerHTML = `
                                <div class="flex flex-row items-center">
                                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary flex-shrink-0">
                                            <img src="${message.sender.profile_picture_url ?? 'https://placehold.co/200x200'}"
                                                                        alt="User Avatar" class="w-8 h-8 rounded-full">
                                        </div>
                                        <div class="relative ml-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                            <p>${message.message}</p>
                                        </div>
                                </div>
                                 <span class="text-xs text-gray-400 ml-2">${formattedTime}</span>
            `;
                            } else {
                                messageDiv.innerHTML = `
                                        <div class="flex flex-row items-center">

                                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary flex-shrink-0">
                                                <img src="${message.sender.profile_picture_url ?? 'https://placehold.co/200x200'}"
                                                    alt="User Avatar" class="w-8 h-8 rounded-full">
                                            </div>
                                            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
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
                        receivedMessageDiv.classList.add('col-start-6', 'col-end-13', 'p-3',
                            'rounded-lg');
                        receivedMessageDiv.innerHTML = `
                        <div class="flex flex-row items-center">
                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary flex-shrink-0">

                            </div>
                            <div class="relative mr-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                                <p>${e.message.content}</p>
                            </div>
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
                    newMessageDiv.classList.add('col-start-6', 'col-end-13', 'p-3', 'rounded-lg');
                    newMessageDiv.innerHTML = `
                    <div class="flex flex-row items-center">
                        <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary flex-shrink-0">

                        </div>
                        <div class="relative ml-3 text-sm bg-indigo-100 py-2 px-4 shadow rounded-xl">
                            <p>${messageText}</p>
                        </div>
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
                    newMessageDiv.classList.add('col-end-13', 'col-start-6', 'rounded-lg', 'p-3');
                    newMessageDiv.innerHTML = `
                            <div class="flex items-center justify-center h-10 w-10 rounded-full bg-primary flex-shrink-0">

                            </div>
                            <div class="relative ml-3 text-sm bg-white py-2 px-4 shadow rounded-xl">
                                <p>${defaultMessage}</p>
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
