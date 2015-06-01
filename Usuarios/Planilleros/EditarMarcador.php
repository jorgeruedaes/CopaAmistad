
<?php
session_start();
date_default_timezone_set('America/Bogota');
include('../../conexion.php');
$id = $_GET['id'];
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
                <a href="moduloplanilla.php" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-icon-back ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon" ></a>
                <h1>Modúlo Planillero</h1>
                <a style=" background-color: #8cc63f; border-color: #8cc63f;
                   " href="../../Administración/cerrarsesion.php" class="ui-btn ui-btn-inline ui-icon-delete
                   ui-btn-icon-notext ui-corner-all ui-shadow ui-nodisc-icon ui-alt-icon"></a>

            </div>

            <div data-role="main" class="ui-content" id="principal">

                <?php
                $query = mysql_query("SELECT equipo1,equipo2,resultado1,resultado2 FROM tb_partidos WHERE id_partido=$id");
                $queryc = mysql_fetch_array($query);
                $equipo1 = $queryc['equipo1'];
                $equipo2 = $queryc['equipo2'];
                $resultado1 = $queryc['resultado1'];
                $resultado2 = $queryc['resultado2'];
                $nom = mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$equipo1"));
                $nom1 = mysql_fetch_array(mysql_query("SELECT nombre_equipo FROM tb_equipos WHERE id_equipo=$equipo2"));
                ?>
                <form >
                    <div style="  width: 50%;text-align: center;  float: right;">
                        <label><?php echo $nom['nombre_equipo'] ?></label>
                        <input style="text-align:center;" id="primero"type="number" value="<?php echo $resultado1 ?>" min="0"/>
                    </div>
                    <div style="  width: 50%;text-align: center;">
                        <label><?php echo $nom1['nombre_equipo'] ?></label>
                        <input style="text-align:center;" id="segundo" type="number" value="<?php echo $resultado2 ?>" min="0"/>
                    </div>
                    <input id="partido" type="hidden" value="<?php echo $id ?>"/>


                    <center>
                        <input data-mini="true" type="button"  name="submit" id="submit" value="Guardar">
                    </center>
                </form>
                <center>
                    <!--   <a id="guardar"style="-webkit-border-radius: 200px; font-size: small;background-color: lightblue;text-shadow: none;" data-inline="true" data-mini="true" data-role="button" data-iconpos="right" data-icon="check">Guardar</a>
                    -->
                </center>
            </div>


        </div>

    </body>

    <div data-role="popup" id="myPopup">
        <p>El partido no  se pudo editar </p>
    </div>

    <div data-role="popup" id="myPopup1">
        <p>El partido se edito </p>
    </div>
    <!--////////////////////////////// SCRIPTS ///////////////////// -->
    <!--////////////////////////////// SUS SCRIPTS ///////////////////// -->
    <script type="text/javascript">
    $(document).on('pageinit', '#pageone', function(){  
            $(document).on('click', '#submit', function() {
         // catch the form's submit event
                    // Send data to server through the Ajax call
                    // action is functionality we want to call and outputJSON is our data
                        $.ajax({
                          url: 'PeticionesPlanillero.php',
                                type: 'post',    
                            data: {
                              Bandera: "EditarMarcador",
                              idPartido:$('#partido').val(),
                              Primero:$('#primero').val(),
                              Segundo:$('#segundo').val()
                                     },
                            success: function (result) {
                                  var data = $.parseJSON(result);
                                  if(data.Salida === true){
                if(data.Mensaje === true){
                   var hola =$('#myPopup1').popup();
             setTimeout( function(){ $('#myPopup1').popup('open') }, 200 );  
                }else{
                     var hola =$('#myPopup').popup();
             setTimeout( function(){ $('#myPopup').popup('open') }, 200 );  
                }
             }else{
              alert(data.Mensaje);
             }
                            },
                            error: function (request,error) {
                                // This callback function will trigger on unsuccessful action                
                                alert('No  hay internet!!');
                            }
                        });                   
                
            });    
    });
    
                
    </script>
</html>
