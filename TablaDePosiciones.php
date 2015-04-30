<?php
 session_start();
    include('conexion.php');
    /// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones
$equiposquehanjugado = mysql_query("SELECT id_equipo,nombre_equipo,puntos
FROM u197933013_copa.tb_equipos, u197933013_copa.tb_partidos 
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
 FROM  u197933013_copa.tb_partidos WHERE tb_partidos.Estado='2'
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
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>
<div data-role="page" id="pagina2">    <!-- PAGINA PRINCIPAL 2 POSICIONES -->
    <div data-role="panel" id="panel3" style="background-color: black;" > 
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
     <a href="#panel3" style="
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
$variable2=(($matriz[$i]['6']*2)+$matriz[$i]['7']);  // puntos

$variable3=$matriz[$i]['8'];  // partidos jugados
$variable4=$matriz[$i]['6'];  // partidos ganados
$variable5=$matriz[$i]['7'];  // empates
$variable6=$matriz[$i]['5'];  // partidos perdidos
$variable7=$matriz[$i]['3'];  // goles a favor
$variable8=$matriz[$i]['4'];  // goles en contra
$variable9=$matriz[$i]['9'];  // diferencia de Gol

mysql_query("INSERT INTO `u197933013_copa`.`te_posiciones`(`equipo`, `puntos`, `pj`, `pg`, `pe`, `pp`, `gf`, `gc`, `dg`)
  VALUES ('$variable1','$variable2','$variable3','$variable4','$variable5','$variable6','$variable7','$variable8','$variable9');")or die(mysql_error());
}

$queryimprimir=mysql_query("SELECT * FROM te_posiciones order by  puntos desc, pg desc,dg desc,gf desc")or die(mysql_error());
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
<script>
$(document).on("pagecreate","#pagina2",function(){
  $("#pagina2").on("swiperight",function(){
     location.href='index.php';
});

   $("#pagina2").on("swipeleft",function(){
     location.href='TablaDeGoleadores.php';
}); 

});
</script>