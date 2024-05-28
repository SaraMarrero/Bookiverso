<?php
    // Recoge los datos del usuario logueado y su carrito de compras
    if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.16/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/build/css/style.css">
    <link rel="stylesheet" href="/build/css/carrusel.css">
    <link rel="stylesheet" href="/build/css/onda.css">
    <link rel="stylesheet" href="/build/css/carruselCards.css">
    <link rel="icon" href="/build/img/Logo.png" type="image/x-icon">
    <title>Bookiverso</title>
</head>

<body class="light-mode font-serif italic">
    <header>
        <!---------- MENU NORMAL --------->
        <div class="<?php
                        if($romance){
                            echo 'bg-gradient-to-r from-gray-900 via-pink-600 to-gray-900';
                        } elseif($fantasia){
                            echo 'bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900';
                        } elseif($terror){
                            echo 'bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900';
                        } elseif($ficcion){
                            echo 'bg-gradient-to-r from-gray-900 via-green-800 to-gray-900';
                        } elseif($comics){
                            echo 'bg-gradient-to-r from-gray-900 via-purple-800 to-gray-900';
                        }
                    ?>">
            <nav class="relative px-1 py-1 flex justify-between items-center">
                <!----- Buttton menú hamburguesa ----->
                <div>
                    <button class="navbar-burger flex items-center text-black-600 pr-2 sm:p-3">
                        <svg fill="white" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 50 50" width="30px" height="30px">
                            <path d="M 5 8 A 2.0002 2.0002 0 1 0 5 12 L 45 12 A 2.0002 2.0002 0 1 0 45 8 L 5 8 z M 5 23 A 2.0002 2.0002 0 1 0 5 27 L 45 27 A 2.0002 2.0002 0 1 0 45 23 L 5 23 z M 5 38 A 2.0002 2.0002 0 1 0 5 42 L 45 42 A 2.0002 2.0002 0 1 0 45 38 L 5 38 z"/>
                        </svg>
                    </button>
                </div>

                <a class="sm:text-3xl text-2xl text-white font-bold leading-none" href="/index">Bookiverso</a>

                <!----- Botón desplegable del usuario ------>
                <div class="menu-button ml-auto">
                    <button class="text-white bg-blue-900 font-medium rounded-lg text-sm p-2 sm:px-5 sm:py-2.5 text-center inline-flex items-center w-14 sm:w-20" type="button">
                        <img src="/build/img/iconoLogin.png" class="h-1/2" width="50%">
                        <svg class="w-2.5 h-2.5 ml-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 4 4 4-4"/>
                        </svg>
                    </button>

                    <!----- Información del desplegable ---->
                    <div class="dropdown-options absolute z-50" id="dropdownInformation">

                    <?php
                        // Valida si hay algún usuario logueado
                        if(isset($usuario)){
                            
                            foreach($usuario as $login){
                            // Valida si la persona logueada es usuario normal para mostrar su nombre
                            if($login['administrador'] == 0){
                    ?>
                                    <div class="px-2 py-3 text-sm text-gray-900">
                                        <div class="font-bold"><?php echo $login['nombre_usuario']; ?></div>
                                    </div>

                                <!-- Valida si la persona logueada es admin para mostrar su nombre -->
                        <?php 	
                            } else if($login['administrador'] == 1){ 
                        ?> 

                                    <div class="px-4 py-3 text-sm text-gray-900">
                                        <div class="font-bold">Admin</div>
                                    </div>
                        <?php
                                    }
                                }
                            }
                        ?>

                        <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownInformationButton">
                            <?php if(!isset($_SESSION['usuario'])){ ?>
                                <li>
                                    <a href="/login_register/register" class="block px-4 py-2 hover:bg-gray-100">Register</a>
                                </li>

                                <li>
                                    <a href="/login_register/login" class="block px-4 py-2 hover-bg-gray-100">Login</a>
                                </li>
                            <?php 
                                } else { 
                                    if($login['administrador'] == 1){
                            ?>
                                <li>
                                    <a href="/admin/index" class="block px-4 py-2 hover-bg-gray-100">Panel</a>
                                </li>
                            <?php } else { ?>
                                <li>
                                    <a href="/usuario/perfil" class="block px-4 py-2 hover-bg-gray-100">Perfil</a>
                                </li>
                            <?php } ?>
                                <div class="py-2">
                                    <a href="/usuario/signOut" class="block px-4 py-2 text-sm text-gray-700 hover-bg-gray-100">Sign out</a>
                                </div>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

                <!-- Carrito de compras -->
                <div class="relative inline-block">
                    <img src="/build/img/carrito.png" class="w-10 sm:m-2 cursor-pointer" id="mostrar-carrito">

                    <div id="carrito" class="absolute hidden mt-2 pl-5 pb-5 pr-5 bg-white border rounded shadow-lg z-10 left-12 transform -translate-x-full origin-left">

                        <!-- Contenido del carrito -->
                        <table id="lista-carrito"">
                            <thead>
                                <tr>
                                    <th class="px-6 py-5 text-center translatable" data-key="data_key_18">Foto</th>
                                    <th class="px-6 py-5 text-center translatable" data-key="data_key_19">Nombre</th>
                                    <th class="px-6 py-5 text-center">🗑️</th>
                                </tr>
                            </thead>

                            <tbody class="tbody">
                                <tr class="tr"></tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <!----- MENU HAMBURGUESA ----->
                <div class="navbar-menu relative z-50 hidden">
                    <div class="navbar-backdrop fixed inset-0 bg-gray-800 opacity-25"></div>
                        <nav class=" menuBurguer fixed top-0 left-0 bottom-0 flex flex-col w-5/6 max-w-sm py-6 px-6 border-r overflow-y-auto">
                            <div class="flex items-center mb-8">
                                <a class="mr-auto text-3xl font-bold leading-none text-white" href="/index">Bookiverso</a>
                                <button class="navbar-close">
                                    <svg class="h-6 w-6 text-gray-400 cursor-pointer hover" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                </button>
                            </div>

                            <!----- Muestra las consolas en el header ----->
                            <div>
                                <ul>
                                    <?php
                                        // Muestra las consolas
                                        if(count($categorias) !== 0){
                                            foreach($categorias as $datosCategorias){
                                                echo "<li class='mb-1'>";
                                                echo "<a class='block p-4 text-sm font-semibold text-gray-200 hover:bg-green-700 hover:text-white-100 rounded' href='/libros/" . $datosCategorias['nombre_categoria'] . "'>" . $datosCategorias['nombre_categoria'] . "</a>";
                                                echo "</li>";
                                            }
                                        }
                                    ?>

                                    <hr>

                                    <li class="mb-1">
                                        <a href="/usuario/contacto" class='block p-4 text-sm font-semibold text-gray-200 hover:bg-green-700 hover:text-white-100 rounded'>Contacto</a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </nav>   
    </header>

    <?php echo $contenido; ?>

    

    <footer style=" <?php if($inicio){ echo 'background: rgb(5, 0, 95);'; }?>">
        <?php if($inicio){ ?>
            <svg class="waves" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 24 150 28" preserveAspectRatio="none" shape-rendering="auto">
                <defs>
                    <path id="gentle-wave" d="M-160 44c30 0 58-18 88-18s 58 18 88 18 58-18 88-18 58 18 88 18 v44h-352z" />
                </defs>
                <g class="parallax">
                    <use xlink:href="#gentle-wave" x="48" y="0" fill="#73C6B6" opacity="0.7" />
                    <use xlink:href="#gentle-wave" x="48" y="3" fill="#73C6B6" opacity="0.5" />
                    <use xlink:href="#gentle-wave" x="48" y="5" fill="#73C6B6" opacity="0.3" />
                    <use xlink:href="#gentle-wave" x="48" y="7" fill="#73C6B6" />

                </g>
            </svg>
        <?php } ?>

        <div class="<?php if($inicio2){
                            echo 'content';
                        } elseif($content2){
                            echo 'content2 ';
                        } elseif($romance){
                            echo 'content2 bg-gradient-to-r from-gray-900 via-pink-600 to-gray-900';  
                        } elseif($fantasia){
                            echo 'content2 bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900';
                        } elseif($terror){
                            echo 'content2 bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900';
                        } elseif($ficcion){
                            echo 'content2 bg-gradient-to-r from-gray-900 via-green-800 to-gray-900';
                        } elseif($comics){
                            echo 'content2 bg-gradient-to-r from-gray-900 via-purple-800 to-gray-900';
                        }
                    ?>">
            <div class="mx-auto w-full <?php 
                if($romance){
                    echo 'bg-gradient-to-r from-gray-900 via-pink-600 to-gray-900';  
                } elseif($fantasia){
                    echo 'bg-gradient-to-r from-gray-900 via-blue-900 to-gray-900';
                } elseif($terror){
                    echo 'bg-gradient-to-r from-gray-900 via-gray-700 to-gray-900';
                } elseif($ficcion){
                    echo 'bg-gradient-to-r from-gray-900 via-green-800 to-gray-900';
                } elseif($comics){
                    echo 'bg-gradient-to-r from-gray-900 via-purple-800 to-gray-900';
                }
            ?>"  style=" <?php if($inicio){ echo 'background: #73C6B6;'; }?>
            ">
                <div class="md:flex md:justify-between md:items-center pt-10 pr-5 pl-5">
                    <div class="mb-6 md:mb-0 flex items-center">
                        <img src="/build/img/icono-libros.svg" class="w-10 p-2" alt="icono-libro">
                        <span class="self-center text-2xl font-semibold whitespace-nowrap" style="color: #F2F2F2;">Bookiverso</span>
                    </div>
                    <div class="grid grid-cols-2 gap-8 sm:gap-6">
                        <div>
                            <h2 class="mb-6 text-sm font-semibold uppercase translatable" style="color: #F2F2F2;" data-key="data_key_12">Derechos</h2>
                            <ul class="font-medium">
                                <li class="mb-4">
                                    <a href="/usuario/derechos/cookies" class="hover:underline text-white">Cookies</a>
                                </li>
                                <li class="mb-4">
                                    <a href="/usuario/derechos/avisoLegal" class="hover:underline text-white translatable" data-key="data_key_13">Aviso legal</a>
                                </li>
                                <li class="mb-4">
                                    <a href="/usuario/derechos/politicaDePrivacidad" class="hover:underline text-white translatable"  data-key="data_key_14">Política de privacidad</a>
                                </li>
                                <li class="mb-4">
                                    <a href="/usuario/derechos/terminosYCondiciones" class="hover:underline text-white translatable"  data-key="data_key_15">Términos y condiciones</a>
                                </li>
                            </ul>
                        </div>
                        <div>
                            <h2 class="mb-6 text-sm font-semibold uppercase translatable" style="color: #F2F2F2;" data-key="data_key_16">Libros</h2>
                            <ul class="font-medium text-white">
                                <?php foreach($categorias as $datosCategoria){ ?>
                                    <li class="mb-4">
                                        <a href="/libros/<?php echo $datosCategoria['nombre_categoria'] ?>" class="hover:underline"><?php echo $datosCategoria['nombre_categoria'] ?></a>
                                    </li>
                                <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>

                <hr class="my-6 border-gray-200 sm:mx-auto dark:border-gray-700 lg:my-8" />

                <div class="sm:flex sm:items-center sm:justify-between pb-5 pr-5 pl-5" style="color: #F2F2F2;">
                    <span class="text-sm sm:text-center dark:text-gray-400">© 2023</span>
                    <div class="flex mt-4 sm:justify-center sm:mt-0 translatable" data-key="data_key_17">
                        Usuario realizado por Sara Marrero
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Idiomas -->
    <div class="fixed bottom-4 right-4 px-3 py-2 bg-green-700 text-white font-bold rounded cursor-pointer z-50">
        <div class="rounded-lg flex" style="width: 90px;">
            <img src="/build/img/español.svg" id="español" class="w-7 mr-1 cursor-pointer" alt="Español">
            <img src="/build/img/ingles.svg" id="ingles" class="w-7 ml-1 cursor-pointer" alt="English">
            <img src="/build/img/frances.svg" id="frances" class="w-7 ml-1 cursor-pointer" alt="French">
        </div>
    </div>

    <!-- Script -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.0.2/glide.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.7.1/jszip.min.js"></script>

    <!-- JavaScript -->
    <script defer src="/build/js/carrusel.js"></script>
    <script src="/build/js/carrito.js"></script>
    <script src="/build/js/buscador.js"></script>
    <script src="/build/js/indexWeb.js"></script>
    <script src="/build/js/buttonUser.js"></script>
    <script src="/build/js/modal.js"></script>
    <script src="/build/js/desplegable.js"></script>
    <script src="/build/js/novedades.js"></script>
    <script src="/build/js/traduccion.js"></script>
</body>
</html>