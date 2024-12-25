<x-app-layout>
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-gray-400 dark:bg-gray-800 dark:text-red-400"
                role="alert">

                <span class="font-medium">{{ $error }}</span>

            </div>
        @endforeach
    @endif
    <!-- track-area-start -->
    <section class="track-area pt-10 pb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-40">
                        <div class="tptrack__content grey-bg-3">
                            <div class="tptrack__item d-flex mb-20">
                                <div class="tptrack__item-icon">
                                    <img loading="lazy" src="{{ asset('img/icon/sign-up.png') }}" alt="">
                                </div>
                                <div class="tptrack__item-content">
                                    <h4 class="tptrack__item-title">S'inscrire</h4>
                                    <p>Vos données personnelles seront utilisées pour soutenir votre expérience tout
                                        au long de ce site web, pour gérer l'accès à votre compte.</p>
                                </div>
                            </div>
                            <form id="register-form" method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- FirstName -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="firstname"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="text" name="firstname" :value="old('firstname')" required autofocus
                                            placeholder="Votre prénom" />
                                        <span class="validation-icon"></span>
                                    </div>
                                    <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
                                </div>

                                <!-- LastName -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="lastname"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="text" name="lastname" :value="old('lastname')" required autofocus
                                            placeholder="Votre nom" />
                                        <span class="validation-icon"></span>
                                    </div>
                                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                </div>

                                <!-- Sexe -->
                                <div class="mb-10">
                                    <div class="relative">
                                        <select id="sexe" name="sexe" onchange="selectGender(event)"
                                            class="z-50 select-custom nice-select text-gray-900 border border-gray-300 rounded-lg"
                                            required>
                                            <option value="">Sélectionnez votre genre</option>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin">Féminin</option>
                                        </select>
                                        <span class="error-message text-sm text-red-500 hidden">Veuillez sélectionner
                                            votre
                                            genre.</span>
                                        <span class="gender-validation text-green-500 ml-2 hidden">✔</span>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="email"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="email" name="email" :value="old('email')" required autofocus
                                            placeholder="Adresse e-mail" />
                                        <span class="validation-icon"></span>
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="tptrack__email mb-10">
                                    <div class="relative">
                                        <input id="password"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password" name="password" required placeholder="Mot de passe" />
                                        <span class="validation-icon"></span>
                                    </div>
                                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                </div>

                                <!-- Confirm Password -->
                                <div class="tptrack__email mb-10">
                                    <div class="relative">
                                        <input id="password_confirmation"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password" name="password_confirmation" required
                                            placeholder="Confirmer le mot de passe" />
                                        <span class="validation-icon"></span>
                                    </div>
                                </div>

                                <!-- Hidden field for current location -->
                                <input type="hidden" id="current_city" name="current_city" />
                                <input type="hidden" id="current_country" name="current_country" />
                                <input type="hidden" id="current_continent" name="current_continent" />
                                <input type="hidden" id="current_latitude" name="current_latitude" />
                                <input type="hidden" id="current_longitude" name="current_longitude" />

                                <div class="tpsign__account">
                                    <a href="{{ route('login') }}">Vous avez déjà un compte ?</a>
                                </div>

                                <div class="tptrack__btn">
                                    <button type="submit" class="tptrack__submition tpsign__reg">
                                        Inscrivez-vous maintenant
                                        <i class="fal fa-long-arrow-right animate__animated animate__heartBeat"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- track-area-end --

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div id="location-error" class="text-red-500 text-sm hidden">
        Vous devez autoriser l'accès à votre localisation pour vous inscrire.
    </div>


    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'Geolocalisation requise',
                    text: "Pour vous offrir une meilleure expérience d'achat, il est important que nous connaissions votre emplacement. Votre adresse est utilisée pour vous proposer des produits disponibles près de chez vous et vous fournir des informations de livraison précises.",
                    confirmButtonText: 'J\'ai compris',
                    backdrop: `
                        rgba(0,0,123,0.4)
                        left top
                        no-repeat
                    `,
                    showClass: {
                        popup: `
                            animate__animated
                            animate__fadeInUp
                            animate__faster
                        `
                    },
                    hideClass: {
                        popup: `
                            animate__animated
                            animate__fadeOutDown
                            animate__faster
                        `
                    },
                    allowOutsideClick: false,
                    customClass: {
                        popup: 'mx-auto bg-gray-200 dark:bg-gray-800 text-xs sm:text-sm md:text-md text-black dark:text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                        confirmButton: 'bg-[#e38407] hover:bg-[#e38407] text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                        cancelButton: 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                    },
                }).then((result) => {
                    if (result.isConfirmed) {
                        askForLocation();
                    }
                });

                function askForLocation() {
                    // Request geolocation
                    if (navigator.geolocation) {
                        navigator.geolocation.getCurrentPosition(function(position) {
                            const current_city = $('#current_city');
                            const current_country = $('#current_country');
                            const current_continent = $('#current_continent');
                            const current_latitude = $('#current_latitude');
                            const current_longitude = $('#current_longitude');

                            const latitude = position.coords.latitude;
                            const longitude = position.coords.longitude;

                            // Use a reverse geocoding API to get the city name
                            fetch(
                                    `https://api-bdc.net/data/reverse-geocode-client?latitude=${latitude}&longitude=${longitude}&localityLanguage=fr`
                                )
                                .then(response => response.json())
                                .then(data => {
                                    if (data) {
                                        if (data.city) {
                                            current_city.val(data.city);
                                        }
                                        if (data.countryName) {
                                            current_country.val(data.countryName);
                                        }
                                        if (data.continent) {
                                            current_continent.val(data.continent);
                                        }
                                        current_latitude.val(latitude);
                                        current_longitude.val(longitude);
                                    } else {
                                        console.error("City not found");
                                    }
                                })
                                .catch(error => console.error('Error fetching city:', error));
                        }, function(error) {
                            // Handle errors if the user denies the geolocation again
                            Swal.fire({
                                icon: 'error',
                                title: 'Erreur',
                                text: "Nous n'avons pas pu obtenir votre emplacement. Veuillez vérifier vos paramètres de géolocalisation.",
                                confirmButtonText: 'Essayer à nouveau',
                                customClass: {
                                    popup: 'bg-gray-200 dark:bg-gray-800 text-black dark:text-white rounded-lg shadow-lg', // Classes Tailwind pour le popup
                                    confirmButton: 'bg-[#e38407] hover:bg-[#e38407] text-white font-bold py-2 px-4 rounded', // Bouton de confirmation
                                    cancelButton: 'bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded' // Bouton d'annulation
                                },
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    askForLocation();
                                }
                            });
                        });
                    } else {
                        console.error("Geolocation is not supported by this browser.");
                    }
                }
            })
        </script>

        <script>
            document.getElementById('register-form').addEventListener('submit', function(e) {
                const sexe = document.getElementById('sexe');

                if (!sexe.value) {
                    e.preventDefault();
                    $('.error-message').show();
                }
            });

            function selectGender(event) {
                if (event.target.value) {
                    $('.gender-validation').show();
                    $('.error-message').hide();
                } else {
                    $('.error-message').show();
                    $('.gender-validation').hide();
                }
            }
        </script>

        <script>
            $(document).ready(function() {
                $("#register-form").validate({
                    rules: {
                        firstname: {
                            required: true,
                            minlength: 2
                        },
                        lastname: {
                            required: true,
                            minlength: 2
                        },
                        sexe: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        firstname: {
                            required: "Le prénom est requis",
                            minlength: "Le prénom doit contenir au moins 2 caractères"
                        },
                        lastname: {
                            required: "Le nom est requis",
                            minlength: "Le nom doit contenir au moins 2 caractères"
                        },
                        sexe: {
                            required: "Veuillez sélectionner votre genre"
                        },
                        email: {
                            required: "L'adresse e-mail est requise",
                            email: "Veuillez entrer une adresse e-mail valide"
                        },
                        password: {
                            required: "Le mot de passe est requis",
                            minlength: "Le mot de passe doit contenir au moins 6 caractères"
                        },
                        password_confirmation: {
                            required: "Veuillez confirmer votre mot de passe",
                            equalTo: "Les mots de passe ne correspondent pas"
                        }
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.addClass("text-red-500 text-sm");
                        if (element.prop("type") === "checkbox") {
                            error.insertAfter(element.parent("label"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function(element) {
                        $(element).addClass("border-red-500").removeClass("border-gray-300");
                    },
                    unhighlight: function(element) {
                        $(element).removeClass("border-red-500").addClass("border-gray-300");
                    },
                    success: function(label, element) {
                        $(element).next(".validation-icon").remove();
                        $(element).after(
                            '<span class="validation-icon text-green-500 ml-2">✔</span>'
                        );
                    }
                });
            });
        </script>
    @endsection
</x-app-layout>
