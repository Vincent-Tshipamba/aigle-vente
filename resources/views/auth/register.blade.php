<x-guest-layout>
    @livewire('auth.register')


    @section('script')
        <script>
            document.getElementById('register-form').addEventListener('submit', function(e) {
                const sexe = document.getElementById('sexe');

                if (!sexe.value) {
                    e.preventDefault();
                    $('.error-message').show();
                }
            });

            function selectGender(event) {
                if (event.target.value) {
                    $('.gender-validation').show();
                    $('.error-message').hide();
                } else {
                    $('.error-message').show();
                    $('.gender-validation').hide();
                }
            }
        </script>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $("#register-form").validate({
                    rules: {
                        firstname: {
                            required: true,
                            minlength: 2
                        },
                        lastname: {
                            required: true,
                            minlength: 2
                        },
                        sexe: {
                            required: true
                        },
                        email: {
                            required: true,
                            email: true
                        },
                        password: {
                            required: true,
                            minlength: 6
                        },
                        password_confirmation: {
                            required: true,
                            equalTo: "#password"
                        }
                    },
                    messages: {
                        firstname: {
                            required: "Le prénom est requis",
                            minlength: "Le prénom doit contenir au moins 2 caractères"
                        },
                        lastname: {
                            required: "Le nom est requis",
                            minlength: "Le nom doit contenir au moins 2 caractères"
                        },
                        sexe: {
                            required: "Veuillez sélectionner votre genre"
                        },
                        email: {
                            required: "L'adresse e-mail est requise",
                            email: "Veuillez entrer une adresse e-mail valide"
                        },
                        password: {
                            required: "Le mot de passe est requis",
                            minlength: "Le mot de passe doit contenir au moins 6 caractères"
                        },
                        password_confirmation: {
                            required: "Veuillez confirmer votre mot de passe",
                            equalTo: "Les mots de passe ne correspondent pas"
                        }
                    },
                    errorElement: "span",
                    errorPlacement: function(error, element) {
                        error.addClass("text-red-500 text-sm");
                        if (element.prop("type") === "checkbox") {
                            error.insertAfter(element.parent("label"));
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    highlight: function(element) {
                        $(element).addClass("border-red-500").removeClass("border-gray-300");
                    },
                    unhighlight: function(element) {
                        $(element).removeClass("border-red-500").addClass("border-gray-300");
                    },
                    success: function(label, element) {
                        $(element).next(".validation-icon").remove();
                        $(element).after(
                            '<span class="validation-icon text-green-500 ml-2">✔</span>'
                        );
                    }
                });
            });
        </script>
    @endsection
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                fetch('https://api.geoapify.com/v1/ipinfo?&apiKey=d9b01610dc2b44f89ebf22942a004d66')
                    .then(resp => resp.json())
                    .then((userLocationData) => {
                        const city = $('#city');
                        const country = $('#country');
                        const continent = $('#continent');
                        const latitude = $('#latitude');
                        const longitude = $('#longitude');
                        // console.log(
                        //     userLocationData.city.name,
                        //     userLocationData.country.name_native,
                        //     userLocationData.continent.name,
                        //     userLocationData.location.latitude,
                        //     userLocationData.location.longitude
                        // );


                        if (userLocationData) {
                            if (userLocationData.city.name) {
                                city.val(userLocationData.city.name);
                            }
                            if (userLocationData.country) {
                                if (userLocationData.country.name_native) {
                                    country.val(userLocationData.country.name_native);
                                } else if (userLocationData.country.name){
                                    country.val(userLocationData.country.name)
                                }
                            }
                            if (userLocationData.continent) {
                                continent.val(userLocationData.continent.name);
                            }
                            if(userLocationData.location){
                                if(userLocationData.location.latitude){
                                    latitude.val(userLocationData.location.latitude);
                                }

                                if (userLocationData.location.longitude) {
                                    longitude.val(userLocationData.location.longitude);
                                }
                            }
                        }
                    });
            })
        </script>
    @endpush
</x-guest-layout>
