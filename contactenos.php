<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Contactenos</title>
      <?php include('modulos/metahead.php'); ?>
    </head>
    <body>
      <?php include('modulos/navmenu.php'); ?>

      
        <div class="contact w-100 h-100 p-5 py-5">
            <div class="row my-5">
              <div class="container plain2 p-4 text-light">
              <form action="" class="form-group form-horizontal" method="POST">
                  <div class="row my-3">
                      <div class="col-md-12 text-center">
                          <h2 class="h3">Describa su Inquietud</h2>
                      </div>
                  </div>
                  <div class="row my-1">
                    <div class="col-md-6 rounded">
                        <label class="control-label col-sm-2" for="nombre">Nombre</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-lg" id="nombre" placeholder="Ingrese Nombre Completo" name="nombre">
                    </div>
                  </div>
                  <div class="col-md-6 rounded">
                      <label class="control-label col-sm-2" for="email">Email</label>
                    <div class="col-sm-10">
                        <input type="email" class="form-control form-control-lg" id="email" placeholder="Ingrese correo" name="email">
                    </div>
                  </div>
                  </div>
                  <div class="row my-1">
                    <div class="col-md-6 rounded">
                        <label class="control-label col-sm-2" for="numerocelular">Celular</label>
                    <div class="col-sm-10">
                        <input type="tel" class="form-control form-control-lg" id="numerocelular" placeholder="Ingrese Numero Celular" name="telefono">
                    </div>
                    </div>
                </div>
                <div class="row my-1">
                    <div class="col-md-12 px-4">
                        <label for="mensaje">Mensaje</label>
                        <textarea class="form-control" id="mensaje" rows="3" placeholder="Ingrese su solicitud" name="mensaje"></textarea>
                    </div> 
                </div>
                <div class="row my-4">
                    <div class="col-md-12 text-center">
                        <button class="btn btn-warning rounded" type="submit"><i class="fa fa-paper-plane mx-2"></i>Enviar Solicitud</button>
                    </div>
                </div>
              </form>
            </div>
          </div> 
        </div>
<?php include_once('modulos/modales.php'); ?>
<?php include_once('modulos/footer.php'); ?>
<?php 

if (!empty($_POST["nombre"] and !empty($_POST["email"]) and !empty($_POST["telefono"]) and !empty($_POST["mensaje"]))) {
  $nombre = $_POST["nombre"];
  $correo = $_POST["email"];
  $telefono = $_POST["telefono"];
  $asunto = "Mensaje del Formulario";
  $cabeceras = "From: noreply@example.com" . "\r\n";
  $cabeceras .= "Reply-To: noreply@example.com" . "\r\n";
  $cabeceras .= "X-Mailer: PHP/" . phpversion();

  $cuerpoMsj = "Nombre: ".$nombre . "\r\n"."Correo: ". $correo ."\r\n" . "Teléfono: " . $telefono . "\r\n" .  $_POST["mensaje"];

  $Mensaje = @mail('carepollo6000@gmail.com', $asunto, $cuerpoMsj, $cabeceras);
  if ($Mensaje) {
    echo "<script>alertify.success('Enviado Correctamente')</script>";
  }
}

        
?>
    </body>
</html>