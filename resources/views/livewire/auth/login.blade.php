<section class="track-area">
    <div class="container">
        <div class="min-h-screen bg-gray-100 text-gray-900 flex justify-center">
            <div class="max-w-screen-xl m-0 sm:m-10 bg-white shadow sm:rounded-lg flex justify-center flex-1">
                <div class="lg:w-1/2 xl:w-5/12 p-6 sm:p-12">
                    <div class="mt-1 flex flex-col items-center">
                        <h1 class="text-2xl xl:text-3xl font-extrabold">
                            Connexion
                        </h1>
                        <div class="w-full flex-1 mt-8">
                            <div class="flex flex-col items-center">
                                <button onclick="window.location.href='{{ route('socialite.redirect', 'google') }}'"
                                    class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 lg:py-4 bg-[#ffe3bf] text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline">
                                    <div class="bg-white p-2 rounded-full">
                                        <svg class="w-4" viewBox="0 0 533.5 544.3">
                                            <path
                                                d="M533.5 278.4c0-18.5-1.5-37.1-4.7-55.3H272.1v104.8h147c-6.1 33.8-25.7 63.7-54.4 82.7v68h87.7c51.5-47.4 81.1-117.4 81.1-200.2z"
                                                fill="#4285f4" />
                                            <path
                                                d="M272.1 544.3c73.4 0 135.3-24.1 180.4-65.7l-87.7-68c-24.4 16.6-55.9 26-92.6 26-71 0-131.2-47.9-152.8-112.3H28.9v70.1c46.2 91.9 140.3 149.9 243.2 149.9z"
                                                fill="#34a853" />
                                            <path
                                                d="M119.3 324.3c-11.4-33.8-11.4-70.4 0-104.2V150H28.9c-38.6 76.9-38.6 167.5 0 244.4l90.4-70.1z"
                                                fill="#fbbc04" />
                                            <path
                                                d="M272.1 107.7c38.8-.6 76.3 14 104.4 40.8l77.7-77.7C405 24.6 339.7-.8 272.1 0 169.2 0 75.1 58 28.9 150l90.4 70.1c21.5-64.5 81.8-112.4 152.8-112.4z"
                                                fill="#ea4335" />
                                        </svg>
                                    </div>
                                    <span class="ml-4 text-sm ">
                                        Se connecter avec Google
                                    </span>
                                </button>

                                {{-- <button
                                    class="w-full max-w-xs font-bold shadow-sm rounded-lg py-3 lg:py-4 bg-[#ffe3bf] text-gray-800 flex items-center justify-center transition-all duration-300 ease-in-out focus:outline-none hover:shadow focus:shadow-sm focus:shadow-outline mt-5">
                                    <div class="bg-white p-1 rounded-full">
                                        <svg class="w-6" viewBox="0 0 24 24">
                                            <path fill="#1877F2"
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </div>
                                    <span class="ml-4 text-sm ">
                                        Se connecter avec Facebook
                                    </span>
                                </button> --}}
                            </div>

                            <div class="my-8 border-b text-center">
                                <div
                                    class="leading-none px-2 inline-block text-sm text-gray-600 tracking-wide font-medium bg-white transform translate-y-1/2">
                                    Ou connectez-vous avec un e-mail ou un numéro de téléphone
                                </div>
                            </div>

                            <div class="mx-auto max-w-xs">
                                <form wire:submit.prevent="login">
                                    <input
                                        class="w-full px-8 py-3 lg:py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white"
                                        type="text" wire:model="identifier"
                                        placeholder="Email ou numéro de téléphone" />
                                    @error('identifier')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <input
                                        class="w-full px-8  py-3 lg:py-4 rounded-lg font-medium bg-gray-100 border border-gray-200 placeholder-gray-500 text-sm focus:outline-none focus:border-gray-400 focus:bg-white mt-5"
                                        type="password" wire:model="password" placeholder="Mot de passe" />
                                    @error('password')
                                        <span class="text-red-500 text-sm">{{ $message }}</span>
                                    @enderror

                                    <div class="flex items-center justify-between mt-5">
                                        <label class="inline-flex items-center text-sm">
                                            <input type="checkbox" class="form-checkbox text-[#e38407]"
                                                wire:model.defer="remember">
                                            <span class="ml-2 text-gray-700">Se souvenir de moi</span>
                                        </label>
                                        <a href="#" class="text-sm text-[#e38407] hover:underline">
                                            Mot de passe oublié ?
                                        </a>
                                    </div>

                                    <button
                                        class="mt-6 tracking-wide font-semibold bg-[#e38407] text-white w-full py-3 lg:py-4 rounded-lg hover:bg-gradient-to-r from-orange-500 to-[#e38407] transition-all duration-300 ease-in-out flex items-center justify-center focus:shadow-outline focus:outline-none">
                                        <svg class="w-6 h-6 -ml-2" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path d="M15 3h4a2 2 0 0 1 2 2v14a2 2 0 0 1-2 2h-4" />
                                            <polyline points="10 17 15 12 10 7" />
                                            <line x1="15" y1="12" x2="3" y2="12" />
                                        </svg>
                                        <span class="ml-3">
                                            Connexion
                                        </span>
                                    </button>
                                </form>

                                <p class="mt-8 text-sm text-gray-600 text-center">
                                    Pas encore inscrit ?
                                    <a href="{{ route('register') }}" class="text-[#e38407] font-bold hover:underline">Créer un
                                        compte</a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex-1 bg-indigo-100 text-center hidden lg:flex">
                    <div class="m-12 xl:m-16 w-full bg-contain bg-center bg-no-repeat"
                        style="background-image: url('https://storage.googleapis.com/devitary-image-host.appspot.com/15848031292911696601-undraw_designer_life_w96d.svg');">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
