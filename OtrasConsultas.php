
<?php
 session_start();
    include('conexion.php');
?>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="css/themes/revolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
<html>
<header>
<style type="text/css">
</style>
</header>
<body>
<div data-role="page" id="pagina1">
	<div data-role="header"> 
<h1 style="margin : auto ;">Realiza otras consultas </h1>
	</div>

<!--cabcera-->
<div data-role="content"  align="center">

<!--contenido-->
	<a href="OtrasConsultas/TablaGoleadores.php" data-icon="grid" data-role="button" data-theme="b"  data-transition="Flip">Tabla de Goleadores</a>
	<a href="OtrasConsultas/JugadoresxEquipo.php" data-icon="bars" data-role="button" data-theme="b" data-transition="Flip">Jugadores por Equipo</a>
	<a href="OtrasConsultas/AmonestacionesAntiguas.php" data-icon="info" data-role="button" data-theme="b"  data-transition="Flip">Amonestaciones Antiguas</a>
	<!--<a href="OtrasConsultas/HistoricoCampeones.php" data-icon="star" data-role="button" data-theme="b"  data-transition="Flip">Historico de Campeones</a> -->
	
<br></br>
<br></br>
<br></br>

 
</div>
<footer data-role="footer">
	<h1 style="font-size: xx-small ;">Todos los derechos reservados 2015</h1>
</footer>
</div>
</body>
</html>

