


<?php
session_start();
include('conexion.php');

//Consulta para mostrar las noticias existentes

if(isset($_POST['editar'])){ 

$idnoticia = $_POST['idnoticia']; 

$mostrarnoticia=mysql_query("select * FROM tb_noticias where id_noticias=$idnoticia");

while($mostrada=mysql_fetch_array($mostrarnoticia)){
$imagen= $mostrada['imagen'];
			

?>




<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
  <title>Copa Amistad Profesional modulo de Administracion</title>
  <link rel="stylesheet" href="css/styler.css" type="text/css" media="all" />
  <!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<style type="text/css">
#bienvenido{

    width: auto;
    margin-left: 0px;
    margin-right: 15px;
    margin-top: 0px;
    float: right;
    color: black;

}
</style>
<body>
  
  <div id="header">
    <br>
    <div class="shell">
      <!-- Logo -->
      <h1 id="logo" class="notext"><a href="#">Tu torneo App</a></h1>
      
      <!-- End Logo -->
    </div>
  </div>
  <!-- End Header -->
  
  <!-- Navigation -->
  <div id="navigation">
    <div class="shell">
      <div class="cl">&nbsp;</div>
      <ul>
         <li><a href="../modulousuariostutorneo.php"><img src="../home.png" width="20" height="20"></a></li>
       
         <li><a href="#">Agregar</a>
         <ul>
    <li><a href="../Agregar/AgregarEquipos.php">Nuevos Equipos</a></li>
    <li><a href="../Agregar/AgregarPartidoAlCalendario.php">Nuevos Partidos</a></li>
    <li><a href="../Agregar/form_noticias.php">Noticias</a></li>
    <li><a href="../Agregar/AgregarResultados.php">Resultados</a></li>
    </ul>
  </li>

         <li><a href="#">Modificar</a>
<ul>
    <li><a href="../Modificar/ModificarJugadores.php">Jugadores</a></li>
    <li><a href="../Modificar/ModificarEquipos.php">Equipos</a></li>
    <li><a href="../Modificar/ModificarNoticias.php">Noticias</a></li>
    <li><a href="../Modificar/ModificarResultados.php">Resultados</a></li>
    <li><a href="../Modificar/ModificarAmonestaciones.php">Amonestaciones</a></li>
    <li><a href="#">Calendario</a></li>
    <li><a href="../Modificar/ModificarAsistencia.php">Asistencia</a></li>
    </ul>

          </li>
          
          </li>
          
         <li><a href="Estadisticas.php">Estadisticas</a></li>

         <li><a href="ModuloTraspasos.php">Traspasos</a></li>
          <li><a href="#">Informes</a>
          <ul>  
    
    <li><a href="../Modificar/pdf.php">Amonestaciones Jugadores</a></li>
    <li><a href="#">Amonestaciones Equipos</a></li>
    <li><a href="../Modificar/pdf1.php">Ficha Técnica</a></li>
    <li><a href="../Modificar/pdf2.php">Posiciones</a></li>
    <li><a href="#">Goleadores</a></li>
  </ul>
      </ul>
      <div class="cl">&nbsp;</div>
    
  </div>
</div>

<br><br>

<link rel="stylesheet" href="formoid7_files/formoid1/formoid-flat-black.css" type="text/css" />
<script type="text/javascript" src="formoid7_files/formoid1/jquery.min.js"></script>
<form action="editarnoticia1.php" enctype="multipart/form-data" class="formoid-flat-black" style="background-color:#FFFFFF;font-size:14px;font-family:'Lato', sans-serif;color:#666666;max-width:480px;min-width:150px" method="post">
	<center><div class="title"><h2>Noticia</h2></div></center>
	<div class="element-input"><label class="title">Título de la noticia:</label><input class="large" type="text" name="titulo" value="<?php echo $mostrada['titulo']; ?>" /></div>
	<div class="element-textarea"><label class="title">Descripción:</label><textarea class="medium" name="texto" cols="20" rows="5" ><?php echo $mostrada['texto']; ?></textarea></div>


	<div class="element-file"><label class="title">Imagen nueva:</label><label class="large" ><div class="button">Seleccionar archivo</div><input type="file" class="file_input" name="imagen" /><div class="file_text">Ningún archivo seleccionado</div></label></div>
<input type="hidden" name="idnoticia" id="idnoticia" value="<?php echo $mostrada['id_noticias']; ?>">        
	<div class="submit"><input type="submit" name="guardar" value="Guardar cambios"/></div></form>
<script type="text/javascript" src="formoid7_files/formoid1/formoid-flat-black.js"></script>

<br><br>



<?php

}
}

//Consulta para eliminar noticias

if(isset($_POST['eliminar'])){

$idnoticia = $_POST['idnoticia']; 

$eliminarnoticia=mysql_query("DELETE FROM tb_noticias where id_noticias='$idnoticia'");
 
 if($eliminarnoticia==FALSE){

 	echo "No se pudo eliminar la noticia";
 }

 else{

?>
    <script>

  alert("La noticia se elimino exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php
}

 }

?>
</body>
</html>