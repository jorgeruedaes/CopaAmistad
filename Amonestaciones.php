<?php
 session_start();
    include('conexion.php');
?>
<html>
<head>
	<title>Copa Amistad Profesional</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>
<body>


<div data-role="page">
<div data-role="header">
	 <a href="index.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">Amonestaciones</h1>
</div>


<div data-role="main" class="ui-content">
    <p>Selecciona el equipo de tu interes</p>
<form class="ui-filterable">
      <input id="myFilter" data-type="search" placeholder="Encuentra tu equipo">
    </form>
<ul ul data-role="listview" data-filter="true" data-input="#myFilter"  data-inset="true">
<?php
$nametor = mysql_query("SELECT id_equipo,nombre_equipo FROM tb_equipos ORDER BY nombre_equipo ASC ")or die(mysql_error());
  while ($tor=mysql_fetch_array($nametor)) {

  ?>

  <li><a style="
    font-family: Century Gothic;
    font-size: small;
" href="nuevasamonestaciones.php?id=<?php echo $tor['id_equipo'] ?>"><?php echo $tor['nombre_equipo']; ?></a></li>

<?php  
}
?>

</ul>



</div>
</div>