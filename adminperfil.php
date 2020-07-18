<?php
session_start();
if (isset($_SESSION["logged"])) {
  $logged = $_SESSION["logged"];
} 
else {
  header("location: index.php");
}


?>
<!DOCTYPE html>
<html>
    <head>
      <meta charset="utf-8">
      <title>ADMIN</title>
      <?php include_once('modulos/metahead.php'); ?>
      
    </head>
<body>

<?php include_once('modulos/navmenu.php'); ?>

<div class="container p-3 my-4 plain">
  <button class="btn btn-success my-2" data-toggle="modal" data-target="#addCategory"><i class="fa fa-plus-circle addicon"></i>Agregar Categoría</button>
  <div id="accordion">

<!-- inicio de impresión-->            
<?php include_once('php/catalogoprivado.php'); ?>      
<!-- fin de impresión -->

  </div>
</div>

<!-- modales -->
<?php include_once('modulos/modales.php'); ?>
<!-- footer -->
<?php include_once('modulos/footer.php'); ?>

<script>

//categorias
ajaxAdd('addCategoryForm', 'php/accionesCatalogo.php', 'accordion');
ajaxAdd('modifyCategoryForm', 'php/accionesCatalogo.php', 'accordion');
ajaxDelete('deleteCategory-', 'accordion');
  
//grupo productos
ajaxAdd_A('addProductForm', 'php/accionesCatalogo.php', 'collapse');
ajaxDelete_A('deleteProduct-', 'collapse');
  
//ejemplares
ajaxAdd_A('addSubForm', 'php/accionesCatalogo.php', 'collapse');
ajaxAdd_A('modifySubForm', 'php/accionesCatalogo.php', 'collapse');
ajaxDelete_A('deleteSub-', 'collapse');

</script>

</body>
</html>