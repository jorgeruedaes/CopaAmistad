

<?php 
    include('conexion.php');
 session_start();
 $contraseña= $_POST['pass'];
$contra_encriptada = md5($contraseña);

echo "la contraseña encriptada es $contra_encriptada";

$primero=mysql_query("SELECT usuario,password,id_torneo FROM tb_torneo");
while ($var=mysql_fetch_array($primero)) {

        if ($_POST['user']==$var['usuario']   and $contra_encriptada==$var['password']) {
        $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['id_torneo'];

header("location:modulousuariostutorneo.php");
}
else{
echo  $_SESSION['error']=="Login inconrrecto";
header("location:iniciox.php");
}

}
?>