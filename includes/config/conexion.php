<?php   
    /**
     * Crea la conexión con la base de datos
     * @author Sara Marrero Miranda
     * @category File
     * @version 1.0
     * @package /include/config
    */

    function conectarDB(){
        // Configuración de la base de datos
        $config = include 'config.php';

        // Recoge los datos
        $host = $config['db']['host'];
        $user = $config['db']['user'];
        $pass = $config['db']['pass'];
        $dbname = $config['db']['dbname'];
        $options = $config['db']['options'];

        $conexion = "mysql:host=$host;dbname=$dbname";
        $db = new PDO($conexion, $user, $pass, $options);

        // Asegura que la conexión utiliza utf8
        $db->exec("SET NAMES 'utf8'");

        return $db;
    }