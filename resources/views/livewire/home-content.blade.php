<div class="main-content container">
    <div class="flex   justify-between items-center gap-4 my-8">
        <!-- Bouton précédent -->
        <!-- Bouton précédent (masqué sur petits écrans) -->
        <div class="custom-next p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300  hover:scale-125 drop-shadow-md sm:block hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-600" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
            </svg>
        </div>


        <!-- Swiper avec grille responsive -->
        <div class="swiper w-full sm:w-auto">
            <div class="swiper-wrapper grid grid-cols-2 sm:grid-cols-4 md:grid-cols-6 gap-4">
                @foreach ($categories as $item)
                    <div class="swiper-slide">
                        <a href="#" class="flex flex-col items-center text-center space-y-2 hover:scale-105">
                            <div class="p-2  rounded-full ">
                                <img src="{{ $item->image }}" alt="{{ $item->name }}"
                                    class="w-8 h-8 max-w-full h-auto">
                            </div>
                            <span
                                class="text-xs sm:text-sm font-medium text-gray-500 hover:text-gray-700">{{ $item->name }}</span>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- Bouton suivant -->
        <div
            class="custom-prev p-2 bg-gray-100 rounded-full w-8 h-8 hover:bg-gray-200 transition-all duration-300  hover:scale-125 drop-shadow-md sm:block hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-800" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
            </svg>
        </div>

        <!-- Bouton Filtre avec responsive -->
        <button onclick="showFilters()"
            class="border border-gray-800 bg-white text-gray-600 dark:hover:bg-gray-100 py-2 px-3 text-sm sm:text-base font-normal rounded-lg flex items-center hover:bg-gray-200 transition-all duration-300  hover:scale-110 drop-shadow-md">
            <svg class="mr-2" width="24" height="24" viewBox="0 0 24 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M6 12C7.10457 12 8 11.1046 8 10C8 8.89543 7.10457 8 6 8C4.89543 8 4 8.89543 4 10C4 11.1046 4.89543 12 6 12Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M6 4V8" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M6 12V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M12 18C13.1046 18 14 17.1046 14 16C14 14.8954 13.1046 14 12 14C10.8954 14 10 14.8954 10 16C10 17.1046 10.8954 18 12 18Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M12 4V14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M12 18V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path
                    d="M18 9C19.1046 9 20 8.10457 20 7C20 5.89543 19.1046 5 18 5C16.8954 5 16 5.89543 16 7C16 8.10457 16.8954 9 18 9Z"
                    stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                <path d="M18 4V5" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M18 9V20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>

            Filters
        </button>
    </div>

    <div id=""
        class=" hidden  md:py-10 lg:px-20 md:px-6 py-9 px-4 bg-gray-50 dark:bg-gray-800 items-center w-94 md:inset-0 h-[calc(100%-1rem)] max-h-full overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50">
        <!-- Cross button Code -->
        <div onclick="closeFilterSection()"
            class="cursor-pointer text-gray-800 dark:text-white absolute right-0 top-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
            <svg class="lg:w-6 lg:h-6 w-4 h-4" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25 1L1 25" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M1 1L25 25" stroke="currentColor" stroke-width="1.25" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </div>

        <!-- Colors Section -->
        <div>
            <div class="flex space-x-2 text-gray-800 dark:text-white">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M19 3H15C14.4696 3 13.9609 3.21071 13.5858 3.58579C13.2107 3.96086 13 4.46957 13 5V17C13 18.0609 13.4214 19.0783 14.1716 19.8284C14.9217 20.5786 15.9391 21 17 21C18.0609 21 19.0783 20.5786 19.8284 19.8284C20.5786 19.0783 21 18.0609 21 17V5C21 4.46957 20.7893 3.96086 20.4142 3.58579C20.0391 3.21071 19.5304 3 19 3Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M12.9994 7.35022L10.9994 5.35022C10.6243 4.97528 10.1157 4.76465 9.58539 4.76465C9.05506 4.76465 8.54644 4.97528 8.17139 5.35022L5.34339 8.17822C4.96844 8.55328 4.75781 9.06189 4.75781 9.59222C4.75781 10.1225 4.96844 10.6312 5.34339 11.0062L14.3434 20.0062"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M7.3 13H5C4.46957 13 3.96086 13.2107 3.58579 13.5858C3.21071 13.9609 3 14.4696 3 15V19C3 19.5304 3.21071 20.0391 3.58579 20.4142C3.96086 20.7893 4.46957 21 5 21H17"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path d="M17 17V17.01" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                </svg>
                <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium">Colors</p>
            </div>
            <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                    <div class="w-4 h-4 rounded-full bg-white shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">White</p>
                </div>
                <div class="flex space-x-2 justify-center items-center">
                    <div class="w-4 h-4 rounded-full bg-blue-600 shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Blue</p>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                    <div class="w-4 h-4 rounded-full bg-red-600 shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Red</p>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                    <div class="w-4 h-4 rounded-full bg-indigo-600 shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Indigo</p>
                </div>
                <div class="flex space-x-2 justify-center items-center">
                    <div class="w-4 h-4 rounded-full bg-black shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Black</p>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                    <div class="w-4 h-4 rounded-full bg-purple-600 shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Purple</p>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                    <div class="w-4 h-4 rounded-full bg-gray-600 shadow"></div>
                    <p class="text-base leading-4 dark:text-gray-300 text-gray-600 font-normal">Grey</p>
                </div>
            </div>
        </div>

        <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

        <!-- Material Section -->
        <div>
            <div class="flex space-x-2 text-gray-800 dark:text-white">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M9.5 16C13.0899 16 16 13.0899 16 9.5C16 5.91015 13.0899 3 9.5 3C5.91015 3 3 5.91015 3 9.5C3 13.0899 5.91015 16 9.5 16Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                    <path
                        d="M19 10H12C10.8954 10 10 10.8954 10 12V19C10 20.1046 10.8954 21 12 21H19C20.1046 21 21 20.1046 21 19V12C21 10.8954 20.1046 10 19 10Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Material</p>
            </div>
            <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Leather" name="Leather" value="Leather" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                for="Leather">Leather</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Cotton" name="Cotton" value="Cotton" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                for="Cotton">Cotton</label>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-end">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Fabric" name="Fabric" value="Fabric" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                for="Fabric">Fabric</label>
                        </div>
                    </div>
                </div>
                <div class="flex space-x-2 md:justify-center md:items-center items-center justify-start">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Crocodile" name="Crocodile"
                        value="Crocodile" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                for="Crocodile">Crocodile</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Wool" name="Wool" value="Wool" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 dark:text-gray-300 font-normal text-gray-600"
                                for="Wool">Wool</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

        <!-- Size Section -->
        <div>
            <div class="flex space-x-2 text-gray-800 dark:text-white">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M3 5H14" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M12 7L14 5L12 3" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M5 3L3 5L5 7" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M19 10V21" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M17 19L19 21L21 19" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M21 12L19 10L17 12" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path
                        d="M12 10H5C3.89543 10 3 10.8954 3 12V19C3 20.1046 3.89543 21 5 21H12C13.1046 21 14 20.1046 14 19V12C14 10.8954 13.1046 10 12 10Z"
                        stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
                <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Size</p>
            </div>
            <div class="md:flex md:space-x-6 mt-8 grid grid-cols-3 gap-y-8 flex-wrap">
                <div class="flex md:justify-center md:items-center items-center justify-start">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Large" name="Large" value="Large" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                for="Large">Large</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Medium" name="Medium" value="Medium" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                for="Medium">Medium</label>
                        </div>
                    </div>
                </div>
                <div class="flex md:justify-center md:items-center items-center justify-end">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Small" name="Small" value="Small" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                for="Small">Small</label>
                        </div>
                    </div>
                </div>
                <div class="flex md:justify-center md:items-center items-center justify-start">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="Mini" name="Mini" value="Mini" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal text-gray-600 dark:text-gray-300"
                                for="Mini">Mini</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <hr class="bg-gray-200 lg:w-6/12 w-full md:my-10 my-8" />

        <!-- Collection Section -->
        <div>
            <div class="flex space-x-2 text-gray-800 dark:text-white ">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                    xmlns="http://www.w3.org/2000/svg">
                    <g opacity="0.8">
                        <path
                            d="M9 4H5C4.44772 4 4 4.44772 4 5V9C4 9.55228 4.44772 10 5 10H9C9.55228 10 10 9.55228 10 9V5C10 4.44772 9.55228 4 9 4Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M9 14H5C4.44772 14 4 14.4477 4 15V19C4 19.5523 4.44772 20 5 20H9C9.55228 20 10 19.5523 10 19V15C10 14.4477 9.55228 14 9 14Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path
                            d="M19 14H15C14.4477 14 14 14.4477 14 15V19C14 19.5523 14.4477 20 15 20H19C19.5523 20 20 19.5523 20 19V15C20 14.4477 19.5523 14 19 14Z"
                            stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M14 7H20" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                        <path d="M17 4V10" stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                            stroke-linejoin="round" />
                    </g>
                </svg>
                <p class="lg:text-2xl text-xl lg:leading-6 leading-5 font-medium ">Collection</p>
            </div>
            <div class="flex mt-8 space-x-8">
                <div class="flex justify-center items-center">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="LS" name="LS" value="LS" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal dark:text-gray-300 text-gray-600"
                                for="LS">Luxe signature</label>
                        </div>
                    </div>
                </div>
                <div class="flex justify-center items-center">
                    <input class="w-4 h-4 mr-2" type="checkbox" id="LxL" name="LxL" value="LxL" />
                    <div class="inline-block">
                        <div class="flex space-x-6 justify-center items-center">
                            <label class="mr-2 text-sm leading-3 font-normal dark:text-gray-300 text-gray-600"
                                for="LxL">Luxe x London</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Apply Filter Button (Large Screen) -->

        <div class="hidden md:block absolute right-0 bottom-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
            <button onclick="applyFilters()"
                class="hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                Filter</button>
        </div>


    </div>

    <!-- Filter Modal -->
    <div id="filterSection" tabindex="-1" aria-hidden="true"
        class="hidden fixed inset-0 z-50 flex items-center justify-center bg-gray-900 bg-opacity-50">
        <div class="relative w-full max-w-4xl bg-white rounded-lg shadow-lg dark:bg-gray-800">
            <!-- Header -->
            <div class="flex justify-between items-center p-5 border-b dark:border-gray-700">
                <h3 class="text-lg font-medium text-gray-900 dark:text-white">Filtrer les résultats</h3>
                <button type="button" class="text-gray-400 hover:text-gray-900 dark:hover:text-white"
                    onclick="toggleModal('filterSection')">
                    <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <!-- Body -->
            <div class="py-10 px-6 bg-gray-50 dark:bg-gray-800">
                <!-- Colors Section -->
                <section>
                    <div class="flex space-x-2 text-gray-800 dark:text-white mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M19 3H15..." stroke="currentColor" stroke-width="1.5" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        <p class="lg:text-2xl text-xl font-medium">Colors</p>
                    </div>
                    <div class="grid grid-cols-3 gap-y-8">
                        <div class="flex items-center space-x-2">
                            <div class="w-4 h-4 bg-white shadow rounded-full"></div>
                            <p>White</p>
                        </div>
                        <!-- More color options -->
                    </div>
                </section>

                <!-- Materials Section -->
                <section class="mt-8">
                    <div class="flex space-x-2 text-gray-800 dark:text-white mb-6">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 16C13..." stroke="currentColor" stroke-width="1.5" />
                        </svg>
                        <p class="lg:text-2xl text-xl font-medium">Material</p>
                    </div>
                    <div class="grid grid-cols-3 gap-y-8">
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="Leather" name="Leather" value="Leather" class="w-4 h-4" />
                            <label for="Leather" class="text-sm font-normal text-gray-600">Leather</label>
                        </div>
                        <!-- More material options -->
                    </div>
                </section>

                <!-- Submit Button -->
                <div class="flex justify-end mt-6">
                    <div class="hidden md:block absolute right-0 bottom-0 md:py-10 lg:px-20 md:px-6 py-9 px-4">
                        <button onclick="applyFilters()"
                            class="hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                            Filter</button>
                    </div>

                    <!-- Apply Filter Button (Table or lower Screen) -->

                    <div class="block md:hidden w-full mt-10">
                        <button onclick="applyFilters()"
                            class="w-full hover:bg-gray-700 dark:bg-white dark:text-gray-800 dark:hover:bg-gray-100 focus:ring focus:ring-offset-2 focus:ring-gray-800 text-base leading-4 font-medium py-4 px-10 text-white bg-gray-800">Apply
                            Filter</button>
                    </div>
                </div>
            </div>
        </div>
    </div>





    <!-- ✅ Grid Section - Starts Here 👇 -->
    <section id="Projects"
        class="grid grid-cols-1 lg:grid-cols-4 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14  mb-5 my-20">
        @if ($products && $products->count() == 0)
            <div class="p-4 text-center justify-center w-[100%] mx-auto text-sm text-gray-800 rounded-lg bg-gray-50 dark:bg-gray-800 dark:text-gray-300"
                role="alert">
                <span class="font-medium">Oups désolé !</span> Aucun produit disponible pour le moment. Essayez de
                rafraichir la page s'il vous plait.
            </div>
        @else
            @foreach ($products as $index => $product)
                <div class="w-72 rounded-xl duration-500">
                    <a href="{{ route('products.show', $product->_id) }}">
                        <div class="image swiper-container product-swiper-{{ $index + 1 }}" loading="lazy">
                            <div class="swiper-wrapper">
                                @foreach ($product->photos as $item)
                                    <div class="swiper-slide">
                                        <img src="{{ asset($item->image) }}" alt="{{ $product->name }}"
                                            class="h-80 w-72 object-cover rounded-xl hover:scale-105">
                                    </div>
                                @endforeach
                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination swiper-pagination-{{ $index + 1 }}"></div>

                            <!-- Navigation -->
                            <div class="swiper-button-prev swiper-button-prev-{{ $index + 1 }}"></div>
                            <div class="swiper-button-next swiper-button-next-{{ $index + 1 }}"></div>
                        </div>
                    </a>
                    <div class="px-4 py-3 w-72">
                        <span
                            class="text-gray-400 mr-3 uppercase text-xs">{{ $product->category_product->name }}</span><br>
                        <span class="text-gray-400 mr-3 text-xs">Boutique {{ $product->shop->name }}</span>

                        <p class="text-lg font-bold text-black truncate block capitalize">{{ $product->name }}</p>
                        <div class="flex items-center">
                            <p class="text-lg font-semibold text-black cursor-auto my-3">${{ $product->unit_price }}
                            </p>
                            <del>
                                <p class="text-sm text-gray-600 cursor-auto ml-2">${{ $product->unit_price + 50 }}</p>
                            </del>
                            <div class="ml-auto flex space-x-2">
                                <!-- Contacter un vendeur -->
                                <svg data-modal-target="contact-seller-modal" data-modal-toggle="contact-seller-modal"
                                    data-tooltip-target="tooltip-contact-seller"
                                    class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M16 10.5h.01m-4.01 0h.01M8 10.5h.01M5 5h14a1 1 0 0 1 1 1v9a1 1 0 0 1-1 1h-6.6a1 1 0 0 0-.69.275l-2.866 2.723A.5.5 0 0 1 8 18.635V17a1 1 0 0 0-1-1H5a1 1 0 0 1-1-1V6a1 1 0 0 1 1-1Z" />
                                </svg>
                                <!-- Contact seller modal -->
                                <div id="contact-seller-modal" data-modal-backdrop="static" tabindex="-1"
                                    aria-hidden="true"
                                    class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                                    <div class="relative p-4 w-full max-h-full">
                                        <!-- Modal content -->
                                        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                            <!-- Modal header -->
                                            <div
                                                class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                                                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                    Static modal
                                                </h3>
                                                <button type="button"
                                                    class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                                    data-modal-hide="contact-seller-modal">
                                                    <svg class="w-3 h-3" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none"
                                                        viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round"
                                                            stroke-linejoin="round" stroke-width="2"
                                                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                            </div>
                                            <!-- Modal body -->
                                            <div class="p-4 md:p-5 space-y-4">

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="tooltip-contact-seller" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Envoyer un message au vendeur
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>

                                <!-- Ajouter a la wishlist -->
                                <svg data-tooltip-target="tooltip-wishlist"
                                    onclick="addToWishList(event, {{ $product->id }})"
                                    class="w-8 h-8 text-gray-800 dark:text-white hover:fill-[#e38407] hover:text-[#e38407] hover:cursor-pointer"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24"
                                    height="24" fill="none" viewBox="0 0 24 24">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M12.01 6.001C6.5 1 1 8 5.782 13.001L12.011 20l6.23-7C23 8 17.5 1 12.01 6.002Z" />
                                </svg>
                                <div id="tooltip-wishlist" role="tooltip"
                                    class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    Ajouter à ma wishlist
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </section>
</div>
