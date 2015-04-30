

<?php
session_start();
include('conexion.php');
if (isset($_SESSION['admin'])) {
    header("Location:modulousuariostutorneo.php");
}else{


?>

<!DOCTYPE html>
<html>

<style type="text/css">


</style>
<head>
	<meta charset="utf-8" />
	<title>Módulo Administrador</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>


<link rel="stylesheet" href="formoid3_files/formoid1/formoid-solid-green.css" type="text/css" />
<script type="text/javascript" src="formoid3_files/formoid1/jquery.min.js"></script>
<form action="comprobar.php" class="formoid-solid-green" style="background-color:#FFFFFF;font-size:14px;font-family:'Roboto',Arial,Helvetica,sans-serif;color:#34495E;max-width:480px;min-width:150px" method="post">

<div class="title"><h2>Módulo de Administración</h2></div>
<div class="element-input"><label class="title"></label><div class="item-cont">
<center><input class="medium" type="text" name="user" id="username" placeholder="Usuario" required/><span class="icon-place"></span></div></div></center>
<div class="element-password"><label class="title"></label><div class="item-cont">
<center><input class="medium" type="password" name="pass" id="password" value="" placeholder="Contraseña" required/><span class="icon-place"></span></div></div></center>
<div style="text-align:center" class="submit"><input type="submit" value="Iniciar sesión"/></div>
</form>
<script type="text/javascript" src="formoid3_files/formoid1/formoid-solid-green.js"></script>

</body>
</html>
<?php 

}if (isset($_SESSION['error'])) {
    header("location:index.php");
}
?>