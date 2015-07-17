
<?php
include('../conexion.php');
?>
<html>
    <head>
        <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
        <title>Restaurar contraseña</title>
        <script type="text/javascript" src="../js/jquery-1.11.2.js"></script>

        <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
        <link rel="stylesheet" href="../bootstrap/css/bootstrap-theme.css">
        <script src="../bootstrap/js/bootstrap.min.js"></script>

        <script src="../dist/sweetalert.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
    </head>
    <body>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <h2 style="color:#27AE60;">Restaurar contraseña</h2><hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4"> 
                        <label>Nombre de usuario</label>
                        <input type="text" name="user" id="user" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4"> 
                        <label>Correo electrónico:</label>
                        <input type="text" name="correo" id="correo" class="form-control">                    
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 col-md-offset-4  text-right"> 
                        <button type="submit" name="restaurar" id="restaurar" class="btn btn-success">Restaurar</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <br>
                    </div>
                </div>
                <div hidden="true" id="div_restaurar">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"> 
                            <label>Pregunta secreta:</label>
                            <p id="pregunta"></p>

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2"> 
                            <label>Respuesta:</label>
                            <input type="email" name="rta" id="rta" class="form-control">                        
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2 text-right"> 
                            <button type="submit" name="enviar" id="enviar" class="btn btn-success" data-toggle="modal" >Enviar</button>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" hidden="true" id="rtacorrecta">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <input type="text" hidden="true" id="usr">
                    </div>
                </div>
            </div>
        </div>


        <div class="modal fade" id="myModal" tabindex="-1" data-jugador="" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Nueva contraseña</h4>

                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <form>
                                    <div class="row">
                                        <div class="col-md-8 col-md-offset-2 form-group">
                                            <label>Nueva contraseña:</label>
                                            <input type="password" name="newpass" id="newpass" class="form-control" required>
                                        </div>
                                        <div class="col-md-8 col-md-offset-2">
                                            <br>
                                        </div>
                                        <div class="col-md-8 col-md-offset-2 form-group">
                                            <label>Confirmar contraseña:</label>
                                            <input type="password" name="newpass1" id="newpass1" class="form-control" required="">
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" id="identificador"/>
                        <button type="button" class="btn btn-success guardar" id="guardar">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script >
        $(document).ready(function () {
            $('#restaurar').off('click').on('click', function () {
                var Usuario = $('#user').val();
                var Correo = $('#correo').val();
                $.ajax({
                    url: 'Peticioncontraseña.php',
                    type: "POST",
                    data: {
                        Bandera: "Comprobar",
                        Usuario: Usuario,
                        Correo: Correo
                    },
                    success: function (resp) {
                        var resp = $.parseJSON(resp);
                        if (resp.Salida === true) {
                            if (resp.Mensaje === true) {
                                $('#div_restaurar').attr('hidden', false);
                                $("#pregunta").text(resp.Pregunta);
                                $("#rtacorrecta").val(resp.Respuesta);
                                $("#usr").val(resp.IdUsuario);
                            } else {
                                swal("", "El usuario o el correo no existen, intenta nuevamente.", "error");
                                $('#div_restaurar').attr('hidden', true);
                            }
                        } else {
                        }

                    }

                });
            });
            $('#enviar').off('click').on('click', function () {
                var RespuestaUsr = $("#rta").val();
                var RespuestaCorrecta = $("#rtacorrecta").val();
                if (RespuestaUsr === RespuestaCorrecta) {
                    $('.modal').modal('show');
                } else {
                    swal("", "Respuesta incorrecta.", "error");
                }
            });
            $('#guardar').off('click').on('click', function () {
                var Usuario = $('#usr').val();
                var password = $('#newpass').val();
                var password1 = $('#newpass1').val();
                if (password == "" || password1 == "") {
                    swal("", "Digite una contraseña.", "error");
                } else {

                    if (password === password1) {

                        $.ajax({
                            url: 'Peticioncontraseña.php',
                            type: "POST",
                            data: {
                                Bandera: "Cambiar",
                                NuevaContraseña: password,
                                Usuario: Usuario
                            },
                            success: function (resp) {
                                var resp = $.parseJSON(resp);
                                if (resp.Salida === true) {
                                    if (resp.Mensaje === true) {
                                        swal({title: "",
                                            text: "Contraseña modificada correctamente.",
                                            type: "success",
                                            showCancelButton: false,
                                            confirmButtonText: "Aceptar",
                                            closeOnConfirm: false
                                        }, function (isConfirm) {
                                            if (isConfirm) {
                                                window.location.assign("iniciox.php")
                                            }
                                        });
                                    } else {
                                        swal("", "No se pudo modificar la contraseña, intenta de nuevo.", "error");
                                    }
                                } else {

                                    swal("", "Ha ocurrido un error y no se pudo modificar la contraseña", "error");
                                }

                            }

                        });

                    } else {
                        swal("", "Las contraseñas no coinciden.", "error");
                    }
                }
            });


        });


    </script>

</html>

