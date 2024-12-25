document.addEventListener('DOMContentLoaded', function () {
    // Use a parent container that exists at all times or document if no specific parent
    document.body.addEventListener('click', function (event) {
        // Check if the clicked element has the class 'message-button'
        if (event.target && event.target.classList.contains('message-button')) {
            event.preventDefault(); // Prevent default link behavior

            const button = event.target; // The clicked button
            const sellerId = button.getAttribute('data-seller-id');
            const productId = button.getAttribute('data-product-id');
            const message = "Coucou ! Est-ce que le produit est toujours disponible?";

            // Prepare message data
            const formData = new FormData();
            formData.append('seller_id', sellerId);
            formData.append('product_id', productId);
            formData.append('message', message);
            formData.append('_token', document.querySelector('meta[name="csrf-token"]')
                .getAttribute('content')); // Fetch CSRF token dynamically

            // Send AJAX request
            fetch("{{ route('messages.send', ':seller_id') }}".replace(':seller_id', sellerId), {
                method: 'POST',
                body: formData
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire({
                            icon: 'success',
                            title: data.message,
                            text: "{{ session('success') }}",
                            toast: true,
                            position: 'top-end',
                            timer: 3000,
                            showConfirmButton: false,
                            timerProgressBar: true,
                        });
                    } else {
                        alert("Échec de l'envoi du message.");
                    }
                })
                .catch(error => console.error('Erreur:', error));
        }
    });
});