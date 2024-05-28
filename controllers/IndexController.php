<?php
    namespace Controllers;
    
    use MVC\Router;
    use Model\Categorias;
    use Model\Libros;

    session_start();

    class IndexController{

        // Index de la web
        public static function index(Router $router){

            $claseLibros = new Libros();

            $categorias = Categorias::selectAll();

            $libros = [];

            // Limito a los últimos 5 libros de cada tabla
            $librosRomance = $claseLibros->selectLimit('id_categoria', 1, 5);
            $librosFantasia = $claseLibros->selectLimit('id_categoria', 2, 5);
            $librosFiccion = $claseLibros->selectLimit('id_categoria', 3, 5);
            $librosLiteratura = $claseLibros->selectLimit('id_categoria', 4, 5);
            $librosComics = $claseLibros->selectLimit('id_categoria', 5, 5);

            array_push($libros, $librosRomance);
            array_push($libros, $librosFantasia);
            array_push($libros, $librosFiccion);
            array_push($libros, $librosLiteratura);
            array_push($libros, $librosComics);

            $router->render('/index', [
                'categorias' => $categorias,
                'libros' => $libros
            ]);
        }

        public static function indexAdmin(Router $router) {

            $categorias = Categorias::selectAll();
            $libros = Libros::selectAll();

            $librosPorCategoria = Libros::recuentoLibros();

            $router->renderAdmin('/admin/index', [
                'categorias' => $categorias,
                'libros' => $libros,
                'librosCategorias' => $librosPorCategoria
            ]);
        }
    }