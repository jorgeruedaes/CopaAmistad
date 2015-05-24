<?php
 
session_start();
include('../../conexion.php');
$usu = mysql_real_escape_string($_POST["usu"]);
$pass = mysql_real_escape_string($_POST["pass"]);
 $contra_encriptada = md5($pass);
$usuario_encriptado= md5($usu);
$sql = "SELECT usuario,contrasena,torneo,tipo,estado,torneo FROM tb_usuarios 
WHERE usuario='$usuario_encriptado' AND contrasena='$contra_encriptada' and Estado='Activo'";
 
$resultado = mysql_query($sql);
    if (mysql_num_rows($resultado)>0){
echo "simple:true}";
    }else{

}
 
?>