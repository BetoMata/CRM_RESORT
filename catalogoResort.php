<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Catalogo</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
  <link rel="stylesheet" href="css/swiper.min.css">
  <link rel="stylesheet" href="css/estilos.css">

</head>
<body id="Catalogo">
  <a name="Inicio"></a>
  <header>
    <img src="img/logo.png">
    <nav class="menu">
        <ul>
          <li><a href="#svs">Inicio</a></li>
          <li><a href="#hatchback">Reservaciones</a></li>
          <li><a href="#coupes">Mis Viajes</a></li>
          <li><a href="contactoResort.html">Contacto</a></li>
          <li><a href="productos.html">Nosotros</a></li>
        </ul>
      </nav>
  </header>
  <div class="mainCatalogo">
    <!-- SLIDESHOW PRINCIPAL-->
    <div class="swiper-container slideshow1">
      <div class="swiper-wrapper wrapper1">
        <?php
          include ('ControladorBD.php');
          $Con = Conectar();
          $SQL = 
          "SELECT I.ruta,P.clave,P.destino,P.salida, P.id_paquete,P.descripcion,P.precio,P.vencimiento 
            FROM paquetes P, paquetes_img I 
            WHERE P.tipo = 1 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
          $Resultado = Consultar($Con,$SQL);
          //Procesar resultados

          $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.
          $Suma=0;
          for($F=0;$F<$n;$F++)
          {

            $Fila = mysqli_fetch_row($Resultado);// Obt el num de filas de  un vect

            setlocale(LC_TIME, 'spanish');
            $inicio = strftime("%d de %B del %Y", strtotime($Fila[7]));
            print("
              <div class='swiper-slide slide1' style='background-image:url(paquetes_img/".$Fila[0].")'>
                <div class='sb-description'>
                  <h1>Viaja a ".$Fila[2]." saliendo de ".$Fila[3]."</h1>
                  <p>Disfruta de unas fabulosas vacaciones por 3 dias en ".$Fila[2]." con gastos de ".$Fila[5]." incluidos. Disponible hasta el ".$inicio."</p><br>
                  <form class='addCont'method='POST' action='ventasResort.php'>
                    <input type='hidden'name='idVenta' value='".$Fila[4]."' required>
                    <input type='hidden'name='claveVenta' value='".$Fila[1]."' required>
                    <input class='verMas' type='submit' value='Ver mas'>
                  </form>
                </div>
              </div>");
            $Suma=$Suma+$Fila[6];
          };
          print("<input type='hidden' id='sum' value='$Suma'></input>");
          Cerrar($Con);

        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <hr>
    <h1>Viajes</h1>
    <hr>
    <!-- SLIDESHOW SECUNDARIO-->
    <div class="swiper-container slideshow2">
      <div class="swiper-wrapper wrapper2">
        <?php
         
            $Con = Conectar();
            $SQL = "SELECT I.ruta,P.descripcion,P.destino,P.salida,P.precio, P.id_paquete, P.clave 
            FROM paquetes P, paquetes_img I 
            WHERE P.tipo = 2 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
            $Resultado = Consultar($Con,$SQL);
            //Procesar resultados

            $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.

            for($F=0;$F<$n;$F++)
            {
              $Fila = mysqli_fetch_row($Resultado);// Obt el num de filas de  un vect
              print("
                <div class='swiper-slide slide2'>
                  <img src='paquetes_img/".$Fila[0]."'>
                  <h3>".$Fila[1].$Fila[5]."</h3>
                  <h1>Viaja a ".$Fila[2]." saliendo de ".$Fila[3]."</h1>
                  <h5>Precio por persona</h5>
                  <h4>MXN$</h4><h2>".$Fila[4]."</h2>
                  <form class='addCont'method='POST' action='ventasResort.php'>
                    <input type='hidden'name='idVenta' value='".$Fila[5]."' required>
                    <input type='hidden'name='claveVenta' value='".$Fila[6]."' required>
                    <input class='verMas' type='submit' value='Ver mas'>
                  </form>
                </div>");
            };
            
            Cerrar($Con);
        ?>
      </div>
      <div class="swiper-scrollbar"></div>
    </div>
  </div>
    <style>
        #chartdiv {
          width: 900px;
          height: 500px;
        }
        </style>
    <div id="chartdiv"></div>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var mes=parseInt(document.getElementById('sum').value);

var chart = am4core.create('chartdiv', am4charts.XYChart)
chart.colors.step = 2;

chart.legend = new am4charts.Legend()
chart.legend.position = 'top'
chart.legend.paddingBottom = 20
chart.legend.labels.template.maxWidth = 95

var xAxis = chart.xAxes.push(new am4charts.CategoryAxis())
xAxis.dataFields.category = 'category'
xAxis.renderer.cellStartLocation = 0.1
xAxis.renderer.cellEndLocation = 0.9
xAxis.renderer.grid.template.location = 0;

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.min = 0;

function createSeries(value, name) {
    var series = chart.series.push(new am4charts.ColumnSeries())
    series.dataFields.valueY = value
    series.dataFields.categoryX = 'category'
    series.name = name

    series.events.on("hidden", arrangeColumns);
    series.events.on("shown", arrangeColumns);

    var bullet = series.bullets.push(new am4charts.LabelBullet())
    bullet.interactionsEnabled = false
    bullet.dy = 30;
    bullet.label.text = '{valueY}'
    bullet.label.fill = am4core.color('#ffffff')

    return series;
}

chart.data = [
    {
        category: mes,
        first: 30,
        second: 55,
        third: 400
    },
    {
        category: 'Febrero',
        first: 30,
        second: 78,
        third: 69
    },
    {
        category: 'Marzo',
        first: 27,
        second: 40,
        third: 45
    },
    {
        category: 'Abril',
        first: 50,
        second: 33,
        third: 22
    }
]


createSeries('first', '2017');
createSeries('second', '2018');
createSeries('third', '2019');

function arrangeColumns() {

    var series = chart.series.getIndex(0);

    var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
    if (series.dataItems.length > 1) {
        var x0 = xAxis.getX(series.dataItems.getIndex(0), "categoryX");
        var x1 = xAxis.getX(series.dataItems.getIndex(1), "categoryX");
        var delta = ((x1 - x0) / chart.series.length) * w;
        if (am4core.isNumber(delta)) {
            var middle = chart.series.length / 2;

            var newIndex = 0;
            chart.series.each(function(series) {
                if (!series.isHidden && !series.isHiding) {
                    series.dummyData = newIndex;
                    newIndex++;
                }
                else {
                    series.dummyData = chart.series.indexOf(series);
                }
            })
            var visibleCount = newIndex;
            var newMiddle = visibleCount / 2;

            chart.series.each(function(series) {
                var trueIndex = chart.series.indexOf(series);
                var newIndex = series.dummyData;

                var dx = (newIndex - trueIndex + middle - newMiddle) * delta

                series.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
                series.bulletsContainer.animate({ property: "dx", to: dx }, series.interpolationDuration, series.interpolationEasing);
            })
        }
    }
}

}); // end am4core.ready()
</script>


  <footer id="contacto">
    <div class="partFooter">
      <img src="img/logo.png" alt="">
    </div>
    <div class="partFooter">
      <h4>Hotel & Resort</h4>
      <a href="login.html">Inicio</a>
    </div>
    <div class="partFooter">
      <h4>Acerca de</h4>
      <a href="about.html">Hotel & Resort</a>
    </div>
    <div class="partFooter">
        <h4>Redes sociales</h4>
        <div class="social-media">
            <a href="#">f</a>
        </div>
    </div>
  </footer>
  <script src="js/swiper.min.js"></script>
    <!-- SCRIPTS DE LOS SLIDESHOW-->
  <script>
    var swiper = new Swiper('.slideshow1', {
      effect: 'coverflow',
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: 'auto',
      shadow: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows : true,
        shadow: true,
      },
      pagination: {
        
        el: '.swiper-pagination',
        dynamicBullets: true,
      },
    });
    var swiper = new Swiper('.slideshow2', {
      slidesPerView: 3,
      spaceBetween: 30,
      shadow: true,
      scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
      },
    });
  </script>
</body>
</html>