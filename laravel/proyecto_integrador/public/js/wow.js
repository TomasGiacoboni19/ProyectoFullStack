// script.js

// Inicializar WOW.js
var wow = new WOW({
    boxClass:     'wow',
    animateClass: 'animate__animated',
    offset:       0,
    mobile:       true,
    live:         true,
    scrollContainer: null
});
wow.init();

// Mostrar u ocultar el botón dependiendo del desplazamiento
window.addEventListener('scroll', function() {
    var backToTopButton = document.querySelector('.back-to-top');
    if (window.scrollY > 300) {
        backToTopButton.style.display = 'block'; // Mostrar el botón
    } else {
        backToTopButton.style.display = 'none'; // Ocultar el botón
    }
});

// Desplazamiento hacia el inicio
document.querySelector('.back-to-top').addEventListener('click', function(event) {
    event.preventDefault();
    window.scrollTo({ top: 0, behavior: 'smooth' });
});
