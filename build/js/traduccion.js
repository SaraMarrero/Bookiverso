$(document).ready(function() {

    $.getJSON('/build/js/traduccion.json', function(translations) {

        // Traduce la págna
        function translatePage(lang) {
            $('.translatable').each(function() {
                const key = $(this).data('key');
                const translation = translations[lang][key];
                
                if (translation) {
                    $(this).text(translation);
                }
            });
        }

        // Eventos de clic para cambiar el idioma
        $('#español').on('click', function() {
            translatePage('es');
        });

        $('#ingles').on('click', function() {
            translatePage('en');
        });

        $('#frances').on('click', function() {
            translatePage('fr');
        });
    })
});
