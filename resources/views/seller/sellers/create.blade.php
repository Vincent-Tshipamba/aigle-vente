<x-app-layout>
    <section class=" overflow-hidden ">
        <div class="mt-2 md:mt-0 py-12 pb-6 sm:py-16 lg:pb-24 overflow-hidden">
            <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">



                <h1
                    class="bg-clip-text text-center text-transparent bg-gradient-to-r from-yellow-500 to-yellow-400 text-5xl font-black">
                    Devenir Vendeur
                </h1>
                <div class=" mt-12 lg:mt-20">



                    <!-- Formulaire Devenir Vendeur -->
                    <div id="formContainer" class="mt-12">

                        <form method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data">
                            @csrf

                            <!-- Step 1: Informations personnelles -->
                            <div id="step-1"
                                class="step transition-all transform translate-x-0 duration-500 ease-in-out w-full opacity-100">

                                <!-- Step 1 -->
                                <div id="step1" class="stepper-step">
                                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                        data-step="1">
                                        <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">1</span>
                                    </div>
                                    <h3
                                        class="mt-4 sm:mt-6 text-xl text-center font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                        Informations Personnelles du Vendeur
                                    </h3>
                                    <p class="mt-3 sm:mt-4 text-base text-center text-gray-600 dark:text-gray-400">
                                        Dans cette première étape, nous collectons les informations de base nécessaires
                                        pour établir votre profil en tant que vendeur. Veuillez vérifier que vos données
                                        sont correctes, notamment votre prénom, nom, et sexe, afin d'assurer une
                                        identification claire et rapide dans notre système.
                                    </p>
                                </div>
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
                                <select id="sexe" name="sexe" class="z-50 select-custom nice-select">
                                    <option value="{{ $sexe }}" selected> {{ $sexe }} </option>
                                </select>
                                <x-input-error :messages="$errors->get('sexe')" class="mt-2" />

                            </div>

                            <!-- Step 2: Coordonnées -->
                            <div id="step-2"
                                class="step  transition-all transform -translate-y-6 duration-1000 ease-in-out w-full opacity-0"
                                style="display:none;">

                                <!-- Step 2 -->
                                <div id="step2" class="stepper-step">
                                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                        data-step="2">
                                        <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">2</span>
                                    </div>
                                    <h3
                                        class="mt-4 sm:mt-6 text-xl text-center font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                        Informations de Contact
                                    </h3>
                                    <p class="mt-3 sm:mt-4 text-base text-center text-gray-600 dark:text-gray-400">
                                        Cette étape permet de collecter vos informations de contact, telles que votre
                                        numéro de téléphone et votre adresse. Ces données sont indispensables pour
                                        assurer une communication fluide et rapide avec vous tout au long du processus.
                                    </p>
                                </div>
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
                            <div id="step-3"
                                class="step transition-all transform tr-translate-y-6 duration-1000 ease-in-out w-full opacity-0"
                                style="display:none;">

                                <div id="step3" class="stepper-step">
                                    <div class="flex items-center justify-center w-16 h-16 mx-auto bg-white dark:bg-gray-800 border-2 border-gray-200 dark:border-gray-700 rounded-full shadow step-circle"
                                        data-step="3">
                                        <span class="text-xl font-semibold text-gray-700 dark:text-gray-200">3</span>
                                    </div>
                                    <h3
                                        class="mt-4 sm:mt-6 text-xl text-center font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                        Téléchargement de la Photo de Profil
                                    </h3>
                                    <p class="mt-3 text-center  sm:mt-4 text-base text-gray-600 dark:text-gray-400">
                                        Dans cette étape, vous devez télécharger une photo de profil qui vous
                                        représente. Cette image sera utilisée pour personnaliser votre profil et aider à
                                        mieux vous identifier sur la plateforme. Veuillez vous assurer que l'image est
                                        claire et professionnelle.
                                    </p>
                                </div>
                                <!-- Photo -->
                                <div class="mb-10">
                                    {{-- <div class="relative">
                                        <input id="picture" type="file" name="picture" class="mt-1" />
                                    </div> --}}
                                    <div class="mb-5 text-center">
                                        <div
                                            class="mx-auto w-32 h-32 mb-2 border rounded-full relative bg-gray-100 mb-4 shadow-inset">
                                            <img id="image-preview" class="object-cover w-full h-32 rounded-full"
                                                :src="image" />
                                        </div>

                                        <label for="fileInput" type="button"
                                            class="cursor-pointer inine-flex justify-between items-center focus:outline-none border py-2 px-4 rounded-lg shadow-sm text-left text-gray-600 bg-white hover:bg-gray-100 font-medium">
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                class="inline-flex flex-shrink-0 w-6 h-6 -mt-1 mr-1" viewBox="0 0 24 24"
                                                stroke-width="2" stroke="currentColor" fill="none"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <rect x="0" y="0" width="24" height="24" stroke="none">
                                                </rect>
                                                <path
                                                    d="M5 7h1a2 2 0 0 0 2 -2a1 1 0 0 1 1 -1h6a1 1 0 0 1 1 1a2 2 0 0 0 2 2h1a2 2 0 0 1 2 2v9a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-9a2 2 0 0 1 2 -2" />
                                                <circle cx="12" cy="13" r="3" />
                                            </svg>
                                            Browse Photo
                                        </label>

                                        <div class="mx-auto w-48 text-gray-500 text-xs text-center mt-1">Click to add
                                            profile picture</div>

                                        <input name="photo" id="fileInput" accept="image/*" class="hidden"
                                            type="file" onchange="previewImage(event)" name="picture">
                                    </div>
                                    <x-input-error :messages="$errors->get('picture')" class="mt-2" />
                                </div>
                            </div>

                            <!-- Buttons de navigation -->
                            <div class="fixed bottom-4 right-4 flex space-x-4">
                                <button type="button" id="prev-btn"
                                    class=" focus:outline-none bg-gray-600 text-white font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2"
                                    style="display:none;">Précédent</button>
                                <button type="button" id="next-btn"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">Suivant</button>
                                <button type="submit" id="submit-btn"
                                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900"
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
        // Fonction de mise à jour du stepper
        function updateStepper() {
            formSteps.forEach((step, index) => {
                // Affichage des étapes avec gestion de visibilité
                if (index === currentStep) {
                    step.classList.remove('opacity-0');
                    step.classList.add('opacity-100');
                    step.style.display = 'block'; // Affichage de l'étape actuelle
                } else {
                    step.classList.remove('opacity-100');
                    step.classList.add('opacity-0');
                    step.style.display = 'none'; // Masquage des autres étapes
                }
            });

            // Mettre à jour les couleurs des étapes
            stepperSteps.forEach((step, index) => {
                const stepCircle = step.querySelector('div');
                stepCircle.classList.remove('bg-blue-500', 'bg-green-500', 'bg-gray-300');
                if (index < currentStep) {
                    stepCircle.classList.add('bg-green-500'); // Étape complétée
                } else if (index === currentStep) {
                    stepCircle.classList.add('bg-blue-500'); // Étape actuelle
                } else {
                    stepCircle.classList.add('bg-gray-300'); // Étape à venir
                }
            });

            // Affichage des boutons
            prevButton.style.display = currentStep === 0 ? 'none' : 'inline-block';
            nextButton.style.display = currentStep === formSteps.length - 1 ? 'none' : 'inline-block';
            submitButton.style.display = currentStep === formSteps.length - 1 ? 'inline-block' : 'none';
        }

        // Validation des étapes
        function isStepValid(stepIndex) {
            const inputs = formSteps[stepIndex].querySelectorAll('input, select');
            return [...inputs].every(input => input.value.trim() !== '');
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

    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewContainer = document.getElementById('preview-container');
                    const previewImage = document.getElementById('image-preview');
                    previewImage.src = e.target.result;
                    previewContainer.classList.remove('hidden');
                };
                reader.readAsDataURL(file);
            }
        }


        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Succès',
                text: '{{ session('success') }}',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Erreur',
                text: '{{ session('error') }}',
                toast: true,
                position: 'top-end',
                timer: 3000,
                showConfirmButton: false,
                timerProgressBar: true,
            });
        @endif
    </script>

</x-app-layout>
