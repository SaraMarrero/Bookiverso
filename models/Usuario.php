<?php
    namespace Model;

    class Usuario extends ActiveRecords{
        protected static $tabla = 'usuario';
        protected static $columnasDB = ['dni_usuario', 'nombre_usuario', 'apellidos_usuario', 'email_usuario', 'password_usuario', 'administrador'];

        public $dni_usuario;
        public $nombre_usuario;
        public $apellidos_usuario;
        public $email_usuario;
        public $password_usuario;
        public $administrador;

        public function __construct($args = []) {
            $this->dni_usuario = $args['dni_usuario'] ?? null;
            $this->nombre_usuario = $args['nombre_usuario'] ?? '';
            $this->apellidos_usuario = $args['apellidos_usuario'] ?? '';
            $this->email_usuario = $args['email_usuario'] ?? '';

            // Verifica si se proporcionó una contraseña y si es un registro
            if(isset($args['password_usuario']) && isset($args['isRegister']) && $args['isRegister']){
                $this->password_usuario = password_hash($args['password_usuario'], PASSWORD_DEFAULT);
            } else {
                // No es un registro, simplemente asigna la contraseña proporcionada
                $this->password_usuario = $args['password_usuario'] ?? '';
            }

            $this->administrador = $args['administrador'] ?? 0;
        }

        // Valida el formulario de registrar un usuario
        public function validarRegister(){
            $letter = substr($this->dni_usuario, -1);
            $numbers = intval(substr($this->dni_usuario, 0, -1));

            // Valida el dni
            if(substr("TRWAGMYFPDXBNJZSQVHLCKE", $numbers % 23, 1) == $letter && strlen($letter) == 1 && strlen ($numbers) == 8 ){
                $dniValidado = true;
            } else{
                $dniValidado = false;
                self::$errores['dni'] = "El dni no es válido";
            }

            // Valida el nombre
            if(!empty($this->nombre_usuario) && !is_numeric($this->nombre_usuario) && !preg_match("/[0-9]/", $this->nombre_usuario)){
                $nombreValidado = true;
            } else{
                $nombreValidado = false;
                self::$errores['nombre'] = "El nombre no es válido";
            }

            // Valida los apellidos
            if(!empty($this->apellidos_usuario) && !is_numeric($this->apellidos_usuario) && !preg_match("/[0-9]/", $this->apellidos_usuario)){
                $apellidosValidado = true;
            } else{
                $apellidosValidado = false;
                self::$errores['apellidos'] = "Los apellidos no son válidos";
            }

            // Valida el email
            if(!empty($this->email_usuario) && filter_var($this->email_usuario, FILTER_VALIDATE_EMAIL)){
                $emailValidado = true;
            } else{
                $emailValidado = false;
                self::$errores['email'] = "El email no es válido";
            }

            // Valida la contraseña
            if(!empty($this->password_usuario)){
                $passwordValidado = true;
            } else{
                $passwordValidado = false;
                self::$errores['password'] = "La contraseña no es válida";
            }

            return self::$errores;
        }

        // Valida el formulario del login
        public function validarLogin(){

            // Valida el email
            if(!empty($this->email_usuario) && filter_var($this->email_usuario, FILTER_VALIDATE_EMAIL)){
                $emailValidado = true;
            } else{
                $emailValidado = false;
                self::$errores['email'] = "El email no es válido";
            }

            // Valida la contraseña
            if(!empty($this->password_usuario)){
                $passwordValidado = true;
            } else{
                $passwordValidado = false;
                self::$errores['password'] = "La contraseña no es válida";
            }

            return self::$errores;
        }

        /**
         * Valida el cambio de contraseña del usuario
         * @param string $password_usuario Contraseña almacenada del usuario logueado
         * @param string $password_actual Contraseña actual introducida por el usuario logueado
         * @param string $new_password_usuario Nueva contraseña introducida por el usuario logueado
         * @param string $new_password_usuario_2 Nueva contraseña repetida introducida por el usuario logueado
         * @return array Resultado en forma de array asociativo
        */
        public function cambiarPassword($password_usuario, $password_actual,  $new_password_usuario, $new_password_usuario_2){

            // Valida que la contraseña del formulario coincida con la del usuario logueado
            if(password_verify($password_actual, $password_usuario) || $password_actual == ''){
                $password_actual = true;
            } else{
                $password_actual = false;
                self::$errores['password_actual'] = "La contraseña no coincide";
            }

            // Valida que el campo de la contraseña nueva
            if($new_password_usuario !== ''){
                $new_password_usuario_vacio = true;
            } else{
                $new_password_usuario_vacio = false;
                self::$errores['new_password_usuario_vacio'] = 'Introduzca la contraseña nueva';
            }

            // Valida que el campo de la contraseña nueva2
            if($new_password_usuario_2 !== ''){
                $new_password_usuario_vacio_2 = true;
            } else{
                $new_password_usuario_vacio_2 = false;
                self::$errores['new_password_usuario_vacio_2'] = 'Introduzca la contraseña nueva';
            }

            return self::$errores;
        }
    }
