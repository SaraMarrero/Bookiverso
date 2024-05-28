<section class="bg-gray-100 text-gray-600 min-h-screen p-3 bg-blue-900">
    <div class="h-full">
        <div>
            <!-- background -->
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                <img class="rounded-t shadow-lg h-56" src="/build/img/admin/paisaje.jpg" width="470" />
            </div>
            <!-- body -->
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto"">
                <div class="bg-white px-8 pb-6 rounded-b shadow-lg">

                    <!-- header -->
                    <div class="text-center py-3">
                        <h1 class="text-xl text-gray-800 font-semibold mb-1">Libros</h1>
                        <div class="text-sm">
                        La creación de un libro es abrir el alma, donde cada palabra revela el universo íntimo del autor, invitando al lector a explorar mundos internos.
                        </div>
                    </div>
                    <form action="/admin/crear/addLibro" method="POST"  enctype="multipart/form-data">

                        <!-- Imagen -->
                        <div class="mt-1">
                            <label class="block text-sm font-medium mb-1" for="foto_libro">Imagen JPEG/PNG <span class="text-red-500">*</span></label>
                            <input name="foto_libro" id="foto_libro" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="file" accept="image/jpg, image/png" />
                            <p class="text-red-500"><?php echo isset($errores['foto_libro']) ? $errores['foto_libro'] : ''; ?></p>
                        </div>

                        <div>
                                <!-- Nombre y Descripción -->
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="nombre_libro">Nombre <span class="text-red-500">*</span></label>
                                    <input name="nombre_libro" id="nombre_libro" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400  w-full" type="text" placeholder="Romance" />
                                    <p class="text-red-500"><?php echo isset($errores['nombre_libro']) ? $errores['nombre_libro'] : ''; ?></p>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="paginas">Número de Páginas <span class="text-red-500">*</span></label>
                                    <input name="paginas" id="paginas" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="number" />
                                    <p class="text-red-500"><?php echo isset($errores['paginas']) ? $errores['paginas'] : ''; ?></p>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="formato">Formato <span class="text-red-500">*</span></label>
                                    <input name="formato" id="formato" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="text" value="PDF" readonly/>
                                    <p class="text-red-500"><?php echo isset($errores['formato']) ? $errores['formato'] : ''; ?></p>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="idioma">Idioma <span class="text-red-500">*</span></label>
                                    <input name="idioma" id="idioma" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="text" value="Español" readonly />
                                    <p class="text-red-500"><?php echo isset($errores['idioma']) ? $errores['idioma'] : ''; ?></p>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="idioma">Categoría <span class="text-red-500">*</span></label>
                                    <select name="id_categoria" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full">
                                        <option value="0">--Seleccione--</option>
                                        <?php
                                            // Muestra las consolas
                                            foreach($categorias as $categoria){

                                                echo "<option " . ($categoria === $categoria['id_categoria'] ? 'selected' : ' ') . "value='" . $categoria['id_categoria'] . "'>" . $categoria['nombre_categoria'] . "</option>";
                                            }
                                        ?>
                                    </select>
                                    <?php echo isset($errores['id_categoria']) ? $errores['id_categoria'] : ''; ?>
                                </div>
                                <?php echo isset($errores['libro_existe']) ? $errores['libro_existe'] : ''; ?>
                            </div>
                                

                            <!-- Botón -->
                            <div class="mt-6">
                                <div class="">
                                    <button type="submit" class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white">Crear Categoría</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
