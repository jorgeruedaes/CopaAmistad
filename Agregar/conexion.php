
<?php
	$server="mysql.hostinger.es";
	$username="u197933013_jorge";
	$password="5sLTb:7Ti$";
	$db='u197933013_copa';
	$con=mysql_connect($server,$username,$password)or die("no se ha podido establecer la conexion");
	$sdb=mysql_select_db($db,$con)or die("la base de datos no existe");
?>