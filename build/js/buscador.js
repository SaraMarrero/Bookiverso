// Almacena los elementos recogidos en ajax
let libros = [];

// Coge los datos del carrito de php
$(document).ready(function() {
    let ajax = new XMLHttpRequest();

    // Configura la solicitud
    ajax.open('GET', '/usuario/buscador', true);

    // Configura la función de respuesta
    ajax.onload = function() {
        if (ajax.status >= 200 && ajax.status < 300) {
                let data = JSON.parse(ajax.responseText);
                libros.push(data);

        } else {
            console.error('Hubo un problema con la solicitud. Código de estado:', ajax.status);
        }
    };

    // Manejo de errores
    ajax.onerror = function() { 
        console.error('Hubo un error al realizar la solicitud.'); 
    };

    // Envia la solicitud
    ajax.send();




    $("#nombre_libro").keyup(function() {        
        let busqueda = $("#nombre_libro").val().toLowerCase();

        if(libros !== '' && $("#nombre_libro").val().trim().length > 0){
            $('.resultado_buscador').empty();

            libros.forEach(e => {
                e.forEach(datos => {

                    const { foto_libro, nombre_libro, id_categoria } = datos;

                    let nombre = datos.nombre_libro.toLowerCase();

                    let categoria = '';
                
                    if(id_categoria == 1){
                        categoria = 'Romance';
                    } else if(id_categoria == 2){
                        categoria = 'Fantasia';
                    } else if(id_categoria == 3){
                        categoria = 'Terror';
                    } else if(id_categoria == 4){
                        categoria = 'Ficcion';
                    } else if(id_categoria == 5){
                        categoria = 'Comics';
                    }

                    if (nombre.startsWith(busqueda)) {

                        $('.resultado_buscador').append(`
                            <a href="/libros/${categoria}" class="rounded-lg shadow-lg m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 bg-white relative pb-10 hover:shadow-2xl" style="overflow: hidden;">
                                <div style="position: relative;">
                                    <img class="w-full m-auto relative rounded-lg" src="../build/img/libros/${categoria}/${foto_libro}" alt="${nombre_libro}">
                                    <img src="/build/img/onda-libros.svg" alt="SVG" style="position: absolute; bottom: 0; left: 0; width: 100%;" />
                                </div>
                                <div class="pb-10 pt-5">
                                    <div class="font-bold text-xl mb-3 flex flex-wrap justify-center text-center">${nombre_libro}</div>
                                </div>
                            </a>
                        `);
                    }
                })
            })
        } else{
            $('.resultado_buscador').empty();
        }
    });
});