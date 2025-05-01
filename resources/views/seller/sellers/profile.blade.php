@extends('seller.layouts.app')

@section('content')
    <div class="mb-6 flex flex-col gap-3 sm:flex-row sm:items-center sm:justify-between">
        <h2 class="text-title-md2 font-bold text-black dark:text-white">
            Profile
        </h2>

        <nav>
            <ol class="flex items-center gap-2">
                <li>
                    <a class="font-medium" href="{{ route('seller.dashboard') }}">Dashboard /</a>
                </li>
                <li class="text-primary">Profile</li>
            </ol>
        </nav>
    </div>
    <!-- Breadcrumb End -->

    <!-- ====== Profile Section Start -->
    <div class="overflow-hidden ">
        <div class="relative z-20 h-35 md:h-65">
            <img loading="lazy"
                src="https://timelinecovers.pro/facebook-cover/download/eagle-looking-at-your-profile-facebook-cover.jpg"
                alt="profile cover" class="h-full w-full rounded-tl-sm rounded-tr-sm object-cover object-center" />
            {{-- <div class="absolute bottom-1 right-1 z-10 xsm:bottom-4 xsm:right-4">
                <label for="cover"
                    class="flex cursor-pointer items-center justify-center gap-2 rounded bg-primary px-2 py-1 text-sm font-medium text-white hover:bg-opacity-80 xsm:px-4">
                    <input type="file" name="cover" id="cover" class="sr-only" />
                    <span>
                        <svg class="fill-current" width="14" height="14" viewBox="0 0 14 14" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z"
                                fill="white" />
                        </svg>
                    </span>
                    <span>Edit</span>
                </label>
            </div> --}}
        </div>
        <div class="px-4 pb-6 text-center lg:pb-8 xl:pb-11.5">
            <div
                class="relative z-30 mx-auto -mt-22 h-30 w-full max-w-30 rounded-full bg-white/20 p-1 backdrop-blur sm:h-44 sm:max-w-44 sm:p-3 flex justify-center items-center">
                @if (empty($seller->picture))
                    <div class="flex items-center justify-center h-8 w-8 bg-indigo-200 rounded-full">
                        {{ strtoupper(substr($seller->first_name, 0, 1)) }}
                    </div>
                @else
                    <div class="relative drop-shadow-2">
                        <img loading="lazy" src="{{ asset($seller->picture) }}" alt="{{ $seller->full_name }}"
                            class="rounded-full w-32 h-32 object-cover" id="profile-picture" />
                        <button type="button" id="change_profil" onclick="changeProfile(event)"
                            class="absolute bottom-0 right-0 flex h-8.5 w-8.5 cursor-pointer items-center justify-center rounded-full bg-primary text-white hover:bg-opacity-90 sm:bottom-2 sm:right-2">
                            <svg class="fill-current" width="14" height="14" viewBox="0 0 14 14" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd" clip-rule="evenodd"
                                    d="M4.76464 1.42638C4.87283 1.2641 5.05496 1.16663 5.25 1.16663H8.75C8.94504 1.16663 9.12717 1.2641 9.23536 1.42638L10.2289 2.91663H12.25C12.7141 2.91663 13.1592 3.101 13.4874 3.42919C13.8156 3.75738 14 4.2025 14 4.66663V11.0833C14 11.5474 13.8156 11.9925 13.4874 12.3207C13.1592 12.6489 12.7141 12.8333 12.25 12.8333H1.75C1.28587 12.8333 0.840752 12.6489 0.512563 12.3207C0.184375 11.9925 0 11.5474 0 11.0833V4.66663C0 4.2025 0.184374 3.75738 0.512563 3.42919C0.840752 3.101 1.28587 2.91663 1.75 2.91663H3.77114L4.76464 1.42638ZM5.56219 2.33329L4.5687 3.82353C4.46051 3.98582 4.27837 4.08329 4.08333 4.08329H1.75C1.59529 4.08329 1.44692 4.14475 1.33752 4.25415C1.22812 4.36354 1.16667 4.51192 1.16667 4.66663V11.0833C1.16667 11.238 1.22812 11.3864 1.33752 11.4958C1.44692 11.6052 1.59529 11.6666 1.75 11.6666H12.25C12.4047 11.6666 12.5531 11.6052 12.6625 11.4958C12.7719 11.3864 12.8333 11.238 12.8333 11.0833V4.66663C12.8333 4.51192 12.7719 4.36354 12.6625 4.25415C12.5531 4.14475 12.4047 4.08329 12.25 4.08329H9.91667C9.72163 4.08329 9.53949 3.98582 9.4313 3.82353L8.43781 2.33329H5.56219Z"
                                    fill="white" />
                            </svg>
                        </button>
                    </div>


                    <script>
                        function changeProfile(event) {
                            event.preventDefault();
                            Swal.fire({
                                title: 'Mettez à jour votre photo de profil',
                                html: `
            <form id="profilePictureForm" class="flex flex-col items-center gap-4">
                <input type="file" id="profileInput" name="profile" accept="image/*" required class="border p-2 rounded-lg">
                <div class="w-32 h-32 flex items-center justify-center border border-dashed rounded-full overflow-hidden">
                    <img id="previewImage" src="" alt="Aperçu" class="hidden w-full h-full object-cover">
                </div>
            </form>
        `,
                                showCancelButton: true,
                                confirmButtonText: 'Mettre à jour',
                                preConfirm: () => {
                                    return new Promise((resolve) => {
                                        const inputFile = document.getElementById('profileInput').files[0];

                                        if (!inputFile) {
                                            Swal.showValidationMessage('Veuillez sélectionner une image.');
                                            resolve();
                                            return;
                                        }

                                        // Vérification du type et de la taille de l'image
                                        const allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                                        if (!allowedTypes.includes(inputFile.type)) {
                                            Swal.showValidationMessage(
                                                'Format invalide. Veuillez choisir une image JPG ou PNG.');
                                            resolve();
                                            return;
                                        }

                                        if (inputFile.size > 2 * 1024 * 1024) {
                                            Swal.showValidationMessage('L\'image ne doit pas dépasser 2 Mo.');
                                            resolve();
                                            return;
                                        }

                                        // Indicateur de chargement
                                        Swal.fire({
                                            title: 'Mise à jour...',
                                            allowOutsideClick: false,
                                            didOpen: () => {
                                                Swal.showLoading();
                                            }
                                        });

                                        const formData = new FormData();
                                        formData.append('profile', inputFile);
                                        formData.append('_token', "{{ csrf_token() }}");

                                        fetch("{{ route('seller.updateProfilePicture') }}", {
                                                method: "POST",
                                                body: formData,
                                                headers: {
                                                    "X-Requested-With": "XMLHttpRequest"
                                                }
                                            })
                                            .then(response => response.json())
                                            .then(data => {
                                                if (data.success) {
                                                    Swal.fire("Succès", "Votre photo de profil a été mise à jour.",
                                                        "success");
                                                    document.getElementById('profile-picture').src = data.imageUrl;
                                                } else {
                                                    Swal.fire("Erreur", data.message ||
                                                        "Une erreur s'est produite.", "error");
                                                }
                                                resolve();
                                            })
                                            .catch(() => {
                                                Swal.fire("Erreur", "Impossible de mettre à jour la photo.",
                                                    "error");
                                                resolve();
                                            });
                                    });
                                }
                            });

                            document.getElementById('profileInput').addEventListener('change', function(event) {
                                const file = event.target.files[0];
                                if (file) {
                                    const reader = new FileReader();
                                    reader.onload = function(e) {
                                        const preview = document.getElementById('previewImage');
                                        preview.src = e.target.result;
                                        preview.classList.remove('hidden');
                                    };
                                    reader.readAsDataURL(file);
                                }
                            });
                        }
                    </script>
                @endif

            </div>
            <div class="mt-4">
                <h3 class="mb-1.5 text-2xl font-medium text-black dark:text-white">
                    {{ $seller->first_name }} {{ $seller->last_name }}
                </h3>
                <p class="font-medium">Vendeurs</p>
                <div
                    class="mx-auto mb-5.5 mt-4.5 grid max-w-94 grid-cols-3 rounded-md border border-stroke py-2.5 shadow-1 dark:border-strokedark dark:bg-[#37404F]">
                    <div
                        class="flex flex-col items-center justify-center gap-1 border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                        <span class="font-semibold text-black dark:text-white"> {{ $seller->shops->count() }} </span>
                        <span class="text-sm">Boutiques</span>
                    </div>
                    <div
                        class="flex flex-col items-center justify-center gap-1 border-r border-stroke px-4 dark:border-strokedark xsm:flex-row">
                        <span class="font-semibold text-black dark:text-white"> </span>
                        <span class="text-sm">Produits</span>
                    </div>
                    <div class="flex flex-col items-center justify-center gap-1 px-4 xsm:flex-row">
                        <span class="font-semibold text-black dark:text-white"> {{ $seller->sexe }} </span>
                        <span class="text-sm">Sexe</span>
                    </div>
                </div>

                <div class="mx-auto max-w-180">
                    <h4 class="font-medium text-black dark:text-white">
                        About Me
                    </h4>
                    <p class="mt-4.5 text-sm font-normal">
                        <i class="fas fa-map-marker-alt"></i> {{ $seller->address }}
                    </p>
                    <p class="mt-4.5 text-sm font-normal">
                        <i class="fas fa-phone-alt"></i> {{ $seller->phone }}
                    </p>
                </div>

                <div class="mt-6.5">
                    <h4 class="mb-3.5 font-medium text-black dark:text-white">
                        Reseaux Sociaux
                    </h4>
                    <div class="flex justify-center space-x-4">
                        <a href="{{ $seller->social->facebook }}" class="text-blue-600 hover:text-blue-800">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" fill="currentColor" viewBox="0 0 24 24">
                                <path fill-rule="evenodd"
                                    d="M13.135 6H15V3h-1.865a4.147 4.147 0 0 0-4.142 4.142V9H7v3h2v9.938h3V12h2.021l.592-3H12V6.591A.6.6 0 0 1 12.592 6h.543Z"
                                    clip-rule="evenodd" />
                            </svg>

                        </a>
                        <a href="{{ $seller->social->instagram }}" class="text-blue-400 hover:text-blue-600">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
                                viewBox="0 0 24 24">
                                <path fill="currentColor" fill-rule="evenodd"
                                    d="M3 8a5 5 0 0 1 5-5h8a5 5 0 0 1 5 5v8a5 5 0 0 1-5 5H8a5 5 0 0 1-5-5V8Zm5-3a3 3 0 0 0-3 3v8a3 3 0 0 0 3 3h8a3 3 0 0 0 3-3V8a3 3 0 0 0-3-3H8Zm7.597 2.214a1 1 0 0 1 1-1h.01a1 1 0 1 1 0 2h-.01a1 1 0 0 1-1-1ZM12 9a3 3 0 1 0 0 6 3 3 0 0 0 0-6Zm-5 3a5 5 0 1 1 10 0 5 5 0 0 1-10 0Z"
                                    clip-rule="evenodd" />
                            </svg>


                        </a>
                        <a href="{{ $seller->social->tiktok }}" class="text-blue-700 hover:text-blue-900">
                            <svg class="w-6 h-6 text-gray-800 dark:text-white" xmlns="http://www.w3.org/2000/svg" shape-rendering="geometricPrecision"
                                text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd"
                                clip-rule="evenodd" viewBox="0 0 449.45 515.38">
                                <path fill-rule="nonzero"
                                    d="M382.31 103.3c-27.76-18.1-47.79-47.07-54.04-80.82-1.35-7.29-2.1-14.8-2.1-22.48h-88.6l-.15 355.09c-1.48 39.77-34.21 71.68-74.33 71.68-12.47 0-24.21-3.11-34.55-8.56-23.71-12.47-39.94-37.32-39.94-65.91 0-41.07 33.42-74.49 74.48-74.49 7.67 0 15.02 1.27 21.97 3.44V190.8c-7.2-.99-14.51-1.59-21.97-1.59C73.16 189.21 0 262.36 0 352.3c0 55.17 27.56 104 69.63 133.52 26.48 18.61 58.71 29.56 93.46 29.56 89.93 0 163.08-73.16 163.08-163.08V172.23c34.75 24.94 77.33 39.64 123.28 39.64v-88.61c-24.75 0-47.8-7.35-67.14-19.96z" />
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @if ($seller->shops->isEmpty())
                    <p class="col-span-full text-center text-gray-500">Vous n'avez pas encore de boutique.</p>
                @else
                    @foreach ($seller->shops as $key => $shop)
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-lg overflow-hidden">
                            <!-- Image de Profil -->
                            <img src="{{ asset($shop->image) ?? asset('images/default-shop.png') }}"
                                alt="Photo de {{ $shop->name }}" class="w-full h-40 object-cover">

                            <div class="p-4">
                                <!-- Nom et Adresse -->
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center gap-2">
                                    {{ $shop->name }}
                                </h3>
                                <p class="text-sm text-gray-500 dark:text-gray-400 flex items-center gap-2 mt-1">
                                    <svg class="w-5 h-5 text-[#e38407]" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M12 2C8.13 2 5 5.13 5 9c0 5 7 13 7 13s7-8 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5S10.62 6.5 12 6.5s2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z" />
                                    </svg>
                                    {{ $shop->address }}
                                </p>

                                <!-- Description -->
                                <p class="mt-2 text-sm text-gray-700 dark:text-gray-300">
                                    {{ Str::limit($shop->description, 100) }}
                                </p>

                                <!-- Actions -->
                                <div class="flex items-center justify-between mt-4">
                                    <a href="{{ route('seller.shops.products.index', $shop->_id) }}"
                                        class="px-3 py-1 text-white text-sm rounded-lg bg-[#e38407] hover:bg-[#c36d06] transition flex items-center gap-1">
                                        <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 24 24">
                                            <path d="M3 3h18v2H3V3zm0 14h18v2H3v-2zm0-7h18v2H3V10z" />
                                        </svg>
                                        Produits
                                    </a>

                                    <div class="relative">
                                        <button id="dropdownMenuIconButton{{ $key }}"
                                            data-dropdown-toggle="dropdownDots{{ $key }}"
                                            class="p-2 rounded-full bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 transition">
                                            <svg class="w-6 h-6 text-gray-700 dark:text-white" fill="currentColor"
                                                viewBox="0 0 4 15">
                                                <path
                                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                                            </svg>
                                        </button>
                                        <div id="dropdownDots{{ $key }}"
                                            class="hidden absolute right-0 mt-2 w-40 bg-white dark:bg-gray-700 shadow-md rounded-lg">
                                            <a href="{{ route('shops.edit', $shop->_id) }}"
                                                class="flex items-center gap-2 px-4 py-2 text-sm text-gray-700 dark:text-gray-200 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                <svg class="w-5 h-5 text-[#e38407]" fill="currentColor"
                                                    viewBox="0 0 24 24">
                                                    <path
                                                        d="M14.06 9l1.41 1.41L5.41 20H4v-1.41L14.06 9M16.37 4.63a1 1 0 0 1 1.41 0l2.59 2.59a1 1 0 0 1 0 1.41l-1.17 1.17-4-4 1.17-1.17z" />
                                                </svg>
                                                Modifier
                                            </a>
                                            <form action="{{ route('shops.destroy', $shop->_id) }}" method="POST"
                                                class="delete-form">
                                                @csrf
                                                @method('delete')
                                                <button type="submit"
                                                    class="flex items-center gap-2 w-full text-left px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600">
                                                    <svg class="w-5 h-5 text-red-600" fill="currentColor"
                                                        viewBox="0 0 24 24">
                                                        <path
                                                            d="M6 19a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V7H6v12zM19 4h-3.5l-1-1h-5l-1 1H5v2h14V4z" />
                                                    </svg>
                                                    Supprimer
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
