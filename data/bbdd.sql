CREATE DATABASE IF NOT EXISTS bookiverso CHARSET=utf8 COLLATE=utf8_unicode_ci;

USE bookiverso;
CREATE TABLE IF NOT EXISTS usuario(
    dni_usuario VARCHAR(9) PRIMARY KEY NOT NULL,
    nombre_usuario VARCHAR(20) NOT NULL,
    apellidos_usuario VARCHAR(25) NOT NULL,
    email_usuario VARCHAR(25) NOT NULL,
    password_usuario VARCHAR(60) NOT NULL,
    administrador BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS categoria(
    id_categoria INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    icono_categoria VARCHAR(200) NOT NULL,
    nombre_categoria VARCHAR(20) NOT NULL,
    descripcion_categoria VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS libro(
    id_libro INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    foto_libro VARCHAR(200) NOT NULL,
    nombre_libro VARCHAR(100) NOT NULL,
    paginas VARCHAR(5) NOT NULL,
    formato VARCHAR(3) NOT NULL,
    idioma VARCHAR(10) NOT NULL,
    id_categoria INT UNSIGNED NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS carrito(
    id_compra INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    dni_usuario VARCHAR(9) NOT NULL,
    id_libro INT UNSIGNED,
    id_categoria INT UNSIGNED,
    nombre_libro VARCHAR(100) NOT NULL,
    foto_libro VARCHAR(200) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

CREATE TABLE IF NOT EXISTS compra(
    id_compra INT UNSIGNED AUTO_INCREMENT PRIMARY KEY NOT NULL,
    dni_usuario VARCHAR(9) NOT NULL,
    id_libro INT UNSIGNED,
    id_categoria INT UNSIGNED,
    id_carrito INT UNSIGNED,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


ALTER TABLE libro ADD FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria) ON DELETE CASCADE;

ALTER TABLE carrito ADD FOREIGN KEY (dni_usuario) REFERENCES usuario(dni_usuario) ON DELETE CASCADE;
ALTER TABLE carrito ADD FOREIGN KEY (id_libro) REFERENCES libro(id_libro) ON DELETE CASCADE;
ALTER TABLE carrito ADD FOREIGN KEY(id_categoria) REFERENCES categoria(id_categoria) ON DELETE CASCADE;

ALTER TABLE compra ADD FOREIGN KEY (dni_usuario) REFERENCES usuario(dni_usuario) ON DELETE CASCADE;
ALTER TABLE compra ADD FOREIGN KEY (id_libro) REFERENCES libro(id_libro) ON DELETE CASCADE;
ALTER TABLE compra ADD FOREIGN KEY (id_categoria) REFERENCES categoria(id_categoria) ON DELETE CASCADE;
ALTER TABLE compra ADD FOREIGN KEY (id_carrito) REFERENCES carrito(id_carrito) ON DELETE CASCADE;

INSERT INTO usuario (dni_usuario, nombre_usuario, apellidos_usuario, email_usuario, password_usuario, administrador) values ('12345678R', 'NombreAdmin', 'ApellidosAdmin', 'admin@gmail.com', '$2y$04$urbyEoLeMSTkDeCqegwUveu11Q1ypPmGRIDcNNNbLYe8uiwq7cPJ.', 1);

INSERT INTO categoria (icono_categoria, nombre_categoria, descripcion_categoria) values
('icono-romance.svg', 'Romance', 'Narran historias de amor entre personajes, explorando relaciones emocionales, pasiones y conflictos. Con elementos como encuentros romanticos, desafios amorosos y finales felices.'),
('icono-fantasia.svg', 'Fantasia', 'Transportan a los lectores a mundos imaginarios llenos de magia, criaturas miticas y aventuras extraordinarias. Con heroes valientes, mundos exoticos y conflictos epicos entre el bien y el mal.'),
('icono-terror.svg', 'Terror', 'Provocan miedo y ansiedad en los lectores a traves de situaciones sobrenaturales, monstruos o eventos inexplicables. Con atmosferas oscuras, personajes vulnerables y finales impactantes.'),
('icono-ficcion.svg', 'Ficcion', 'Abarcan una amplia variedad de generos y tematicas, desde dramas realistas hasta thrillers emocionantes y novelas historicas. Con personajes complejos, tramas intrigantes y reflexiones.'),
('icono-comics.svg', 'Comics', 'Combinan texto e imagenes para contar historias en vinyetas, abarcando una amplia gama de generos, desde superheroes hasta comedias y dramas.');

INSERT INTO libro (foto_libro, nombre_libro, paginas, formato, idioma, id_categoria) VALUES 
('A sir Philip, con amor.png', 'A sir Philip, con amor', 288, 'PDF', 'Espanyol', 1),
('After.jpg', 'After', 592, 'PDF', 'Espanyol', 1),
('Buscando esposa.png', 'Buscando esposa', 352, 'PDF', 'Espanyol', 1),
('Cincuenta sombras de Grey.png', 'Cincuenta sombras de Grey', 544, 'PDF', 'Espanyol', 1),
('Donde todo brilla.png', 'Donde todo brilla', 592, 'PDF', 'Espanyol', 1),
('El corazon de una Bridgerton.png', 'El corazon de una Bridgerton', 320, 'PDF', 'Espanyol', 1),
('El duque y yo.png', 'El duque y yo', 320, 'PDF', 'Espanyol', 1),
('El vizconde que me amo.png', 'El vizconde que me amo', 352, 'PDF', 'Espanyol', 1),
('Lo que el viento se llevo.png', 'Lo que el viento se llevo', 1056, 'PDF', 'Espanyol', 1),
('Los siete maridos de Evelyn Hugo.png', 'Los siete maridos de Evelyn Hugo', 380, 'PDF', 'Espanyol', 1),
('Los tejados de Paris.png', 'Los tejados de Paris', 168, 'PDF', 'Espanyol', 1),
('No te olvidare.png', 'No te olvidare', 416, 'PDF', 'Espanyol', 1),
('Nosotros en la luna.png', 'Nosotros en la luna', 480, 'PDF', 'Espanyol', 1),
('Orgullo y prejuicio.jpg', 'Orgullo y prejuicio', 360, 'PDF', 'Espanyol', 1),
('Por un beso.png', 'Por un beso', 356, 'PDF', 'Espanyol', 1),
('Rojo, Blanco y Sangre Azul.png', 'Rojo, Blanco y Sangre Azul', 359, 'PDF', 'Espanyol', 1),
('Seduciendo a Mr.Bridgerton.png', 'Seduciendo a Mr.Bridgerton', 352, 'PDF', 'Espanyol', 1),
('Te doy mi corazon.png', 'Te doy mi corazon', 352, 'PDF', 'Espanyol', 1),
('Todo lo que nunca fuimos.jpg', 'Todo lo que nunca fuimos', 352, 'PDF', 'Espanyol', 1),
('Un beso bajo la lluvia.png', 'Un beso bajo la lluvia', 512, 'PDF', 'Espanyol', 1),

('Asedio y tormenta.jpg', 'Asedio y tormenta', 504, 'PDF', 'Espanyol', 2),
('El hobbit.png', 'El hobbit', 288, 'PDF', 'Espanyol', 2),
('El principe del sol.gif', 'El principe del sol', 612, 'PDF', 'Espanyol', 2),
('El retorno del rey.jpg', 'El retorno del rey', 409, 'PDF', 'Espanyol', 2),
('El senyor de los anillos.jpg', 'El senyor de los anillos', 1392, 'PDF', 'Espanyol', 2),
('Harry Potter y el caliz de fuego.jpg', 'Harry Potter y el caliz de fuego', 672, 'PDF', 'Espanyol', 2),
('Harry Potter y el misterio del principe.png', 'Harry Potter y el misterio del principe', 608, 'PDF', 'Espanyol', 2),
('Harry Potter y el prisionero de Azkaban.jpg', 'Harry Potter y el prisionero de Azkaban', 360, 'PDF', 'Espanyol', 2),
('Harry Potter y la camara secreta.jpg', 'Harry Potter y la camara secreta', 288, 'PDF', 'Espanyol', 2),
('Harry Potter y la orden del fenix.png', 'Harry Potter y la orden del fenix', 896, 'PDF', 'Espanyol', 2),
('Harry Potter y la piedra filosofal.jpg', 'Harry Potter y la piedra filosofal', 256, 'PDF', 'Espanyol', 2),
('Harry Potter y las reliquias de la muerte.jpg', 'Harry Potter y las reliquias de la muerte', 640, 'PDF', 'Espanyol', 2),
('La ladrona de la luna.jpg', 'La ladrona de la luna', 392, 'PDF', 'Espanyol', 2),
('Las dos torres.jpg', 'Las dos torres', 352, 'PDF', 'Espanyol', 2),
('Las memorias de Fenrai.jpg', 'Las memorias de Fenrai', 232, 'PDF', 'Espanyol', 2),
('Sombra y hueso.jpg', 'Sombra y hueso', 416, 'PDF', 'Espanyol', 2),
('El rey cuervo.jpg', 'El rey cuervo', 472, 'PDF', 'Espanyol', 2),
('La profecia del cuervo.png', 'La profecia del cuervo', 424, 'PDF', 'Espanyol', 2),
('Los saqueadores de suenyos.jpg', 'Los saqueadores de suenyos', 496, 'PDF', 'Espanyol', 2),
('Ruina y ascenso.jpg', 'Ruina y ascenso', 448, 'PDF', 'Espanyol', 2),

('Deja que te cuente.jpg', 'Deja que te cuente', 256, 'PDF', 'Espanyol', 3),
('Dracula.jpg', 'Dracula', 576, 'PDF', 'Espanyol', 3),
('El Convenio de Sir Dominick.jpg', 'El Convenio de Sir Dominick', 145, 'PDF', 'Espanyol', 3),
('El Paciente.jpg', 'El Paciente', 480, 'PDF', 'Espanyol', 3),
('El Perfume.jpg', 'El Perfume', 253, 'PDF', 'Espanyol', 3),
('El poder del perro.jpg', 'El poder del perro', 720, 'PDF', 'Espanyol', 3),
('El psicoanalista en la mira.jpg', 'El psicoanalista en la mira', 512, 'PDF', 'Espanyol', 3),
('El sabueso de los Baskerville.png', 'El sabueso de los Baskerville', 243, 'PDF', 'Espanyol', 3),
('El silencio de la ciudad blanca.jpg', 'El silencio de la ciudad blanca', 480, 'PDF', 'Espanyol', 3),
('El silencio de los corderos.jpg', 'El silencio de los corderos', 400, 'PDF', 'Espanyol', 3),
('Entrevista con el vampiro.jpg', 'Entrevista con el vampiro', 384, 'PDF', 'Espanyol', 3),
('Gritos del pasado.jpg', 'Gritos del pasado', 424, 'PDF', 'Espanyol', 3),
('Kaiki.jpg', 'Kaiki', 200, 'PDF', 'Espanyol', 3),
('La casa de Riverton.jpg', 'La casa de Riverton', 520, 'PDF', 'Espanyol', 3),
('La noche en que Frankestein leyo el Quijote.jpg', 'La noche en que Frankestein leyo el Quijote', 240, 'PDF', 'Espanyol', 3),
('Las Lentes Azules y Otros Relatos.jpg', 'Las Lentes Azules y Otros Relatos', 360, 'PDF', 'Espanyol', 3),
('Los sauces.jpg', 'Los sauces', 60, 'PDF', 'Espanyol', 3),
('Misery.jpg', 'Misery', 376, 'PDF', 'Espanyol', 3),
('Narraciones extraordinarias.jpg', 'Narraciones extraordinarias', 272, 'PDF', 'Espanyol', 3),
('No abras los ojos.jpg', 'No abras los ojos', 552, 'PDF', 'Espanyol', 3),

('Alrededor de la Luna.jpg', 'Alrededor de la Luna', 256, 'PDF', 'Espanyol', 4),
('Cinco semanas en globo.jpg', 'Cinco semanas en globo', 36, 'PDF', 'Espanyol', 4),
('Correr o morir.jpg', 'Correr o morir', 460, 'PDF', 'Espanyol', 4),
('De la tierra a la Luna.jpg', 'De la tierra a la Luna', 416, 'PDF', 'Espanyol', 4),
('Dos anyos de vacaciones.gif', 'Dos anyos de vacaciones', 136, 'PDF', 'Espanyol', 4),
('El faro del fin del mundo.jpg', 'El faro del fin del mundo', 95, 'PDF', 'Espanyol', 4),
('El pais de las pieles.jpg', 'El pais de las pieles', 432, 'PDF', 'Espanyol', 4),
('El principe cruel.jpg', 'El principe cruel', 464, 'PDF', 'Espanyol', 4),
('El rayo verde.jpg', 'El rayo verde', 222, 'PDF', 'Espanyol', 4),
('En llamas.jpg', 'En llamas', 407, 'PDF', 'Espanyol', 4),
('La cura mortal.jpg', 'La cura mortal', 449, 'PDF', 'Espanyol', 4),
('La isla misteriosa.jpg', 'La isla misteriosa', 223, 'PDF', 'Espanyol', 4),
('La vuelta al mundo en 80 dias.jpg', 'La vuelta al mundo en 80 dias', 224, 'PDF', 'Espanyol', 4),
('Los hijos del capitan Grant.jpg', 'Los hijos del capitan Grant', 704, 'PDF', 'Espanyol', 4),
('Los juegos del hambre.jpg', 'Los juegos del hambre', 400, 'PDF', 'Espanyol', 4),
('Miguel Strogoff.jpg', 'Miguel Strogoff', 208, 'PDF', 'Espanyol', 4),
('Por un billete de Loteria.jpg', 'Por un billete de Loteria', 188, 'PDF', 'Espanyol', 4),
('Prueba de fuego.jpg', 'Prueba de fuego', 424, 'PDF', 'Espanyol', 4),
('Sinsajo.jpg', 'Sinsajo', 419, 'PDF', 'Espanyol', 4),
('Viaje al centro de la tierra.jpg', 'Viaje al centro de la tierra', 576, 'PDF', 'Espanyol', 4),


('El poder de las cinco.png', 'El poder de las cinco', 144, 'PDF', 'Espanyol', 5),
('Los doce portales.png', 'Los doce portales', 144, 'PDF', 'Espanyol', 5),
('La otra dimension.png', 'La otra dimension', 144, 'PDF', 'Espanyol', 5),
('El poder del fuego.png', 'El poder del fuego', 144, 'PDF', 'Espanyol', 5),
('La ultima lagrima.png', 'La ultima lagrima', 144, 'PDF', 'Espanyol', 5),
('Ilusiones y mentiras.png', 'Ilusiones y mentiras', 144, 'PDF', 'Espanyol', 5),
('Un dia lo encontraras.png', 'Un dia lo encontraras', 144, 'PDF', 'Espanyol', 5),
('Las rosas negras de Meridian.png', 'Las rosas negras de Meridian', 144, 'PDF', 'Espanyol', 5),
('Los cuatro dragones.png', 'Los cuatro dragones', 144, 'PDF', 'Espanyol', 5),
('Un puente entre dos mundos.png', 'Un puente entre dos mundos', 144, 'PDF', 'Espanyol', 5),
('La corona de luz.png', 'La corona de luz', 144, 'PDF', 'Espanyol', 5),
('Asi sea para siempre.png', 'Asi sea para siempre', 144, 'PDF', 'Espanyol', 5),
('Hace un anyo.png', 'Hace un anyo', 144, 'PDF', 'Espanyol', 5),
('Se quien eres.png', 'Se quien eres', 144, 'PDF', 'Espanyol', 5),
('Fin de un suenyo.png', 'Fin de un suenyo', 144, 'PDF', 'Espanyol', 5),
('El valor de elegir.png', 'El valor de elegir', 144, 'PDF', 'Espanyol', 5),
('El sello de Nerissa.png', 'El dello de Nerissa', 144, 'PDF', 'Espanyol', 5),
('No cierres los ojos.png', 'No cierres los ojos', 144, 'PDF', 'Espanyol', 5),
('Fragmentos del verano.png', 'Fragmentos del Verano', 144, 'PDF', 'Espanyol', 5),
('La otra verdad.png', 'La otra verdad', 144, 'PDF', 'Espanyol', 5);