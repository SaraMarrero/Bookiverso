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

    <div class="w-2/3 m-auto flex mb-10 relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-600">
            <thead class="text-xs text-gray-700 uppercase bg-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">Dni</th>
                    <th scope="col" class="px-6 py-3 translatable" data-key="data_key_19">Nombre</th>
                    <th scope="col" class="px-6 py-3 translatable" data-key="data_key_27">Apellidos</th>
                    <th scope="col" class="px-6 py-3 translatable" data-key="data_key_22">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr class="bg-gray-200 border-b">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                        <?php echo $usuario[0]['dni_usuario'] ?>
                    </th>
                        <td class="px-6 py-4"> <?php echo $usuario[0]['nombre_usuario']; ?></td>
                        <td class="px-6 py-4"> <?php echo $usuario[0]['apellidos_usuario']; ?></td>
                        <td class="px-6 py-4"> <?php echo $usuario[0]['email_usuario']; ?></td>
                </tr>
            </tbody>
        </table>
    </div>

    <div class="w-2/3 m-auto flex mt-5">
        <h1 class="p-5 bg-gray-400 rounded-t-lg text-white font-bold translatable" data-key="data_key_28">Información del perfil</h1>
    </div>

    <div class="w-2/3 m-auto rounded-tr-lg rounded-b-lg bg-gray-200">
        <!-- Editar usuario -->
        <form method="POST">
            <h1 class="p-5 font-bold bg-gray-400 rounded-tr-lg translatable" data-key="data_key_29">Editar perfil</h1>

                <div class="mb-6 pl-5 pt-5 pr-5">
					<label for="dni_usuario" class="block mb-2 text-sm font-medium text-gray-900">Dni</label>
					<input type="text" id="dni_usuario" name="dni_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario[0]['dni_usuario']; ?>" readonly>
				</div>

                <div class="mb-6 pl-5 pr-5">
					<label for="nombre_usuario" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_19">Nombre</label>
					<input type="text" id="nombre_usuario" name="nombre_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario[0]['nombre_usuario']; ?>">
				</div>

                <div class="mb-6 pl-5 pr-5">
					<label for="apellidos" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_27">Apellidos</label>
					<input type="text" id="apellidos_usuario" name="apellidos_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario[0]['apellidos_usuario']; ?>">
				</div>

                <div class="mb-6 pl-5 pr-5">
					<label for="email" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_22">Email</label>
					<input type="text" id="email_usuario" name="email_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?php echo $usuario[0]['email_usuario']; ?>">
				</div>

                <div class="mb-6 pl-5 pr-5">
                    <button type="submit" name="actualizarPerfil" class="bg-green-500 p-2 rounded-lg m-2 border-2 md:inline-block w-full md:w-auto sm:inline-block w-full sm:w-auto translatable" id="buttonActualizarPerfil" onclick="return confirm('¿Está seguro de que quiere cambiar la contraseña? Esta acción no se puede deshacer.');" data-key="data_key_32">Actualizar</button>
                </div>

                <div class="mb-6 pl-5 pr-5">
                    <p id="mensaje"></p>
                </div>
        </form>

        <!-- Editar contraseña -->
        <form method="POST">
            <h1 class="p-5 font-bold bg-gray-400 translatable" data-key="data_key_34">Cambiar contraseña</h1>

            <div class="mb-6 pl-5 pr-5 pt-5">
                <label for="password_actual" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_30">Contraseña actual <span class="text-red-500">*</span></label>
                <input type="password" id="password_actual" name="password_actual" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="·····">
                <p class="text-red-500"><?php echo isset($_SESSION['errores']['password_actual']) ? $_SESSION['errores']['password_actual'] : ''; ?></p>
            </div>

            <div class="mb-6 pl-5 pr-5">
                <label for="password_nueva" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_31">Contraseña nueva <span class="text-red-500">*</span></label>
                <input type="password" id="password_nueva" name="new_password_usuario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="·····">
                <p class="text-red-500"><?php echo isset($_SESSION['errores']['new_password_usuario_vacio']) ? $_SESSION['errores']['new_password_usuario_vacio'] : ''; ?></p>
            </div>

            <div class="mb-6 pl-5 pr-5">
                <label for="password_nueva" class="block mb-2 text-sm font-medium text-gray-900 translatable" data-key="data_key_31">Contraseña nueva <span class="text-red-500">*</span></label>
                <input type="password" id="password_nueva" name="new_password_usuario_2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="·····">
                <p class="text-red-500"><?php echo isset($_SESSION['errores']['new_password_usuario_vacio_2']) ? $_SESSION['errores']['new_password_usuario_vacio_2'] : ''; ?></p>
            
                <p class="text-red-500 mb-6"><?php echo isset($_SESSION['errores']['new_password_no_coincide']) ? $_SESSION['errores']['new_password_no_coincide'] : ''; ?></p>
            </div>

            <div class="mb-6 pl-5 pr-5">
                <button type="submit" name="cambiarPassword" class="bg-green-500 p-2 rounded-lg m-2 border-2 md:inline-block w-full md:w-auto sm:inline-block w-full sm:w-auto translatable" id="buttonActualizarPerfil"  onclick="return confirm('¿Está seguro de que quiere cambiar la contraseña? Esta acción no se puede deshacer.');" data-key="data_key_32">Actualizar</button>
            </div>
        </form>

        <hr class="h-1 w-full m-auto bg-gray-300">

        <div class="mb-6 ">
            <form method="GET" class="p-5">
                <?php foreach($usuario as $usuario[0]){ ?>
                    <input type="hidden" name="dni_usuario" value="<?php echo $usuario[0]['dni_usuario']; ?>">
                    <button type="submit" name="borrarPerfil" class="bg-red-500 p-2 rounded-lg m-2 border-2 md:inline-block w-full md:w-auto sm:inline-block w-full sm:w-auto translatable" id="buttonEliminarPerfil" onclick="return confirm('¿Está seguro de que quiere eliminar la cuenta? Esta acción no se puede deshacer.');" data-key="data_key_33">Eliminar cuenta</button>
                <?php } ?>
            </form>
        </div>
    </div>
    <img src="/build/img/onda-perfil.svg" alt="SVG" id="onda-inferior"/>
</main>

<?php 
    $content2 = true;
?>