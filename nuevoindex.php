<?php
 session_start();
    include('conexion.php');
    /// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones

$equiposquehanjugado = mysql_query("SELECT id_equipo,nombre_equipo,puntos
FROM copaamistad.tb_equipos, copaamistad.tb_partidos 
WHERE tb_equipos.id_equipo = tb_partidos.equipo1
OR tb_equipos.id_equipo = tb_partidos.equipo2
 AND  tb_partidos.Estado='2'
GROUP BY id_equipo");




// se realiza la busqueda equipo por equipo con el fin de que se guarden los datos en una matrix , esto ayudara a organizar la informacion
// se calcula el numero de equipos que han jugado hasta ahora con una nueva variable que define el numero de columnas creadas (numero de equipos que ha jugado)
$numerodeequiposparaeltamañodelamatriz=mysql_num_rows($equiposquehanjugado);

$matriz[$numerodeequiposparaeltamañodelamatriz]['10']=0;
$i=0;
while($identificaciones=mysql_fetch_array($equiposquehanjugado)){   
$matriz[$i]['3']=0;  // GOLES A FAVOR
$matriz[$i]['4']=0; // GOLES CONTRA
$matriz[$i]['5']=0;  // PARTIDOS PERDIOS
$matriz[$i]['6']=0;  // PARTIDOS GANADOS
$matriz[$i]['7']=0; // EMPATES


 $matriz[$i]['0'] =$identificaciones['id_equipo'];
 $matriz[$i]['1'] =$identificaciones['nombre_equipo'];
 $matriz[$i]['2'] =$identificaciones['puntos']; 



// // saber en que lugar esta si en el equipo1 o equipo2 para tomar los valores de los goles 
 $lugardentrodelospartidos=mysql_query("SELECT  distinct equipo1,equipo2,resultado1,resultado2
 FROM  copaamistad.tb_partidos WHERE tb_partidos.Estado='2'
 ");

while ($equipoparticipante=mysql_fetch_array($lugardentrodelospartidos)) { 
  if ($equipoparticipante['equipo1']==$identificaciones['id_equipo'] || $equipoparticipante['equipo2']==$identificaciones['id_equipo'] ) {

  
  // se incluira el codigo para saber que partidos se han ganado perdido o empatado por el respectivo equipo
// ifs para definir el ganador perdedor o empate
if ($equipoparticipante['equipo1']==$identificaciones['id_equipo']) {

if ($equipoparticipante['resultado1']==$equipoparticipante['resultado2']) {
  // EMPATE
$matriz[$i]['7']=$matriz[$i]['7']+1;
}

if ($equipoparticipante['resultado1']>$equipoparticipante['resultado2']) {
  // GANA EQUIPO 1
  $matriz[$i]['6']=$matriz[$i]['6']+1;
}

if($equipoparticipante['resultado1']<$equipoparticipante['resultado2']){
  // GANA EQUIPO 2
  $matriz[$i]['5']=$matriz[$i]['5']+1;
}
}    ///---------------> PARA EQUIPO 1 ARRIBA


if ($equipoparticipante['equipo2']==$identificaciones['id_equipo']) {

if ($equipoparticipante['resultado1']==$equipoparticipante['resultado2']) {
  // EMPATE
$matriz[$i]['7']=$matriz[$i]['7']+1;
}

if ($equipoparticipante['resultado1']>$equipoparticipante['resultado2']) {
  // GANA EQUIPO 1
  $matriz[$i]['5']=$matriz[$i]['5']+1;
}

if($equipoparticipante['resultado1']<$equipoparticipante['resultado2']){
  // GANA EQUIPO 2
  $matriz[$i]['6']=$matriz[$i]['6']+1;
}
}//-------------------> PARA EQUIPO 2 CUANDO GPE ARRIBA

// --->>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>>AQUI TERMINA CODIGO PARTIDOS GPE


    if($equipoparticipante['equipo1']==$identificaciones['id_equipo']){
      $Golesafavor =  $equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
      $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
      $Golescontra =  $equipoparticipante['resultado2'];
      $matriz[$i]['4']=$matriz[$i]['4']+$Golescontra;

    }else{
  $Golesacontra =$equipoparticipante['resultado1'];
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
      $matriz[$i]['4']=$matriz[$i]['4']+$Golesacontra;
// guardamos los datos en la matriz y sumamos los goles que deban ser sumados
      $Golesafavor =  $equipoparticipante['resultado2'];
      $matriz[$i]['3']=$matriz[$i]['3']+$Golesafavor;

    }
  }
}
$i++;
  
}
?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="css/themes/nuevarevolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>

<body style="font-family: Century Gothic;">
<div data-role="page" id="pagina1">    <!-- PAGINA PRINCIPAL 1 -->
  <div data-role="panel" id="panel4" style="background-color: black;" > 
    <p style="font-family: Century Gothic;">
  <a style="text-decoration: initial;
color: white;
font-weight: 400; font-size:smaller;" href="Amonestaciones.php" style="text-decoration: initial;
color: white;
font-weight: 400;" data-icon="alert" data-transition="Flip">Amonestaciones</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;"  href="Noticias1.php" data-icon="info"  data-transition="Flip">Noticias</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/JugadoresxEquipo.php" data-icon="bars" data-transition="Flip">Jugadores por Equipo</a>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/AmonestacionesAntiguas.php" data-icon="info"  data-transition="Flip">Amonestaciones Antiguas</a>
    </p>
  </div>

  <div data-role="header">
      <a href="#panel4" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/panel.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
    <div id="iconos" style="height: 8%;">
      <center> 
<span><a href="#pagina1"><img style="
    margin-right: 8%;
    margin-left: 15%;
" src="images/icons-png/calendario.png"></a></span>
      <span><a href="#pagina2"  ><img style="
    margin-right: 8%;
" src="images/icons-png/posiciones.png"></a></span>
      <span><a href="#pagina3"  ><img style="
    margin-right: 8%;

" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="#pagina4"  ><img style="
    margin-right: 8%;

" src="images/icons-png/miequipo.png"></a></span>
      </center>
    </div>
  </div>

  <div data-role="main" class="ui-content">
    <p>Calendario y Resultados</p>
    
  </div>
<!--
  <div data-role="footer">
    <h1>Todos los derechos reservado CAP 2015</h1> 
  </div>
 -->



</div>
<div data-role="page" id="pagina2">    <!-- PAGINA PRINCIPAL 2 POSICIONES -->
  <div data-role="panel" id="panel4" style="background-color: black;" > 
    <p style="font-family: Century Gothic;">
  <a style="text-decoration: initial;
color: white;
font-weight: 400; font-size:smaller;" href="Amonestaciones.php" style="text-decoration: initial;
color: white;
font-weight: 400;" data-icon="alert" data-transition="Flip">Amonestaciones</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;"  href="Noticias1.php" data-icon="info"  data-transition="Flip">Noticias</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/JugadoresxEquipo.php" data-icon="bars" data-transition="Flip">Jugadores por Equipo</a>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/AmonestacionesAntiguas.php" data-icon="info"  data-transition="Flip">Amonestaciones Antiguas</a>
    </p>
  </div>
 <div data-role="header" style="30px">
      <a href="#panel4" ><img src="images/icons-png/panel.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
    <div id="iconos" style="height: 8%;">
      <center> 
<span><a href="#pagina1"><img style="
    margin-right: 8%;
    margin-left: 15%;
" src="images/icons-png/calendario.png"></a></span>
      <span><a href="#pagina2"  ><img style="
    margin-right: 8%;
" src="images/icons-png/posiciones.png"></a></span>
      <span><a href="#pagina3"  ><img style="
    margin-right: 8%;

" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="#pagina4"  ><img style="
    margin-right: 8%;

" src="images/icons-png/miequipo.png"></a></span>
      </center>
    </div>
  </div>

  <div data-role="main" class="ui-content">
    <table style="font-size: small;" data-role="table" id="table-custom-2" data-mode="columntoggle" class="ui-body-d ui-shadow table-stripe ui-responsive t" 
data-column-btn-text="+" >

    <thead>
           <tr class="ui-bar-d">
             <th style="font-weight: bold;" >  </th>
             <th >Equipo</th>
             <th >Puntos</th>
             <th >PJ</th>
             <th >PG</th>
             <th data-priority="1">PE</th>
             <th data-priority="3">PP</th>
             <th data-priority="4">GF</th>
             <th data-priority="5">GC</th>
             <th >GD</th>
           </tr>
         </thead>
<tbody>
<tr >
  <?php  

  // Ordenar matriz
$eliminaciondeinfoanterio=mysql_query("DELETE FROM te_posiciones");

for ($i=0; $i <$numerodeequiposparaeltamañodelamatriz ; $i++) {
  $matriz[$i]['8']=$matriz[$i]['6']+$matriz[$i]['7']+$matriz[$i]['5'];
$matriz[$i]['9']=$matriz[$i]['3']-$matriz[$i]['4'];
$matriz[$i]['10']=$i+1;

$variable1=$matriz[$i]['1'];  // nombre equipo
$variable2=$matriz[$i]['2'];  // puntos

$variable3=$matriz[$i]['8'];  // partidos jugados
$variable4=$matriz[$i]['6'];  // partidos ganados
$variable5=$matriz[$i]['7'];  // empates
$variable6=$matriz[$i]['5'];  // partidos perdidos
$variable7=$matriz[$i]['3'];  // goles a favor
$variable8=$matriz[$i]['4'];  // goles en contra
$variable9=$matriz[$i]['9'];  // diferencia de Gol

mysql_query("INSERT INTO `copaamistad`.`te_posiciones`(`equipo`, `puntos`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dg`)
  VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$variable6','$variable7','$variable8','$variable9');")or die(mysql_error());
}

$queryimprimir=mysql_query("SELECT * FROM te_posiciones order by  puntos desc, pg desc,dg desc")or die(mysql_error());
$contador=1;
while ($datos=mysql_fetch_array($queryimprimir)) {7
  ?>

  <td>  <?php echo $contador; ?> </td>
  <td>  <?php echo $datos['equipo']; ?> </td>
  <td>  <?php echo $datos['puntos']; ?> </td>
  <td>  <?php echo $datos['pj']; ?> </td>
  <td>  <?php echo $datos['pg']; ?> </td>
  <td>  <?php echo $datos['pe']; ?> </td>
  <td>  <?php echo $datos['pp']; ?> </td>
  <td>  <?php echo $datos['gf']; ?> </td>
  <td>  <?php echo $datos['gc']; ?> </td>
  <td>  <?php echo $datos['dg']; ?> </td>

   </td>
</tr>

  <?php
$contador=$contador+1;
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



<div data-role="page" id="pagina3">  <!-- PAGINA PRINCIPAL 3 GOLEADORES -->
   <div data-role="panel" id="panel4" style="background-color: black;" > 
    <p style="font-family: Century Gothic;">
  <a style="text-decoration: initial;
color: white;
font-weight: 400; font-size:smaller;" href="Amonestaciones.php" style="text-decoration: initial;
color: white;
font-weight: 400;" data-icon="alert" data-transition="Flip">Amonestaciones</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;"  href="Noticias1.php" data-icon="info"  data-transition="Flip">Noticias</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/JugadoresxEquipo.php" data-icon="bars" data-transition="Flip">Jugadores por Equipo</a>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/AmonestacionesAntiguas.php" data-icon="info"  data-transition="Flip">Amonestaciones Antiguas</a>
    </p>
  </div>
 <div data-role="header" style="30px">
      <a href="#panel4" ><img src="images/icons-png/panel.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
  <div id="iconos" style="height: 8%;">
      <center> 
<span><a href="#pagina1"><img style="
    margin-right: 8%;
    margin-left: 15%;
" src="images/icons-png/calendario.png"></a></span>
      <span><a href="#pagina2"  ><img style="
    margin-right: 8%;
" src="images/icons-png/posiciones.png"></a></span>
      <span><a href="#pagina3"  ><img style="
    margin-right: 8%;

" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="#pagina4"  ><img style="
    margin-right: 8%;

" src="images/icons-png/miequipo.png"></a></span>
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
             <th style="width: 33%;" >Goles</th>
           </tr>
</thead>
<tbody>

<?php
$goleadores1=mysql_query("SELECT jugador,SUM(goles) AS goles1 from tr_jugadoresxpartido WHERE goles!=0 GROUP BY jugador order by goles1 desc")or die(mysql_error());
    while ($numerodegoles=mysql_fetch_array($goleadores1)) {
      $jugador=$numerodegoles['jugador'];
      $nombrej=mysql_fetch_array(mysql_query("SELECT nombre1,apellido1,equipo FROM tb_jugadores WHERE id_jugadores=$jugador "));
     $nueva=$nombrej['equipo'];
$nombree=mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$nueva"));

    ?>
<tr  width="100%">
<td style="width: 33%;"> <?php echo $nombree['nombre_equipo'];  ?>  </td>
  <td style="width: 33%;"> <?php echo $nombrej['nombre1']." ".$nombrej['apellido1']   ; ?></td>
  <td style="width: 33%;"> <?php echo $numerodegoles['goles1']; ?> </td>
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



<div data-role="page" id="pagina4">    <!-- PAGINA PRINCIPAL 4 MI EQUIPO-->
  <div data-role="panel" id="panel4" style="background-color: black;" > 
    <p style="font-family: Century Gothic;">
  <a style="text-decoration: initial;
color: white;
font-weight: 400; font-size:smaller;" href="Amonestaciones.php" style="text-decoration: initial;
color: white;
font-weight: 400;" data-icon="alert" data-transition="Flip">Amonestaciones</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;"  href="Noticias1.php" data-icon="info"  data-transition="Flip">Noticias</a>
<br>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/JugadoresxEquipo.php" data-icon="bars" data-transition="Flip">Jugadores por Equipo</a>
  <a style="text-decoration: initial;
color: white;
font-weight: 400;font-size:smaller;" href="OtrasConsultas/AmonestacionesAntiguas.php" data-icon="info"  data-transition="Flip">Amonestaciones Antiguas</a>
    </p>
  </div>
  <div data-role="header" style="30px">
      <a href="#panel4" ><img src="images/icons-png/panel.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
    <div id="iconos" style="height: 8%;">
      <center> 
<span><a href="#pagina1"><img style="
    margin-right: 8%;
    margin-left: 15%;
" src="images/icons-png/calendario.png"></a></span>
      <span><a href="#pagina2"  ><img style="
    margin-right: 8%;
" src="images/icons-png/posiciones.png"></a></span>
      <span><a href="#pagina3"  ><img style="
    margin-right: 8%;

" src="images/icons-png/goleadores.png"></a></span>
      <span><a href="#pagina4"  ><img style="
    margin-right: 8%;

" src="images/icons-png/miequipo.png"></a></span>
      </center>
    </div>
  </div>

  <div data-role="main" class="ui-content">
    <p>Mi Equipo</p>
   
  </div>

<!--  <div data-role="footer"> 
    <h1>Footer Text</h1>
  </div>-->
</div> 
</body>

</html>