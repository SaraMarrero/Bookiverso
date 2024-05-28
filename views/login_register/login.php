<div class="wrapper fadeInDown">
    <div id="formContent">
        <h2 class="active">Iniciar Sesión</h2>
        <h2 class="inactive underlineHover"><a href="/login_register/register">Registrarse</a></h2>

        <!-- Login Form -->
        <form method="POST">
            <!-- Email -->
            <input type="text" id="email_usuario" class="fadeIn second" name="email_usuario" placeholder="Email">
            <p class="text-red-500"><?php echo isset($errores['email']) ? $errores['email'] : ''; ?></p>

            <!-- Contraseña -->
            <div class="relative">
                <input type="password" id="password_usuario" class="fadeIn third pr-10" name="password_usuario" placeholder="·····">
                <img src='/build/img/ojo_cerrado.svg' class="button_password absolute top-1/2 right-10 transform -translate-y-1/2 cursor-pointer w-8 h-8" id="button_Password">
            </div>

            <p class="p"></p>
            <p class="text-red-500"><?php echo isset($errores['password']) ? $errores['password'] : ''; ?></p>

            <p class="text-red-500"><?php echo isset($errores['usuarioNoExiste']) ? $errores['usuarioNoExiste'] : ''; ?></p>
            <p class="text-red-500"><?php echo isset($errores['passwordIncorrecta']) ? $errores['passwordIncorrecta'] : ''; ?></p>

            <!-- Iniciar sesión -->
            <input type="submit" name="login" class="fadeIn fourth" value="Iniciar sesión">
            <a href="/index">Web</a>
        </form>
    </div>
</div>