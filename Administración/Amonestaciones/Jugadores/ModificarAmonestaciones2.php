

<?php
session_start();
include('../../../conexion.php');  
if (isset($_SESSION['admin'])) {

if (isset($_POST['guardar'])) {
  $matriz['30']['5']=0;
  $numerodejugadores=$_POST['numerodejugadores'];
  for ($i=0; $i <$numerodejugadores ; $i++) { 
    $matriz[$i]['0']=$_POST['jugador'.$i];
    $matriz[$i]['1']=$_POST['comentario'.$i];
    $matriz[$i]['2']=$_POST['duracion'.$i];
    $matriz[$i]['3']=$_POST['jornada'.$i];
    if(empty($_POST['vigencia'.$i])){
  $matriz[$i]['4']="1";
}else{
$matriz[$i]['4']="2";
}
  }
  for ($i=0; $i <$numerodejugadores ; $i++) { 
    $jugador=$matriz[$i]['0'];
    $comentario=$matriz[$i]['1'];
    $duracion=$matriz[$i]['2'];
    $jornada=$matriz[$i]['3'];
    $vigencia=$matriz[$i]['4'];
    $prueba= mysql_query("UPDATE `tr_amonestacionesxjugador` SET 
    `estado_amonestacion`=$vigencia,
    `duracion`=$duracion,`comentario`='$comentario' WHERE
     jugador=$jugador and jornada_amonestacion=$jornada"); 
    }
  
?>
<script type="text/javascript">
  alert("Se realizaron las amonestaciones con EXITO!!");
     window.location.href="ModificarAmonestaciones.php";
</script>
<?php
  }
}

?>