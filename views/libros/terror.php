<?php
    // Valida si existe un $_GET en Fantasia.php
    if(!$_GET){
        header('Location: /libros/Terror?pagina=1');
    }

    // Recoge los datos del usuario logueado y su carrito de compras
    if(isset($_SESSION['usuario'])){
        $usuario = unserialize($_SESSION['usuario']);
    }

	$terror = true;
?>

<section class="bg-gradient-to-r from-gray-900 via-gray-600 to-gray-900">

	<main class="w-4/6 m-auto bg-red-950">
		<h1 class="text-center p-5 font-bold text-3xl text-gray-200">Terror</h1>

		<div class="rounded overflow-hidden flex flex-wrap justify-center">
			<?php
			// Aqui tengo que recoger los datos de la segunda consulta para solo mostrar los X libros
				foreach($result as $index => $datosLibro){ ?>

					<div class="rounded-lg shadow-lg m-4 w-full sm:w-1/2 md:w-1/3 lg:w-1/4 xl:w-1/5 bg-white relative pb-10 hover:shadow-2xl" style="overflow: hidden;">
						<div style="position: relative;">
							<img class="w-full m-auto relative rounded-lg" src="../build/img/libros/terror/<?php echo $datosLibro['foto_libro']; ?>" alt="<?php echo $datosLibro['nombre_libro']; ?>">
							<img src="/build/img/onda-libros.svg" alt="SVG" style="position: absolute; bottom: 0; left: 0; width: 100%;" />
						</div>
						<div class="pb-10 pt-5">
							<div class="font-bold text-xl mb-3 flex flex-wrap justify-center text-center"><?php echo $datosLibro['nombre_libro']; ?></div>
						</div>

						<div class="flex justify-between absolute bottom-3 left-0 right-0 m-auto">
							<div class="w-1/2 text-center">
								<button data-modal-target="static-modal-<?php echo $index ?>" data-modal-toggle="static-modal-<?php echo $index ?>" class="w-1/2 text-white bg-blue-900 font-medium rounded-lg text-sm px-3 py-2" type="button">
									<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block align-middle">
										<path stroke-linecap="round" stroke-linejoin="round" d="M3.75 3.75v4.5m0-4.5h4.5m-4.5 0L9 9M3.75 20.25v-4.5m0 4.5h4.5m-4.5 0L9 15M20.25 3.75h-4.5m4.5 0v4.5m0-4.5L15 9m5.25 11.25h-4.5m4.5 0v-4.5m0 4.5L15 15" />
									</svg>
								</button>
							</div>

							<div class="w-1/2 text-center">
								<!-- Se agrega al carrito solo si está logueado -->
								<?php if(isset($usuario)){
									foreach($usuario as $datos){ 
								?>
								<form method="POST" action="/carrito/addCarrito" id="formAdd">
									<!-- Agrega inputs hidden para cada dato que deseas pasar -->
									<input type="hidden" name="dni_usuario" value="<?php echo $datos['dni_usuario'] ?>">
									<input type="hidden" name="id_libro" value="<?php echo intval($datosLibro['id_libro']) ?>">
									<input type="hidden" name="id_categoria" value="<?php echo intval($datosLibro['id_categoria']) ?>">
									<input type="hidden" name="nombre_libro" value="<?php echo $datosLibro['nombre_libro'] ?>">
									<input type="hidden" name="foto_libro" value="<?php echo $datosLibro['foto_libro'] ?>">

									<div class="">
										<button data-modal-hide="static-modal" type="submit" class='w-1/2 text-white bg-blue-900 font-medium rounded-lg text-sm px-3 py-2 agregarCarrito' name="addCarrito">
											<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 inline-block align-middle">
												<path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
											</svg>
										</button>
									</div>
								</form>
								<?php } } ?>
							</div>
						</div>

						<!-- Modal -->
						<div id="static-modal-<?php echo $index ?>" data-modal-backdrop="static" tabindex="-1" aria-hidden="true" class="flex hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
							<div class="relative p-4 w-full max-w-2xl max-h-full">
								<!-- Modal header -->
								<div class="relative bg-white rounded-lg shadow">
									<!-- Modal body -->
									<div class="p-4 md:p-5 space-y-4 flex content-center">
										<div class="w-1/4">
											<img class="w-full h-full m-auto" src="../build/img/libros/terror/<?php echo $datosLibro['foto_libro']; ?>" alt="<?php echo $datosLibro['nombre_libro']; ?>">
										</div>

										<div class="ml-5 w-3/4 items-center">
											<div>
												<div class="flex items-center justify-between">
													<h3 class="text-2xl font-semibold text-gray-900"><?php echo $datosLibro['nombre_libro'] ?></h3>

													<button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="static-modal-<?php echo $index ?>">
														<svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
															<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
														</svg>
														<span class="sr-only">Close modal</span>
													</button>
												</div>

												<div>
													<p class="mt-2">⭐⭐⭐⭐⭐</p>
													<div class="flex items-center flex-wrap">
														<div>
															<p class="text-base leading-relaxed">Páginas:  <span class="text-gray-500"><?php echo $datosLibro['paginas']; ?></span></p>
															<p class="text-base leading-relaxed">Categoría:  <span class="text-gray-500">
																<?php 
																	if($datosLibro['id_categoria'] === 1){
																		echo 'Romance';
																	} else if($datosLibro['id_categoria'] === 2){
																		echo 'Fantasía';
																	} else if($datosLibro['id_categoria'] === 3){
																		echo 'Terror';
																	} else if($datosLibro['id_categoria'] === 4){
																		echo 'Ficción';
																	} else if($datosLibro['id_categoria'] === 5){
																		echo 'Cómics';
																	} 
																?>
															</span></p>
														</div>

														<div class="p-5">
															<p class="text-base leading-relaxed">Formato:  <span class="text-gray-500"><?php echo $datosLibro['formato']; ?></span></p>
															<p class="text-base leading-relaxed">Idioma:  <span class="text-gray-500"><?php echo $datosLibro['idioma']; ?></span></p>
														</div>
													</div>
													
													<!-- Se agrega al carrito solo si está logueado -->
													<?php if(isset($usuario)){
														foreach($usuario as $datos){ 
													?>
														<form method="POST" action="/carrito/addCarrito" id="formAdd">
															<!-- Agrega inputs hidden para cada dato que deseas pasar -->
															<input type="hidden" name="dni_usuario" value="<?php echo $datos['dni_usuario'] ?>">
															<input type="hidden" name="id_libro" value="<?php echo intval($datosLibro['id_libro']) ?>">
															<input type="hidden" name="id_categoria" value="<?php echo intval($datosLibro['id_categoria']) ?>">
															<input type="hidden" name="nombre_libro" value="<?php echo $datosLibro['nombre_libro'] ?>">
															<input type="hidden" name="foto_libro" value="<?php echo $datosLibro['foto_libro'] ?>">

															<div class="mt-1">
																<button data-modal-hide="static-modal" type="submit" class='inline-block bg-blue-900 rounded-xl px-2 py-3 text-sm font-semibold text-white mr-1 mb-1 agregarCarrito' name="addCarrito">Agregar al carrito</button>
															</div>
														</form>
													<?php } } ?>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			<?php }?>
		</div>

		<!----- PAGINACION ----->
		<div class="flex-1 flex justify-center mr-auto py-5">
		<nav class="content-center">
			<ul class="inline-flex -space-x-px">
				<!-- Veo en que página estoy si es menor o igual que 1 se queda en la misma página, si no se resta 1 -->
				<li>
					<a href="/libros/Terror?pagina=<?php echo $_GET['pagina'] <= 1 ? $_GET['pagina'] : $_GET['pagina']-1; ?>"
						class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 ml-0 rounded-l-lg leading-tight py-2 px-3">Anterior</a>
				</li>

				<?php for($i = 1; $i <= $paginas; $i++){ ?>
					<li <?php echo $_GET['pagina'] == $i ? 'class="font-bold text-purple-900"' : 'class="text-gray-500"' ?>>
						<a href="/libros/Terror?pagina=<?php echo $i ?>""
							class="bg-white border border-gray-300 leading-tight py-2 px-3"><?php echo $i ?></a>
					</li>
				<?php } ?>
				<!-- Veo en que página estoy si es mayor o igual que 3 se queda en la misma página, si no se suma 1 -->
				<li>
					<a href="/libros/Terror?pagina=<?php echo $_GET['pagina'] >= $paginas ? $_GET['pagina'] : $_GET['pagina']+1; ?>" class="bg-white border border-gray-300 text-gray-500 hover:bg-gray-100 hover:text-gray-700 rounded-r-lg leading-tight py-2 px-3">Siguiente</a>
				</li>
			</ul>
		</nav>

		</div>
	</main>

</section>

<?php
		$inicio = false;
		$inicio2 = false;
		$content2 = false;
		$romance = false;
		$fantasia = false;
		$ficcion = false;
		$terror = true;
?>	