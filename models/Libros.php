<?php
    namespace Model;

    class Libros extends ActiveRecords{
        public static $tabla = 'libro';
        public static $columnasDB = ['id_libro', 'foto_libro', 'nombre_libro', 'paginas', 'formato', 'idioma', 'id_categoria'];
        public $id_libro;
        public $foto_libro;
        public $nombre_libro;
        public $paginas;
        public $formato;
        public $idioma;
        public $id_categoria;

        public function __construct($args = []){
            $this->id_libro = $args['id_libro'] ?? NULL;
            $this->foto_libro = isset($args['foto_libro']['name']) ? $args['foto_libro']['name'] : '';;
            $this->nombre_libro = $args['nombre_libro'] ?? '';
            $this->paginas = $args['paginas'] ?? '';
            $this->formato = $args['formato'] ?? '';
            $this->idioma = $args['idioma'] ?? '';
            $this->id_categoria = $args['id_categoria'] ?? '';
        }

        // Valida los datos de entrada
        public function validarLibros(){


            // Valida la imagen del libro
            if (empty($this->foto_libro)) {
                self::$errores['foto_libro'] = '<p style="color: red">La imagen es obligatoria</p>';
            } elseif (!empty($this->foto_libro)) {
                // Verificar si la extensión es JPG o PNG
                $extension = pathinfo($this->foto_libro, PATHINFO_EXTENSION);
                if (strtolower($extension) !== 'png' && strtolower($extension) !== 'jpg') {
                    self::$errores['foto_libro'] = '<p style="color: red">Solo se permiten archivos PNG/JPG</p>';
                }
            }

            // Valida el nombre del libro
            if(!$this->nombre_libro){
                self::$errores['nombre_libro'] = '<p style="color: red">Debe añadir un nombre válido</p>';
            }

            // Valida las páginas
            if(!$this->paginas || $this->paginas === 0){
                self::$errores['paginas'] = '<p style="color: red">Debe añadir un número de páginas válido</p>';
            }

            // Valida el formato
            if(!$this->formato){
                self::$errores['formato'] = '<p style="color: red">Debe añadir una descripción válida</p>';
            } 

            // Valida el idioma
            if(!$this->idioma){
                self::$errores['idioma'] = '<p style="color: red">Debe añadir una precio válido</p>';
            }

            // Valida un id_categoria
            if(!$this->id_categoria){
                self::$errores['id_categoria'] = '<p style="color: red">Seleccione una categoría válida</p>';
            }

            return self::$errores;
        }

        public function validarEdicion(){

            // Valida el nombre del libro
            if(!$this->nombre_libro){
                self::$errores['nombre_libro'] = '<p style="color: red">Debe añadir un nombre válido</p>';
            }

            // Valida las páginas
            if(!$this->paginas || $this->paginas === 0){
                self::$errores['paginas'] = '<p style="color: red">Debe añadir un número de páginas válido</p>';
            }

            // Valida el formato
            if(!$this->formato){
                self::$errores['formato'] = '<p style="color: red">Debe añadir una descripción válida</p>';
            } 

            // Valida el idioma
            if(!$this->idioma){
                self::$errores['idioma'] = '<p style="color: red">Debe añadir una precio válido</p>';
            }

            // Valida un id_categoria
            if(!$this->id_categoria){
                self::$errores['id_categoria'] = '<p style="color: red">Seleccione una categoría válida</p>';
            }

            return self::$errores;
        }

        /**
         * Establece la imagen del libro.
         * @param string $fotoLibro La ruta de la imagen del libro
        */
        public function setImagen($fotoLibro){
            if($fotoLibro){
                $this->foto_libro = $fotoLibro;
            }
        }

    }