<?php
 session_start();
    include('../../conexion.php');
?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel="stylesheet" type="text/css" href="../../js/jquery.mobile-1.4.3.css">
<script type="text/javascript" src="../../js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="../../themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="../../themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="../../js/jquery.mobile-1.4.3.js"></script>
</head>
<body>
<div data-role="page" id="pagina3">  <!-- PAGINA PRINCIPAL 3 GOLEADORES -->
 <div data-role="header">
     <a href="../../index.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">Buzón De Sugerencias</h1>
  </div>

  <div data-role="main" class="ui-content">
<form style="font-family: Century Gothic;font-size:smaller;" method="post">
<label>Ingresa tu nombre</label>
<input type="text" name="usuario"  required/>
<label>Ingresa tu email</label>
<cite>Este campo no es obligatorio, trataremos de responder a tus dudas y/o sugerencias.</cite>
<input type="email" name="email" />
<label>Danos tu opinión, Califícanos de 1 a 5</label>
<input type="number" name="valor" size="2" max="5" min="1"  required/>
<label>Comentario</label>
<textarea cols="40" rows="5"  name="comentario" size="1000" style="max-height: 200px;" required></textarea>
<input type="submit" value="Enviar" name="enviar">

</form>
   
  </div>

</div>
</body>  
</html>
<?php 
if(isset($_POST['enviar'])){

  $usuario=$_POST['usuario'];
  $valor=$_POST['valor'];
  $comentario=$_POST['comentario'];
  $email=$_POST['email'];
  $query =mysql_query("INSERT INTO `te_comentarios`(`numero_comentario`, `nombre_usuario`, `contacto`, `valor`, `comentario`) 
    VALUES('null','$usuario','$email','$valor','$comentario');");
  if ($query === true) {
  ?>
    <script  type="text/javascript">

  alert("El Comentario se guardo exitosamente, Gracias por tu opinión");

   </script>
  <?php 

}
  header("location:../../index.php");
}

?>