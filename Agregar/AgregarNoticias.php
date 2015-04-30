<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title></title>
    </head>


    <body>

 <form action="AgregarNoticias.php" method="POST" enctype="multipart/form-data">
    <label>Titulo de la noticia:</label>
    <input type="text" name="titulo"> 
    <label>Texto:</label>
    <input type="text" name="texto"> 
    <label for="imagen">Imagen:</label>
    <input type="file" name="foto" id="imagen" />
    <input type="submit" name="subir" value="Guardar"/>
</form>

<?php
 
        if(isset($_POST['subir'])){

$archivo = $_FILES['foto']['name'];
$unico = time();
$directorio = $_SERVER['DOCUMENT_ROOT'].'/Imagenes/noticias/'.$unico;
$imagen_path = $directorio.$archivo;
    move_uploaded_file($archivo, $imagen_path);
}
        
?>
        
    </body>
</html>







<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">

<?php 
session_start();
include('conexion.php');  

if (isset($_SESSION['admin'])) {

$letras=$_SESSION['admin'];
$numeros=mysql_query("select * from tb_torneo where usuario='$letras'")or die(mysql_error());
$caracteres=mysql_fetch_array($numeros);
$name=$caracteres['id_torneo'];
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Copa Amistad Profesional modulo de Administracion</title>
    <link rel="stylesheet" href="css/styler.css" type="text/css" media="all" />
    <!--[if lte IE 6]><link rel="stylesheet" href="css/ie6.css" type="text/css" media="all" /><![endif]-->
</head>
<style type="text/css">
#bienvenido{

    width: auto;
    margin-left: 0px;
    margin-right: 15px;
    margin-top: 0px;
    float: right;
    color: black;

}
</style>
<body>
    
    <div id="header">
        <p id="bienvenido">Bienvenido  <?php echo $_SESSION['admin']  ?></p>
    
        <div class="shell">
            <!-- Logo -->
        <h1 id="logo" class="notext"><a href="#">Tu torneo App</a></h1>
            
            <!-- End Logo -->
        </div>
    </div>
    <!-- End Header -->
    
    <!-- Navigation -->
    <div id="navigation">
        <div class="shell">
            <div class="cl">&nbsp;</div>
            <ul>
                 <li><a href="#">Agregar</a>
                 <ul>
        <li><a href="AgregarEquipos.php">Nuevos Equipos</a></li>
        <li><a href="AgregarPartidoAlCalendario.php">Nuevos Partidos</a></li>
        <li><a href="form_noticias.php">Noticias</a></li>
        <li><a href="AgregarResultados.php">Resultados</a></li>
        </ul>
    </li>

                 <li><a href="#">Modificar</a>
<ul>
        <li><a href="Modificar/ModificarEquipos.php">Equipos</a></li>
        <li><a href="Modificar/ModificarNoticias.php">Noticias</a></li>
        <li><a href="Modificar/ModificarResultados.php">Resultados</a></li>
        <li><a href="Modificar/ModificarCalendario.php">Calendario</a></li>
    </ul>

                </li>
                
                </li>
                
               <li><a href="Estadisticas.php">Estadisticas</a></li>

               <li><a href="ModuloTraspasos.php">Traspasos</a></li>
                
            </ul>
            <div class="cl">&nbsp;</div>
        
    </div>
    <!-- End Navigation -->
     <form action="AgregarNoticias.php" method="POST" enctype="multipart/form-data">
    <label>Titulo de la noticia:</label>
    <input type="text" name="titulo"> 
    <label>Texto:</label>
    <input type="text" name="texto"> 
    <label for="imagen">Imagen:</label>
    <input type="file" name="foto" id="imagen" />
    <input type="submit" name="subir" value="Guardar"/>
</form>
    <!-- Heading -->
  
    <!-- End Heading -->
    
    <!-- Main -->
    

    
    <!-- End Main -->
    
    <!-- Footer -->
    <div id="footer">
        <div class="shell">
            <div class="cl">&nbsp;</div>
            
            <div class="cl">&nbsp;</div>
        </div>
    </div>
</div>
    <!-- End Footer -->
</body>
</html>
<?php
}
        if(isset($_POST['subir'])){

$archivo = $_FILES['foto']['name'];
$unico = time();
$directorio = $_SERVER['DOCUMENT_ROOT'].'/Imagenes/noticias/'.$unico;
$imagen_path = $directorio.$archivo;
    move_uploaded_file($archivo, $imagen_path);
}
?>