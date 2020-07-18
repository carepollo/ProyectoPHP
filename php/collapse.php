<?php
/*
include_once('global.php');
$base = new ContactoDB();
$contenedores = new ElementosHTML();
*/

            $producto = $base->leerCondicionado('nombre_producto, marca, medida, precio, estado, logo, pertenece_categoria, id_producto', 'productos', 'pertenece_categoria', $nombre_categoria);
            $titulo_convertido = $contenedores->convertirId($nombre_categoria, false);
            $nuevo_collapse = '<div class="card-body">
                            <button class="btn btn-success my-2" data-toggle="modal" data-target="#addProduct" id="addProductAction-' . $titulo_convertido. '" onclick="ajaxValue(' . "'seleccionarCategoria',['" . $nombre_categoria . "']" . ')"><i class="fa fa-plus-circle addicon"></i>Agregar Producto</button>';
            $a = 0;
            while ($a < sizeof($producto)){
                $producto_convertido = $contenedores->convertirId($producto[$a][0], false);
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
                                            $contenedores->generar_productoPrivado($producto[$a]);
                if (!empty($producto[$a - 1])){
                    if ($producto[$a - 1][0] == $producto[$a][0]){
                        $nuevo_collapse .= $contenedores->generar_productoPrivado($producto[$a]);
                    }
                    else{
                        $nuevo_collapse .= '</tbody>
                                        </table>
                                    </div>
                                </div>';
                        $nuevo_collapse .= $grupo_productos;
                    }
                }
                else{
                    $nuevo_collapse .= $grupo_productos;
                }
                $a++;
            }
            $nuevo_collapse .= '</tbody>
                            </table>
                        </div>
                    </div>
                </div>';

                ?>