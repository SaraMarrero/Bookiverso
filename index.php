<?php
    require_once __DIR__.'/../includes/app.php';

    use MVC\Router;
    use Controllers\IndexController;
    use Controllers\LibrosController;
    use Controllers\LoginRegisterController;
    use Controllers\UsuarioController;
    use Controllers\CarritoController;
    use Controllers\DerechosController;
    use Controllers\CategoriasController;

    
    $router = new Router();

    // Redireccionar a /index cuando se accede a la raíz del sitio
    $router->get('/', function () {
        header('Location: /index');
        exit();
    });

    // Index Conroller //
    $router->get('/index', [IndexController::class, 'index']);
    $router->get('/admin/index', [IndexController::class, 'indexAdmin']);

    // Login - Register //
    $router->get('/login_register/register', [LoginRegisterController::class, 'register']);
    $router->post('/login_register/register', [LoginRegisterController::class, 'register']);
    $router->get('/login_register/login', [LoginRegisterController::class, 'login']);
    $router->post('/login_register/login', [LoginRegisterController::class, 'login']);

    // Libros //
    $router->get('/libros/Romance', [LibrosController::class, 'mostrarRomance']);
    $router->get('/libros/Fantasia', [LibrosController::class, 'mostrarFantasia']);
    $router->get('/libros/Terror', [LibrosController::class, 'mostrarTerror']);
    $router->get('/libros/Ficcion', [LibrosController::class, 'mostrarFiccion']);
    $router->get('/libros/Comics', [LibrosController::class, 'mostrarComics']);

    // Usuario //
    $router->get('/usuario/perfil', [UsuarioController::class, 'perfil']);
    $router->post('/usuario/perfil', [UsuarioController::class, 'perfil']);
    $router->get('/usuario/signOut', [LoginRegisterController::class, 'signOut']);

    $router->get('/usuario/contacto', [UsuarioController::class,'paginaContacto']);
    $router->post('/usuario/contacto', [UsuarioController::class,'paginaContacto']);

    $router->get('/usuario/buscador', [UsuarioController::class, 'buscador']);

    // CarritoController //
    $router->get('/carrito/addCarrito', [CarritoController::class, 'addCarrito']);
    $router->post('/carrito/addCarrito', [CarritoController::class, 'addCarrito']);
    $router->get('/carrito/removeElementCarrito', [CarritoController::class, 'removeElementCarrito']);
    $router->get('/carrito/vaciarCarrito', [CarritoController::class, 'vaciarCarrito']);

    // Derechos //
    $router->get('/usuario/derechos/cookies', [DerechosController::class, 'paginaCookies']);
    $router->get('/usuario/derechos/avisoLegal', [DerechosController::class, 'avisoLegal']);
    $router->get('/usuario/derechos/politicaDePrivacidad', [DerechosController::class, 'paginaPoliticaDePrivacidad']);
    $router->get('/usuario/derechos/terminosYCondiciones', [DerechosController::class, 'terminosYCondiciones']);

    // Administrador //
    $router->get('/admin/ver/verComics', [LibrosController::class, 'mostrarComicsAdmin']);
    $router->get('/admin/ver/verFantasia', [LibrosController::class, 'mostrarFantasiaAdmin']);
    $router->get('/admin/ver/verFiccion', [LibrosController::class, 'mostrarFiccionAdmin']);
    $router->get('/admin/ver/verTerror', [LibrosController::class, 'mostrarTerrorAdmin']);
    $router->get('/admin/ver/verRomance', [LibrosController::class, 'mostrarRomanceAdmin']);
    $router->get('/admin/ver/verCategorias', [CategoriasController::class, 'mostrarCategorias']);

    $router->get('/admin/crear/addCategoria', [CategoriasController::class, 'crearCategoria']);
    $router->post('/admin/crear/addCategoria', [CategoriasController::class, 'crearCategoria']);

    $router->get('/admin/crear/addLibro', [LibrosController::class, 'crearLibro']);
    $router->post('/admin/crear/addLibro', [LibrosController::class, 'crearLibro']);

    $router->get('/admin/borrar/borrarLibro', [LibrosController::class, 'borrarLibro']);
    $router->get('/admin/borrar/borrarCategoria', [CategoriasController::class, 'borrarCategoria']);

    $router->get('/admin/editar/editLibros', [LibrosController::class, 'editarLibro']);
    $router->post('/admin/editar/editLibros', [LibrosController::class, 'editarLibro']);

    $router->comprobarRutas();