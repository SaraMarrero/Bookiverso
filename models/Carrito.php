<?php
    namespace Model;

    class Carrito extends ActiveRecords{
        protected static $tabla = 'carrito';
        protected static $columnasDB = ['id_compra', 'dni_usuario', 'id_libro', 'id_categoria', 'nombre_libro', 'foto_libro'];
        public $id_compra;
        public $dni_usuario;
        public $id_libro;
        public $id_categoria;
        public $nombre_libro;
        public $foto_libro;
        public $precio_libro;
        public $cantidad;

        public function __construct($args = []) {
            $this->id_compra = $args['id_compra'] ?? null;
            $this->dni_usuario = $args['dni_usuario'] ?? '';
            $this->id_libro = $args['id_libro'] ?? '';
            $this->id_categoria = $args['id_categoria'] ?? '';
            $this->nombre_libro = $args['nombre_libro'] ?? '';
            $this->foto_libro = $args['foto_libro'] ?? '';
        }
        
    }