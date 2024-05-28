<section class="bg-gray-100 text-gray-600 min-h-screen p-3">
    <div class="h-full">
        <div>
            <!-- background -->
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                <img class="rounded-t shadow-lg h-56" src="/build/img/admin/paisaje.jpg" width="470" />
            </div>
            <!-- body -->
            <div class="relative px-4 sm:px-6 lg:px-8 max-w-lg mx-auto">
                <div class="bg-white px-8 pb-6 rounded-b shadow-lg">

                    <!-- header -->
                    <div class="text-center py-3">
                        <h1 class="text-xl text-gray-800 font-semibold mb-1">Editar Libros</h1>
                        <div class="text-sm">
                            La imaginación es el poder creativo de la mente que permite concebir ideas, mundos y experiencias más allá de la realidad tangible. Es la fuente de la innovación y la creatividad en todas las áreas de la vida humana.
                        </div>
                    </div>
                    <?php if (!empty($errores)): ?>
                        <div class="alert alert-danger" role="alert">
                            <?php foreach ($errores as $error): ?>
                                <?php echo $error; ?><br>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST" enctype="multipart/form-data">
                        <?php foreach($libros as $libro): ?>
                            <div>
                                <input type="hidden" name="id_libro" readonly type="number" value="<?php echo $libro["id_libro"] ?>">
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="nombre_libro">Nombre <span class="text-red-500">*</span></label>
                                    <input value="<?php echo $libro["nombre_libro"] ?>" name="nombre_libro" id="nombre_libro" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400  w-full" type="text"/>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="paginas">Número de Páginas <span class="text-red-500">*</span></label>
                                    <input value="<?php echo $libro["paginas"] ?>" name="paginas" id="paginas" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="number" />
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="formato">Formato <span class="text-red-500">*</span></label>
                                    <input name="formato" id="formato" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="text" value="PDF" readonly/>
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="idioma">Idioma <span class="text-red-500">*</span></label>
                                    <input name="idioma" id="idioma" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full" type="text" value="Español" readonly />
                                </div>
                                <div class="py-2">
                                    <label class="block text-sm font-medium mb-1" for="categoria">Categoría <span class="text-red-500">*</span></label>
                                    <select name="id_categoria" class="text-sm text-gray-800 bg-white border rounded leading-5 py-2 px-3 border-gray-200 hover:border-gray-300 focus:border-indigo-300 shadow-sm placeholder-gray-400 w-full">
                                        <option value="0">--Seleccione--</option>
                                        <?php foreach($categorias as $categoria): ?>
                                            <option value="<?php echo $categoria['id_categoria']; ?>" <?php echo ($categoria['id_categoria'] == $libro['id_categoria']) ? 'selected' : ''; ?>>
                                                <?php echo $categoria['nombre_categoria']; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <!-- Botón -->
                        <div class="mt-6">
                            <div class="">
                                <button type="submit" class="font-medium text-sm inline-flex items-center justify-center px-3 py-2 border border-transparent rounded leading-5 shadow-sm w-full bg-indigo-500 hover:bg-indigo-600 text-white">Editar Categoría</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<script>
    window.addEventListener('DOMContentLoaded', function() {
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');
        if (error) {
            alert("Ha ocurrido un error. Por favor, revisa los campos marcados con asterisco.");
        }
    });
</script>

