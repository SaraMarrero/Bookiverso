<?php
	// Recoge los datos del usuario logueado
	if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }

    $inicio = false;
    $romance = false;
    $fantasia = false;
    $terror = false;
    $ficcion = false;
    $comics = false;

?>

<main style="background: #73C6B6;">
    <img src="/build/img/onda-perfil.svg" alt="SVG" id="onda-inferior" style="transform: rotate(180deg);"/>
    <div class="p-5"></div>

    <h2 class="w-2/3 m-auto text-3xl font-extrabold text-center bg-gray-400 rounded-t-lg p-4 translatable" data-key="data_key_20">Contacto</h2>

    <section class="w-2/3 m-auto flex mb-10 relative overflow-x-auto shadow-md sm:rounded-b-lg bg-gray-200">
        <div class="py-8 lg:py-10 px-4 mx-auto max-w-screen-md">
            <p class="mb-8 lg:mb-10 translatable" data-key="data_key_21">En Bookiverso, nos apasiona compartir conocimiento y fomentar el amor por la lectura. Si tienes alguna pregunta, comentario, o simplemente quieres ponerte en contacto con nosotros. <br> Completa el formulario de contacto a continuación y nos pondremos en contacto contigo lo antes posible. <br> ¡Gracias por visitarnos y por ser parte de neustra comunidad de lectores digitales!</p>
            <form action="#" method="POST" class="space-y-8">
                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 translatable" data-key="data_key_22">Email</label>
                    <input type="email" id="email" name="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-full p-2.5" placeholder="email@gmail.com" value="<?php echo isset($email) ?>">
                    <div class="aviso-mail">
                        <?php echo isset($errores['email']) ? $errores['email'] : '' ?>
                    </div>
                </div>

                <div>
                    <label for="asunto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 translatable" data-key="data_key_23">Asunto</label>
                    <input type="text" id="asunto" name="asunto" class="block p-3 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 shadow-sm focus:ring-primary-500 focus:border-primary-500" placeholder="Asunto de su mensaje" value="<?php echo isset($asunto) ?>">
                    <div class="aviso-asunto">
                        <?php echo isset($errores['asunto']) ? $errores['asunto'] : '' ?>
                    </div>
                </div>

                <div class="sm:col-span-2">
                    <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400 translatable" data-key="data_key_24">Mensaje</label>
                    <textarea id="mensaje" name="mensaje" rows="6" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg shadow-sm border border-gray-300 focus:ring-primary-500 focus:border-primary-500a aquí su mensaje..."><?php echo isset($mensaje) ?></textarea>
                    <div class="aviso-mensaje">
                        <?php echo isset($errores['mensaje']) ? $errores['mensaje'] : '' ?>
                    </div>
                </div>

                <div class="aviso">
                    <?php echo isset($aviso) ? $aviso : '' ?>
                </div>

                <script>
                    setTimeout(() => {
                        document.querySelector('.aviso-mail').textContent = '';
                        document.querySelector('.aviso-asunto').textContent = '';
                        document.querySelector('.aviso-mensaje').textContent = '';
                        document.querySelector('.aviso').textContent = '';
                    }, 3000);
                </script>

                <div class="flex justify-between items-center">
                    <a href="/index" class="py-3 px-5 text-sm font-medium text-center bg-blue-900 rounded-lgt text-white translatable" data-key="data_key_25">Inicio</a>
                    <button type="submit" id="enviar" name="enviar" class="py-3 px-5 text-sm font-medium text-center bg-blue-900 rounded-lgt text-white translatable" data-key="data_key_26">Enviar</button>
                </div>

            </form>
        </div>
    </section>
    <img src="/build/img/onda-perfil.svg" alt="SVG" id="onda-inferior"/>
</main>

<?php 
    $content2 = true;
?>