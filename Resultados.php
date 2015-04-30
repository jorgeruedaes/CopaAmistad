<?php
 session_start();
    include('conexion.php');
?>
<html>
<head>
	<title>Copa Amistad Profesional</title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/themes/revolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
</head>
<body>

<!--Pagina Posiciones -->

<div data-role="page">
<div data-role="header">
	<h1  style=" margin: auto;">Selecciona la Fecha</h1>


<ul data-role="listview" data-inset="true" data-filter="true">
<?php
$nametor = mysql_query("SELECT distinct numero_fecha from tb_partidos where Estado='2' ")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {
$numero=$tor['numero_fecha'];
	?>

  <li><a href="Resultadosporfecha.php?id=<?php echo $tor['numero_fecha']; ?>"><?php echo  $tor['numero_fecha']; ?></a></li>

<?php  
}
?>

</ul>

<!--contenido-->

<!--pie de pagina-->
</div>
</div>
</body>
</html>