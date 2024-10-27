<x-app-layout>

    <!-- track-area-start -->
    <section class="track-area pt-80 pb-40">
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
                                    <h4 class="tptrack__item-title">Devenir Vendeur</h4>
                                    <p>Vos données personnelles seront utilisées pour soutenir votre expérience tout au
                                        long de ce site web, pour gérer l'accès à votre compte.</p>
                                </div>
                            </div>

                            @if (Auth::user()->seller)
                                <div class="alert alert-warning">
                                    Vous êtes déjà enregistré en tant que vendeur.
                                </div>
                            @else
                                <form method="POST" action="{{ route('sellers.store') }}"
                                    enctype="multipart/form-data">
                                    @csrf

                                    <!-- Affichage des erreurs génériques -->
                                    @if ($errors->has('error'))
                                        <div class="alert alert-danger">
                                            {{ $errors->first('error') }}
                                        </div>
                                    @endif

                                    <!-- First Name -->
                                    <div class="tptrack__id mb-10">
                                        <div class="relative">
                                            <input id="firstname"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="text" name="first_name" value="{{ Auth::user()->firstname }}"
                                                readonly placeholder="Votre prénom" required />
                                        </div>
                                        <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                    </div>

                                    <!-- Last Name -->
                                    <div class="tptrack__id mb-10">
                                        <div class="relative">
                                            <input id="lastname"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="text" name="last_name" value="{{ Auth::user()->last_name }}"
                                                readonly placeholder="Votre nom" required />
                                        </div>
                                        <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                    </div>

                                    <!-- Sexe -->
                                    <div class="mb-10">
                                        <div class="relative">
                                            <select id="sexe" name="sexe" required
                                                class="z-50 select-custom nice-select text-gray-900 border border-gray-300 rounded-lg">
                                                <option value="" disabled selected>Sélectionnez votre sexe
                                                </option>
                                                <option value="Masculin">Masculin</option>
                                                <option value="Féminin">Féminin</option>
                                            </select>
                                            <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Téléphone -->
                                    <div class="tptrack__id mb-10">
                                        <div class="relative">
                                            <input id="phone"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="text" name="phone" required placeholder="Votre téléphone" />
                                        </div>
                                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                    </div>

                                    <!-- Adresse -->
                                    <div class="tptrack__id mb-10">
                                        <div class="relative">
                                            <input id="address"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="text" name="address" required placeholder="Votre adresse" />
                                        </div>
                                        <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                    </div>

                                    <!-- Ville -->
                                    <div class="mb-10">
                                        <div class="relative">
                                            <select id="city_id" name="city_id" required
                                                class="z-40 select-custom text-gray-900 border border-gray-300 rounded-lg">
                                                <option value="" disabled selected>Sélectionnez votre ville
                                                </option>
                                                @foreach ($cities as $city)
                                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                @endforeach
                                            </select>
                                            <x-input-error :messages="$errors->get('city_id')" class="mt-2" />
                                        </div>
                                    </div>

                                    <!-- Photo -->
                                    <div class="mb-10">
                                        <div class="relative">
                                            <input id="picture" type="file" name="picture"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
                                        </div>
                                        <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                                    </div>

                                    <div class="tptrack__btn">
                                        <button type="submit" class="tptrack__submition tpsign__reg">
                                            Créer un Vendeur<i class="fal fa-long-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>

                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- track-area-end -->

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

</x-app-layout>
