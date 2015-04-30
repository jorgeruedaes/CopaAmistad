
<?php
 session_start();
    include('conexion.php');

?>
<html>
<!--<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">-->
<title>Noticias</title>
<!--<div data-role="page">-->
<header data-role="header" data-theme="b">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<h1><b>Noticias</b> </h1>
	

 <link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>

</header>

<style type="text/css">
#cuadronoticia{

   border-style: solid;
   border-width: 1px;


}
</style>
<body>	 
	<a href="form_noticia.php" data-role="button">Nueva noticia</a>
<h3>NOTICIAS RECIENTES</h3>
	<?php 
	$datos=mysql_query("SELECT * FROM tb_noticias ");
		while($noticias=mysql_fetch_array($datos)){


	   ?>
	   	<div id="cuadronoticia">
	   		<div class="imagennoticia"><?php echo $noticias['imagen']; ?></div>
<div class="title"><p><?php echo $noticias['titulo']; ?></p></div>
<div class= "textoyfecha"><p><?php echo $noticias['fecha']; ?></p></div>
 </div>
<?php
}
 ?>


</body>
</div>
<footer data-role="footer">
</footer>
</html>