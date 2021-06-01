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
          <li><a href="index.php">Inicio</a></li>
          <li><a href="ventasResort2.php">Reservaciones</a></li>
          <li><a href="loginClientes.html">Mis Viajes</a></li>
          <li><a href="contactoResort.html">Contacto</a></li>
          <li><a href="about.html">Nosotros</a></li>
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

          $n = mysqli_num_rows($Resultado); 
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
          };
          Cerrar($Con);

        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
    <hr>
    <h1 id="titlemain">Viajes</h1>
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
  <footer id="contacto">
      <div class="partFooter">
        <img src="img/logo.png" alt="">
      </div>
      <div class="partFooter">
        <h4>Hotel & Resort</h4>
        <a href="index.php">Inicio</a>
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