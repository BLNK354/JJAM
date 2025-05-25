document.addEventListener('DOMContentLoaded', () => {
    const buttons = document.querySelectorAll('.add-to-cart');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const productId = button.dataset.id;

            fetch('add_to_cart.php?id=' + productId)
                .then(response => {
                    if (response.ok) {
                        alert('Item added to cart!');
                    } else {
                        alert('Failed to add item.');
                    }
                })
                .catch(error => {
                    console.error('Error adding to cart:', error);
                    alert('Error adding item.');
                });
        });
    });
});
