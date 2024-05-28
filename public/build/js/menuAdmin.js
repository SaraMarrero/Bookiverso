document.addEventListener("DOMContentLoaded", function() {
    const toggleMenuBtn = document.getElementById('toggleMenu');
    const menu = document.getElementById('menuDesplegable');

    toggleMenuBtn.addEventListener('click', function() {
        // Toggle class para abrir/cerrar el menú
        menu.classList.toggle('-translate-x-full');

        // Mover el botón junto con el menú
        toggleMenuBtn.classList.toggle('left-1/3');
        toggleMenuBtn.classList.toggle('lg:left-80');
        
    });
});