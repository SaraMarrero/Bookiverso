<?php
    namespace Controllers;

    use MVC\Router;
    use Model\Categorias;
    use Model\Usuario;
    use Model\Libros;


    session_start();

    class UsuarioController{

        // Panel para manejar el perfil del usuario logueado
        public static function perfil(Router $router){

            $usuario = new Usuario();
            $categorias = Categorias::selectAll();

            // Llama a la función para editar el perfil
            if(isset($_POST['actualizarPerfil'])){ UsuarioController::editarPerfil($router);}

            // Llama a la función para editar la contraseña
            if(isset($_POST['cambiarPassword'])){ UsuarioController::editarPassword($router);}

            // Llama a la función para eliminar el perfil
            if(isset($_GET['borrarPerfil'])){ UsuarioController::borrarPerfil($router);}

            $router->render('/usuario/perfil', [ 
                'categorias' => $categorias,
                'usuario' => $usuario,
            ]);
        }


        // Actualiza el usuario
        public static function editarPerfil(Router $router){
            if($_SERVER['REQUEST_METHOD'] === 'POST'){

                // Recoge los datos del formulario
                $usuario = new Usuario($_POST);

                // Almacena los datos actualizados
                $datosUsuario = [
                    'dni_usuario' => $usuario->dni_usuario,
                    'nombre_usuario' => $usuario->nombre_usuario,
                    'apellidos_usuario' => $usuario->apellidos_usuario,
                    'email_usuario' => $usuario->email_usuario,
                    'password_usuario' => $usuario->password_usuario
                ];

                // Actualiza el usuario en la base de datos
                $dni_usuario = $datosUsuario['dni_usuario'];
                $update = $usuario->update('dni_usuario', $datosUsuario, "'$dni_usuario'");

                if($update){
                    // Recoge los datos del usuario
                    $selectUsuario = $usuario->selectEspecifico('dni_usuario', "'$dni_usuario'");
                    
                    // Almacena en una sesión los datos del carrito
                    $_SESSION['usuario'] = serialize($selectUsuario);

                    // Redirecciona a la página de ver perfil
                    header('Location: /usuario/perfil');
                }
            }
        }

        // Actualiza la contraseña
        public static function editarPassword(Router $router){
            // Instancia la clase
            $usuario = new Usuario();
            $errores = [];

            if($_SERVER['REQUEST_METHOD'] === 'POST'){
                // Recoge los datos del usuario logueado
                if(isset($_SESSION['usuario'])){
                    $datos_usuario = unserialize($_SESSION['usuario']);
                }

                $dni = $datos_usuario[0]['dni_usuario'];
                $password_usuario = $datos_usuario[0]['password_usuario'];

                // Recoge los datos del usuario
                $password_actual = $_POST['password_actual'];
                $new_password_usuario = $_POST['new_password_usuario'];
                $new_password_usuario_2 = $_POST['new_password_usuario_2'];

                // Valida los campos
                $errores = $usuario->cambiarPassword($password_usuario, $password_actual, $new_password_usuario, $new_password_usuario_2);

                if(count($errores) === 0){
                    if($new_password_usuario === $new_password_usuario_2){
                        $password_hash = password_hash($new_password_usuario_2, PASSWORD_DEFAULT);
                        $update_user = $usuario->updateEspecifico('password_usuario', "'$password_hash'", 'dni_usuario', "'$dni'");
                    
                        if($update_user){
                            // Actualiza los datos del usuario en la sesión
                            $datos_usuario[0]['password_usuario'] = $password_hash;
                            $_SESSION['usuario'] = serialize($datos_usuario);
                            }
                        }
                    } else{
                        $errores['new_password_no_coincide'] = 'La contraseña nueva no coincide';
                    }
            }   

            $_SESSION['errores'] = $errores;

            // Redirige a la página principal
            header('Location: /usuario/perfil');
        }


        // Borra un usuario
        public static function borrarPerfil(Router $router){
            // Instancia la clase
            $usuario = new Usuario();

            // Recoge los datos del usuario logueado
            if(isset($_SESSION['usuario'])){
                $datos_usuario = unserialize($_SESSION['usuario']);
            }

            // Elimina al usuario de la base de datos
            $dni_usuario = $datos_usuario[0]['dni_usuario'];
            $usuario->deleteEspecifico('dni_usuario', "'$dni_usuario'");

            // Elimina la sesión
            session_unset();
            session_destroy();

            // Redirige a la página principal
            header('Location: /index');
        }

        public static function paginaContacto(Router $router){
            $categorias = Categorias::selectAll();

            // Inicializa las variables
            $email = '';
            $asunto = '';
            $mensaje = '';

            $errores = [];
            $aviso = '';

            if ($_SERVER["REQUEST_METHOD"] == "POST") {

                // Valida los campos
                $regExp = '/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/';

                if($_POST['email'] == '' || preg_match($regExp, $email)){
                    $errores['email'] = '<p class="p-2 bg-red-300 text-white mt-2 rounded-lg">Introduzca un email válido</p>';
                } 

                if($_POST['asunto'] == ''){
                    $errores['asunto'] = '<p class="p-2 bg-red-300 text-white mt-2 rounded-lg">Introduzca un asunto válido</p>';
                } 

                if($_POST['mensaje'] == ''){
                    $errores['mensaje'] = '<p class="p-2 bg-red-300 text-white mt-2 rounded-lg">Introduzca un mensaje válido</p>';
                } 

                // Si no hay errores
                if(count($errores) == 0){

                    $email = $_POST['email'];
                    $asunto = $_POST['asunto'];
                    $mensaje = $_POST['mensaje'];

                    // Dirección de correo a donde quieres recibir el formulario
                    $destinatario = "saramarreromiranda@gmail.com";

                    // Asunto del correo
                    $asunto = "Nuevo mensaje del formulario";

                    // Construir el cuerpo del mensaje
                    $cuerpoMensaje = "Email: $email\n";
                    $cuerpoMensaje .= "Mensaje:\n$mensaje\n";

                    // Cabeceras del correo
                    $cabeceras = "From: $email <$email>";

                    // Enviar el correo
                    if (mail($destinatario, $asunto, $cuerpoMensaje, $cabeceras)) {
                        $aviso = "<p class='p-5 text-center bg-green-400 text-white'>¡El mensaje ha sido enviado correctamente!</p>";
                    }
                }
            }

            $router->render('/usuario/contacto', [
                'categorias' => $categorias,
                'errores' => $errores,
                'aviso' => $aviso,
            ]);
        }

        public static function buscador(Router $router){
            $libros = Libros::selectAll();
            
            $lista_libros = json_encode($libros);
            echo $lista_libros;
        }
    }