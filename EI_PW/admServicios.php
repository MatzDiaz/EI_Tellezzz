<?php include 'Usertype.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Servicios</h2>
        <div class="container mt-3">
            <div class="text-start">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdRegistro">Registrar</button>
            </div>
        </div><br>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>SERVICIO</th>
                    <th>PRECIO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Static/connect/conexion.php';
                $sql = $conexion->query("SELECT * FROM servicios");
                    while($datos = $sql->fetch_object()) {?>
                        <tr>
                            <td name="id"><?=$datos->idServicios?></td>
                            <td><?=$datos->especialidad?></td>
                            <td><?=$datos->precio?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#mdEliminar<?=$datos->idServicios?>"><i class="fas fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#mdActualizar<?=$datos->idServicios?>"><i class="fas fa-pencil-alt"></i></button>
                            </td>

                        <!--Modal para borrar -->
                        <form name="frm" id="frm" method="POST" action="opServicios.php">
                        <div class="modal fade" id="mdEliminar<?=$datos->idServicios?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name="idPre" value="<?=$datos->idServicios?>" hidden>
                                Desea eliminar al cliente <?=$datos->especialidad?> definitivamente
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                        
                        <!--Modal actualizar-->
                        <form name="frm" id="frm" method="POST" action="opServicios.php">
                        <div class="modal fade" id="mdActualizar<?=$datos->idServicios?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualización</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name = "idP" value="<?=$datos->idServicios?>" hidden>
                                <!-- Servicio -->
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$datos->especialidad?>">
                                <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
                                </div>

                                <!-- Precio -->
                                <div class="mb-3">
                                <label for="precio" class="form-label">Precio:</label>
                                <input type="text" name="precio" id="precio" class="form-control" value="<?=$datos->precio?>">
                                <p class="alert alert-danger d-none" id="app">Ingresa un precio válido!!</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-success" name="btnGuardar">Guardar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                        </form>
                        </tr>
                   <?php }  ?>

                <!--Modal Registro-->
                <form name="frm" id="frm" method="POST" action="opServicios.php">
                <div class="modal fade" id="mdRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo servicio</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
    
                            <!-- Nombre -->
                            <div class="mb-3">
                            <label for="nombreS" class="form-label">Nombre:</label>
                            <input type="text" name="nombreS" id="nombreS" class="form-control" onchange="validarNombre()">
                            <p class="alert alert-danger" id="nom" style="display: block;">Ingresa el nombre válido!!</p>
                            </div>

                            <!-- Precio -->
                            <div class="mb-3">
                            <label for="precioS" class="form-label">Precio:</label>
                            <input type="text" name="precioS" id="precioS" class="form-control" onchange="validarPrecio()">
                            <p class="alert alert-danger" id="pre" style="display: block;">Ingresa un Precio válido!!</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="btnRegistrar" id="btnEnviar">Enviar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    </form>
            </tbody>
        </table>
    </div>
    <script src="Static/js/appvlidacion.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>