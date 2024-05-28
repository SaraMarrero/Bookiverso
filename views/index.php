<?php
    $romance = false;
    $fantasia = false;
    $literatura = false;
    $ficcion = false;
    $comics = false;
?>

<main>
    <div style="min-height: 100vh;">
        <!---------- SLIDER ---------->
        <section id="container-slider">
    <ul class="listslider" style="display: none;">
        <li><a itlist="itList_0" href="#" class="item-select-slid"></a></li>
        <li><a itlist="itList_1" href="#"></a></li>
        <li><a itlist="itList_2" href="#"></a></li>
        <li><a itlist="itList_3" href="#"></a></li>
    </ul>

    <ul id="slider" class="relative z-0">
        <li style="background-image: url('../build/img/slider1.jpg'); z-index:0; opacity: 1;" class="li">
            <div class="content_slider">
                <div>
                    <h2 class="translatable" data-key="data_key_1">Adquisición de conocimiento</h2>
                </div>
            </div>
        </li>

        <li style="background-image: url('../build/img/slider2.jpg'); z-index:0; opacity: 1;" class="li">
            <div class="content_slider">
                <div>
                    <h2 class="translatable" data-key="data_key_2">Desarrollo del pensamiento crítico</h2>
                </div>
            </div>
        </li>

        <li style="background-image: url('../build/img/slider3.jpg'); z-index:0; opacity: 1;" class="li">
            <div class="content_slider">
                <div>
                    <h2 class="translatable" data-key="data_key_3">Mejora de la comprensión</h2>
                </div>
            </div>
        </li>

        <li style="background-image: url('../build/img/slider4.jpg'); z-index:0; opacity: 1;" class="li2">
            <div class="content_slider">
                <div>
                    <h2 class="translatable" data-key="data_key_4">Reducción del estrés</h2>
                </div>
            </div>
        </li>

        <img src="/build/img/FORMA_BANNER_F.6.svg" alt="SVG" id="onda-inferior" class="absolute z-50 bottom-0"/>
    </ul>
</section>

        <!---------- TÍTULO ---------->
        <section class="titulo mt-16 mb-10 text-center p-5 w-4/5 m-auto rounded-lg" style="box-shadow: 6px 20px 10px black; background: #F2F2F2;">
            <h3 class="text-green-700">Bookiverso</h3>
            <h1 class="text-3xl p-1 translatable" data-key="data_key_5">Descarga Instantánea de eBooks Gratuitos</h1>
            <p class="w-4/5 m-auto translatable" data-key="data_key_6">Accede a una amplia variedad de géneros y temas sin costo alguno. Sumérgete en historias fascinantes y amplía tus horizontes literarios hoy mismo.</p>
        </section>
    </div>

    <!---------- SERVICIOS ---------->
    <section class="mb-10 relative p-5">
        <div style="background-image: url('/build/img/fondo-desplegable.jpg'); position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; opacity: 0.4;"></div>

        <div class="relative">
            <h2 class="text-center text-4xl font-bold p-3 oblique text-white translatable" style="transform: skewX(-10deg);" data-key="data_key_7">¿Qué categoría te interesa?</h2>

            <div class="flex justify-center items-center flex-wrap lg:justify-around"> 
                <?php foreach($categorias as $datosCategoria){ ?>
                    <a href="libros/<?php
                                        switch ($datosCategoria['id_categoria']) {
                                            case 1:
                                                echo 'Romance';
                                                break;
                                            case 2:
                                                echo 'Fantasia';
                                                break;
                                            case 3:
                                                echo 'Terror';
                                                break;
                                            case 4:
                                                echo 'Ficcion';
                                                break;
                                            case 5:
                                                echo 'Comics';
                                                break;
                                            default:
                                                break;
                                        }
                                    ?>" style="background: #73C6B6" class="categoria m-4 rounded-lg flex flex-col items-center w-48 sm:w-56 md:w-64">
                        <div class="w-1/2 p-4">
                            <img src="/build/img/<?php echo $datosCategoria['icono_categoria'] ?>" alt="SVG" class="mx-auto"/> 
                        </div>
                        <div>
                            <p class="text-center font-bold text-xl"><?php echo $datosCategoria['nombre_categoria']; ?></p>
                        </div>
                    </a>
                <?php } ?>
            </div>
        </div>
    </section>

    <!---------- BUSCADOR ---------->
	<section class="mt-28 mb-28" style="background: #F2F2F2;">
        <img src="/build/img/onda-buscador.svg" alt="SVG" id="onda-superior" style="transform: rotate(180deg);"/>

        <h2 class="w-4/5 m-auto text-center text-4xl font-bold p-3 oblique translatable" style="transform: skewX(-10deg);" data-key="data_key_7">¿Qué libro quieres?</h2>

        <div class="w-full md:w-3/4 lg:w-1/2 xl:w-1/3 mx-auto">
			<form class="p-5">
				<div class="flex flex-col md:flex-row items-center justify-center md:justify-between p-6 space-y-4 md:space-y-0 md:space-x-6 rounded-xl shadow-lg hover:shadow-xl" style="background: #73C6B6">
					<div class="flex bg-gray-100 p-4 w-full space-x-4 rounded-lg">
						<input type="text" name="nombre_libro" id="nombre_libro" class="w-full bg-gray-100 outline-none" placeholder="Nombre libro" />
					</div>
					<input type="button" id="buscador" name="buscador" style="background: rgb(5, 0, 95); opacity: 0.8;" class="py-3 px-5 text-white rounded-lg md:w-auto" value="🔎">
				</div>
			</form>
		</div>

        <div class="w-4/6 m-auto">
            <div class="resultado_buscador rounded overflow-hidden flex flex-wrap justify-center"></div>
        </div>

        <img src="/build/img/onda-buscador.svg" alt="SVG" id="onda-superior"/>
    </section>

    <!---------- INFORMACION ---------->
    <section class="mt-16 mb-16" style="position: relative;">
        <div style="background-image: url('/build/img/fondo-desplegable.jpg'); position: absolute; top: 0; left: 0; width: 100%; height: 100%; background-size: cover; background-repeat: no-repeat; background-attachment: fixed; opacity: 0.4;"></div>
        <img src="/build/img/main.svg" alt="SVG" style="transform: rotate(180deg);"/>

        <div class="contenedor flex flex-col md:flex-row items-end" style="position: relative;">
            <div class="w-full md:w-1/2 order-2 md:order-1">
                <img src="/build/img/pensando.png" class="m-auto w-full md:w-auto" style="height: 650px" alt="Imagen Pensando"/>
            </div>           
            
            <div class="w-3/4 md:w-1/2 md:pb-36 md:pr-5 text-center sm:order-1 md:order-2 m-auto">
                <h1 class="text-4xl pt-2 text-white font-bold translatable" data-key="data_key_9">¿Sabías que...?</h1>
                <h3 class="text-2xl p-2 text-white translatable" data-key="data_key_10">Los libros de ...</h3>
                <?php foreach($categorias as $datosCategoria){ ?>
                    <div class="dropdown inline-block relative w-full sm:w-3/4 p-3 text-center">
                        <button class="categoria text-white font-semibold text-xl relative w-full rounded-xl p-3 sm:p-4" style="background: #73C6B6">
                            <span><?php echo $datosCategoria['nombre_categoria'] ?></span>
                        </button>

                        <div class="dropdown-content bg-white rounded-xl absolute hidden z-10 p-3">
                            <p class="block text-xl"><?php echo $datosCategoria['descripcion_categoria'] ?></p>
                        </div>
                    </div>  
                <?php } ?>            
            </div>
        </div>

        <img src="/build/img/main.svg" alt="SVG" style="position: absolute; bottom: 0; left: 0; width: 100%; height: auto; z-index: 1;"/>
    </section>

    <!---------- NOVEDADES ---------->
    <section class="mt-16 mb-16">
        <div style="background: #F2F2F2;">
            <img src="/build/img/onda-novedades.svg" alt="SVG" id="onda-superior"/>

            <h1 class="text-center font-bold text-lg md:text-2xl lg:text-4xl p-2 md:p-4 l mt-5 translatable" data-key="data_key_11">NOVEDADES</h1>

            <div class="flex flex-col-reverse md:flex-row items-center text-center pt-10">
                <div class="relative w-full glide-01">
                    <div class="overflow-hidden" data-glide-el="track">
                        <ul class="ul-novedades relative w-full overflow-hidden p-0 whitespace-no-wrap flex flex-no-wrap [backface-visibility: hidden] [transform-style: preserve-3d] [touch-action: pan-Y] [will-change: transform]">
                        <?php 
                            foreach($libros as $datos){
                                foreach($datos as $datosLibros){
                            ?>
                                    <li>
                                        <a href="libros/<?php
                                                switch ($datosLibros['id_categoria']) {
                                                    case 1:
                                                        echo 'Romance';
                                                        break;
                                                    case 2:
                                                        echo 'Fantasia';
                                                        break;
                                                    case 3:
                                                        echo 'Terror';
                                                        break;
                                                    case 4:
                                                        echo 'Ficcion';
                                                        break;
                                                    case 5:
                                                        echo 'Comics';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            ?>">
                                            <img src="/build/img/libros/<?php
                                                switch ($datosLibros['id_categoria']) {
                                                    case 1:
                                                        echo 'romance';
                                                        break;
                                                    case 2:
                                                        echo 'fantasia';
                                                        break;
                                                    case 3:
                                                        echo 'terror';
                                                        break;
                                                    case 4:
                                                        echo 'ficcion';
                                                        break;
                                                    case 5:
                                                        echo 'comics';
                                                        break;
                                                    default:
                                                        break;
                                                }
                                            ?>/<?= $datosLibros['foto_libro'] ?>" alt="<?= $datosLibros['nombre_libro'] ?>" class="w-full max-w-full h-96 m-auto p-2 img-libros" />
                                        </a>
                                    </li>
                            <?php 
                                } 
                            } 
                            ?>

                        </ul>
                    </div>

                    <!-- Controls -->
                    <div class="flex items-center justify-center w-full gap-2 p-4" data-glide-el="controls">
                        <button style="background: #73C6B6;" class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full lg:w-12 lg:h-12 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir="<" aria-label="prev slide">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-5 h-5">
                                <title>prev slide</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 15.75L3 12m0 0l3.75-3.75M3 12h18" />
                            </svg>
                        </button>
                        <button style="background: #73C6B6;" class="inline-flex items-center justify-center w-8 h-8 transition duration-300 border rounded-full lg:w-12 lg:h-12 text-slate-700 border-slate-700 hover:text-slate-900 hover:border-slate-900 focus-visible:outline-none bg-white/20" data-glide-dir=">" aria-label="next slide">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" class="w-5 h-5">
                                <title>next slide</title>
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 8.25L21 12m0 0l-3.75 3.75M21 12H3" />
                            </svg>
                        </button>
                    </div>
                </div>

            </div>	

            <img src="/build/img/onda-novedades.svg" alt="SVG" id="onda-superior" style="transform: rotate(180deg)"/>
        </div>
    </section>
</main>

<?php 
    $inicio = true;
    $inicio2 = true;
?>