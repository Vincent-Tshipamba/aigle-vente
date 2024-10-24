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
                                    <h4 class="tptrack__item-title">S'inscrire</h4>
                                    <p>Vos données personnelles seront utilisées pour soutenir votre expérience tout
                                        au
                                        long de ce site web, pour gérer l'accès à votre compte.</p>
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
                                <!-- City -->
                                <div class="mb-10">
                                    <div class="relative">
                                        <select id="city" name="city"
                                            class=" z-40 select-custom text-gray-900 border border-gray-300 rounded-lg">
                                            <option value="" disabled selected>Sélectionnez votre ville</option>
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

                                <div class="tpsign__account">
                                    <a href="{{ route('login') }}">Vous avez déjà un compte ?</a>
                                </div>

                                <div class="tptrack__btn">
                                    <button type="submit" class="tptrack__submition tpsign__reg">
                                        Inscrivez-vous maintenant<i class="fal fa-long-arrow-right"></i>
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

</x-app-layout>
