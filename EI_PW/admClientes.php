<?php include 'Usertype.php'?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Servicios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script type="text/javaScript" src="Static/js/validaciones.js"></script>
</head>
<body>
    <div class="container mt-4">
        <h2>Lista de Clientes</h2>
        <div class="container mt-3">
            <div class="text-start">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdRegistro">Registrar</button>
            </div>
        </div><br>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CORREO</th>
                    <th>FECHA REGISTRO</th>
                    <th></th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Static/connect/conexion.php';
                $sql = $conexion->query("SELECT * FROM cliente");
                    while($datos = $sql->fetch_object()) {?>
                        <tr>
                            <td name="id"><?=$datos->idCliente?></td>
                            <td><?=$datos->nombre?></td>
                            <td><?=$datos->email?></td>
                            <td><?=$datos->Registro?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdObservar<?=$datos->idCliente?>"><i class="far fa-eye"></i></button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#mdActualizar<?=$datos->idCliente?>"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#mdEliminar<?=$datos->idCliente?>"><i class="fas fa-trash-alt"></i></button>
                            </td>

                        <!--Modal para borrar -->
                        <form name="frm" id="frm" method="POST" action="opClientes.php">
                        <div class="modal fade" id="mdEliminar<?=$datos->idCliente?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name="idC" value="<?=$datos->idCliente?>" hidden>
                                Desea eliminar al cliente <?=$datos->nombre?> definitivamente
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
                        <form name="frm" id="frm" method="POST" action="opClientes.php">
                        <div class="modal fade" id="mdActualizar<?=$datos->idCliente?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualización</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name = "idCl" value="<?=$datos->idCliente?>" hidden>
                                <!-- Nombre -->
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$datos->nombre?>"
                                onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
                                </div>

                                <!-- Apellido -->
                                <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="<?=$datos->apellido?>"
                                onchange="frm.apellido.value=frm.apellido.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="app">Ingresa el apellido válido!!</p>
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="<?=$datos->telefono?>"
                                 onkeypress="if(event.keyCode<48 || event.keyCode >57){ event.returnValue=false; }">
                                <p class="alert alert-danger d-none" id="tel">Ingresa el número de teléfono válido!!</p>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?=$datos->email?>">
                                <p class="alert alert-danger d-none" id="mail">Ingresa el correo válido!!</p>
                                </div>

                                <!-- Contra -->
                                <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="text" name="contrasena" id="contrasena" class="form-control" value="<?=$datos->contra?>"
                                onchange="frm.direccion.value=frm.direccion.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="dir">Ingresa la contraseña!!</p>
                                <input class="form-check-input" type="radio" name="lsexo" id="lsexo2" value="M" hidden>
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

                        <div class="modal fade" id="mdObservar<?=$datos->idCliente?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Información</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name = "idCl" value="<?=$datos->idCliente?>" hidden>
                                <!-- Nombre -->
                                <div class="mb-3">
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$datos->nombre?>" disabled>
                                </div>

                                <!-- Apellido -->
                                <div class="mb-3">
                                <input type="text" name="apellido" id="apellido" class="form-control" value="<?=$datos->apellido?>" disabled>
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                <input type="text" name="telefono" id="telefono" class="form-control" value="<?=$datos->telefono?>" disabled>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                <input type="text" name="email" id="email" class="form-control" value="<?=$datos->email?>" disabled>
                                </div>

                                <!-- Contra -->
                                <div class="mb-3">
                                <input type="text" name="contrasena" id="contrasena" class="form-control" value="<?=$datos->contra?>" disabled>
                                </div>

                                <!--Sexo si porfavor :,)-->
                                <div class="mb-3">
                                <input type="text" name="sexo" id="contrasena" class="form-control disabled" value="<?=$datos->Genero?>" disabled>
                                </div>
                            </div>
                            </div>
                    </tr>
                   <?php }  ?>

                <!--Modal Registro-->
                <form name="frm" id="frm" method="POST" action="opClientes.php">
                <div class="modal fade" id="mdRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
    
                            <!-- Nombre -->
                            <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" oninput="validarNombre()">
                            <p class="alert alert-danger" id="nom" style="display: none;">Ingresa el nombre válido!!</p>
                            </div>

                            <!-- Apellido -->
                            <div class="mb-3">
                            <label for="apellido" class="form-label">Apellido:</label>
                            <input type="text" name="apellidor" id="apellido" class="form-control" onchange="frm.apellido.value=frm.apellido.value.toUpperCase()">
                            <p class="alert alert-danger d-none" id="app">Ingresa el apellido válido!!</p>
                            </div>

                            <!-- Teléfono -->
                            <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="text" name="telefonor" id="telefono" class="form-control" onkeypress="if(event.keyCode<48 || event.keyCode >57){ event.returnValue=false; }">
                            <p class="alert alert-danger d-none" id="tel">Ingresa el número de teléfono válido!!</p>
                            </div>

                            <!-- Email -->
                            <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="text" name="emailr" id="email" class="form-control">
                            <p class="alert alert-danger d-none" id="mail">Ingresa el correo válido!!</p>
                            </div>

                            <!-- Contra -->
                            <div class="mb-3">
                            <label for="contrasena" class="form-label">Contraseña:</label>
                            <input type="text" name="contrasenar" id="contrasena" class="form-control" onchange="frm.direccion.value=frm.direccion.value.toUpperCase()">
                            <p class="alert alert-danger d-none" id="dir">Ingresa la contraseña!!</p>
                            </div>

                            <div class="mb-3">
                            <label for="sexo" class="form-label">Género:</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lsexor" id="lsexo1" value="M">
                                <label class="form-check-label" for="lsexo1">Mujer</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lsexor" id="lsexo2" value="H">
                                <label class="form-check-label" for="lsexo2">Hombre</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="lsexor" id="lsexo3" value="O">
                                <label class="form-check-label" for="lsexo3">Otro</label>
                            </div>
                            <p class="alert alert-danger d-none" id="s">Selecciona tu género!!</p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" name="btnRegistrar">Enviar</button>
                        </div>
                        </div>
                    </div>
                    </div>
                    </form>
            </tbody>
        </table>
    </div>
    <script type="text/javaScript" src="Static/js/validaciones.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>