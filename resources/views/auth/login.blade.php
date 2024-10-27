<x-app-layout>
    <!-- track-area-start -->
    <section class="track-area pt-60 pb-40">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 col-sm-12">
                    <div class="tptrack__product mb-40">
                        <div class="tptrack__thumb">
                            <div class="tptrack__content grey-bg-3">
                                <div class="tptrack__item d-flex mb-20">
                                    <div class="tptrack__item-icon">
                                        <img src="{{ asset('img/icon/lock.png') }}" alt="">
                                    </div>
                                    <div class="tptrack__item-content">
                                        <h4 class="tptrack__item-title">Connectez-vous ici</h4>
                                        <p>Vos données personnelles seront utilisées pour soutenir votre expérience tout
                                            au
                                            long de ce site web, pour gérer l'accès à votre compte.</p>
                                    </div>
                                </div>
                                <form method="POST" action="{{ route('login') }}">
                                    @csrf

                                    <!-- Email Address -->
                                    <div class="tptrack__id mb-10">
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                                    xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    viewBox="0 0 20 16">
                                                    <path
                                                        d="m10.036 8.278 9.258-7.79A1.979 1.979 0 0 0 18 0H2A1.987 1.987 0 0 0 .641.541l9.395 7.737Z" />
                                                    <path
                                                        d="M11.241 9.817c-.36.275-.801.425-1.255.427-.428 0-.845-.138-1.187-.395L0 2.6V14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2.5l-8.759 7.317Z" />
                                                </svg>
                                            </div>
                                            <input id="email"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="email" name="email" :value="old('email')" required autofocus
                                                placeholder="Adresse e-mail" />
                                        </div>
                                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                                    </div>

                                    <!-- Password -->
                                    <div class="tptrack__email mb-10">
                                        <div class="relative">
                                            <div
                                                class="absolute inset-y-0 start-0 flex items-center ps-3.5 pointer-events-none">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="w-4 h-4 text-gray-500 dark:text-gray-400"
                                                    viewBox="0 0 24 24">
                                                    <path fill="currentColor"
                                                        d="M12 17a2 2 0 0 0 2-2a2 2 0 0 0-2-2a2 2 0 0 0-2 2a2 2 0 0 0 2 2m6-9a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2h1V6a5 5 0 0 1 5-5a5 5 0 0 1 5 5v2zm-6-5a3 3 0 0 0-3 3v2h6V6a3 3 0 0 0-3-3" />
                                                </svg>
                                            </div>
                                            <input id="password"
                                                class="mt-1 bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full ps-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                                type="password" name="password" required placeholder="Mot de passe" />
                                        </div>
                                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                    </div>

                                    <!-- Remember Me -->
                                    <div
                                        class="tpsign__remember d-flex align-items-center justify-content-between mb-15">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="remember"
                                                id="remember">
                                            <label class="form-check-label" for="remember">Se souvenir de moi</label>
                                        </div>
                                        <div class="tpsign__pass">
                                            <a href="{{ route('password.request') }}">Mot de passe oublié ?</a>
                                        </div>
                                    </div>

                                    <div class="tptrack__btn flex flex-col space-y-2">
                                        <button type="submit" class="tptrack__submition">
                                            Connectez-vous maintenant<i class="fal fa-long-arrow-right"></i>
                                        </button>
                                        <button type="button" onclick="window.location.href='/register'" class="rounded-full border text-white hover:font-bold bg-gray-400 hover:bg-[#040404] px-10 py-3 space-x-3">
                                            <span>Je n'ai pas de compte</span>
                                            <i class="fal fa-long-arrow-right"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- track-area-end --

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

</x-app-layout>
