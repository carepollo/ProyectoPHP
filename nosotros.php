<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Nosotros</title>
      <?php include('modulos/metahead.php'); ?>
    </head>
    <body>
    <?php include('modulos/navmenu.php'); ?>

          <div id="portait"> 
              <div class="row w-100">
                <div class="col-md-6 col align-self-start col align-self-center">
                    <div class="portait-content-left px-5">
                        <p class="w-50 mt-5 text-justify">
                            A través de este apartado usted
                            podrá conocer lo que ofrecemos y
                            a quienes vendemos nuestros
                            servicios.                        </p>
                    </div>
                </div>
                <div class="col-md-6 col align-self-end text-right">
                    <div class="portait-content-right">
                        <img src="imgs/imagen6.png" alt="portada" class="img-fluid float-right">
                    </div>
              </div>    
          </div>

          <div class="container w-100 h-100 p-5">
            <div class="row my-5">
              <div class="col-md-6 col align-self-center">
                <img id="targetImage" src="imgs/pavco.png" alt="nosotros" class="img-fluid ">
              </div>
              <div class="backgroundnavbar col-md-6 p-5 text-light">
                <h3 class="h2">Nuestros Proveedores</h3>
                <ul class="proveedoreslist list-unstyled">
                    <li onmouseover="changeAttr('targetImage', 'imgs/pavco.png')" class="h4">Pavco</li>
                    <li onmouseover="changeAttr('targetImage', 'imgs/celta.png')" class="h4">Celta</li>
                    <li onmouseover="changeAttr('targetImage', 'imgs/gplas.png')" class="h4">Gplast</li>
                    <li onmouseover="changeAttr('targetImage', 'imgs/helbert.jpg')" class="h4">Helbert</li>
                    <li onmouseover="changeAttr('targetImage', 'imgs/helman.png')" class="h4">Helman</li>
                    <li onmouseover="changeAttr('targetImage', 'imgs/grival.png')" class="h4">Grival</li>
                </ul>
              </div>
            </div>
            <div class="row my-5">
              <div class="backgroundfooter col-md-6 p-5 text-light">
                <h3 class="h2">Lo que ofrecemos</h3>
                <ul class="">
                    <li class="h5">PVC (Tubería y accesorios)</li>
                    <li class="h5">Grifería</li>
                    <li class="h5">Valvulería</li>
                    <li class="h5">Galvanizado</li>
                    <li class="h5">Cromado</li>
                    <li class="h5">Hierro Ductil</li>
                    <li class="h5">Red contra incendios</li>
                </ul>
              </div>
              <div class="col-md-6 col align-self-center">
                <img src="imgs/imagen7.jpg" alt="contactenos" class="img-fluid">
              </div>
            </div>
            <div class="row my-5">
              <div class="col-md-12">
                <h3 class="h2">Algunos de Nuestros clientes</h3>
                <div class="card-group">
                  <div class="card">
                    <img class="card-img-top" src="imgs/hicofish.jpg" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Hicofish</h5>
                      <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="imgs/panamericana.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Panamericana</h5>
                      <p class="card-text">This card has supporting text below as a natural lead-in to additional content.</p>
                    </div>
                  </div>
                  <div class="card">
                    <img class="card-img-top" src="imgs/jardineros.png" alt="Card image cap">
                    <div class="card-body">
                      <h5 class="card-title">Jardineros</h5>
                      <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This card has even longer content than the first to show that equal height action.</p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php include_once('modulos/modales.php'); ?>
<?php include_once('modulos/footer.php'); ?>
    </body>
</html>