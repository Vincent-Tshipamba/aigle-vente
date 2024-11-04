@extends('seller.layouts.app')

@section('content')
    <div class="flex h-screen overflow-hidden">
        <!-- Sidebar -->
        <div class="w-1/4 bg-white border-r border-gray-300">
            <!-- Sidebar Header -->
            <header class="p-4 border-b border-gray-300 flex justify-between items-center bg-[#e38407] text-white">
                <h1 class="text-2xl font-semibold">Chat Web</h1>
                <div class="relative">
                    <button id="menuButton" class="focus:outline-none">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-100" viewBox="0 0 20 20"
                            fill="currentColor">
                            <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                            <path d="M2 10a2 2 0 012-2h12a2 2 0 012 2 2 2 0 01-2 2H4a2 2 0 01-2-2z" />
                        </svg>
                    </button>
                    <!-- Menu Dropdown -->
                    <div id="menuDropdown"
                        class="absolute right-0 mt-2 w-48 bg-white border border-gray-300 rounded-md shadow-lg hidden">
                        <ul class="py-2 px-3">
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 1</a>
                            </li>
                            <li><a href="#" class="block px-4 py-2 text-gray-800 hover:text-gray-400">Option 2</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </header>

            <!-- Contact List -->
            <div class="overflow-y-auto h-screen p-3 mb-9 pb-20">
                @foreach ($conversations as $conversation)
                    <div class="flex items-center mb-4 cursor-pointer hover:bg-gray-100 p-2 rounded-md"
                        onclick="window.location='{{ route('seller.shop.message.show', $conversation->contact_id) }}'">
                        <div class="w-12 h-12 bg-gray-300 rounded-full mr-3">
                            <img src="{{ $conversation->contact_profile_picture_url }}"
                                alt="{{ $conversation->contact_name }}" class="w-12 h-12 rounded-full">
                        </div>
                        <div class="flex-1">
                            <h2 class="text-lg font-semibold">{{ $conversation->contact_name }}</h2>
                            <p class="text-gray-600">{{ \Illuminate\Support\Str::limit($conversation->message, 30) }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="flex-1">
            <!-- Chat Header -->
            <!-- Chat Header -->
            <header class="bg-white p-4 text-gray-700">
                <h1 class="text-2xl font-semibold">{{ $user ? $user->name : 'Select a Conversation' }}</h1>
            </header>


            <!-- Chat Messages -->
            <div class="h-screen overflow-y-auto p-4 pb-36">
                @foreach ($messages as $message)
                    @if ($message->sender_id === auth()->id())
                        <!-- Outgoing Message -->
                        <div class="flex justify-end mb-4">
                            <div class="flex max-w-96 bg-[#e38407] text-white rounded-lg p-3">
                                <p>{{ $message->message }}</p>
                            </div>
                            <div class="w-9 h-9 rounded-full ml-2">
                                <img src="{{ auth()->user()->profile_picture_url ?? 'https://placehold.co/200x200' }}"
                                    alt="My Avatar" class="w-8 h-8 rounded-full">
                            </div>
                        </div>
                    @else
                        <!-- Incoming Message -->
                        <div class="flex mb-4">
                            <div class="w-9 h-9 rounded-full mr-2">
                                <img src="{{ $contact->profile_picture_url ?? 'https://placehold.co/200x200' }}"
                                    alt="User Avatar" class="w-8 h-8 rounded-full">
                            </div>
                            <div class="flex max-w-96 bg-white rounded-lg p-3">
                                <p class="text-gray-700">{{ $message->message }}</p>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>

            <!-- Chat Input -->
            <footer class="bg-white border-t border-gray-300 p-4 absolute bottom-0 w-full">
                <div class="flex items-center">
                    @if ($user)
                        <form id="messageForm" class="flex items-center">
                            @csrf
                            <input type="text" name="message" id="messageInput" placeholder="Type a message..."
                                class="w-full p-2 rounded-md border border-gray-400 focus:outline-none focus:border-blue-500"
                                required>
                            <button type="submit" class="bg-indigo-500 text-white px-4 py-2 rounded-md ml-2">Send</button>
                        </form>
                    @else
                        <p class="text-gray-500">Select a conversation to send a message.</p>
                    @endif
                </div>
            </footer>

        </div>
    </div>

@section('script')
    <script>
        // JavaScript for showing/hiding the menu
        const menuButton = document.getElementById('menuButton');
        const menuDropdown = document.getElementById('menuDropdown');

        menuButton.addEventListener('click', () => {
            menuDropdown.classList.toggle('hidden');
        });

        // Close the menu if you click outside of it
        document.addEventListener('click', (e) => {
            if (!menuDropdown.contains(e.target) && !menuButton.contains(e.target)) {
                menuDropdown.classList.add('hidden');
            }
        });
    </script>

    @if (empty($user))
    @else
        <script>
            document.getElementById('messageForm').addEventListener('submit', function(event) {
                event.preventDefault(); 

                const messageInput = document.getElementById('messageInput');
                const message = messageInput.value;

                // Prepare the data to be sent
                const formData = new FormData();
                formData.append('message', message);
                formData.append('_token', '{{ csrf_token() }}'); // CSRF token

                // Send the message via AJAX
                fetch("{{ route('messages.send', ['user' => $user->id]) }}", {
                        method: 'POST',
                        body: formData,
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            // Add the new message to the chat
                            const messagesContainer = document.querySelector('.h-screen.overflow-y-auto.p-4.pb-36');
                            const messageDiv = document.createElement('div');
                            messageDiv.className = 'flex justify-end mb-4';
                            messageDiv.innerHTML = `
                    <div class="flex max-w-96 bg-[#e38407] text-white rounded-lg p-3">
                        <p>${data.data.message}</p>
                    </div>
                    <div class="w-9 h-9 rounded-full ml-2">
                        <img src="{{ auth()->user()->profile_picture_url ?? 'https://placehold.co/200x200' }}" 
                             alt="My Avatar" class="w-8 h-8 rounded-full">
                    </div>
                `;
                            messagesContainer.appendChild(messageDiv);
                            messageInput.value = ''; // Clear the input
                        } else {
                            alert(data.message);
                        }
                    })
                    .catch(error => console.error('Error:', error));
            });
        </script>
    @endif
@endsection


@endsection
