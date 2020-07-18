<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
      <meta charset="utf-8">
      <title>Catálogo</title>
      <?php include('modulos/metahead.php'); ?>
</head>
<body>
<?php include('modulos/navmenu.php'); ?>

<div class="row">
  <div class="col-md-12 text-center p-3 backgroundnavbar text-light my-1">
    <h2 class="font-weight-bold h1 display-4">Catálogo</h2>
    <h6 class="h5">De click sobre la categoría que busca</h6>
  </div>
</div>

<div class="row">
  <div class="container p-3 plain">

    <?php include_once('php/catalogopublico.php'); ?>
    
  </div>

</div>

<?php include_once('modulos/modales.php'); ?>
<?php include_once('modulos/footer.php'); ?>
        
    </body>
</html>