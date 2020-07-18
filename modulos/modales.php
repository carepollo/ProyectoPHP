<?php
include_once('php/global.php');
$base = new ContactoDB();
$contenedores = new ElementosHTML();
$resultado = $base->buscarConectados();
if ($resultado == 1) {
  $estado_vendedor = $contenedores->vendedorActivo;
}
else {
  $estado_vendedor = $contenedores->vendedorDesconectado;
}
?>
<!-- ventana para chat -->
<!--<div class="modal fade" id="chat" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nuestro Experto te atenderá</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <div class="input-group">
          <?php echo $estado_vendedor; ?>
          <label class="col-form-label"><small class="text-muted text-small">Atención: Lunes-Viernes de 7:00am - 5:00pm, Sabados de 7:00am - 12:00am</small><label>
        </div>
        <div id="log" style="height: 40vh; overflow-y: scroll; overflow-x: hidden; word-break: break-all;" class="border border-secondary rounded p-2">
        </div>
      </div>
      <div class="modal-footer">
        <div class="input-group">
          <input type="text" class="form-control" id="ws_texto" placeholder="Ingrese su mensaje aquí...">
          <button id="ws_sender" class="btn btn-primary ml-1"><i class="fa fa-paper-plane mx-2 addicon"></i>Enviar</button>
        </div>
      </div>
    <div>
  </div>
</div>
</div>
</div>
</div>-->
<!-- ventana para LOGIN -->
<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="login" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Ingresar al Sistema</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            <form action="php/login.php" method="POST" id="loginForm">
              <div class="modal-body">
                <div class="alert alert-warning" role="alert">¡Ateción!, este servicio es exclusivo de la administración</div>
                  <div class="form-group">
                    <label for="username" class="col-form-label">USUARIO</label>
                    <input type="text" class="form-control" id="username" name="username">
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-form-label">CONTRASEÑA</label>
                    <input type="password" class="form-control" id="password" name="password">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="submit" class="btn btn-success">Iniciar Sesión</button>
              </div>
            </form>
            </div>
          </div>
</div>
<!-- ventana para añadir categorias -->
<div class="modal fade" id="addCategory" tabindex="-1" role="dialog" aria-labelledby="addCategoryTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addCategoryTitle">Añadir Categoría</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
      </div>
      <form action="" method="POST" id="addCategoryForm">
        <div class="modal-body">
          <div class="form-group">
            <label for="categoryName" class="col-form-label">Nombre de la Categoría</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName">
          </div>  
        </div>
        <div class="modal-footer" id="algo">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <input type="submit" class="btn btn-success" name="addCategory" id="addCategoryAction" value="Agregar">
        </div>
      </form>
    </div>
  </div>
</div>
<!-- ventana para modificar categorias -->
        <div class="modal fade" id="modifyCategory" tabindex="-1" role="dialog" aria-labelledby="modifyCategoryTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyCategoryTitle">Modificar Categoría</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST" id="modifyCategoryForm">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="categoryName" class="col-form-label">Nombre de la Categoría</label>
                    <input type="hidden" class="form-control categoryNameModify" id="categoryNameReplaced" name="categoryNameReplaced">
                    <input type="text" class="form-control categoryNameModify" id="categoryNameModify" name="categoryNameModify">
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning" id="modifyCategoryAction">Aplicar Cambios</button>
              </div>
              </form>
            </div>
          </div>
        </div>
<!-- ventana para añadir producto (grupo de productos similares)  -->
        <div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="addProductTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="addProductTitle">Añadir Producto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" method="POST" id="addProductForm" enctype="multipart/form-data" name="addProductForm">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="seleccionarNombre" class="col-form-label">Nombre</label>
                    <input type="hidden" class="form-control seleccionarCategoria" id="seleccionarCategoria" name="seleccionarCategoria">
                    <input type="text" class="form-control" id="seleccionarNombre" name="seleccionarNombre" required>
                  </div>
                  <div class="form-group">
                    <div class="input-group-prepend">
                      <label for="seleccionarImagen" class="col-form-label">Imagen</label>
                    </div>
                    <div class="custom-file">
                      <label class="custom-file-label" for="seleccionarImagen">Examinar</label>
                      <input type="file" class="custom-file-input" id="seleccionarImagen" name="seleccionarImagen" aria-describedby="seleccionarImagen" required accept="image/png, image/jpeg">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="seleccionarMarca" class="col-form-label">Marca</label>
                    <input type="text" class="form-control" id="seleccionarMarca" name="seleccionarMarca" required>
                  </div>
                  <div class="form-group">
                    <label for="seleccionarMedida" class="col-form-label">Medida</label>
                    <input type="text" class="form-control" id="seleccionarMedida" name="seleccionarMedida" required>
                  </div>
                  <div class="form-group">
                    <label for="seleccionarPrecio" class="col-form-label">Precio</label>
                    <input type="text" class="form-control" id="seleccionarPrecio" name="seleccionarPrecio" required>
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="seleccionarEstado">
                      </div>
                    </div>
                    <label type="text" class="form-control bg-warning">En Oferta</label>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<!-- ventana para añadir un ejemplar especifico a un grupo de productos -->
        <div class="modal fade" id="subProduct" tabindex="-1" role="dialog" aria-labelledby="subProductTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="subProductTitle">Añadir Ejemplar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" metod="POST" id="addSubForm">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="añadirMarca" class="col-form-label">Marca</label>
                    <input type="hidden" class="form-control añadirEjemplar" name="añadirCategoria">
                    <input type="hidden" class="form-control añadirEjemplar" name="añadirNombre">
                    <input type="text" class="form-control" name="añadirMarca">
                  </div>
                  <div class="form-group">
                    <label for="añadirMedida" class="col-form-label">Medida</label>
                    <input type="text" class="form-control" id="añadirMedida" name="añadirMedida">
                  </div>
                  <div class="form-group">
                    <label for="añadirPrecio" class="col-form-label">Precio</label>
                    <input type="text" class="form-control" id="añadirPrecio" name="añadirPrecio">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" name="añadirEstado">
                      </div>
                    </div>
                    <label type="text" class="form-control bg-warning">En Oferta</label>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-success">Agregar</button>
              </div>
              </form>
            </div>
          </div>
        </div>

<!-- ventana para modificar un producto -->

<div class="modal fade" id="modifyProduct" tabindex="-1" role="dialog" aria-labelledby="modifyProductTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="modifyProductTitle">Modificar Ejemplar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <form action="" metod="POST" id="modifySubForm">
              <div class="modal-body">
                  <div class="form-group">
                    <label for="modificarMarca" class="col-form-label">Marca</label>
                    <input type="hidden" class="form-control modificarSub" id="modificarId" name="modificarId">
                    <input type="hidden" class="form-control modificarSub" id="modificarCategoria" name="modificarCategoria">
                    <input type="hidden" class="form-control modificarSub" id="modificarNombre" name="modificarNombre">
                    <input type="text" class="form-control modificarSub" id="modificarMarca" name="modificarMarca">
                  </div>
                  <div class="form-group">
                    <label for="modificarMedida" class="col-form-label">Medida</label>
                    <input type="text" class="form-control modificarSub" id="modificarMedida" name="modificarMedida">
                  </div>
                  <div class="form-group">
                    <label for="modificarPrecio" class="col-form-label">Precio</label>
                    <input type="text" class="form-control modificarSub" id="modificarPrecio" name="modificarPrecio">
                  </div>
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        <input type="checkbox" aria-label="Checkbox for following text input" class="" name="modificarEstado">
                      </div>
                    </div>
                    <label type="text" class="form-control bg-warning">En Oferta</label>
                  </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <button type="submit" class="btn btn-warning">Aplicar Cambios</button>
              </div>
              </form>
            </div>
          </div>
        </div>
