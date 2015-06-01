<?php
  include('../../conexion.php');
    session_start();
 $contraseña= $_POST['pass'];
 $usuario = $_POST['user'];
$contra_encriptada = md5($contraseña);
$usuario_encriptado= md5($usuario);
$primero=mysql_query("SELECT torneo,tipo,estado FROM tb_usuarios
 WHERE usuario='$usuario_encriptado' 
	and contrasena='$contra_encriptada' ");
if(mysql_num_rows($primero)>0){
	$var=mysql_fetch_array($primero);

      $_SESSION['admin']=$_POST['user'];
      $_SESSION['identificacion']=$var['torneo'];
      $_SESSION['tipo_usuario']=$var['tipo'];
      $_SESSION['torneo']=$var['torneo'];
header("location:moduloplanilla.php");
}else{
?>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

        <link rel="stylesheet" type="text/css" href="../../js/jquery.mobile-1.4.3.css">
        <script type="text/javascript" src="../../js/jquery-1.11.1.js"></script>
        <link rel="stylesheet" href="../../themes/nuevarevolucion1.css"/>
        <link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css"/>
        <!--<script type="text/javascript" src="Planillero.js"></script>-->
        <script type="text/javascript" src="../../js/jquery.mobile-1.4.3.js"></script>
        <!--- AQUI AGREGAN SUS SCRIPTS -->
        <!-- ///////////////////////// -->
    </head>
    <body> 
        <div data-role="page" id="pagina0">  
            <div data-role="header">
                <a href="logueo.php" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/carat-l-black.png"></a>
                <h1 style="height: 2%;margin: auto;"></h1></div>

            <div data-role="main" class="ui-content">
                <!--- AQUI INICIA SU CODIGO -->
                <!-- ///////////////////////// -->
                <center><cite>Usuario y/o contraseña incorrectos, Intenta nuevamente.</cite></center>
 
            </div>

        </div>

    </body>  
      
</html>
    

<?php

}

mysql_close($con);
?>