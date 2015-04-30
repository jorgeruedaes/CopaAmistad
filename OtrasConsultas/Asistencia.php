<?php
 session_start();
    include('conexion.php');
?>
<html>
<head>
	<title>Copa Amistad</title>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="../css/themes/revolucion.css" />
  <link rel="stylesheet" href="../css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
<style type="text/css">
.datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Geneva, Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; border: 5px solid #36752D; -webkit-border-radius: 7px; -moz-border-radius: 7px; border-radius: 7px; }.datagrid table td, .datagrid table th { padding: 4px 19px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #36752D), color-stop(1, #275420) );background:-moz-linear-gradient( center top, #36752D 5%, #275420 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#36752D', endColorstr='#275420');background-color:#36752D; color:#FFFFFF; font-size: 17px; font-weight: bold; border-left: 5px solid #36752D; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #275420; border-left: 1px solid #C6FFC2;font-size: 15px;font-weight: normal; }.datagrid table tbody .alt td { background: #DFFFDE; color: #275420; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #36752D;background: #DFFFDE;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 1px; }
</style>
</head>
<body>

<!--Pagina Posiciones -->

<div data-role="page">
<div data-role="header" data-theme="b">
	<h1  style=" margin: auto;" >Asistencia </h1>

</body>
<ul data-role="listview" data-inset="true" data-filter="true">
<?php
$nametor = mysql_query("select * from tb_equipos ")or die(mysql_error());
	while ($tor=mysql_fetch_array($nametor)) {

	?>

  <li><a href="AsistenciaxEquipo.php?id=<?php echo $tor['id_equipo'] ?>"><?php echo $tor['nombre_equipo']; ?></a></li>

<?php  
}
?>

</ul>






<!--contenido-->

<!--pie de pagina-->
<div data-role="footer" data-theme="a">
</div>
</div>
</html>