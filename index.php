<?php
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>Inicio</title>
      <?php include('modulos/metahead.php'); ?>
    </head>
    <body>
      <?php include('modulos/navmenu.php'); ?>
          <div class="portada h-100 p-5 py-5 text-center align-middle">
            <div class="row text-light my-5 align-middle">
              <div class="container my-5 align-middle">
                <div class="col-md-12 px-5 py-5 my-5 text-center">
                  <h3 class="h2">Nada nos Detiene</h3>
                  <p class="text-center">
                    Nuestros servicios y productos están a su dispocisión, puede averiguar donde encontrarnos, que ofrecemos,
                    lo que ofrecemos.
                  </p>
                  <a href="catalogo.php" class="btn btn-danger align-middle btn-block text-center d-inline p-2 px-5">Mas Información</a>
                </div>
              </div>
            </div>
          </div> 

          <div class="container w-100 h-100 p-5">
            <div class="row my-5">
              <div class="nosotros col-md-6 p-5 backgroundfooter text-light">
                <h3 class="h2">¿Quienes Somos?</h3>
                  <p class="text-justify my-5">Ferretería Tamayo S.A.S. es una compañía con
                    sentido católico con mas de 20 años de
                    experiencia en el campo de la comercialización
                    de artículos para acueducto en obras de toda
                    escala.
                    Tenemos la experiencia y la pericia para cumplir
                    con las necesidades de nuestros clientes, lo que
                    nos ha permitido servir a múltiples compañías.
                    Nuestros proveedores son seleccionados
                    minuciosamente con el fin de brindarle
                  </p>
                  <a href="nosotros.php" class="col-md-6 btn btn-outline-light align-middle btn-block">Mas Información</a>
              </div>
              <div class="col-md-6 col align-self-center">
                <img src="imgs/imagen3.jpg" alt="nosotros" class="img-fluid ">
              </div>
            </div>
            <div class="row my-5">
              <div class="col-md-6 col align-self-center">
                <img src="imgs/imagen4ALTER.png" alt="contactenos" class="img-fluid">
              </div>
              <div class="col-md-6 p-5 backgroundnavbar text-light">
                <h3 class="h2">Contáctenos</h3>
                  <p class="text-justify my-5">
                    Estamos a su servicio, cualquier duda o inquietud que tenga no dude en comunicárnosla. <br>
                    Carrera 22 # 69 - 55, Barrio 7 de Agosto <br> 
                    (+57) 217 5154 <br>
                    ftamayoventas@gmail.com <br>
                    O directamente a través de nuestro portal web en le siguiente enlace.  <br>
                  </p>
                  <div class="row"><a href="contactenos.php" class="col-md-6 btn btn-outline-light align-middle btn-block">Mas Información</a></div>

              </div>
            </div>
          </div>
          
        <?php include_once('modulos/modales.php'); ?>
        <?php include_once('modulos/footer.php'); ?>

    </body>
</html>