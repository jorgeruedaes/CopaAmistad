


    <?php
 session_start();
    include('conexion.php');
    /// Consulta de numero de equipos que han jugado para generar la Tabla de posiciones

?>

<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1,maximun-scale=1">
<link rel="stylesheet" type="text/css" href="js/jquery.mobile-1.4.3.css">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="text/javascript" src="js/jquery-1.11.1.js"></script>
<link rel="stylesheet" href="themes/nuevarevolucion1.css"/>
<link rel="stylesheet" href="themes/jquery.mobile.icons.min.css"/>
<script type="text/javascript" src="js/jquery.mobile-1.4.3.js"></script>
</head>

<body style="font-family: Century Gothic;">
<div data-role="page" id="pagina1">    <!-- PAGINA PRINCIPAL 1 -->

  <div data-role="header">
      <a href="index.php" style="
    background-color: #8cc63f;
    border-color: #8cc63f;
" class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="images/icons-png/carat-l-black.png"></a>
    <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
  </div>

  <div data-role="main" class="ui-content">

 <ul  data-role="listview" data-inset="true">
      <li data-role="list-divider">Ultimas Noticias</li>
      <?php 
//consulta para mostrar las noticias
    $datos=mysql_query("SELECT * FROM tb_noticias where torneo='1' ORDER BY fecha DESC  LIMIT 5");
    while($noticias=mysql_fetch_array($datos)){
     ?>
      <li >
        <a style="font-size: small;" href="desplegarnoticia.php?idnoticia=<?php echo $noticias['id_noticias']; ?>">       
         <table>    
            <tr>                                        

          <td width="30%"><img width="70px" height="70px" src="Noticiasimagenes/<?php echo $noticias['imagen']; ?>"></td>
          <td width="50%"  style ="font-weight:  bold;font-size: x-small;" ><span ><?php echo $noticias['fecha']?></span></td>  
          <td>   <tr>   
                        <td></td>
                  <td width="70%" style ="font-size: small;font-weight:  bold;">  <span><?php echo $noticias['titulo']; ?></span></td>
              </tr>  
            </td>


        </tr>       


    </table>
        </a>
      </li>

<?php
}
 ?>
    </ul>



    
  </div>
<!--
  <div data-role="footer">
    <h1>Todos los derechos reservado CAP 2015</h1> 
  </div>
 -->



</body>

</html>