<section class="track-area">
    <div class="container">
        <div class="min-h-screen bg-gray-100 max-w-full w-full text-gray-900 flex items-center justify-center">
            <div class="max-w-[440px] w-full shadow-md bg-white rounded px-8 py-10" x-data="signUpForm()">
                <!-- Logo -->
                <div class="text-center mx-auto mb-6">
                    <a href="{{ route('home') }}" class="text-center">
                        <img class="mx-auto" src="{{ asset('img/logo/logo_sans_bg.png') }}" alt="" width="25%">
                    </a>
                </div>

                <!-- En-tête -->
                <h2 class="text-xl font-normal text-center mb-2 font-bold">Inscription</h2>
                <p class="text-gray-500 text-center text-lg mb-8">
                    Rejoignez Aigle Vente pour entrer en contact avec des vendeurs offrant les produits qui vous
                    intéressent.
                </p>

                <!-- Formulaire -->
                <form id="registrationForm" action="{{ route('register') }}" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid grid-cols-2 gap-4">
                        <input type="text" name="firstname" placeholder="Prénom*"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-[#e38407] placeholder-gray-400"
                            required />
                        @error('firstname')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror

                        <input type="text" name="lastname" placeholder="Nom*"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-[#e38407] placeholder-gray-400"
                            required />
                        @error('lastname')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="text" name="phone" placeholder="Numéro de téléphone*"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-[#e38407] placeholder-gray-400"
                            required />
                        @error('phone')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <input type="email" name="email" placeholder="Email"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-[#e38407] placeholder-gray-400" />
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="relative">
                        <input :type="showPwd ? 'text' : 'password'" name="password" placeholder="Password*"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-rose-500 placeholder-gray-400" />
                        <button type="button" @click="showPwd = !showPwd"
                            class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="relative">
                        <input :type="showPwdConf ? 'text' : 'password'" name="password.confirmation" placeholder="Confirmez le mot de passe*"
                            class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-rose-500 placeholder-gray-400" />
                        <button type="button" @click="showPwdConf = !showPwdConf"
                            class="absolute right-3 top-1/2 -translate-y-1/2">
                            <svg class="w-6 h-6 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            </svg>
                        </button>
                        @error('password.confirmation')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <select name="sexe" required
                        class="w-full px-4 py-3.5 text-lg rounded focus:outline-none border border-gray-300 focus:border-[#e38407] text-gray-500 appearance-none bg-white">
                        <option value="">Genre*</option>
                        <option value="Masculin">Masculin</option>
                        <option value="Féminin">Féminin</option>
                        <option value="Ne pas spécifier">Ne pas spécifier</option>
                    </select>
                    @error('sexe')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror

                    <input type="text" hidden name="city" id="city" />
                    <input type="text" hidden name="country" id="country" />
                    <input type="text" hidden name="continent" id="continent" />
                    <input type="text" hidden name="latitude" id="latitude" />
                    <input type="text" hidden name="longitude" id="longitude" />

                    <button type="submit"
                        class="w-full bg-[#e38407] text-white py-4 px-6 rounded text-lg hover:bg-[#d37306] transition-colors mt-6">
                        S'inscrire
                    </button>
                    <p class="mt-8 text-sm text-gray-600 text-center">
                        Déjà inscrit ?
                        <a href="{{ route('login') }}" class="text-[#e38407] font-bold text-md hover:underline">
                            Connectez-vous
                        </a>
                    </p>
                </form>
                <div class="my-3 text-center">
                    <span>Ou</span>
                </div>
                <div class="flex flex-col items-center mt-3">
                    <button onclick="window.location.href='{{ route('socialite.redirect', 'google') }}'"
                        class="w-full font-bold shadow-sm rounded-lg py-3 lg:py-4 bg-[#ffe3bf] text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                        <div class="bg-white p-2 rounded-full">
                            <svg class="w-4" viewBox="0 0 533.5 544.3">
                                <path
                                    d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                    fill="#4285f4" />
                                <path
                                    d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                    fill="#34a853" />
                                <path d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                    fill="#fbbc04" />
                                <path
                                    d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                    fill="#ea4335" />
                            </svg>
                        </div>
                        <span class="ml-4 text-sm ">
                            Inscrivez-vous avec Google
                        </span>
                    </button>

                    {{-- <button
                        class="w-full font-bold shadow-sm rounded-lg py-3 lg:py-4 bg-[#ffe3bf] text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-5">
                        <div class="bg-white p-1 rounded-full">
                            <svg class="w-6" viewBox="0 0 24 24">
                                <path fill="#1877F2"
                                    d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                            </svg>
                        </div>
                        <span class="ml-4 text-sm ">
                            Inscrivez-vous avec Facebook
                        </span>
                    </button> --}}
                </div>
            </div>
        </div>
    </div>
</section>
