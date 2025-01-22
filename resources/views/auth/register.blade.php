<x-guest-layout>
    @livewire('auth.register')


    @section('script')
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

            document.addEventListener('DOMContentLoaded', function() {
                $('#registrationForm').on('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    // Ajouter les colonnes de localisation au FormData
                    formData.append('country', $('#country').val());
                    formData.append('continent', $('#continent').val());
                    formData.append('latitude', $('#latitude').val());
                    formData.append('longitude', $('#longitude').val());

                    fetch('https://api.geoapify.com/v1/ipinfo?&apiKey=d9b01610dc2b44f89ebf22942a004d66')
                        .then(resp => resp.json())
                        .then((userLocationData) => {
                            if (userLocationData) {
                                if (userLocationData.city.name) {
                                    formData.append('city', userLocationData.city.name);
                                }
                                if (userLocationData.country) {
                                    if (userLocationData.country.name_native) {
                                        formData.append('country', userLocationData.country.name_native);
                                    } else if (userLocationData.country.name) {
                                        formData.append('country', userLocationData.country.name);
                                    }
                                }
                                if (userLocationData.continent) {
                                    formData.append('continent', userLocationData.continent.name);
                                }
                                if (userLocationData.location) {
                                    if (userLocationData.location.latitude) {
                                        formData.append('latitude', userLocationData.location.latitude)
                                    }

                                    if (userLocationData.location.longitude) {
                                        formData.append('latitude', userLocationData.location.longitude)
                                    }
                                }
                            }
                        });

                    $.ajax({
                        url: this.action,
                        type: 'POST',
                        data: formData,
                        processData: false,
                        contentType: false,
                        dataType: 'json',
                        success: function(data) {
                            window.location.href = "{{ route('home') }}";
                        },
                        error: function(jqXHR) {
                            const errors = jqXHR.responseJSON.errors || {
                                error: 'Une erreur est survenue.'
                            };
                            displayErrors(errors);
                        }
                    });
                });

                function displayErrors(errors) {
                    // Clear previous errors
                    $('.error-message').remove();

                    $.each(errors, function(field, messages) {
                        const errorMessages = Array.isArray(messages) ? messages : [messages];
                        const inputField = $(`[name="${field}"]`);
                        $.each(errorMessages, function(index, message) {
                            const errorElement = $('<span>').addClass(
                                'text-red-500 text-sm error-message').text(message);
                            inputField.after(errorElement);
                        });
                    });
                }
            });
        </script>
    @endsection
</x-guest-layout>
