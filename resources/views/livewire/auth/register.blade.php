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
            </div>
        </div>
    </div>
</section>
