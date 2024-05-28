<?php
    namespace Model;

    class Categorias extends ActiveRecords{
        public static $tabla = 'categoria';
        public static $columnasDB = ['id_categoria', 'icono_categoria', 'nombre_categoria', 'descripcion_categoria'];
        public $id_categoria;
        public $icono_categoria;
        public $nombre_categoria;
        public $descripcion_categoria;

        public function __construct($args = []){
            $this->id_categoria = $args['id_categoria'] ?? NULL;
            $this->icono_categoria = isset($args['icono_categoria']['name']) ? $args['icono_categoria']['name'] : '';
            $this->nombre_categoria = $args['nombre_categoria'] ?? '';
            $this->descripcion_categoria = $args['descripcion_categoria'] ?? '';
        }

        // Valida los datos de entrada
        public function validarCategorias(){

            // Valida el nombre de la categoría
            if(!$this->nombre_categoria){
                self::$errores['nombre_categoria'] = '<p style="color: red">Debe añadir un nombre válido</p>';
            } 
            // Valida la imagen
            if (empty($_FILES['icono_categoria']['name'])) {
                self::$errores['icono_categoria'] = '<p style="color: red">La imagen es obligatoria</p>';
            } elseif (!empty($_FILES['icono_categoria']['name'])) {
                // Verificar si la extensión es SVG
                $extension = pathinfo($_FILES['icono_categoria']['name'], PATHINFO_EXTENSION);
                if (strtolower($extension) !== 'svg') {
                    self::$errores['icono_categoria'] = '<p style="color: red">Solo se permiten archivos SVG</p>';
                }
            }
            
            // Valida la descripcion de la categoría
            if(!$this->descripcion_categoria || strlen($this->descripcion_categoria) < 10){
                self::$errores['descripcion_categoria'] = '<p style="color: red">Debe añadir una descripción válida</p>';
            } 

            return self::$errores;
        }

        /**
         * Establece la imagen de la categoría.
         * @param string $fotoLibro La ruta de la imagen de la categoría
        */
        public function setImagen($fotoLibro){
            if($fotoLibro){
                $this->icono_categoria = $fotoLibro;
            }
        }

    }