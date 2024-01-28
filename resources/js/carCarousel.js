document.addEventListener('DOMContentLoaded', function() {
    var carImages = document.querySelectorAll('.car-image');
    var heroImage = document.querySelector('.hero-image');

    carImages.forEach(function(image) {
        image.addEventListener('click', function() {
            var imageUrl = this.src;
            heroImage.src = imageUrl;
        });
    });
});