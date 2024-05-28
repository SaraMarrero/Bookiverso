<?php
    /**
     * Almacenatodas las funciones de unión, validación y manejo de errores
     * @author Sara Marrero Miranda
     * @category File
     * @version 1.0
     * @package includes
    */

    define('TEMPLATES_URL', __DIR__.'/templates');
    define('FUNCIONES_URL', __DIR__.'./funciones.php');

    /**
     * Muestra el mensaje de error en caso de campo inválido
     * @param array Array donde almacenar el error
     * @param string Nombre del campo para el array asociativo
    */
    function mostrarErrores($errores, $campo){
        $alerta = '';
        if(isset($errores[$campo]) && !empty($campo)){
            $alerta = '<p style="color:red;">' . $errores[$campo] . '</p>';
        }
        return $alerta;
    }

    function s($html): string {
        // Verifica si $html es nulo y proporciona un valor predeterminado
        $html = $html ?? '';
        
        // Llama a htmlspecialchars con el valor modificado
        $s = htmlspecialchars($html, ENT_QUOTES, 'UTF-8');
        return $s;
    }

    function debuguear($variable){
        echo "<pre>";
        var_dump($variable);
        echo "</pre>";
        exit;
    }