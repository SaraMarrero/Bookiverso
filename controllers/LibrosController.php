<?php
    namespace Controllers;
    
    use MVC\Router;
    use Model\Categorias;
    use Model\Libros;

    session_start();

    class LibrosController{

        // Muestra los libros de Romance
        public static function mostrarRomance(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 1);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $claseLibros->selectPaginacion('id_categoria', 1, $iniciar, $articulosPorPagina);


            $router->render('/libros/Romance', [
                'categorias' => $categorias,
                'libros' => $libros,
                'result' => $result,
                'paginas' => $paginas
            ]);
        }

        // Muestra los libros de Fantasia
        public static function mostrarFantasia(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 2);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $claseLibros->selectPaginacion('id_categoria', 2, $iniciar, $articulosPorPagina);


            $router->render('/libros/Fantasia', [
                'categorias' => $categorias,
                'libros' => $libros,
                'result' => $result,
                'paginas' => $paginas
            ]);
        }

        // Muestra los libros de Terror
        public static function mostrarTerror(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 3);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $claseLibros->selectPaginacion('id_categoria', 3, $iniciar, $articulosPorPagina);


            $router->render('/libros/Terror', [
                'categorias' => $categorias,
                'libros' => $libros,
                'result' => $result,
                'paginas' => $paginas
            ]);
        }

        // Muestra los libros de Ficcion
        public static function mostrarFiccion(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 4);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $claseLibros->selectPaginacion('id_categoria', 4, $iniciar, $articulosPorPagina);


            $router->render('/libros/Ficcion', [
                'categorias' => $categorias,
                'libros' => $libros,
                'result' => $result,
                'paginas' => $paginas
            ]);
        }

        // Muestra los Comics
        public static function mostrarComics(Router $router){
            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 5);

            // Paginacion
            // Cuenta los artículos que hay en nuestra base de datos
            $filas = count($query);
            
            // Elementos por página
            $articulosPorPagina = 10;

            // Calcula cuantas páginas necesitamos
            $paginas = ceil($filas/$articulosPorPagina);

            // Esta variable nos sirve para saber desde que número iniciamos el limite de juegos
            $pagina = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
            $iniciar = ($pagina - 1) * $articulosPorPagina;

            // Recoge los datos con el limite de Elementos que queremos en pantalla
            $result = $claseLibros->selectPaginacion('id_categoria', 5, $iniciar, $articulosPorPagina);


            $router->render('/libros/Comics', [
                'categorias' => $categorias,
                'libros' => $libros,
                'result' => $result,
                'paginas' => $paginas
            ]);
        }

        // Muestra los comics para el Admin
        public static function mostrarComicsAdmin(Router $router){
            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 5);


            $router->renderAdmin('/admin/ver/verComics', [
                'categorias' => $categorias,
                'datos' => $query
            ]);
        }

        // Muestra los libros de fantasía para el Admin
        public static function mostrarFantasiaAdmin(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 2);

            $router->renderAdmin('/admin/ver/verFantasia', [
                'categorias' => $categorias,
                'datos' => $query
            ]);
        }

        // Muestra los liros de ficción para el Admin
        public static function mostrarFiccionAdmin(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 4);

            $router->renderAdmin('/admin/ver/verFiccion', [
                'categorias' => $categorias,
                'datos' => $query
            ]);
        }

        // Muestra los libros de terror para el Admin
        public static function mostrarTerrorAdmin(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 3);

            $router->renderAdmin('/admin/ver/verTerror', [
                'categorias' => $categorias,
                'datos' => $query
            ]);
        }

        // Muestra los libros de romance para el Admin
        public static function mostrarRomanceAdmin(Router $router){

            // Instancia las clases
            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $query = $claseLibros->selectEspecifico('id_categoria', 1);

            $router->renderAdmin('/admin/ver/verRomance', [
                'categorias' => $categorias,
                'datos' => $query
            ]);
        }

        // Crea los libros
        public static function crearLibro(Router $router){
            
            $libros = new Libros();

            $categorias = Categorias::selectAll();

            $errores = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $libros = new Libros($_POST + $_FILES);

                $id_categoria = intval($libros->id_categoria);

                $errores = $libros->validarLibros();

                $query = $libros->selectEspecificoDoble("nombre_libro", "id_libro", "'$libros->nombre_libro'", "'$libros->id_libro'");

                if(count($query) == 0) {

                    if(!empty($_FILES['foto_libro']['tmp_name'])) {  

                        $carpetaImagenes = "";
                        
                        switch($id_categoria){
                            case 1:
                                $carpetaImagenes = '../public/build/img/libros/romance/';
                                break;
                            case 2:
                                $carpetaImagenes = '../public/build/img/libros/fantasia/';
                                break;
                            case 3:
                                $carpetaImagenes = '../public/build/img/libros/terror/';
                                break;
                            case 4:
                                $carpetaImagenes = '../public/build/img/libros/ficcion/';
                                break;
                            case 5:
                                $carpetaImagenes = '../public/build/img/libros/comics/';
                                break;
                            default:
                                break;
                        }
                        
                        $nombreImagen = $_FILES['foto_libro']['name'];
    
                        $destino = $carpetaImagenes . $nombreImagen;

                        if (move_uploaded_file($_FILES['foto_libro']['tmp_name'], $destino)) {

                            $libros->setImagen($nombreImagen);

                            if(empty($errores)) {

                                $consulta = $libros->guardar();

                                switch ($id_categoria) {
                                    case 1:
                                        header('Location: /admin/ver/verRomance');
                                        break;
                                    case 2:
                                        header('Location: /admin/ver/verFantasia');
                                        break;
                                    case 3:
                                        header('Location: /admin/ver/verTerror');
                                        break;
                                    case 4:
                                        header('Location: /admin/ver/verFiccion');
                                        break;
                                    case 5:
                                        header('Location: /admin/ver/verComics');
                                        break;
                                } 
                            } 
                        }
                    }
                }
            }
            $router->renderAdmin('/admin/crear/addLibro', [
                'errores' => $errores,
                'categorias' => $categorias,
                'libros' => $libros
            ]);
        }

        // Borra los libros
        public static function borrarLibro(){
            
            $libro = new Libros();

            if($_SERVER['REQUEST_METHOD'] === 'GET') {

                $id_libro = $_GET['id_libro'];

                $query = $libro->deleteEspecifico("id_libro", $id_libro);

            }

            if ($query) {
                // Redirige al usuario a la página anterior
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
                   
        }

        // Edita el libro seleccionado
        public static function editarLibro(Router $router) {

            $libro = new Libros();

            $categorias = Categorias::selectAll();

            $errores = [];

            $query = null;

            if($_SERVER['REQUEST_METHOD'] === 'GET') {

                $id_libro = $_GET['id_libro'];

                $query = $libro->selectEspecifico("id_libro", $id_libro);

            }

            if($_SERVER['REQUEST_METHOD'] === 'POST') {

                $libros = new Libros($_POST);

                $datosLibro = [
                    'nombre_libro' => $libros->nombre_libro,
                    'paginas' => $libros->paginas,
                    'formato' => $libros->formato,
                    'idioma' => $libros->idioma,
                    'id_categoria' => $libros->id_categoria
                ];

                $errores = $libros->validarEdicion();

                $id_libro = $_POST['id_libro'];

                $id_categoria = $_POST['id_categoria'];

                if(empty($errores)) {

                    $update = $libros->update('id_libro', $datosLibro, "'$id_libro'");

                    switch ($id_categoria) {
                        case 1:
                            header('Location: /admin/ver/verRomance');
                            break;
                        case 2:
                            header('Location: /admin/ver/verFantasia');
                            break;
                        case 3:
                            header('Location: /admin/ver/verTerror');
                            break;
                        case 4:
                            header('Location: /admin/ver/verFiccion');
                            break;
                        case 5:
                            header('Location: /admin/ver/verComics');
                            break;
                    }
                } else {

                    header('Location: /admin/editar/editLibros?id_libro='. $id_libro .'&error=1');
                    exit;
                }
            }


            $router->renderAdmin('/admin/editar/editLibros', [
                'libros' => $query,
                'categorias' => $categorias,
                'errores' => $errores
            ]);
        }

        
    }