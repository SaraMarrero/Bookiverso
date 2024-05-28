// Almacena los elementos recogidos en ajax
let datos = [];

// Muestra el carrito
$(document).ready(function() {
    $('#mostrar-carrito').click(function() {
        $('#carrito').toggleClass('hidden');
    });
});


$('.agregarCarrito').click(() => mostrarHTML());

// Coge los datos del carrito de php
$(document).ready(function() {
    let ajax = new XMLHttpRequest();

    // Configura la solicitud
    ajax.open('GET', '/carrito/addCarrito', true);

    // Configura la función de respuesta
    ajax.onload = function() {
        if (ajax.status >= 200 && ajax.status < 300) {
                let data = JSON.parse(ajax.responseText);
                datos.push(data);
                // Llama a la función que muestra el html
                mostrarHTML();

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
});


// Muestra los elementos del carrito en el html
function mostrarHTML(){

    if(datos !== ''){
        $.each(datos, function(index, element) {
            $.each(element, function(innerIndex, element) {
                const { foto_libro, nombre_libro, id_compra, id_categoria } = element;

                let categoria = '';
                
                if(id_categoria == 1){
                    categoria = 'romance';
                } else if(id_categoria == 2){
                    categoria = 'fantasia';
                } else if(id_categoria == 3){
                    categoria = 'terror';
                } else if(id_categoria == 4){
                    categoria = 'ficcion';
                } else if(id_categoria == 5){
                    categoria = 'comics';
                }

                $('.tbody').append(`
                    <tr>
                        <td class='p-2 text-center'><img src='/build/img/libros/${categoria}/${foto_libro}'></td>
                        <td class='p-2 text-center'>${nombre_libro}</td>
                        <td class="p-2 text-center">
                            <a href='/carrito/removeElementCarrito?id_compra=${id_compra}'>❌</a>
                        </td>
                    </tr>
                `);
            });
        });
        
        crearEnlacesDescarga()
    }
}

// Función para crear enlaces de descarga para cada libro
function crearEnlacesDescarga() {
    // Crear una instancia de JSZip
    let zip = new JSZip();

    // Iterar sobre cada libro en datosLibros y agregarlo al archivo ZIP
    datos.forEach(e => {
        e.forEach(a => {
            const {nombre_libro, id_categoria } = a;

            let categoria = '';
                
                if(id_categoria == 1){
                    categoria = 'romance';
                } else if(id_categoria == 2){
                    categoria = 'fantasia';
                } else if(id_categoria == 3){
                    categoria = 'literatura';
                } else if(id_categoria == 4){
                    categoria = 'ficcion';
                } else if(id_categoria == 5){
                    categoria = 'comics';
                }

            let urlPDF = `/build/pdf/${categoria}/${nombre_libro}.pdf`;
            let nombreLibro = nombre_libro + '.pdf'; // Nombre del archivo PDF

            // Obtener el contenido del archivo PDF
            fetch(urlPDF)
                .then(response => response.blob())
                .then(blob => {
                    // Agregar el contenido del archivo al archivo ZIP
                    zip.file(nombreLibro, blob);

                    // Si es el último libro, generar y descargar el archivo ZIP
                    if (e.indexOf(a) === e.length - 1) {
                        zip.generateAsync({ type: 'blob' })
                            .then(function(content) {
                                // Crear un enlace de descarga para el archivo ZIP
                                let enlaceDescarga = document.createElement('a');

                                enlaceDescarga.href = URL.createObjectURL(content);
                                enlaceDescarga.className = 'rounded-md bg-green-600 p-3 text-white';
                                enlaceDescarga.download = 'libros.zip'; 
                                enlaceDescarga.textContent = 'Descargar';
                                

                                // Insertar el enlace de descarga en la fila correspondiente
                                $('.tbody').append(`
                                    <tr>
                                        <td colspan="2" class="pt-5">
                                            <a href='/carrito/vaciarCarrito' class="rounded-md bg-red-600 p-3 text-white">Vaciar Carrito</a>
                                        </td>

                                        <td class="pt-5"></td>
                                    </tr>
                                `);

                                // Agregar el enlace de descarga al último <td> de la última fila
                                $('.tbody tr:last-child td:last-child').append(enlaceDescarga);
                            });
                    }
                });
        });
    });
}