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
        <h2>Lista de Clientes</h2>
        <form name="frm" id="frm" method="POST" action="opClientes.php">
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
                    <th>APELLIDO</th>
                    <th>CORREO</th>
                    <th>CONTRASEÑA</th>
                    <th>TELEFONO</th>
                    <th>GÉNERO</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Static/connect/conexion.php';
                $sql = "SELECT * FROM clientes";
                $result = mysqli_query($conexion, $sql);

                if ($result->num_rows > 0) {
                    while($row = mysqli_fetch_assoc($result)) {?>
                        <tr>
                            <td><?=$row["idCliente"]?></td>
                            <td><?=$row["nombre"]?></td>
                            <td><?=$row["apellido"]?></td>
                            <td><?=$row["email"]?></td>
                            <td><?=$row["contra"]?></td>
                            <td><?=$row["telefono"]?></td>
                            <td><?=$row["Genero"]?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#mdEliminar"><i class="fas fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#mdActualizar"><i class="fas fa-pencil-alt"></i></button>
                            </td>
                        </tr>

                        <!--Modal para borrar -->
                        <div class="modal fade " id="mdEliminar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Desea eliminar al cliente <?=$row["nombre"]?> definitivamente
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="submit" class="btn btn-danger" name="btnEliminar">Eliminar</button>
                            </div>
                            </div>
                        </div>
                        </div>

                        <!--Modal actualizar-->
                        <div class="modal fade" id="mdActualizar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualización</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
        
                                <!-- Nombre -->
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Nombre:</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$row['nombre']?>"
                                onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
                                </div>

                                <!-- Apellido -->
                                <div class="mb-3">
                                <label for="apellido" class="form-label">Apellido:</label>
                                <input type="text" name="apellido" id="apellido" class="form-control" value="<?=$row['apellido']?>"
                                onchange="frm.apellido.value=frm.apellido.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="app">Ingresa el apellido válido!!</p>
                                </div>

                                <!-- Teléfono -->
                                <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono:</label>
                                <input type="text" name="telefono" id="telefono" class="form-control" value="<?=$row['telefono']?>"
                                 onkeypress="if(event.keyCode<48 || event.keyCode >57){ event.returnValue=false; }">
                                <p class="alert alert-danger d-none" id="tel">Ingresa el número de teléfono válido!!</p>
                                </div>

                                <!-- Email -->
                                <div class="mb-3">
                                <label for="email" class="form-label">E-mail:</label>
                                <input type="text" name="email" id="email" class="form-control" value="<?=$row['email']?>">
                                <p class="alert alert-danger d-none" id="mail">Ingresa el correo válido!!</p>
                                </div>

                                <!-- Contra -->
                                <div class="mb-3">
                                <label for="contrasena" class="form-label">Contraseña:</label>
                                <input type="text" name="contrasena" id="contrasena" class="form-control" value="<?=$row['contra']?>"
                                onchange="frm.direccion.value=frm.direccion.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="dir">Ingresa la contraseña!!</p>
                                </div>

                                <div class="mb-3">
                                <label for="sexo" class="form-label">Género:</label>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lsexo" id="lsexo1" value="Mujer">
                                    <label class="form-check-label" for="lsexo1">Mujer</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lsexo" id="lsexo2" value="Hombre">
                                    <label class="form-check-label" for="lsexo2">Hombre</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="lsexo" id="lsexo3" value="Otro">
                                    <label class="form-check-label" for="lsexo3">Otro</label>
                                </div>
                                <p class="alert alert-danger d-none" id="s">Selecciona tu género!!</p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                <button type="button" class="btn btn-success" name="btnGuardar">Guardar</button>
                            </div>
                            </div>
                        </div>
                        </div>
                   <?php }
                } else {
                    echo "<tr><td colspan='3'>No hay servicios disponibles</td></tr>";
                }
                $conexion->close();
                ?>
                <!--Modal actualizar-->
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
                            <input type="text" name="nombre" id="nombrer" class="form-control" onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                            <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</body>
</html>