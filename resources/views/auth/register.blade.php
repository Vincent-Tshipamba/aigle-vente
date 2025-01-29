<x-guest-layout>
    @livewire('auth.register')


    @section('script')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                $('#registrationForm').on('submit', function(event) {
                    event.preventDefault();

                    const formData = new FormData(this);

                    fetch('https://api.geoapify.com/v1/ipinfo?&apiKey=d9b01610dc2b44f89ebf22942a004d66')
                        .then(resp => resp.json())
                        .then((userLocationData) => {
                            const city = $('#city');
                            const country = $('#country');
                            const continent = $('#continent');
                            const latitude = $('#latitude');
                            const longitude = $('#longitude');

                            if (userLocationData) {
                                if (userLocationData.city && userLocationData.city.name) {
                                    city.val(userLocationData.city.name);
                                }
                                if (userLocationData.country) {
                                    if (userLocationData.country.name_native) {
                                        country.val(userLocationData.country.name_native);
                                    } else if (userLocationData.country.name) {
                                        country.val(userLocationData.country.name);
                                    }
                                }
                                if (userLocationData.continent && userLocationData.continent.name) {
                                    continent.val(userLocationData.continent.name);
                                }
                                if (userLocationData.location) {
                                    if (userLocationData.location.latitude) {
                                        latitude.val(userLocationData.location.latitude);
                                    }
                                    if (userLocationData.location.longitude) {
                                        longitude.val(userLocationData.location.longitude);
                                    }
                                }
                            }

                            // Append location data to FormData after fetching
                            formData.append('city', city.val());
                            formData.append('country', country.val());
                            formData.append('continent', continent.val());
                            formData.append('latitude', latitude.val());
                            formData.append('longitude', longitude.val());

                            // Make the AJAX request after appending location data
                            $.ajax({
                                url: $('#registrationForm').attr('action'),
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
                        })
                        .catch(error => {
                            console.error('Error fetching location data:', error);
                            // Optionally handle the error, e.g., by notifying the user
                        });
                });

                function displayErrors(errors) {
                    // Clear previous errors
                    $('.error-message').remove();

                    $.each(errors, function(field, messages) {
                        const errorMessages = Array.isArray(messages) ? messages : [
                            messages
                        ];
                        const inputField = $(`[name="${field}"]`);
                        $.each(errorMessages, function(index, message) {
                            const errorElement = $('<span>').addClass(
                                'text-red-500 text-sm error-message').text(
                                message);
                            inputField.after(errorElement);
                        });
                    });
                }
            });
        </script>
    @endsection
</x-guest-layout>
