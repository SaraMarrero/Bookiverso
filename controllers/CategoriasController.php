<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Categorias;

    session_start();

    class CategoriasController{

        // Crea una categoría nueva
        public static function crearCategoria(Router $router){

            $categorias = new Categorias();

            $total = Categorias::selectAll();

            $errores = [];

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $categorias = new Categorias($_POST);

                $errores = $categorias->validarCategorias();

                $categoria = $categorias->selectEspecificoDoble("id_categoria", "nombre_categoria", "'$categorias->id_categoria'", "'$categorias->nombre_categoria'");

                if(count($categoria) === 0) {

                    if(!empty($_FILES['icono_categoria']['tmp_name'])) {        
                        
                        $carpetaImagenes = '../public/build/img/';
    
                        $nombreImagen = $_FILES['icono_categoria']['name'];
    
                        $destino = $carpetaImagenes . $nombreImagen;

                        if (move_uploaded_file($_FILES['icono_categoria']['tmp_name'], $destino)) {
                            
                            $categorias->setImagen($nombreImagen);

                            if(empty($errores)){

                                //debuguear($categorias);

                                $consulta = $categorias->guardarAutoincremental('id_categoria');

                                if($consulta) {
                                    header('location: /admin/index');
                                }
                            }
                        }                
                    }
                }
            }

            $router->renderAdmin('/admin/crear/addCategoria', [
                'errores' => $errores,
                'categorias' => $total
            ]);

        }

        // Muestra todas la categorías 
        public static function mostrarCategorias(Router $router){

            $categorias = Categorias::selectAll();

            $router->renderAdmin('/admin/ver/verCategorias', [
                'categorias' => $categorias
            ]);
        }

        // Borra la categoría
        public static function borrarCategoria(){
            
            $categorias = new Categorias();

            if($_SERVER['REQUEST_METHOD'] === 'GET') {

                $id_categoria = $_GET['id_categoria'];

                $query = $categorias->deleteEspecifico("id_categoria", $id_categoria);


            }

            if ($query) {
                // Redirige al usuario a la página anterior
                header("Location: " . $_SERVER["HTTP_REFERER"]);
                exit;
            }
                   
        }

    }

