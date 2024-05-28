<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<body class="bg-gray-100">
    <div class="flex justify-center items-center h-screen bg-blue-900">
        <div class="w-5/6 md:w-4/6 lg:w-3/6">
            <h1 class="text-3xl text-center mb-4 text-white">Libros por Categoría</h1>
            <div id="top_x_div" class="bg-white p-4 shadow-lg rounded-lg"></div>
        </div>
    </div>

    <script>
        google.charts.load('current', {'packages':['bar']});
        google.charts.setOnLoadCallback(drawStuff);

        function drawStuff() {
            var categorias = <?php echo json_encode(array_column($categorias, 'nombre_categoria')); ?>;
            var librosCategorias = <?php echo json_encode($librosCategorias); ?>;

            var chartData = [];
            chartData.push(['Categorías', 'Número de Libros', { role: 'style' }]);

            for (var i = 0; i < categorias.length; i++) {
                var categoria = categorias[i];
                var cantidad = librosCategorias[i]?.num_libros || 0;
                var color = getRandomColor(); 
                chartData.push([categoria, cantidad, color]); 
            }

            var data = new google.visualization.arrayToDataTable(chartData);

            var options = {
                width: '100%',
                height: 600,
                legend: { position: 'none' },
                chart: {
                    title: '',
                    subtitle: ''
                },
                axes: {
                    x: {
                        0: { side: 'top', label: 'Número de libros' }
                    }
                },
                bars: 'horizontal', // Cambiar las barras a horizontal
                bar: { groupWidth: "90%" }
            };

            var chart = new google.charts.Bar(document.getElementById('top_x_div'));
            chart.draw(data, google.charts.Bar.convertOptions(options));
        }

        // Función para generar un color hexadecimal aleatorio
        function getRandomColor() {
            var letters = '0123456789ABCDEF';
            var color = '#';
            for (var i = 0; i < 6; i++) {
                color += letters[Math.floor(Math.random() * 16)];
            }
            return color;
        }
    </script>

