<?php
 session_start();
    include('conexion.php');
 $id = $_GET['id'];
    ?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>




<body>
<div data-role="page" id="pagina7">  <!-- PAGINA PRINCIPAL 7 GOLEADORES -->
 <div data-role="header">
     <a href="index.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">
            <?php 
$nombredequipo = mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$id"));
echo $nombredequipo['nombre_equipo'];
      ?>
    </h1>
  <div id="iconos" style="height: 8%;">
      <center> 
      <span><a href="Miequipos.php?id=<?php echo $id ?>"><img style=" margin-right: 8%;margin-left: 5%;" src="images/icons-png/calendario.png"></a></span>
      <span><a href="AmonestacionesDeEquipos.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/amonestaciones.png"></a></span>
       <span><a href="TablaAmonestacionesHistorico.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/icon-his.png"></a></span>
      <span><a href="TablaDeGoleadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="JugadoresDeEquipo.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/jugadores.png"></a></span>
      <span><a href="TablaDeAsistencia.php?id=<?php echo $id ?>"  ><img style="margin-right: 5%;" src="images/icons-png/asistencia.png"></a></span>
      </center>
    </div>
  </div>

  <div data-role="main" class="ui-content">
  <center><cite>Jugadores</cite></center>
<?php 
 $id = $_GET['id'];
$nom=mysql_query("select nombre_equipo from tb_equipos where id_equipo=$id");  //// para el nombre del jugador
    $fe=mysql_fetch_array($nom);  // para el nombre del jugador en amonestaciones

$nombreequipo=$fe['nombre_equipo'];
 ?>
<table data-role="table" width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="" >
<thead>
  <tr><th>Nombre</th>
    <th>Fecha De Nacimiento</th>
    <th>Color Carnet</th>
  </tr>
</thead>
<tbody>

<tr class="alt">
  <?php
   
         /// Para el nombre del jugador
    $nomju=mysql_query("SELECT * from tb_jugadores where equipo=$id ORDER BY fecha_nacimiento desc, nombre1 asc,apellido1 asc ");  //// para el nombre del jugador
    while($fe=mysql_fetch_array($nomju)){  // para el nombre del jugador en amonestaciones

  

        ?>

  <td> <?php  echo $fe['nombre1']." ".$fe['apellido1'] ; ?> </td>
  <td> <?php  echo $fe['fecha_nacimiento']; ?> </td>
  <td> <?php  
$tiempoahora=date_default_timezone_set('America/Bogota');
$horanow=date("Y-m-d");
$edadreal  =$horanow-$fe['fecha_nacimiento'];
if ($edadreal>=40) {
  ?>
 <img src="images/verde.png" whith="10px" heigth="10px" style="
    width: 15px;">
  <?php
}elseif ($edadreal<40 &&  $edadreal>=35 ) {
  ?>
  <img src="images/azul.png" whith="10px" heigth="10px" style="
    width: 15px;";
>
  <?php
}elseif ($edadreal<35 && $edadreal>=32) {
    ?>
  <img src="images/rojo.png" whith="10px" heigth="10px" style="
    width: 15px;"
>
  <?php
}elseif ($edadreal<32) {
    ?>
  <img src="images/amarillo.png" whith="10px" heigth="10px" style="
    width: 15px;"
>
  <?php
}
   ?> </td>
  </tr>
  <?php  
}
?>
</tbody>
</table>
  </div>

<!--
  <div data-role="footer">
    <h1>Todos los derechos reservado CAP 2015</h1> 
  </div>
 -->
</div>

</body>  

</html>