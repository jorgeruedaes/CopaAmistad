<?php

include('../../conexion.php');
include('../RutinaDeLogueo.php');
if($pruebadeinicio==1 or $pruebadeinicio==2){
if(isset($_POST['guardar'])){

	$titulo= $_POST["titulo"]; 
	$texto= $_POST["texto"]; 
	$idnoticia = $_POST["idnoticia"]; 

$ruta="../Modificar/Imagenes";
$archivo= $_FILES['imagen']['tmp_name'];
$nombreArchivo=$_FILES['imagen']['name'];
move_uploaded_file($archivo, $ruta."/".$nombreArchivo);
$ruta=$ruta."/".$nombreArchivo;

if ($ruta == "../Modificar/Imagenes/"){

$modificarnoticia1=mysql_query("UPDATE tb_noticias SET titulo='$titulo', texto='$texto' WHERE id_noticias=$idnoticia");

if($modificarnoticia1 == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php

}
else

?>
    <script>

  alert("La noticia se modificó exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php
}
	else

	{
		$modificarnoticia=mysql_query("UPDATE tb_noticias SET titulo='$titulo', texto='$texto', imagen='".$ruta."' WHERE id_noticias=$idnoticia");
if($modificarnoticia == FALSE){
	?>
    <script>

  alert("Falló la modificación")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php

}
else

		?>
    <script>

  alert("La noticia se modificó exitosamente")
  window.location.href="ModificarNoticias.php";
  
  </script>

<?php


}
} }else{
     ?>
                    <!-- CUANDO EL PERSONAJE NO ESTA AUTORIZADO PARA EL INGRESO-->
                             <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
                <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
                    <script src="../bootstrap/js/bootstrap.min.js"></script>
                            <center>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1"><br>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-md-offset-1">
                                    <div class="alert alert-danger" role="alert">Lo sentimos pero usted no tiene autorización para estar en este lugar.</div>
                                    </div>
                                </div>
                            </center>
                            <center>
                            <button type="button" class="btn btn-success"><a href="iniciox.php" style="color: white">Volver</a></button></center>
                            <?php
}

?>