@extends('seller.layouts.app')

@section('content')
    <style>
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .floating {
            animation: float 6s ease-in-out infinite;
        }

        .floating-slow {
            animation: float 8s ease-in-out infinite;
        }

        .floating-slower {
            animation: float 10s ease-in-out infinite;
        }
    </style>
   
    @if ($totalShops == 0)
        <!-- Background Elements -->
        <div class="absolute inset-0 overflow-hidden pointer-events-none">
            <div class="absolute top-20 left-10 w-20 h-20 rounded-full bg-[#e38407da] opacity-20 floating"></div>
            <div class="absolute top-40 right-20 w-32 h-32 rounded-full bg-[#e38407] opacity-20 floating-slow"></div>
            <div class="absolute bottom-20 left-1/4 w-24 h-24 rounded-full bg-[#915a14da] opacity-20 floating-slower"></div>
            <div class="absolute top-1/3 right-1/3 w-16 h-16 rounded-full bg-[#e38407da] opacity-20 floating"></div>
        </div>

        <div class="container mx-auto px-4 py-12 relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <div class="text-center md:text-left">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-6 leading-tight">
                        🎉 Bienvenue dans votre espace <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-[#e38407da] to-[#e38407]"> vendeur
                            !</span>

                    </h1>
                    <p class="text-lg md:text-xl text-gray-600 dark:text-gray-300 mb-8 max-w-lg mx-auto md:mx-0">
                        Félicitations ! Vous venez de rejoindre notre plateforme en tant que vendeur. Pour bien démarrer, il
                        vous suffit de créer votre première boutique. C'est l'étape essentielle pour mettre en ligne vos
                        produits et commencer à générer des ventes
                    </p>

                    <a href="{{ route('shops.index') }}" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg bg-[#e38407] text-white hover:bg-orange-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-orange-500 transition-all duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
                        </svg>
                        Ajoute une boutique
                    </a>

                    <!-- Newsletter Signup -->
                    <div class="max-w-md mx-auto md:mx-0">

                    </div>

                    <!-- Social Media -->
                    <div class="mt-10 flex justify-center md:justify-start space-x-6">
                        <a href="#" class="text-[#e2a351da] hover:text-white transition-colors duration-200">
                            <i class="fab fa-twitter text-xl"></i>
                        </a>
                        <a href="#" class="text-[#e2a351da] hover:text-white transition-colors duration-200">
                            <i class="fab fa-instagram text-xl"></i>
                        </a>
                        <a href="#" class="text-[#e2a351da] hover:text-white transition-colors duration-200">
                            <i class="fab fa-facebook text-xl"></i>
                        </a>
                        <a href="#" class="text-[#e2a351da] hover:text-white transition-colors duration-200">
                            <i class="fab fa-linkedin-in text-xl"></i>
                        </a>
                    </div>
                </div>

                <!-- Illustration -->
                <div class="hidden md:block">
                    <div class="relative">
                        <div
                            class="absolute inset-0 bg-gradient-to-r from-[#e38407da] to-[#e38407] rounded-full opacity-20 blur-3xl">
                        </div>
                        <img src="https://cdn.pixabay.com/photo/2018/11/29/21/51/social-media-3846597_1280.png"
                            alt="Illustration" class="relative z-10 mx-auto floating-slow">
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class=" p-4 md:p-6 2xl:p-10">
            <div class="grid grid-cols-1 gap-4 md:grid-cols-2 md:gap-6 xl:grid-cols-3 2xl:gap-7.5">
                <!-- Card Item Start -->
                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default 
            dark:border-strokedark dark:bg-boxdark dark:hover:bg-gray-700 
            hover:bg-[#f8f0e781] hover:scale-105 transition duration-500 ease-in-out">

                    <!-- Icône principale -->
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" xmlns="http://www.w3.org/2000/svg" width="24"
                            height="24" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m4 12 8-8 8 8M6 10.5V19a1 1 0 0 0 1 1h3v-3a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3h3a1 1 0 0 0 1-1v-8.5" />
                        </svg>
                    </div>

                    <!-- Contenu principal -->
                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $totalShops }}
                            </h4>
                            <span class="text-sm font-medium">Total Boutique</span>
                        </div>

                        <!-- Affichage dynamique du pourcentage -->
                        <span
                            class="flex items-center gap-1 text-sm font-medium 
            {{ $growthPercentage > 0 ? 'text-green-500' : ($growthPercentage < 0 ? 'text-red-500' : 'text-gray-500') }}">
                            {{ number_format($growthPercentage, 2) }}%
                            <svg class="fill-current" width="10" height="11" xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="{{ $growthPercentage > 0
                                        ? 'M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z'
                                        : ($growthPercentage < 0
                                            ? 'M4.35716 8.60737L0.908974 5.25487L5.0443e-07 6.13812L5 10.9994L10 6.13812L9.09103 5.25487L5.64284 8.60737L5.64284 1L4.35716 1L4.35716 8.60737Z'
                                            : '') }}" />
                            </svg>
                        </span>

                    </div>
                </div>


                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="22" viewBox="0 0 22 22"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M21.1063 18.0469L19.3875 3.23126C19.2157 1.71876 17.9438 0.584381 16.3969 0.584381H5.56878C4.05628 0.584381 2.78441 1.71876 2.57816 3.23126L0.859406 18.0469C0.756281 18.9063 1.03128 19.7313 1.61566 20.3844C2.20003 21.0375 2.99066 21.3813 3.85003 21.3813H18.1157C18.975 21.3813 19.8 21.0031 20.35 20.3844C20.9 19.7656 21.2094 18.9063 21.1063 18.0469ZM19.2157 19.3531C18.9407 19.6625 18.5625 19.8344 18.15 19.8344H3.85003C3.43753 19.8344 3.05941 19.6625 2.78441 19.3531C2.50941 19.0438 2.37191 18.6313 2.44066 18.2188L4.12503 3.43751C4.19378 2.71563 4.81253 2.16563 5.56878 2.16563H16.4313C17.1532 2.16563 17.7719 2.71563 17.875 3.43751L19.5938 18.2531C19.6282 18.6656 19.4907 19.0438 19.2157 19.3531Z"
                                fill="" />
                            <path
                                d="M14.3345 5.29375C13.922 5.39688 13.647 5.80938 13.7501 6.22188C13.7845 6.42813 13.8189 6.63438 13.8189 6.80625C13.8189 8.35313 12.547 9.625 11.0001 9.625C9.45327 9.625 8.1814 8.35313 8.1814 6.80625C8.1814 6.6 8.21577 6.42813 8.25015 6.22188C8.35327 5.80938 8.07827 5.39688 7.66577 5.29375C7.25327 5.19063 6.84077 5.46563 6.73765 5.87813C6.6689 6.1875 6.63452 6.49688 6.63452 6.80625C6.63452 9.2125 8.5939 11.1719 11.0001 11.1719C13.4064 11.1719 15.3658 9.2125 15.3658 6.80625C15.3658 6.49688 15.3314 6.1875 15.2626 5.87813C15.1595 5.46563 14.747 5.225 14.3345 5.29375Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $totalProducts }}
                            </h4>
                            <span class="text-sm font-medium">Total Product</span>
                        </div>

                        {{-- <span class="flex items-center gap-1 text-sm font-medium text-meta-3">
                            2.59%
                            <svg class="fill-meta-3" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M4.35716 2.47737L0.908974 5.82987L5.0443e-07 4.94612L5 0.0848689L10 4.94612L9.09103 5.82987L5.64284 2.47737L5.64284 10.0849L4.35716 10.0849L4.35716 2.47737Z"
                                    fill="" />
                            </svg>
                        </span> --}}
                    </div>
                </div>

                <div
                    class="rounded-sm border border-stroke bg-white px-7.5 py-6 shadow-default dark:border-strokedark dark:bg-boxdark dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    <div class="flex h-11.5 w-11.5 items-center justify-center rounded-full bg-meta-2 dark:bg-meta-4">
                        <svg class="fill-primary dark:fill-white" width="22" height="18" viewBox="0 0 22 18"
                            fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M7.18418 8.03751C9.31543 8.03751 11.0686 6.35313 11.0686 4.25626C11.0686 2.15938 9.31543 0.475006 7.18418 0.475006C5.05293 0.475006 3.2998 2.15938 3.2998 4.25626C3.2998 6.35313 5.05293 8.03751 7.18418 8.03751ZM7.18418 2.05626C8.45605 2.05626 9.52168 3.05313 9.52168 4.29063C9.52168 5.52813 8.49043 6.52501 7.18418 6.52501C5.87793 6.52501 4.84668 5.52813 4.84668 4.29063C4.84668 3.05313 5.9123 2.05626 7.18418 2.05626Z"
                                fill="" />
                            <path
                                d="M15.8124 9.6875C17.6687 9.6875 19.1468 8.24375 19.1468 6.42188C19.1468 4.6 17.6343 3.15625 15.8124 3.15625C13.9905 3.15625 12.478 4.6 12.478 6.42188C12.478 8.24375 13.9905 9.6875 15.8124 9.6875ZM15.8124 4.7375C16.8093 4.7375 17.5999 5.49375 17.5999 6.45625C17.5999 7.41875 16.8093 8.175 15.8124 8.175C14.8155 8.175 14.0249 7.41875 14.0249 6.45625C14.0249 5.49375 14.8155 4.7375 15.8124 4.7375Z"
                                fill="" />
                            <path
                                d="M15.9843 10.0313H15.6749C14.6437 10.0313 13.6468 10.3406 12.7874 10.8563C11.8593 9.61876 10.3812 8.79376 8.73115 8.79376H5.67178C2.85303 8.82814 0.618652 11.0625 0.618652 13.8469V16.3219C0.618652 16.975 1.13428 17.4906 1.7874 17.4906H20.2468C20.8999 17.4906 21.4499 16.9406 21.4499 16.2875V15.4625C21.4155 12.4719 18.9749 10.0313 15.9843 10.0313ZM2.16553 15.9438V13.8469C2.16553 11.9219 3.74678 10.3406 5.67178 10.3406H8.73115C10.6562 10.3406 12.2374 11.9219 12.2374 13.8469V15.9438H2.16553V15.9438ZM19.8687 15.9438H13.7499V13.8469C13.7499 13.2969 13.6468 12.7469 13.4749 12.2313C14.0937 11.7844 14.8499 11.5781 15.6405 11.5781H15.9499C18.0812 11.5781 19.8343 13.3313 19.8343 15.4625V15.9438H19.8687Z"
                                fill="" />
                        </svg>
                    </div>

                    <div class="mt-4 flex items-end justify-between">
                        <div>
                            <h4 class="text-title-md font-bold text-black dark:text-white">
                                {{ $clients->count() }}
                            </h4>
                            <span class="text-sm font-medium">Total Client</span>
                        </div>

                        {{-- <span class="flex items-center gap-1 text-sm font-medium text-meta-5">
                            0.95%
                            <svg class="fill-meta-5" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5.64284 7.69237L9.09102 4.33987L10 5.22362L5 10.0849L-8.98488e-07 5.22362L0.908973 4.33987L4.35716 7.69237L4.35716 0.0848701L5.64284 0.0848704L5.64284 7.69237Z"
                                    fill="" />
                            </svg>
                        </span> --}}
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-1 md:grid-cols-2  mt-4 gap-4 ">
                <div
                    class=" w-full dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    @include('partials.chart-01')

                </div>
                <div
                    class=" w-full h-full dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    @include('partials.chart-02')
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2  mt-4 gap-4">
                <div
                    class="dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    @include('partials.chart-03')
                </div>
                <div
                    class="dark:hover:bg-gray-700 hover:bg-[#f8f0e781] hover:scale-105 transition duration-700 ease-in-out">
                    @include('partials.map-01')
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    @vite(['resources/js/charts-dashboard-seller.js'])
@endpush
