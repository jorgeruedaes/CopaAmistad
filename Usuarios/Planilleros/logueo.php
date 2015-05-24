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
        <!--<script type="text/javascript" src="Planillero.js"></script>-->
        <script type="text/javascript" src="../../js/jquery.mobile-1.4.3.js"></script>
        <!--- AQUI AGREGAN SUS SCRIPTS -->
        <!-- ///////////////////////// -->
    </head>
    <body> 
        <div data-role="page" id="pagina0">  
            <div data-role="header">
                <a href="../../index.php" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/carat-l-black.png"></a>
                <h1 style="height: 2%;margin: auto;">Modulo Planillero</h1></div>

            <div data-role="main" class="ui-content">
                <!--- AQUI INICIA SU CODIGO -->
                <!-- ///////////////////////// -->
                <form style="font-family: Century Gothic;font-size:smaller;"  method="post">
                    <cite>Estos campos son obligatorios.</cite>
                    <label>Usuario:</label>
                    <input type="text" name="user" id="user" required/>
                    <label>Contraseña:</label>
                    <input type="password" name="pass" id="pass"/>
                    <input id="enviar" type="submit" value="Iniciar sesión" name="enviar">
                </form>

            </div>

        </div>
        <div data-role="page" id="pagina1">  
            <div data-role="header">
                <a href="../../index.php" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/carat-l-black.png"></a>
                <h1 style="height: 2%;margin: auto;">Modulo Planillero</h1></div>

            <div data-role="main" class="ui-content">
                <!--- AQUI INICIA SU CODIGO -->
                <!-- ///////////////////////// -->
                <center>
                    <div style="width: 50%;padding: 10px">
                        <label>Usuario y/o contraseña incorrectos</label>
                        <img src="" style="width:100px;height:100px">
                        <a style="  background-color: #BDC3C7;
                           border-radius: 10px;" href="#pagina0" class="ui-btn ui-btn-inline ui-icon-back ui-btn-icon-right">Volver</a>
                    </div>
                </center>



            </div>

        </div>

    </body>  
      
<script>

//        $(document).on("pagecreate", "#pagina0", function () {
            

        $(document).ready(function () {
              $("#enviar").off('click').on('click', function () {
                                var usu = $("#user").val();
                                var pass = $("#pass").val();
                                $.post('login.php',{usu:usu,pass:pass},function(respuesta) {
                                   
                                      $.mobile.changePage("moduloplanilla.php");
                                   
                                });
                            });
        });
       </script>
</html>
    

<?php
mysql_close($con);
?>