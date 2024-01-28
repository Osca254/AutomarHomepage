document.getElementById('carForm').addEventListener('submit', function(event) {
    var priceInput = document.getElementById('price');
    var priceValue = priceInput.value.trim();

    if (isNaN(priceValue) || priceValue.length > 10) {
        document.getElementById('price-error').innerText = 'Price must be a numeric value with a maximum of 10 characters.';
        event.preventDefault();
    } else {
        document.getElementById('price-error').innerText = '';
    }
});