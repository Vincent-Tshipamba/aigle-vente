<x-app-layout>
    <!-- track-area-start -->
    <section class="track-area pt-10 pb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="mb-40">
                        <div class="tptrack__content grey-bg-3">
                            <div class="tptrack__item d-flex mb-20">
                                <div class="tptrack__item-icon">
                                    <img src="{{ asset('img/icon/sign-up.png') }}" alt="">
                                </div>
                                <div class="tptrack__item-content">
                                    <h4 class="tptrack__item-title">S'inscrire</h4>
                                    <p>Vos données personnelles seront utilisées pour soutenir votre expérience tout
                                        au long de ce site web, pour gérer l'accès à votre compte.</p>
                                </div>
                            </div>
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                <!-- FirstName -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="firstname"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="text" name="firstname" :value="old('firstname')" required autofocus
                                            placeholder="Votre prénom" />
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
                                    </div>
                                    <x-input-error :messages="$errors->get('lastname')" class="mt-2" />
                                </div>

                                <!-- Sexe -->
                                <div class="mb-10">
                                    <div class="relative">
                                        <select id="sexe" name="sexe"
                                            class="z-50 select-custom nice-select text-gray-900 border border-gray-300 rounded-lg">
                                            <option value="" disabled selected>Sélectionnez votre genre
                                            </option>
                                            <option value="Masculin">Masculin</option>
                                            <option value="Féminin">Féminin</option>
                                        </select>
                                    </div>
                                </div>

                                <!-- Email Address -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="email"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-200 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="email" name="email" :value="old('email')" required autofocus
                                            placeholder="Adresse e-mail" />
                                    </div>
                                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                </div>

                                <!-- Password -->
                                <div class="tptrack__email mb-10">
                                    <div class="relative">
                                        <input id="password"
                                            class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            type="password" name="password" required placeholder="Mot de passe" />
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
            Swal.fire({
                icon: 'warning',
                title: 'Geolocalisation requise',
                text: "Pour vous offrir une meilleure expérience d'achat, il est important que nous connaissions votre emplacement. Votre adresse est utilisée pour vous proposer des produits disponibles près de chez vous et vous fournir des informations de livraison précises.",
                confirmButtonText: 'J\'ai compris',
                background: "#fff url(/images/trees.png)",
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
                }
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
                            confirmButtonText: 'Essayer à nouveau'
                        });
                    });
                } else {
                    console.error("Geolocation is not supported by this browser.");
                }
            }
        </script>
    @endsection
</x-app-layout>
