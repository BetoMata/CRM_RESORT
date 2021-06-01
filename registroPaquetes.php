<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Registro de Paquetes</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="fonts/style.css">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
  </head>
  <body>
    <header>
        <section class="barra">
          <div class="titulo">
            <h1>Administrador</h1>
          </div>
          <div class="logo">
            <img src="img/logo.png" alt="">
          </div>
        </section>
    </header>
    <aside id="sidebar">
          <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="ventasResort2.php">Reservaciones</a></li>
            <li><a href="loginClientes.html">Mis Viajes</a></li>
            <li><a href="contactoResort.html">Contacto</a></li>
            <li><a href="about.html">Nosotros</a></li>
          </ul>
    </aside>
    <section id="container">
      <div class="top-cont">
        <h2>Registro de Paquetes</h2>
      </div>
      <div class="content">
        <h2>Paquete</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <label>Clave</label><br>
          <input type="text" placeholder="Ejemplo: DESTINOA-2020MAY03" name="CLAVE" maxlength="70"class="inputL" required><br>
          <label>Salida</label><br>
          <input type="text" placeholder="Ejemplo: Guerrero BC." name="SALIDA" maxlength="250" class="inputL" required><br>
          <label>Destino</label><br>
          <input type="text" placeholder="Ejemplo: Ensenada BC." name="DESTINO" maxlength="250" class="inputL" required><br>
          <label>Descripción</label><br>
          <input type="text" placeholder="Ejemplo: HOTEL + VUELO" name="DESCRIPCION" maxlength="250" class="inputL" required><br>
          <label>Seleccione archivo:</label><br>
          <input type="file"  name="fichero" maxlength="150" class="inputL" required><br>
          <label>Paquete</label><br>
          <input type="text" placeholder="Ejemplo: A" maxlength="1"name="PAQUETE" class="inputCh" required><br>
          <label>Precio</label><br>
          <input type="number" maxlength="9" name="PRECIO" class="inputCh" required><br>
          <label>Días</label><br>
          <input type="number"  name="DIAS" min="1" max="999" maxlength="3" required><br>
          <label>Disponibilidad</label><br>
          <input type="number" name="VACANTES" min="0" max="999" maxlength="3" class="inputCh" required><br>
          <label>Status</label><br>
          <input type="number" name="STATUS" min="0" max="1" maxlength="1" class="inputCh" required><br>
          <label>Tipo</label><br>
          <input type="number" name="TIPO" min="1" max="3" maxlength="1" class="inputCh" required><br>
          <label>Fecha de Salida</label><br>
          <input type="date" placeholder="Ejemplo: Ensenada" name="DATE" class="inputL" required><br>
          <input type="submit" name="submit" value="Guardar" class="btnEnviar">
        </form>
      </div>
      <div class="registrosProducto">
        <?php
          include 'ControladorBD.php';
          if (isset($_POST['submit'])) {   
            if(is_uploaded_file($_FILES['fichero']['tmp_name'])) { 
              // creamos las variables para subir a la db
              $ruta = "paquetes_img/"; 
              $nombrefinal= trim ($_FILES['fichero']['name']); //Eliminamos los espacios en blanco
              $upload= $ruta . $nombrefinal;
              if(move_uploaded_file($_FILES['fichero']['tmp_name'], $upload)) { //movemos el archivo a su ubicacion 
                echo "<br><hr><br>";
                echo "<b>Paquete:</b><br>";  
                echo "Imagen: <i><a href=\"".$ruta . $nombrefinal."\">".$_FILES['fichero']['name']."</a></i><br>";  
                echo "Tipo de imagen: <i>".$_FILES['fichero']['type']."</i><br>";  
                echo "Tamaño de imagen: <i>".$_FILES['fichero']['size']." bytes</i><br>";  
                echo "<br><hr><br>";  
                                        
                $CLAVE  = $_POST["CLAVE"];
                $SALIDA  = $_POST["SALIDA"];
                $DESTINO  = $_POST["DESTINO"];
                $DESCRIPCION  = $_POST["DESCRIPCION"];
                $PAQUETE  = $_POST["PAQUETE"];
                $PRECIO  = $_POST["PRECIO"];
                $DIAS  = $_POST["DIAS"];
                $VACANTES  = $_POST["VACANTES"];
                $STATUS  = $_POST["STATUS"];
                $TIPO  = $_POST["TIPO"]; 
                $DATE  = $_POST["DATE"]; 

                $Con = conectar();

                $query = "INSERT INTO paquetes_img  VALUES (default,'$CLAVE','".$nombrefinal."','".$_FILES['fichero']['type']."','".$_FILES['fichero']['size']."')";
                
                $Cons = consultar($Con,$query); 
                Print($query);
                cerrar($Con); 

                $Con = conectar();

                $query2 = "INSERT INTO paquetes  VALUES (default,'$CLAVE','$SALIDA','$DESTINO','$DESCRIPCION','$PAQUETE','$PRECIO','$DIAS','$VACANTES','$STATUS','$TIPO','$DATE')";
                
                $Cons = consultar($Con,$query2); 
                Print($query2);
                cerrar($Con); 
                echo "El archivo '".$CLAVE."' se ha subido con éxito <br>";
                echo "<br><hr><br>";       
              }  
            }  
          } 
        ?> 
      </div>
    </section>
  </body>
</html>