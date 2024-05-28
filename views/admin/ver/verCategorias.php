<main class="w-full bg-blue-900">
	<h1 class="text-center py-16 font-bold text-2xl text-white tracking-wider">Categorías</h1>

	<div class="relative shadow-md sm:rounded-lg py-2">
		<table class="mx-auto sm:w-4/5 lg:w-4/5 text-sm text-gray-500 z-0">
			<thead class="text-xs text-gray-700 uppercase bg-gray-50">
				<tr>
					<th scope="col" class="py-3 text-center xl:text-xl">ID</th>
					<th scope="col" class="py-3 text-center  xl:text-xl">Nombre</th>
					<th scope="col" class="px-6 py-3 text-center  xl:text-xl">Acciones</th>
				</tr>
			</thead>
			<tbody>
				<?php 
					// Valida que haya datos registrados
					if (!empty($datos)){
						// Recorre las categorías para leer sus datos
							foreach($categorias as $categoria){
								
				?>

					<tr class="bg-white border-b hover:bg-gray-50">
						
						<td class="py-4 font-semibold text-gray-900 text-center text-base sm:text-lg xl:text-xl"><?php echo $categoria['id_categoria']; ?></td>
						
						<td class="py-4 font-semibold text-gray-900 text-center text-base sm:text-lg xl:text-xl"><?php echo $categoria['nombre_categoria']; ?></td>
						
						<td class="py-4 text-center">

							<a href="<?php echo '/admin/borrar/borrarCategoria?id_categoria='.$categoria['id_categoria'] ?>" class="py-2 font-medium text-red-600 hover:underline block text-base sm:text-lg xl:text-xl" id="buttonBorrar" onclick="return confirm('¿Está seguro de que quiere eliminar <?php echo $categoria['nombre_categoria'] ?>? Esta acción no se puede deshacer.');">Eliminar</a>
							
						</td>
					</tr>
				<?php	
					}
				} 
				?>
				
			</tbody>
		</table>
	</div>

			
</main>
			



