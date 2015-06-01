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
    <style type="text/css">
  hr { 
  background-color: black;
  height: 3px; 
  width: 100%;
}
</style> 
    <body>
        <div data-role="page" id="pagina3">  <!-- PAGINA PRINCIPAL 3 GOLEADORES -->
            <div data-role="panel" id="panel2" style="background-color: black;" > 
                <p style="font-family: Century Gothic;">
                <h3 style="color: white;">Opciones Adicionales</h3>
                <div><a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                        margin-bottom: 10px;" 
                        href="../Menú_Lateral/Noticias.php" data-icon="info-white"  data-transition="Flip">
                        <img src="../../images/icons-png/info-white.png" style="margin-right: 10%;">Noticias
                        <img src="../../images/icons-png/carat-r-white.png" style="margin-left: 50%;"></a></div>

                <h3 style="color: white;">Copa Amistad</h3>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 9px;
                   margin-bottom: 10px;" 
                   href="../Menú_Lateral/Sugerencias.php" data-icon="info"  data-transition="Flip">
                    <img src="../../images/icons-png/comment-white.png" style="margin-right: 9%;">
                    Sugerencias<img src="../../images/icons-png/carat-r-white.png" style="margin-left: 39%;"></a>
                <br><br>
                <a style="text-decoration: initial;color: white;font-weight: 400;font-size:smaller; margin-top: 10px;
                   margin-bottom: 10px;"
                   href="../Menú_Lateral/Acercade.php" data-icon="info"  data-transition="Flip"><img src="../../images/icons-png/gear-white.png" style="margin-right: 10%;">
                    Acerca de<img src="../../images/icons-png/carat-r-white.png" style="margin-left: 43%;"></a>
                </p>
            </div>
            <div data-role="header">
                <a href="#panel2" style="
                   background-color: #8cc63f;
                   border-color: #8cc63f;
                   " class="ui-btn ui-btn-inline ui-corner-all ui-shadow" ><img src="../../images/icons-png/panel.png"></a>
                <h1 style="height: 2%;margin: auto;">Copa Amistad Profesional</h1>
                <div id="iconos" style="height: 8%;">
                    <center> 
                        <span><a href="../Finales/Cuadro.php"  ><img style="width: 30px;width: 30px;margin-right: 8%;margin-left: 7%;" src="../../images/icons-png/star.png"></a></span>
                       <span><a href="../../index.php"><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/calendario.png"></a></span>
                        <span><a href="../Tablas/TablaDePosiciones.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/posiciones.png"></a></span>
                        <span><a href="../Tablas/TablaDeGoleadores.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/goleadores.png"></a></span>
                        <span><a href="../Mi_Equipo/Miequipo.php"  ><img style="width: 30px;margin-right: 8%;" src="../../images/icons-png/miequipo.png"></a></span>
                    </center>
                </div>
            </div>

            <div data-role="main" class="ui-content">
                <div align="center" data-role="list-divider" style="color: black;height: 
                30px;margin-top: 3px;padding-top: 5px; font-family: 
                sans-serif;font-weight: 700;" >Fase final del torneo</div>
               <cite style="  font-family: Century Gothic;
  font-size: smaller;">Cada llave representa un camino hacia la gran final.</cite>
                <div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;font-weight: 700;" > Llave A</div>

<!--  RENGLON INICIA   -->
<table style="width:100%;">
<tr>
<td>
<div style="width:80%;  
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="text-align:center;  font-size: smaller;font-weight: bolder;" width="80%">UIS A</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Deportivo R.G.C</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
<td style="width: 10%;margin-left: 0;margin-right: 0;"><hr></td>
<td>
<!---  -->
<div style="width:80%; 
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="text-align:center;  font-size: smaller;font-weight: bolder;" width="80%">Deportivo Unión</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Profesores UIS</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
</tr>
</table>
<!--- FINALIZA RENGLON -->
<!--  RENGLON INICIA   -->
<table style="width:100%;">
<tr>
<td>
<div style="width:80%;  
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style=" width: 100%;text-align:center;  font-size: smaller;font-weight: bolder;" width="80%">Sergom LTDA</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Copower</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
<td style="width: 10%;margin-left: 0;margin-right: 0;"><hr></td>
<td>
<!---  -->
<div style="width:80%; 
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style=" width: 100%;text-align:center;  font-size: smaller;font-weight: bolder;" width="80%">Amigos del Fútbol</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Abogados</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
</tr>
</table>

<!--- FINALIZA RENGLON -->

<!---  INICIA LLAVE  -->

<div align="center" data-role="list-divider" style="color: black;height: 30px;margin-top: 3px;padding-top: 5px; font-family: sans-serif;font-weight: 700;" > Llave B</div>

<!--  RENGLON INICIA   -->
<table style="width:100%;">
<tr>
<td>
<div style="width:80%;  
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="width: 100%; text-align:center; font-size: smaller;font-weight: bolder;" width="80%">Tecnológico</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Terminal de Transportes</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
<td style="width: 10%;margin-left: 0;margin-right: 0;"><hr></td>
<td>
<!---  -->
<div style="width:80%; 
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="width: 100%;text-align:center;  font-size: smaller;font-weight: bolder;" width="80%">UTS</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Fortaleza profesional</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
</tr>
</table>
<!--- FINALIZA RENGLON -->
<!--  RENGLON INICIA   -->
<table style="width:100%;">
<tr>
<td>
<div style="width:80%;  
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="width: 100%; text-align:center; font-size: smaller;font-weight: bolder;" width="80%">Tercer Tiempo-Aguila</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
  <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Real Sociedad</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
<td style="width: 10%;margin-left: 0;margin-right: 0;"><hr></td>
<td>
<td>
<!---  -->
<div style="width:80%; 
  border-width: thin;
  border-color: black;margin: auto;  margin-top: 2px;margin-bottom: 2px;"class="ui-body ui-body-a ui-corner-all">
  <p>
  <table style="width: 100%;">
  <tr>
 <td style="width: 100%; text-align:center; font-size: smaller;font-weight: bolder;" width="80%">Nueva Generación</td>
 <td style="text-align: center;  font-weight: 800;" width="20"></td>
  </tr>
    <tr>
      <td style="text-align:center;">vs</td>
  </tr>
  <tr>
 <td style="text-align:center;font-size: smaller;font-weight: bolder;" width="80%">Fundesan</td>
 <td style="text-align: center;  font-weight: 800;" width="20%"></td>
  </tr>
  </table>
  </p>
</div>
</td>
</tr>
</table>
<!--- FINALIZA RENGLON -->

            </div>
        </div>
    </body>  
</html>
