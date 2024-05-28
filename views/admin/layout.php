<!DOCTYPE html>
<html class="" lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/style.css">
    <title>Index</title>
</head>
<body class="bg-blue-900">

<button id="toggleMenu" style="background: #73C6B6;" class="ml-1 hover:bg-green-800 text-white font-bold py-2 px-4 rounded-full fixed top-20 left-5 z-10">Menú</button>

<div id="border shadow-md absolute top-5 left-0 transform -translate-x-full transition-transform duration-300 z-10">


    <nav id="menuDesplegable" style="background: #73C6B6;" class="fixed w-2/6 lg:w-80 xl:w-80 2xl:w-80 left-0 top-0 h-full transform -translate-x-full transition-transform z-20 overflow-y-auto max-h-full">
        <!-- ---------- DATOS ---------- -->
        <div class="p-3 sm:p-5 bg-blue-900">
            <a class="sm:text-2xl lg:text:3xl text-white font-bold leading-none" href="/index">Bookiverso</a> 
            <ul>
                <div class="mt-5 border border-white rounded-full w-1/2 mx-auto">
                    <li>
                        <img class="m-auto" src="/build/img/iconoAdmin.png" alt="">
                    </li>
                </div>
                
                <li>
                    <p class="text-sm sm:text-3xl text-white pt-5 text-center font-bold">Admin</p>
                </li>    
            </ul>
        </div>

        <!-- ---------- BOTONES ---------- -->
        <div>

            <hr>

            <ul class="text-center p-5 sm:flex sm:justify-around">
                <li class="mb-5 sm:mb-0">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="/usuario/signOut">Out</a>
                </li>
                <li class="mb-5 sm:mb-0">
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" href="/admin/index">Volver</a>
                </li>
                <li>
                    <a class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-3.5 sm:px-4 rounded-full" href="/index">Web</a>
                </li>
            </ul>

            <hr>

            <!-- ---------- VER CATEGORIAS ---------- -->
            <ul class="mt-3 mb-5 text-center 2xl:">

                <h2 class="m-2 font-bold">Ver Categorías</h2>

                    <?php
                        // Muestra las Categorías
                        if(count($categorias) !== 0){
                            foreach($categorias as $datosCategorias){
                                echo "<li class='items-center sm:mx-3 flex flex-col sm:flex-row my-2'>";
                                echo "<a href='/admin/ver/ver" . $datosCategorias['nombre_categoria'] . "' class='flex flex-col sm:flex-row items-center'>";
                                echo "<img class='w-10 mb-2 sm:mr-2 filter invert' src='/build/img/$datosCategorias[icono_categoria]' alt='SVG'>";
                                echo "<span class='self-center mt-0'>" . $datosCategorias['nombre_categoria'] . "</span>";
                                echo "</a>";
                                echo "</li>";
                            }
                        }
                    ?>
            </ul>

            <hr>

            <!-- ---------- CREAR LIBROS ---------- -->
            <ul class="text-center">
                <li class="items-center mx-3 flex flex-col sm:flex-row py-2">
                    <img class="w-10 mr-0 sm:mr-2" src="/build/img/admin/libros.png" alt="">
                    <a class="self-center" href="/admin/crear/addLibro">Crear Libros</a>
                </li>
            </ul>

            <hr>

            <!-- ---------- CREAR CATEGORIAS ---------- -->
            <ul class="text-center">
                <li class="items-center mx-3 flex flex-col sm:flex-row py-3">
                    <img class="self-center w-8 h-8 mr-0 sm:mr-2 ml-1"src="/build/img/admin/mas.png" alt="">
                    <a class="self-center" href="/admin/crear/addCategoria">Crear Categorías</a>
                </li>
                <li class="items-center mx-3 flex flex-col sm:flex-row">
                    <img class="self-center w-8 h-8 mr-0 sm:mr-2 ml-1"src="/build/img/categorias.svg" alt="">
                    <a class="self-center" href="/admin/ver/verCategorias">Ver Categorías</a>
                </li>
            </ul>
        </div>
    </nav>

    <?php echo $contenido ?>
 
</div>

<script src="/build/js/menuAdmin.js"></script>

</body>
</html>