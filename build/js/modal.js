const modalToggles = document.querySelectorAll('[data-modal-toggle]');

modalToggles.forEach(toggle => {
    toggle.addEventListener('click', () => {
        const target = toggle.getAttribute('data-modal-target');
        const modal = document.getElementById(target);

        if (modal) {
            modal.classList.remove('hidden');
            modal.setAttribute('aria-hidden', 'false');
        }
    });
});

const modalHides = document.querySelectorAll('[data-modal-hide]');

modalHides.forEach(hide => {
    hide.addEventListener('click', () => {
        const target = hide.getAttribute('data-modal-hide');
        const modal = document.getElementById(target);

        if (modal) {
            modal.classList.add('hidden');
            modal.setAttribute('aria-hidden', 'true');
        }
    });
});