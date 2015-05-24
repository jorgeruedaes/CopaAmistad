 $(document).on("pagebeforecreate", function () {

   $("#enviar").off('click').on('click', function () {
                                var usu = $("#user").val();
                                var pass = $("#pass").val();
                                $.post('login.php', {usu: usu, pass: pass}, function (respuesta) {
                                    if (respuesta == 1) {
                                  //      $.mobile.changePage("moduloplanilla.php");
                                    }
                                    else {
                                //       $.mobile.changePage("#pagina1");
                                    }
                                });
                            });
 });
 