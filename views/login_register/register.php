<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="inactive underlineHover"><a href="/login_register/login">Iniciar Sesión</a></h2>
        <h2 class="active">Registrarse</h2>

        <!-- Register Form -->
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
            <!-- Dni -->
            <input type="text" id="dni_usuario" class="fadeIn second" name="dni_usuario" placeholder="Dni" value="<?php echo s($usuario->dni_usuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['dni']) ? mostrarErrores($errores, 'dni') : ''; ?></p>
            <?php echo isset($errores['dniExiste']) ? mostrarErrores($errores, 'dniExiste') : ''; ?>

            <!-- Nombre de usuario  -->
            <input type="text" id="nombre_usuario" class="fadeIn third" name="nombre_usuario" placeholder="Nombre" value="<?php echo s($usuario->nombre_usuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['nombre']) ? mostrarErrores($errores, 'nombre') : ''; ?></p>

            <!-- Apellidos de usuario -->
            <input type="text" id="apellidos_usuario" class="fadeIn third" name="apellidos_usuario" placeholder="Apellidos" value="<?php echo s($usuario->apellidos_usuario); ?>"><br>
            <p class="text-red-500"><?php echo isset($errores['apellidos']) ? mostrarErrores($errores, 'apellidos') : ''; ?></p>

            <!-- Email -->
            <input type="text" id="email_usuario" class="fadeIn third" name="email_usuario" placeholder="Email" value="<?php echo s($usuario->email_usuario); ?>">
            <p class="text-red-500"><?php echo isset($errores['email']) ? mostrarErrores($errores, 'email') : ''; ?></p>

            <!-- Contraseña -->
            <div class="relative">
                <input type="password" id="password_usuario" class="fadeIn third pr-10" name="password_usuario" placeholder="·····">
                <img src='/build/img/ojo_cerrado.svg' class="button_password absolute top-1/2 right-10 transform -translate-y-1/2 cursor-pointer w-8 h-8" id="button_Password">
            </div>

            <p class="p"></p>
            <p class="text-red-500"><?php echo isset($errores['password']) ? mostrarErrores($errores, 'password') : ''; ?></p>

            <!-- Registrarse -->
            <input type="submit" class="fadeIn fourth" name="register" value="Registrarse">
            <a href="/index">Web</a>
        </form>
    </div>
</div>