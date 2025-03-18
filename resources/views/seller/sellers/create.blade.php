<x-app-layout>

    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;


        /*Start Animations*/
        @-webkit-keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        @keyframes animatetop {
            from {
                top: -300px;
                opacity: 0;
            }

            to {
                top: 0;
                opacity: 1;
            }
        }

        @-webkit-keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        @keyframes zoomIn {
            0% {
                opacity: 0;
                -webkit-transform: scale3d(0.3, 0.3, 0.3);
                transform: scale3d(0.3, 0.3, 0.3);
            }

            50% {
                opacity: 1;
            }
        }

        /*End Animations*/
        /*
-- Start BackGround Animation
*/
        .area {


            width: 100%;
            height: 100vh;
            position: absolute;
            z-index: -1;
        }

        .circles {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 96%;
            overflow: hidden;
        }

        .circles li {
            position: absolute;
            display: block;
            list-style: none;
            width: 20px;
            height: 20px;
            background: rgba(255, 203, 168, 0.2);
            animation: animate 25s linear infinite;
            bottom: -150px;
        }

        .circles li:nth-child(1) {
            left: 25%;
            width: 80px;
            height: 80px;
            animation-delay: 0s;
        }

        .circles li:nth-child(2) {
            left: 10%;
            width: 20px;
            height: 20px;
            animation-delay: 2s;
            animation-duration: 12s;
        }

        .circles li:nth-child(3) {
            left: 70%;
            width: 20px;
            height: 20px;
            animation-delay: 4s;
        }

        .circles li:nth-child(4) {
            left: 40%;
            width: 60px;
            height: 60px;
            animation-delay: 0s;
            animation-duration: 18s;
        }

        .circles li:nth-child(5) {
            left: 65%;
            width: 20px;
            height: 20px;
            animation-delay: 0s;
        }

        .circles li:nth-child(6) {
            left: 75%;
            width: 110px;
            height: 110px;
            animation-delay: 3s;
        }

        .circles li:nth-child(7) {
            left: 35%;
            width: 150px;
            height: 150px;
            animation-delay: 7s;
        }

        .circles li:nth-child(8) {
            left: 50%;
            width: 25px;
            height: 25px;
            animation-delay: 15s;
            animation-duration: 45s;
        }

        .circles li:nth-child(9) {
            left: 20%;
            width: 15px;
            height: 15px;
            animation-delay: 2s;
            animation-duration: 35s;
        }

        .circles li:nth-child(10) {
            left: 85%;
            width: 150px;
            height: 150px;
            animation-delay: 0s;
            animation-duration: 11s;
        }

        @keyframes animate {
            0% {
                transform: translateY(0) rotate(0deg);
                opacity: 1;
                border-radius: 0;
            }

            100% {
                transform: translateY(-1000px) rotate(720deg);
                opacity: 0;
                border-radius: 50%;
            }
        }

        /*
-- End BackGround Animation
*/
    </style>

    <div class="absolute inset-0  dark:opacity-60  h-screen rounded-br-lg rounded-ee-full  rounded-bl-3xl">
        <ul class="circles">
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
    <section class="bg-white flex  justify-center min-h-screen">
        <div class="w-full max-w-4xl" x-data="formStepper()">
            <h2 class="text-2xl font-semibold text-center mb-6">Devenir Vendeur</h2>

            <!-- Étapes -->
            <div class="flex justify-between mb-6 p-2 sm:p-0">
                <template x-for="(step, index) in steps" :key="index">
                    <div class="flex flex-col items-center">
                        <div class="w-10 h-10 rounded-full flex items-center justify-center font-bold"
                            :class="currentStep === index + 1 ? 'bg-blue-500 text-white' : 'bg-gray-300'">
                            <span x-text="index + 1"></span>
                        </div>
                        <p class="text-xs text-center mt-1" x-text="step.title"></p>
                    </div>
                </template>
            </div>

            <!-- Grid Illustration + Formulaire -->
            <div class="grid grid-cols-1 p-2 sm:p-0 sm:grid-cols-2 gap-6 items-center relative">
                <!-- Illustration -->
                <div class="relative w-full hidden sm:block">
                    <template x-for="(step, index) in steps" :key="index">
                        <img :src="step.image" alt="Illustration" x-show="currentStep === index + 1"
                            x-transition:enter="transform transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transform transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-10" class="absolute w-full">
                    </template>
                </div>
                <!-- Formulaire -->

                <form method="POST" action="{{ route('sellers.store') }}" enctype="multipart/form-data"
                    class="w-full relative">
                    @csrf
                    <template x-for="(step, index) in steps" :key="index">
                        <div x-show="currentStep === index + 1"
                            x-transition:enter="transform transition ease-out duration-500"
                            x-transition:enter-start="opacity-0 translate-x-10"
                            x-transition:enter-end="opacity-100 translate-x-0"
                            x-transition:leave="transform transition ease-in duration-300"
                            x-transition:leave-start="opacity-100 translate-x-0"
                            x-transition:leave-end="opacity-0 -translate-x-10" class="absolute w-full">

                            <!-- Étape 1 : Infos Perso -->
                            <template x-if="index === 0">

                                <div>
                                    <h3
                                        class="mt-4 sm:mt-6 text-xl  font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                        Informations Personnelles du Vendeur
                                    </h3>
                                    <div x-init="formData.name = '{{ $firstName }}';
                                    formData.last_name = '{{ $lastName }}'">


                                        <label class="block mb-2">Nom</label>
                                        <input type="text" x-model="formData.name"
                                            class="w-full p-2 border rounded mb-4" name="first_name" />

                                        <label class="block mb-2">Prénom</label>
                                        <input type="text" x-model="formData.last_name"
                                            class="w-full p-2 border rounded mb-4" name="last_name" />


                                        <!-- Message d'erreur si des champs sont vides -->
                                        <div x-show="!isStepValid(index)" class="text-red-500 mt-2">
                                            <p>⚠️ Veuillez remplir tous les champs avant de continuer.</p>
                                        </div>
                                    </div>


                                </div>

                            </template>

                            <!-- Étape 2 : Coordonnées -->
                            <template x-if="index === 1">
                                <div>
                                    <h3
                                        class="mt-4 sm:mt-6 text-xl font-semibold leading-tight text-gray-900 dark:text-white md:mt-10">
                                        Informations de Contact
                                    </h3>
                                    <label class="block mb-2">Adresse</label>
                                    <input type="text" x-model="formData.address"
                                        class="w-full p-2 border rounded mb-4" name="address">


                                    <label class="block mb-2">Téléphone</label>
                                    <input type="tel" x-model="formData.phone"
                                        class="w-full p-2 border rounded mb-4" name="phone">

                                    <!-- Message d'erreur si des champs sont vides -->
                                    <div x-show="!isStepValid(index)" class="text-red-500 mt-2">
                                        <p>⚠️ Veuillez remplir tous les champs avant de continuer.</p>
                                    </div>
                                </div>

                                <!-- Message d'erreur si des champs sont vides -->
                                <div x-show="!isStepValid(index)" class="text-red-500 mt-2">
                                    <p>⚠️ Veuillez remplir tous les champs avant de continuer.</p>
                                </div>
                            </template>

                            <template x-if="index === 2">
                                <div>
                                    <h3 class="...">Les lien de vos Réseaux Sociaux</h3>
                                    <label class="block mb-2">Facebook</label>
                                    <input type="url" x-model="formData.facebook" @input="validateFacebookUrl"
                                        class="w-full p-2 border rounded mb-4" name="facebook">
                                    <div x-show="facebookError" class="text-red-500 text-sm mt-1"
                                        x-text="facebookError"></div>

                                    <label class="block mb-2">Instagram</label>
                                    <input type="url" x-model="formData.instagram" @input="validateInstagramUrl"
                                        class="w-full p-2 border rounded mb-4" name="instagram">
                                    <div x-show="instagramError" class="text-red-500 text-sm mt-1"
                                        x-text="instagramError"></div>
                                </div>
                            </template>

                            <!-- Étape 3 : Confirmation -->
                            <template x-if="index === 3">
                                <div class="text-center">
                                    <div class="p-2 mb-4 text-sm text-yellow-800 rounded-lg bg-yellow-50 dark:bg-gray-800 dark:text-yellow-300"
                                        role="alert">
                                        Vérifiez vos informations avant de soumettre.
                                    </div>

                                    <!-- Récapitulatif des données saisies -->
                                    <div class="rounded text-left">
                                        <div class="flex justify-between">
                                            <p><strong>Prénom </strong> <span x-text="formData.name"></span></p>
                                            <p><strong>Nom </strong> <span x-text="formData.last_name"></span></p>
                                        </div>

                                        <p><strong>Adresse </strong> <span x-text="formData.address"></span></p>
                                        <p><strong>Téléphone </strong> <span x-text="formData.phone"></span></p>

                                    </div>
                                </div>
                            </template>
                        </div>
                    </template>

                    <!-- Boutons de navigation -->
                    <div class="flex justify-between mt-6 fixed bottom-0 left-0 w-full bg-[#ffffff94] p-4">
                        <button @click="prevStep()" :disabled="currentStep === 1" type="button"
                            class="bg-gray-300 px-4 py-2 rounded" x-show="currentStep > 1">
                            Précédent
                        </button>

                        <button @click="nextStep()" :disabled="!isStepValid()" type="button"
                            class="bg-primary text-white px-4 py-2 rounded" x-show="currentStep < steps.length">
                            Suivant
                        </button>

                        <button type="submit" x-show="currentStep == 4"
                            class="bg-green-500 text-white px-4 py-2 rounded" :disabled="!isFormValid()">
                            Soumettre
                        </button>

                    </div>


                </form>
            </div>
        </div>
    </section>

    @section('script')
        <script>
            function formStepper() {
                return {
                    currentStep: 1,
                    instagram: null,
                    facebookError: null,
                    instagramError: null,
                    steps: [{
                            title: "Infos Perso",
                            image: "https://img.freepik.com/free-vector/we-are-open-concept-illustration_114360-9780.jpg?t=st=1742154306~exp=1742157906~hmac=dd355234208d55016ddf463453c2747e9251d56adac5e6b14ea293739a804d7a&w=740"
                        },
                        {
                            title: "Coordonnées",
                            image: "https://img.freepik.com/free-vector/remote-meeting-concept-illustration_114360-4704.jpg?t=st=1742158141~exp=1742161741~hmac=1f5095e06135f5d62ff45330ef7d742cb90cd66246323816f9c1ed03d0ce1618&w=996"
                        },
                        {
                            title: "Réseaux Sociaux",
                            image: "https://img.freepik.com/free-vector/marketing-consulting-concept-illustration_114360-9027.jpg?t=st=1742158241~exp=1742161841~hmac=ecb8b109a67b50213d55627785b2d5101af09152f016c99f4ea59d4cec2ffed8&w=996"
                        },
                        // {
                        //     title: "Profil Vendeur",
                        //     image: "https://img.freepik.com/free-vector/group-video-concept-illustration_114360-4792.jpg?t=st=1742158302~exp=1742161902~hmac=7068e5e4907c91e7e2836289bb21e44eac982eb6847e38be585f5eb6dc3730e0&w=996"
                        // },
                        {
                            title: "Confirmation",
                            image: "https://img.freepik.com/free-vector/collab-concept-illustration_114360-3995.jpg?t=st=1742158333~exp=1742161933~hmac=934088de3598d42b0d10e33a806c12a13d1cd69fdf89578266375d67f8dc7e3d&w=996"
                        },
                    ],
                    formData: {
                        name: '',
                        last_name: '',
                        phone: '',
                        address: '',
                        facebook: null,
                        instagram: null,

                    },
                    nextStep() {
                        if (this.isStepValid(this.currentStep)) {
                            this.currentStep++;
                            this.$nextTick(() => {
                                if (this.currentStep === 3) { // Étape des réseaux sociaux
                                    let facebookInput = document.querySelector('input[name="facebook"]');
                                    if (facebookInput) {
                                        facebookInput.focus();
                                    }
                                }
                            });
                        }
                    },

                    prevStep() {
                        this.currentStep--;
                    },
                    isStepValid(step) {
                        const stepFields = {
                            1: ['name', 'last_name'],
                            2: ['address', 'phone'],
                            3: ['facebook', 'instagram'],
                        };

                        const fields = stepFields[step] || [];
                        let isValid = fields.every(field => {
                            return this.formData[field] && this.formData[field].trim() !== '';
                        });

                        if (step === 3 && isValid) {
                            this.validateFacebookUrl();
                            this.validateInstagramUrl();
                            isValid = !this.facebookError && !this.instagramError;
                        }

                        return isValid;
                    },
                    isFormValid() {
                        return this.steps.every((step, index) => this.isStepValid(index + 1));
                    },
                    getCurrentField() {
                        const fields = ["name", "address", "facebook"];
                        return fields[this.currentStep - 1] || "";
                    },

                    validateFacebookUrl() {
                        if (this.formData.facebook) {
                            const facebookRegex = /^(https?:\/\/)?(www\.)?facebook\.com\/[a-zA-Z0-9\.]+\/?$/;
                            if (!facebookRegex.test(this.formData.facebook)) {
                                this.facebookError = 'Veuillez entrer un lien Facebook valide.';
                            } else {
                                this.facebookError = null;
                            }
                        } else {
                            this.facebookError = null;
                        }
                    },

                    validateInstagramUrl() {
                        if (this.formData.instagram) {
                            const instagramRegex = /^(https?:\/\/)?(www\.)?instagram\.com\/[a-zA-Z0-9_\.]+\/?$/;
                            if (!instagramRegex.test(this.formData.instagram)) {
                                this.instagramError = 'Veuillez entrer un lien Instagram valide.';
                            } else {
                                this.instagramError = null;
                            }
                        } else {
                            this.instagramError = null;
                        }
                    },

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
    @endsection



</x-app-layout>
