<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Categorias;

    session_start();

    class DerechosController{
        public static function paginaCookies(Router $router){
            $categorias = Categorias::selectAll();

            $router->render('/usuario/derechos/cookies', [
                'categorias' => $categorias
            ]);
        }

        public static function avisoLegal(Router $router){
            $categorias = Categorias::selectAll();


            $router->render('/usuario/derechos/avisoLegal', [
                'categorias' => $categorias
            ]);
        }

        public static function paginaPoliticaDePrivacidad(Router $router){
            $categorias = Categorias::selectAll();
            
            $router->render('/usuario/derechos/politicaDePrivacidad', [
                'categorias' => $categorias
            ]);
        }

        public static function terminosYCondiciones(Router $router){
            $categorias = Categorias::selectAll();

            $router->render('/usuario/derechos/terminosYCondiciones', [
                'categorias' => $categorias
            ]);
        }
    }