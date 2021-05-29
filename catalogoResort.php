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
        <li><a href="#sedanes">Seccion X</a></li>
        <li><a href="#hatchback">Seccion X</a></li>
        <li><a href="#coupes">Seccion X</a></li>
        <li><a href="productos.html">Productos</a></li>
        <li><a href="contactoResort.html">Contacto</a></li>
      </ul>
    </nav>
</header>
<div class="swiper-container slideshow1">
    <div class="swiper-wrapper wrapper1">
      <?php
        include ('ControladorBD.php');
        $Con = Conectar();
        $SQL = "SELECT I.ruta,P.clave FROM paquetes P, paquetes_img I WHERE P.tipo = 1 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
        $Resultado = Consultar($Con,$SQL);
        //Procesar resultados

        $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.

        for($F=0;$F<$n;$F++)
        {
          $Fila = mysqli_fetch_row($Resultado);// Obt el num de filas de  un vect
          print("<div class='swiper-slide slide1' style='background-image:url(paquetes_img/".$Fila[0].")'><h3>".$Fila[1]."</h3><div class='sb-description'>
                  <h3>Yokoi Kenji</h3>
                  <p>Yokoi Kenji es un conferencista colombiano-japonés que se hizo famoso con un video subido a YouTube titulado Mitos y verdades sobre Colombia y Japón. Comenzó su actividad pública en 2010, dictando conferencias en la localidad de Ciudad Bolívar en Bogotá.</p>
                </div></div>");
        };
        
        Cerrar($Con);
      ?>
    </div>
    <!-- Add Pagination -->
    <div class="swiper-pagination"></div>
</div>
  <div class="swiper-container slideshow2">
    <div class="swiper-wrapper wrapper2">
     <?php
     
        $Con = Conectar();
        $SQL = "SELECT I.ruta,P.descripcion,P.destino,P.salida,P.precio FROM paquetes P, paquetes_img I WHERE P.tipo = 2 AND P.clave = I.clave  AND I.id_paqueteIMG = P.id_paquete  AND P.disponibilidad >= 1 AND  P.status = 1; ";
        $Resultado = Consultar($Con,$SQL);
        //Procesar resultados

        $n = mysqli_num_rows($Resultado); //Obten el numero de filas de  una relac.

        for($F=0;$F<$n;$F++)
        {
          $Fila = mysqli_fetch_row($Resultado);// Obt el num de filas de  un vect
          print("<div class='swiper-slide slide2'><img src='paquetes_img/".$Fila[0]."'><h3>".$Fila[1]."</h3><h1>".$Fila[2]." Saliendo de ".$Fila[3]."</h1><h5>Precio por persona</h5><h4>MXN$</h4><h2>".$Fila[4]."</h2><br><form class='addCont'method='POST' action='cliente.php'>
          <input type='hidden'name='idDato' value='12345' required>
          <input class='verMas' type='submit' value='Ver mas'>
        </form></div>");
        };
        
        Cerrar($Con);
      ?>
    </div>
    <div class="swiper-scrollbar"></div>
  </div>
<footer id="contacto"  class="about" id="servicio">
        </div>
        <div class="partFooter">
            <img src="img/logosaludB.png" alt="">
        </div>
        <div class="partFooter">
            <h4>Divulga más Salud</h4>
            <a href="login.html">Salir</a>
        </div>
        <div class="partFooter">
            <h4>Acerca de</h4>
            <a href="autor.html">Lira</a>
        </div>
        <div class="partFooter">
            <h4>Redes sociales</h4>
            <div class="social-media">
                    <a href="https://www.facebook.com/profile.php?id=100006210047550">f</a>
            </div>
        </div>

    </footer>

  <script src="js/swiper.min.js"></script>
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
      spaceBetween: 50,
      shadow: true,
      scrollbar: {
        el: '.swiper-scrollbar',
        hide: true,
      },
    });
  </script>
</body>
</html>