<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Carrito;

    session_start();

    class CarritoController{
        // Añade elementos al carrito de compras
        public static function addCarrito(Router $router){
            
            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Recoge los datos 
                $carrito = new Carrito($_POST);
        
                // Valida que no exista esa compra
                $id_libro = intval($carrito->id_libro);
                $id_categoria = intval($carrito->id_categoria);
        
                $queryDatos = $carrito->selectEspecificoDoble('id_libro', 'id_categoria', $id_libro, $id_categoria);
        
                // Si no existe lo añade
                if(count($queryDatos) == 0){
                    // Inserta los datos en la base de datos
                    $queryInsert = $carrito->guardarAutoincremental('id_compra');
                } 
        
                // Selecciona todos los datos del carrito
                $querySelect = $carrito->selectAll();
        
                $result = [];
        
                foreach($querySelect as $datos){
                    $result[] = $datos;
                }
        
                // Almacena en una sesión los datos del carrito
                $_SESSION['carrito'] = $result;
        
                // Redirige después de enviar la respuesta al cliente
                $_SESSION['redirect'] = true;
            }
        
            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']);
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }
        
            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Borra un elemento del carrito
        public static function removeElementCarrito(Router $router){
            // Instancia la clase
            $carrito = new Carrito();

            // Recoge las id de la url
            $id_compra = $_GET['id_compra'];

            // Selecciona el elemento del carrito con esas id
            $query = $carrito->selectEspecifico('id_compra', $id_compra);

            if(count($query) !== 0){
                $queryDelete = $carrito->deleteEspecifico('id_compra', $id_compra);
            }

            // Selecciona los datos del carrito
            $querySelect = $carrito->selectAll();

            $result = [];

            foreach($querySelect as $datos){
                $result[] = $datos;
            }

            // Almacena en una sesión los datos del carrito
            $_SESSION['carrito'] = $result;

            // Redirige después de enviar la respuesta al cliente
            $_SESSION['redirect'] = true;


            // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
            if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                unset($_SESSION['redirect']); 
                
                if(isset($_SERVER['HTTP_REFERER'])) {
                    header("Location: " . $_SERVER['HTTP_REFERER']);
                } 
            }

            $carrito = json_encode($_SESSION['carrito']);
            echo $carrito;
        }

        // Elimina todos los elementos del carrito
        public static function vaciarCarrito(){
            // Instancia la clase
            $carrito = new Carrito();

            // Selecciona el elemento del carrito con esas id
            $query = $carrito->selectAll();

            if(count($query) !== 0){
                $carrito->delete();

                // Vacía la sesión del carrito
                unset($_SESSION['carrito']);

                // Si se ha configurado la redirección, realiza la redirección y sal de la secuencia de comandos
                if(isset($_SESSION['redirect']) && $_SESSION['redirect'] === true) {
                    unset($_SESSION['redirect']); 
                    
                    if(isset($_SERVER['HTTP_REFERER'])) {
                        header("Location: " . $_SERVER['HTTP_REFERER']);
                    } 
                }
            }
        }
    }