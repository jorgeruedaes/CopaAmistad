<?php

include('../conexion.php');

$resultado = '{"Salida":true,';
$Bandera = $_POST['Bandera'];
if ($Bandera === "Comprobar") {

    $user = $_POST['Usuario'];
    $userenc = md5($user);
    $correo = $_POST['Correo'];
    $query = mysql_query("SELECT * FROM tb_usuarios WHERE usuario = '$userenc' AND email_usuario='$correo'");
    $datos = mysql_fetch_array($query);
    $pregunta = $datos['pregunta_usuario'];
    $respuesta = $datos['respuesta'];
    $idusr = $datos['id_usuario'];
    if (mysql_num_rows($query) > 0) {

        $resultado.='"Mensaje":true,"Pregunta":"' . $pregunta . '","Respuesta":"' . $respuesta . '","IdUsuario":"' . $idusr . '"';
    } else {
        $resultado.='"Mensaje":false';
    }
    $resultado.='}';
}
else if ($Bandera === "Cambiar") {

    $pass = $_POST['NuevaContraseña'];
    $passenc = md5($pass);
    $user = $_POST['Usuario'];
    
    $query = mysql_query("UPDATE tb_usuarios SET contrasena = '$passenc' WHERE id_usuario='$user'");
  
    if ($query) {

        $resultado.='"Mensaje":true';
    } else {
        $resultado.='"Mensaje":false';
    }
    $resultado.='}';
}
echo ($resultado);

mysql_close($con);


