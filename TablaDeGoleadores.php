<?php
 session_start();
    include('conexion.php');
    /// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones


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
<div data-role="page" id="pagina3">  <!-- PAGINA PRINCIPAL 3 GOLEADORES -->
 <div data-role="panel" id="panel2" style="background-color: black;" > 
    <p style="font-family: Century Gothic;">
      <h3 style="color: white;">Opciones Adicionales</h3>
  <div><a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
    margin-bottom: 10px;" 
   href="Noticias.php" data-icon="info-white"  data-transition="Flip">
   <img src="images/icons-png/info-white.png" style="margin-right: 10%;">Noticias
   <img src="images/icons-png/carat-r-white.png" style="margin-left: 50%;"></a></div>

    <h3 style="color: white;">Copa Amistad</h3>
    <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 9px;
    margin-bottom: 10px;" 
     href="Sugerencias.php" data-icon="info"  data-transition="Flip">
     <img src="images/icons-png/comment-white.png" style="margin-right: 9%;">
     Sugerencias<img src="images/icons-png/carat-r-white.png" style="margin-left: 39%;"></a>
    <br><br>
    <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
    margin-bottom: 10px;"
      href="Acercade.php" data-icon="info"  data-transition="Flip"><img src="images/icons-png/gear-white.png" style="margin-right: 10%;">
      Acerca de<img src="images/icons-png/carat-r-white.png" style="margin-left: 43%;"></a>
    </p>
  </div>
 <div data-role="header">
     <a href="#panel2" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/panel.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
  <div id="iconos" style="height: 8%;">
      <center> 
<span><a href="index.php"><img style="margin-right: 8%;margin-left: 15%;" src="images/icons-png/calendario.png"></a></span>
    <span><a href="TablaDePosiciones.php"  ><img style="margin-right: 8%;" src="images/icons-png/posiciones.png"></a></span>
    <span><a href="TablaDeGoleadores.php"  ><img style="margin-right: 8%;" src="images/icons-png/goleadores.png"></a></span>
    <span><a href="Miequipo.php"  ><img style="margin-right: 8%;" src="images/icons-png/miequipo.png"></a></span>
      </center>
    </div>
  </div>

  <div data-role="main" class="ui-content">
    <table width="100%" style="font-size: small; margin: auto;" data-role="table" id="table-custom-2" data-mode="columntoggle" 
class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="+" >

<thead>
  <tr class="ui-bar-d">
             <th style="width: 33%;">Equipo</th>
             <th style="width: 33%;" >Nombre</th>
             <th style="width: 17%;" >Goles</th>
             <th data-priority="2" style="width: 16%;" >Eficiencia</th>
           </tr>
</thead>
<tbody>

<?php
$goleadores1=mysql_query("SELECT jugador,SUM(goles) AS goles1 from tr_jugadoresxpartido WHERE goles>=1 GROUP BY jugador order by goles1 desc")or die(mysql_error());
    while ($numerodegoles=mysql_fetch_array($goleadores1)) {
      $jugador=$numerodegoles['jugador'];
      $nombrej=mysql_fetch_array(mysql_query("SELECT nombre1,apellido1,equipo FROM tb_jugadores WHERE id_jugadores=$jugador "));
     $nueva=$nombrej['equipo'];
$nombree=mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$nueva"));
$numerodepartidosasistidos=mysql_num_rows(mysql_query("SELECT jugador FROM tr_jugadoresxpartido WHERE jugador=$jugador"));
    ?>
<tr  width="100%">
<td style="width: 33%;"> <?php echo $nombree['nombre_equipo'];  ?>  </td>
  <td style="width: 33%;"> <?php echo $nombrej['nombre1']." ".$nombrej['apellido1']   ; ?></td>
  <td style="width: 33%;"> <?php echo $numerodegoles['goles1']; ?> </td>
  <td style="width: 33%;"> <?php echo round($numerodegoles['goles1']/$numerodepartidosasistidos,1); ?> </td>
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
<script>
$(document).on("pagecreate","#pagina3",function(){
  $("#pagina3").on("swiperight",function(){
     location.href='TablaDePosiciones.php';
  });                       
});
$(document).on("pagecreate","#pagina3",function(){
  $("#pagina3").on("swipeleft",function(){
    location.href='Miequipo.php';
  });                       
});
</script>