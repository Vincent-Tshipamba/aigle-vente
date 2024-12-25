document.addEventListener('DOMContentLoaded', function () {
    const messageButtons = document.querySelectorAll('.message-button'); // Sélection par classe

    messageButtons.forEach(button => {
        button.addEventListener('click', function (event) {
            event.preventDefault(); // Empêche le comportement par défaut du lien

            const sellerId = this.getAttribute('data-seller-id');
            const productId = this.getAttribute('data-product-id');
            const message = "Est-ce que le produit est toujours disponible?";

            // Préparer les données du message
            const formData = new FormData();
            formData.append('seller_id', sellerId);
            formData.append('product_id', productId);
            formData.append('message', message);
            formData.append('_token', '{{ csrf_token() }}'); // CSRF token

            console.log(sellerId);


            // Envoyer la requête AJAX
            fetch("{{ route('messages.send', ':seller_id') }}".replace(':seller_id',
                sellerId), {
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
        });
    });
});