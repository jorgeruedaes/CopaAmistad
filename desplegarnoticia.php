<?php
 	//session_start();
 include('conexion.php');
$url_actual = "http://" .$_SERVER["REQUEST_URI"];

$idnoticia = $_GET['idnoticia']; 

$mostrarnoticia=mysql_query("select * FROM tb_noticias where id_noticias=$idnoticia");

if($mostrada=mysql_fetch_array($mostrarnoticia)){


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html>

<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>
<body>

  <div data-role="page" id="pageone" data-dialog="true">
 
  <div data-role="header">
     <h2 style=" margin: auto;margin-left: 40px;" ><?php echo $mostrada['titulo']; ?></h2>
     <br>
  </div>

  <div data-role="main" class="ui-content">
   <img  width="70px" height="70px"  src="Noticiasimagenes/<?php echo $mostrada['imagen'];  ?>">
   <p class="textonoticia"><?php echo $mostrada['texto']; ?></p>

<a href="javascript: void(0);" onclick="window.open('http://www.facebook.com/sharer.php?u='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh3.googleusercontent.com/-H8xMuAxM-bE/UefWwJr2vwI/AAAAAAAAEdY/N5I41q19KMk/s32-no/facebook.png"></a>
</a>

<a href="javascript: void(0);" onclick="window.open('http://www.twitter.com/home?status='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-xZVxH6CsUaQ/UefWwgi8o3I/AAAAAAAAEdk/reo5XS6z8-8/s32-no/twitter.png"></a></a>
</a>

<a href="javascript: void(0);" onclick="window.open('https://plus.google.com/share?url='+document.URL,'ventanacompartir', 'toolbar=0, status=0, width=device-width, height=device-height');"><img src="https://lh5.googleusercontent.com/-5Q7Sj0SXhOA/UefWwcrnZ-I/AAAAAAAAEdg/auK3wqGCbZE/s32-no/googleplus.png"></a>
</a>
</a>



 </div>

  <div data-role="footer">
    <h1><?php echo $mostrada['fecha']; ?> </h1>
  </div> 
<!--
  <div data-role="popup" id="myPopup" class="ui-content">

<a href="#" data-rel="back" class="ui-btn ui-corner-all ui-shadow ui-btn ui-icon-delete ui-btn-icon-notext ui-btn-left">Close</a>
<p><a href="javascript:window.location.href=('https://www.facebook.com/sharer/sharer.php?u='+document.URL)" target="_blank">
<img src="https://lh3.googleusercontent.com/-H8xMuAxM-bE/UefWwJr2vwI/AAAAAAAAEdY/N5I41q19KMk/s32-no/facebook.png"></a>
<a href="javascript:window.location.href=('http://www.twitter.com/home?status='+document.URL)" target="_blank">
<img src="https://lh5.googleusercontent.com/-xZVxH6CsUaQ/UefWwgi8o3I/AAAAAAAAEdk/reo5XS6z8-8/s32-no/twitter.png"></a><br>
<a href="javascript:window.location.href=('https://plus.google.com/share?url='+document.URL)" target="_blank">
<img src="https://lh5.googleusercontent.com/-5Q7Sj0SXhOA/UefWwcrnZ-I/AAAAAAAAEdg/auK3wqGCbZE/s32-no/googleplus.png"></a>
</p>
    </div>-->
</div> 


</body>
</html>
<?php
}
?>