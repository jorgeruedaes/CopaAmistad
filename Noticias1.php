
<?php
 	//session_start();
    include('conexion.php');
?>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="jquery.mobile-1.4.3.css">
<link rel="stylesheet" href="css/themes/revolucion.css" />
  <link rel="stylesheet" href="css/themes/jquery.mobile.icons.min.css" />
<script type="text/javascript" src="jquery-1.11.1.js"></script>
<script type="text/javascript" src="jquery.mobile-1.4.3.js"></script>

<title>Copa Amistad Profesional</title>
<div data-role="page" class="ui-content">
 <div data-role="header">
    <h1  >Noticias</h1>
  </div>

<body>	 
<div data-role="main" class="ui-content" >
    <ul  data-role="listview" data-inset="true">
      <li data-role="list-divider">Uttimas Noticias</li>
      <?php 
//consulta para mostrar las noticias
		$datos=mysql_query("select * FROM tb_noticias where torneo='1' ORDER BY fecha DESC");
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


</body>

<footer data-role="footer">
</footer>
</div>
</html>

