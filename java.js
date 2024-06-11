document.addEventListener('DOMContentLoaded', function () {
    const addButton = document.querySelectorAll('.button');
    const cartCounter = document.getElementById('cart-counter');
    let count = 0;

    addButton.forEach(button => {
        button.addEventListener('click', function () {
            count++;
            cartCounter.textContent = count; 
        });
    });
});