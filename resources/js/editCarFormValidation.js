

document.addEventListener('DOMContentLoaded', function() {
    var priceInput = document.getElementById('price');

    priceInput.addEventListener('input', function() {
        var priceValue = this.value.trim();

        if (isNaN(priceValue) || priceValue.length > 10) {
            document.getElementById('price-error').innerText = 'Price must be a numeric value with a maximum of 10 characters.';
        } else {
            document.getElementById('price-error').innerText = '';
        }
    });
});
