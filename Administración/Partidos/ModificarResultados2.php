<?php
session_start();
include('../../conexion.php');
include('../RutinaDeLogueo.php');
if ($pruebadeinicio==1 or $pruebadeinicio==2) {

if (isset($_POST['guardar'])) {

$idpartido=$_POST['idpartido'];
$resultado1=$_POST['resultado1'];
$resultado2=$_POST['resultado2'];
$numero=$_POST['numerodejugadores'];
$matriz['75']['1']=0;
for ($i=0; $i <$numero ; $i++) { 
	$matriz[$i]['0']=$_POST['idjugadores'.$i];
	$matriz[$i]['1']=$_POST['nuevosgoles'.$i];
}
for ($i=0; $i <$numero ; $i++) { 
	$id=$matriz[$i]['0'];
	$goles=$matriz[$i]['1'];
	$guardargoles= mysql_query("UPDATE tr_jugadoresxpartido SET goles=$goles WHERE jugador=$id AND partido=$idpartido");
}
$guardarnuevoresultado=mysql_query("UPDATE tb_partidos SET resultado1=$resultado1, resultado2=$resultado2 WHERE id_partido=$idpartido");
if($guardarnuevoresultado=== FALSE) { 

   ?>
    <script>

  alert("Falló la modificación")
 window.location.href="ModificarResultados.php";
 
   </script>

<?php
  }

else{

?>
    <script>

  alert("Resultados Modificados!")
 window.location.href="ModificarResultados.php";
 
   </script>

<?php

}
}
}else{
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