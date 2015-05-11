
<?php
session_start();
include('../../../conexion.php');  
if (isset($_SESSION['admin'])) {
    
if(isset($_POST['guardar'])){
    $numerodemultas=$_POST['numerodemultas'];
    $matriz['3']['1']=0;
   for ($i=0; $i <$numerodemultas ; $i++) {
        if(empty($_POST['vigencia'.$i])){
   $matriz[$i]['0']=1;
   
        }else{
    $matriz[$i]['0']=2;
     $matriz[$i]['1']=$_POST['vigencia'.$i];
        }
   }
   for ($i=0; $i <$numerodemultas ; $i++) {
       $estado =  $matriz[$i]['0'];
       $id= $matriz[$i]['1'];
       $query=  mysql_query("UPDATE `tr_amonestacionxequipo` SET 
    `estado_amonestacion`=$estado WHERE
     id_amonestacionxequipo=$id");
       
   }
   
  ?>
<script type="text/javascript">
  alert("Amonestaciones actualizadas con éxito!");
       window.location.href="ModificarAmonestacionesEquipo.php";

</script>
<?php
  }
}

?>