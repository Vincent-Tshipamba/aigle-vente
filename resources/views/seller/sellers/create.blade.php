<x-app-layout>
    <section class="relative overflow-hidden bg-gray-50 dark:bg-gray-900">
        <div class="mt-2 md:mt-0 py-12 pb-6 sm:py-16 lg:pb-24 overflow-hidden">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8 relative">

                <h2 class="text-2xl font-semibold text-center text-gray-900 dark:text-white">Devenir Vendeur
                </h2>
                <div class="relative mt-12 lg:mt-20">
                    <div class="absolute inset-x-0 hidden xl:px-44 top-2 md:block md:px-20 lg:px-28">
                        <svg class="w-full" xmlns="http://www.w3.org/2000/svg" width="875" height="48"
                            viewBox="0 0 875 48" fill="none">
                            <path
                                d="M2 29C20.2154 33.6961 38.9915 35.1324 57.6111 37.5555C80.2065 40.496 102.791 43.3231 125.556 44.5555C163.184 46.5927 201.26 45 238.944 45C312.75 45 385.368 30.7371 458.278 20.6666C495.231 15.5627 532.399 11.6429 569.278 6.11109C589.515 3.07551 609.767 2.09927 630.222 1.99998C655.606 1.87676 681.208 1.11809 706.556 2.44442C739.552 4.17096 772.539 6.75565 805.222 11.5C828 14.8064 850.34 20.2233 873 24"
                                stroke="#D4D4D8" stroke-width="3" stroke-linecap="round" stroke-dasharray="1 12" />
                        </svg>
                    </div>
                    <div
                        class="relative grid grid-cols-1 text-center gap-y-8 sm:gap-y-10 md:gap-y-12 md:grid-cols-3 gap-x-12">

                        <!-- Step 1 -->
                        <div id="step1" class="stepper-step">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                data-step="1">
                                <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">1</span>
                            </div>
                            <h3
                                class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                Identité du vendeur
                            </h3>
                            <p class="mt-3 sm:mt-4 text-base text-gray-600 dark:text-gray-400">
                                Register with your email or using sign up with Google.
                            </p>
                        </div>

                        <!-- Step 2 -->
                        <div id="step2" class="stepper-step">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                data-step="2">
                                <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">2</span>
                            </div>
                            <h3
                                class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                Adresse
                            </h3>
                            <p class="mt-3 sm:mt-4 text-base text-gray-600 dark:text-gray-400">
                                Choose AI assistants to create your image variations.
                            </p>
                        </div>

                        <!-- Step 3 -->
                        <div id="step3" class="stepper-step">
                            <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                data-step="3">
                                <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">3</span>
                            </div>
                            <h3
                                class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                Photo profile du vendeur
                            </h3>
                            <p class="mt-3 sm:mt-4 text-base text-gray-600 dark:text-gray-400">
                                Download zip of all variations.
                            </p>
                        </div>
                    </div>


                    <!-- Formulaire Devenir Vendeur -->
                    <div id="formContainer" class="mt-12">

                        <form method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Informations personnelles -->
                            <div id="step-1" class="step transition transform ease-in-out duration-1000">
                                <!-- First Name -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="firstname" class="mt-1" type="text" name="first_name"
                                            value="{{ $firstName }}" readonly placeholder="Votre prénom" required />
                                    </div>
                                    <x-input-error :messages="$errors->get('first_name')" class="mt-2" />
                                </div>

                                <!-- Last Name -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="lastname" class="mt-1" type="text" name="last_name"
                                            value="{{ $lastName }}" readonly placeholder="Votre nom" required />
                                    </div>
                                    <x-input-error :messages="$errors->get('last_name')" class="mt-2" />
                                </div>

                                <!-- Sexe -->
                                <div class="mb-10">
                                    <select id="sexe" name="sexe" required
                                        class="z-50 select-custom nice-select">
                                        <option value="" disabled selected>Sélectionnez votre sexe</option>
                                        <option value="Masculin">Masculin</option>
                                        <option value="Féminin">Féminin</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('sexe')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Step 2: Coordonnées -->
                            <div id="step-2" class="step transition transform ease-in-out duration-1000" style="display:none;">
                                <!-- Téléphone -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="phone" class="mt-1" type="text" name="phone" required
                                            placeholder="Votre téléphone" />
                                    </div>
                                    <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                                </div>

                                <!-- Adresse -->
                                <div class="tptrack__id mb-10">
                                    <div class="relative">
                                        <input id="address" class="mt-1" type="text" name="address" required
                                            placeholder="Votre adresse" />
                                    </div>
                                    <x-input-error :messages="$errors->get('address')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Step 3: Photo -->
                            <div id="step-3" class="step transition transform ease-in-out duration-1000" style="display:none;">
                                <!-- Photo -->
                                <div class="mb-10">
                                    <div class="relative">
                                        <input id="picture" type="file" name="picture" class="mt-1" />
                                    </div>
                                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Buttons de navigation -->
                            <div class="tptrack__btn">
                                <button type="button" id="prev-btn" class="btn btn-secondary"
                                    style="display:none;">Précédent</button>
                                <button type="button" id="next-btn" class="btn btn-primary">Suivant</button>
                                <button type="submit" id="submit-btn" class="btn btn-success"
                                    style="display:none;">Soumettre</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <script>
        const nextButton = document.getElementById('next-btn');
        const prevButton = document.getElementById('prev-btn');
        const formSteps = document.querySelectorAll('.step');
        const stepperSteps = document.querySelectorAll('.stepper-step');
        const submitButton = document.getElementById('submit-btn');
        let currentStep = 0;
        const stepStatus = [false, false, false]; // Array to track the status of each step (answered or not)

        // Show the current step and update the stepper
        function updateStepper() {
            // Hide all steps except the current one
            formSteps.forEach((step, index) => {
                step.style.display = index === currentStep ? 'block' : 'none';
            });

            // Update stepper colors based on step status
            stepperSteps.forEach((step, index) => {
                const stepCircle = step.querySelector('div');
                // Reset all step circle colors
                stepCircle.classList.remove('bg-blue-500', 'bg-green-500', 'bg-gray-300');
                // Add appropriate color based on the current step and its status
                if (index < currentStep) {
                    stepCircle.classList.add('bg-green-500'); // Completed step
                } else if (index === currentStep) {
                    stepCircle.classList.add('bg-blue-500'); // Current step
                } else {
                    stepCircle.classList.add('bg-gray-300'); // Upcoming step
                }
            });

            // Control the visibility of navigation buttons
            prevButton.style.display = currentStep === 0 ? 'none' : 'inline-block';
            nextButton.style.display = currentStep === formSteps.length - 1 ? 'none' : 'inline-block';
            submitButton.style.display = currentStep === formSteps.length - 1 ? 'inline-block' : 'none';
        }

        // Handle next button click
        nextButton.addEventListener('click', () => {
            if (currentStep < formSteps.length - 1 && isStepValid(currentStep)) {
                stepStatus[currentStep] = true; // Mark the step as answered
                currentStep++;
                updateStepper();
            }
        });

        // Handle prev button click
        prevButton.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                updateStepper();
            }
        });

        // Validate the current step (ensure all fields are answered)
        function isStepValid(stepIndex) {
            const inputs = formSteps[stepIndex].querySelectorAll('input, select');
            return [...inputs].every(input => input.value.trim() !== '');

            
        }

        // Initialize the stepper when the page loads
        updateStepper();
    </script>

</x-app-layout>
