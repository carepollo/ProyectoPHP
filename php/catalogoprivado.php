<?php
//obteneindo datos de base de datos
require_once('global.php');
$categorias = new ContactoDB();
$contenedor = new ElementosHTML();

//haciendo la consulta para obtener datos
$boton_catalogo = $categorias->leerSimple('nombre', 'categorias');

// impresion de datos
$impresion_final = '';
for ($i = 0 ; $i < sizeof($boton_catalogo) ; $i++){
  $titulo_convertido = $contenedor->convertirId($boton_catalogo[$i], false);

  // confimando si la categoria esta vacia
  if(empty($producto = $categorias->leerCondicionado('nombre_producto, marca, medida, precio, estado, logo, pertenece_categoria, id_producto', 'productos', 'pertenece_categoria', $boton_catalogo[$i]))){
    $impresion_final .= '<div class="card">';
    $impresion_final .= $contenedor->generar_botonCategoriaPrivado($boton_catalogo[$i]);
    $impresion_final .= '<div id="collapse-' . $titulo_convertido . '" class="collapse" aria-labelledby="heading-' . $titulo_convertido . '" data-parent="#accordion">
                          <div class="card-body">
                          <button class="btn btn-success my-2" data-toggle="modal" data-target="#addProduct" id="addProductAction-' . $titulo_convertido. '" onclick="ajaxValue(' . "'seleccionarCategoria',['" . $boton_catalogo[$i] . "']" . ')"><i class="fa fa-plus-circle addicon"></i>Agregar Producto</button>';
    $impresion_final .= '</div>
                      </div>
                    </div>';
  }
  else{
    $impresion_final .= '<div class="card">';
    // cabecera del acordeon
    $impresion_final .= $contenedor->generar_botonCategoriaPrivado($boton_catalogo[$i]);
    // cuerpo del acordeon
    $impresion_final .= '<div id="collapse-' . $titulo_convertido . '" class="collapse" aria-labelledby="heading-' . $titulo_convertido . '" data-parent="#accordion">
                          <div class="card-body">
                            <button class="btn btn-success my-2" data-toggle="modal" data-target="#addProduct" id="addProductAction-' . $titulo_convertido. '" onclick="ajaxValue(' . "'seleccionarCategoria',['" . $boton_catalogo[$i] . "']" . ')"><i class="fa fa-plus-circle addicon"></i>Agregar Producto</button>';
    // imprimir las cajas de productos
    $a = 0;
    while ($a < sizeof($producto)){
      $producto_convertido = $contenedor->convertirId($producto[$a][0], false);
      $añadirSub = "'".$producto[$a][6]. "',". "'" . $producto[$a][0] . "'";
      $grupo_productos = '<div class="card rounded border-secondary my-2">
                            <div class="card-body table-responsive">
                              <div class="row my-2">
                                <div class="col-md-2">
                                  <img src="data:image/png; base64,' . base64_encode($producto[$a][5]) . '" alt="producto" class="img-fluid">
                                </div>
                                <div class="col-md-10">
                                  <h5 class="font-weight-bold">' . $producto[$a][0] . '</h5>
                                  <button class="btn btn-success" data-toggle="modal" data-target="#subProduct" id="addSubProduct-' . str_replace(' ', '_', $producto[$a][0]) .'" onclick="ajaxValue_A(' . "'añadirEjemplar'" . ', [' . $añadirSub . '])">Agregar Ejemplar</button>
                                  <button class="btn btn-danger" id="deleteProduct-' . $producto_convertido .'" name= '.str_replace(' ', '_', $producto[$a][6]).'>Eliminar Producto</button>
                                </div>
                              </div>
                              <table class="table table-sm border-0">
                                <thead>
                                  <tr>
                                    <th scope="col">Acción</th>
                                    <th scope="col">Marca</th>
                                    <th scope="col">Medida</th>
                                    <th scope="col">Precio</th>
                                    <th scope="col">Oferta</th>
                                  </tr>
                                </thead>
                                <tbody>' .
        $contenedor->generar_productoPrivado($producto[$a]);

      // comprobando si hay registro anterior con quien comparar datos para imprimir cierre de etiqueta
      if (!empty($producto[$a - 1])){

        if ($producto[$a - 1][0] == $producto[$a][0]){
          $impresion_final .= $contenedor->generar_productoPrivado($producto[$a]);
        }
        else{
          $impresion_final .= '</tbody>
                            </table>
                          </div>
                        </div>';
          $impresion_final .= $grupo_productos;
        }

      }
      else{
        $impresion_final .= $grupo_productos;
      }
      $a++;
    }
    $impresion_final .= '</tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>';
  }
}

echo $impresion_final;

?>
