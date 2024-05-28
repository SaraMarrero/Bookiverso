<section class="bg-gray-100 text-gray-600 min-h-screen p-10 bg-blue-900">
    <div class="h-full">
        <div>
            <!-- background -->
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                <img class="rounded-t shadow-lg h-56" src="/build/img/admin/paisaje.jpg" width="470" />
            </div>
            <!-- body -->
            <div class="relative px-4 sm:px-6 lg:px-8 pb-8 max-w-lg mx-auto"">
                <div class="bg-white px-8 pb-6 rounded-b shadow-lg">

                    <!-- header -->
                    <div class="text-center mb-6 py-3">
                        <h1 class="text-xl text-gray-800 font-semibold mb-2">Categorías</h1>
                        <div class="text-sm">
                        Cada libro es una ilusión; elige el mejor para descubrir su magia.
                        </div>
                    </div>
                    <form action="/admin/crear/addCategoria" method="POST" enctype="multipart/form-data">

                        <!-- Imagen -->
                        <div class="mt-1">
                            <label class="block text-sm font-medium mb-1" for="icono_categoria">Imagen SVG <span class="text-red-500">*</span></label>
                            <input name="icono_categoria" id="icono_categoria" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="file" accept="image/svg" />
                            <p class="text-red-500"><?php echo isset($errores['icono_categoria']) ? $errores['icono_categoria'] : ''; ?></p>
                        </div>

                        <div>
                                <!-- Nombre y Descripción -->
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="nombre_categoria">Nombre <span class="text-red-500">*</span></label>
                                    <input name="nombre_categoria" id="nombre_categoria" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400  w-full" type="text" placeholder="Romance" />
                                    <p class="text-red-500"><?php echo isset($errores['nombre_categoria']) ? $errores['nombre_categoria'] : ''; ?></p>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="descripcion_categoria">Descripción <span class="text-red-500">*</span></label>
                                    <textarea name="descripcion_categoria" id="descripcion_categoria" class="resize-none text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="text"></textarea>
                                    <p class="text-red-500"><?php echo isset($errores['descripcion_categoria']) ? $errores['descripcion_categoria'] : ''; ?></p>
                                    
                                </div>

                            <!-- Botón -->
                            <div class="mt-6">
                                <div class="mb-4">
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
