
<?php
session_start();
date_default_timezone_set('America/Bogota');
include('../../conexion.php');
      $lafechadehoy = date("Y-m-d");
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
            <!--- AQUI AGREGAN SUS SCRIPTS -->
            <!-- ///////////////////////// -->
        </head>
        <body>

            <div data-role="page" id="pageone">
                <div data-role="header">
                    <a href="../../index.php" style="
                       background-color: #8cc63f;
                       border-color: #8cc63f;
                       " class="ui-btn ui-btn-inline ui-icon-back ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon" ></a>
                    <h1>Modúlo Planillero</h1>
                    <a style="
                       background-color: #8cc63f;
                       border-color: #8cc63f;
                       " href="../../Administración/cerrarsesion.php" class="ui-btn ui-btn-inline ui-icon-delete ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon"></a>
                </div>

  <div data-role="main" class="ui-content" id="principal">
         <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                     font-weight: 700;" >Partidos por empezar</div>
             <?php
              /*
                     * ******************************************************************************************
                     * ************INICIO PARTIDOS POR EMPEZAR*************************************************
                     * ******************************************************************************************
                     */
                      $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='2015-05-18'  AND Estado='1'  ORDER BY fecha desc,hora desc")or die(mysql_error());
                    while ($tor = mysql_fetch_array($nametor)) {
                        ?>

                        <?php
                        $nombre = $tor['equipo1'];
                        $nom = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
                        $nome = mysql_fetch_array($nom);
                        $nombre1 = $tor['equipo2'];
                        $nom1 = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre1");
                        $nome1 = mysql_fetch_array($nom1);
                        ?>
                        <div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
                            <h1  style="font-size: small " align: "center" >
                                 <table width="100%" aling="center"  style="font-size: small ">
                                    <tr width="100%">
                                        <td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
                                        <td align="center" width="15%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2']; ?>  </span></td>
                                        <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                    </tr> 

                                </table>
                            </h1>
                            <p>
<a  style="font-size: small;  background-color: rgb(50, 192, 63);text-shadow: none;" id="pop" href="#popupDialog" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-right ui-btn-b">Activar</a>
<div  class="activar" data-role="popup" id="popupDialog" data-dismissible="false" style="max-width:400px;">
    <div data-role="header" data-theme="a">
    <h1></h1>
    </div>
    <div role="main" class="ui-content">
        <h3 class="ui-title">¿Desea activar el partido?</h3>
        <a   class="cancelar ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancelar</a>
        <a  data-partido="<?php echo $tor['id_partido'];  ?>" class="aceptar ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back" data-transition="flow">Aceptar</a>
    </div>
</div>

                             </p>
  </div>
  <?php
}
 /*
                     * ******************************************************************************************
                     * ************INICIO PARTIDOS JUGANDOSE*************************************************
                     * ******************************************************************************************
                     */
  ?>
                 <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                     font-weight: 700;" >Partidos Jugandose</div>
                     <?php
                      $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='2015-05-18'  AND Estado='5'  ORDER BY fecha desc,hora desc")or die(mysql_error());
                    while ($tor = mysql_fetch_array($nametor)) {
                        ?>

                        <?php
                        $nombre = $tor['equipo1'];
                        $nom = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
                        $nome = mysql_fetch_array($nom);
                        $nombre1 = $tor['equipo2'];
                        $nom1 = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre1");
                        $nome1 = mysql_fetch_array($nom1);
                        ?>
                        <div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
                            <h1  style="font-size: small " align: "center" >
                                 <table width="100%" aling="center"  style="font-size: small ">
                                    <tr width="100%">
                                        <td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
                                        <td align="center" width="20%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2']; ?>  </span></td>
                                        <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                    </tr> 

                                </table>
                            </h1>
                   <p>
                       
<a data-partido="<?php echo $tor['id_partido'];?>" href="EditarMarcador.php?id=<?php echo $tor['id_partido'];?>" style="-webkit-border-radius: 200px; font-size: small;background-color: lightblue;text-shadow: none;" data-inline="true" data-mini="true" data-role="button" data-iconpos="right" data-icon="gear">Editar</a>
<!--- INFORMAR -->
<a style="   -webkit-border-radius: 200px; font-size: small;text-shadow: none;background-color: rgb(245, 253, 95);" href="#popupLogin" data-rel="popup" data-position-to="window" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-left ui-btn-a" data-transition="pop">Informar</a>
<div data-role="popup" id="popupLogin" data-theme="a" class="ui-corner-all">
    <form>
        <div style="padding:10px 20px;">
            <h3>Por favor seleccione el nuevo estado</h3>
           <select name="select1" id="select-custom-1" data-native-menu="false">
        <option value="3">Aplazado</option>
        <option value="4">Suspendido</option>
    </select>
            <button  data-partido="<?php echo $tor['id_partido'];?>" style="  background-color: rgb(50, 192, 63);" type="submit" class="ui-btn ui-corner-all ui-shadow ui-btn-b ui-btn-icon-right ui-icon-check aceptarinformar">Aceptar</button>
        </div>
    </form>
</div>



<!-- TERMINAR -->
<a   style=" -webkit-border-radius: 200px; font-size: small;background-color: #F05B56;font-style: none;text-shadow: none;" id="pop" href="#popupDialog1" data-rel="popup" data-position-to="window" data-transition="pop" class="ui-btn ui-corner-all ui-shadow ui-btn-inline ui-icon-check ui-btn-icon-right ui-btn-b">Terminar</a>
<div class="terminar" data-role="popup" id="popupDialog1" data-dismissible="false" style="max-width:400px;">
    <div role="main" class="ui-content">
        <h3 class="ui-title">¿Desea terminar el partido?</h3>
        <a   class="cancelarterminar ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back">Cancelar</a>
        <a  data-partido="<?php echo $tor['id_partido'];  ?>" class="aceptarterminar ui-btn ui-corner-all ui-shadow ui-btn-inline ui-btn-b" data-rel="back" data-transition="flow">Aceptar</a>
    </div>
</div>
               
                   
  </div>
  <?php
}

                    /*
                     * ******************************************************************************************
                     * ************INICIO TERMINADOS ************************************************
                     * ******************************************************************************************
                     */
  ?>
                 <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;
                     font-weight: 700;" >Partidos Terminados</div>
                     <?php
                      $nametor = mysql_query("SELECT * FROM tb_partidos WHERE fecha='2015-05-18'  AND Estado='2'  ORDER BY fecha desc,hora desc")or die(mysql_error());
                    while ($tor = mysql_fetch_array($nametor)) {
                        ?>

                        <?php
                        $nombre = $tor['equipo1'];
                        $nom = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre");
                        $nome = mysql_fetch_array($nom);
                        $nombre1 = $tor['equipo2'];
                        $nom1 = mysql_query("select nombre_equipo from tb_equipos where id_equipo=$nombre1");
                        $nome1 = mysql_fetch_array($nom1);
                        ?>
                        <div  align="center" data-role="collapsible" data-collapsed-icon="arrow-d" data-expanded-icon="arrow-u" data-iconpos="right">
                            <h1  style="font-size: small " align: "center" >
                                 <table width="100%" aling="center"  style="font-size: small ">
                                    <tr width="100%">
                                        <td align="center" width="33%"> <?php echo $nome['nombre_equipo']; ?> </td>
                                        <td align="center" width="20%"><span style=" color: black ;  font-weight: bold; font-size: initial;">  <?php echo $tor['resultado1']; ?>-<?php echo $tor['resultado2']; ?>  </span></td>
                                        <td align="center" width="33%"><?php echo $nome1['nombre_equipo']; ?> </td>
                                    </tr> 

                                </table>
                            </h1>
                        </div>
                        <?php
                    }
                    ?>

<a href="#myPopup" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all"></a>
<div data-role="popup" id="myPopup">
  <p>El partido no se pudo activar</p>
</div>
<a href="#myPopup1" data-rel="popup" class="ui-btn ui-btn-inline ui-corner-all"></a>
<div data-role="popup" id="myPopup1">
  <p>El partido no se pudo terminar</p>
</div>
</div>
        </body>
    </html>
<!--////////////////////////////// SCRIPTS ///////////////////// -->
<!--////////////////////////////// SUS SCRIPTS ///////////////////// -->
<script type="text/javascript">   
var app={
  Eventos:function(){

  }
};
$(document).ready(function(){

  $('.aceptar').off('click').on('click',function(){
    var partido =$(this).data('partido');
      $.ajax({
        url:'PeticionesPlanillero.php',
        type:"POST",
        data: {
          Bandera : "Activar",
          idPartido: partido
        },
        success: function(data){
          var data = $.parseJSON(data);
         if(data.Salida === true){
            if(data.Mensaje === true){
               location.reload();
            }else{
                 var hola =$('#myPopup').popup();
         setTimeout( function(){ $('#myPopup').popup('open') }, 200 );  
            }
         }else{
          alert(data.Mensaje);
         }
        }

      });
   

  });
// TERMINAR UN PARTIDO
$('.aceptarterminar').off('click').on('click',function(){
      var partido = $(this).data('partido');

      $.ajax({
        url:'PeticionesPlanillero.php',
        type:"POST",
        data: {
          Bandera : "Terminar",
          idPartido: partido
        },
        success: function(data){
          var data = $.parseJSON(data);
         if(data.Salida === true){
            if(data.Mensaje === true){

               location.reload();
            }else{
                             var hola =$('#myPopup1').popup();
         setTimeout( function(){ $('#myPopup1').popup('open') }, 200 );  
            }
         }else{

          alert(data.Mensaje);
         }
        }

      });


  });
$('.aceptarinformar').off('click').on('click',function(){
 var partido = $(this).data('partido');
 var seleccion =$('select option:selected').val();
 $.ajax({
        url:'PeticionesPlanillero.php',
        type:"POST",
        data: {
          Bandera : "Informar",
          idPartido: partido,
          Seleccion : seleccion
        },
        success: function(data){
          var data = $.parseJSON(data);
         if(data.Salida === true){
            if(data.Mensaje === true){

               location.reload();
            }else{
                             var hola =$('#myPopup1').popup();
         setTimeout( function(){ $('#myPopup1').popup('open') }, 200 );  
            }
         }else{

          alert(data.Mensaje);
         }
        }

      });
});

 app.Eventos();
});
</script>
