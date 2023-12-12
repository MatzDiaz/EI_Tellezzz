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
        <h2>Citas</h2>
        <div class="container mt-3">
            <div class="text-start">
                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#mdRegistro">Registrar</button>
            </div>
        </div><br>
        <table class="table table-hover">
            <thead>
                <tr class="table-dark">
                    <th>ID</th>
                    <th>CLIENTE</th>
                    <th>SERVICIO</th>
                    <th>FECHA</th>
                    <th>HORA</th>
                    <th>ESTADO</th>      
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'Static/connect/conexion.php';
                $sql = $conexion->query("SELECT idCita,servicios.idServicios, nombre, especialidad, fecha, hora, estado
                FROM citas INNER JOIN cliente on citas.idCliente = cliente.idCliente
                INNER JOIN servicios on citas.idServicios = servicios.idServicios");
                $sql2 = $conexion->query("SELECT * FROM servicios");
                
                    while($datos = $sql->fetch_object()) {
                       
                        ?>
                        <tr>
                            
                            <?php //$sql = $conexion->query("SELECT nombre FROM cliente where idCliente = $datos->idCliente ");?>
                            <?php //$sql = $conexion->query("SELECT especialidad FROM servicios where idServicios = $datos->idServicios");?>
                            
                            <td name="id"><?=$datos->idCita?></td>
                            <td><?=$datos->nombre?></td>
                            
                            <td><?=$datos->especialidad?></td>
                            <td><?=$datos->fecha?></td>
                            <td><?=$datos->hora?></td>
                            <td><?=$datos->estado?></td>
                            <td>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#mdEliminar<?=$datos->idCita?>"><i class="fas fa-trash-alt"></i></button>
                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#mdActualizar<?=$datos->idCita?>"><i class="fas fa-pencil-alt"></i></button>
                            </td>

                        <!--Modal para borrar -->
                        <form name="frm" id="frm" method="POST" action="opCitas.php">
                        <div class="modal fade" id="mdEliminar<?=$datos->idCita?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Eliminación</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name="idC" value="<?=$datos->idCita?>" hidden>
                                Desea eliminar la cita de <?=$datos->nombre?> a <?=$datos->especialidad?> definitivamente
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
                        <form name="frm" id="frm" method="POST" action="opCitas.php">
                        <div class="modal fade" id="mdActualizar<?=$datos->idCita?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Actualización</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input name = "idCl" id="idCl" value="<?=$datos->idCita?>" hidden>
                                <!-- Servicio -->
                                
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Responsable :</label>
                                <input type="text" name="nombre" id="nombre" class="form-control" value="<?=$datos->nombre?>"
                                onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
                                </div>
                                <!-- Servicicos -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Servicio :</label>
                                    <select name="servicio" id="servicio" class="form-control">
                                    <?php
                                    // Obtener todos los servicios de la tabla 'servicios'
                                    $queryServicios = $conexion->query("SELECT * FROM servicios");

                                    while ($servicio = $queryServicios->fetch_object()) {
                                        // Verificar si el servicio actual es el que está asociado a la cita
                                        $seleccionado = ($servicio->idServicios == $datos->idServicios) ? 'selected' : '';

                                        // Generar opción del select
                                        echo "<option value=\"$servicio->idServicios\" $seleccionado>$servicio->especialidad - $servicio->precio</option>";
                                    }
                                    ?>
                                </select>

                                </div>
                                <!-- Fecha -->
                                <div class="mb-3">
                                <label for="fecha" class="form-label">Selecciona una fecha para la cita:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>" value ="<?=$datos->fecha?>">
                                <p class="alert alert-danger d-none" id="app">Ingresa el apellido válido!!</p>
                                </div>

                                <!-- Hora -->
                                <div class="mb-3">
                                
                                <label for="hora" class="form-label">Selecciona una hora:</label>
                                <select name="hora" id="hora" class="form-control">
                                    <?php
                                    // Genera las opciones desde las 8 AM hasta las 7 PM
                                    for ($hora2 = 8; $hora2 <= 19; $hora2++) {
                                        // Ajusta el formato de las horas (puedes usar 'h' para formato de 12 horas si lo prefieres)
                                        $horaFormato = sprintf('%02d:00:00', $hora2);
                                        
                                        $seleccionado = ($horaFormato == $datos->hora) ? 'selected' : '';
                                        echo "<option value=\"$horaFormato\" $seleccionado>$horaFormato</option>";
                                    }
                                    ?>
                                </select>
                                </div>
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Estado :</label>
                                <input type="text" name="estado" id="estado" class="form-control" value="<?=$datos->estado?>"
                                onchange="frm.nombre.value=frm.nombre.value.toUpperCase()">
                                <p class="alert alert-danger d-none" id="nom">Ingresa el nombre válido!!</p>
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
                <form name="frm" id="frm" method="POST" action="opCitas.php">
                <div class="modal fade" id="mdRegistro" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Nuevo cliente</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                                    <!-- Servicio -->
                                
                                <div class="mb-3">
                                <label for="nombre" class="form-label">Responsable :</label>
                                <select name="cliente" id="servicio" class="form-control">
                                    <?php
                                    // Obtener todos los servicios de la tabla 'servicios'
                                    $queryServicios = $conexion->query("SELECT * FROM cliente");
                                    while ($cliente = $queryServicios->fetch_object()) {
                                        // Generar opción del select
                                        echo "<option value=\"$cliente->idCliente\">$cliente->idCliente - $cliente->nombre</option>";
                                    }
                                    ?>
                                </select>
                                </div>
                                <!-- Servicicos -->
                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Servicio :</label>
                                    <select name="servicio" id="servicio" class="form-control">
                                    <?php
                                    // Obtener todos los servicios de la tabla 'servicios'
                                    $queryServicios = $conexion->query("SELECT * FROM servicios");

                                    while ($servicio = $queryServicios->fetch_object()) {
                                        // Verificar si el servicio actual es el que está asociado a la cita
                                        $seleccionado = ($servicio->idServicios == $datos->idServicios) ? 'selected' : '';

                                        // Generar opción del select
                                        echo "<option value=\"$servicio->idServicios\" $seleccionado>$servicio->especialidad - $servicio->precio</option>";
                                    }
                                    ?>
                                </select>

                                </div>
                                <!-- Fecha -->
                                <div class="mb-3">
                                <label for="fecha" class="form-label">Selecciona una fecha para la cita:</label>
                                <input type="date" class="form-control" id="fecha" name="fecha" min="<?php echo date('Y-m-d'); ?>" value ="<?=$datos->fecha?>">
                                </div>

                                <!-- Hora -->
                                <div class="mb-3">
                                
                                <label for="hora" class="form-label">Selecciona una hora:</label>
                                <select name="hora" id="hora" class="form-control">
                                    <?php
                                    // Genera las opciones desde las 8 AM hasta las 7 PM
                                    for ($hora2 = 8; $hora2 <= 19; $hora2++) {
                                        // Ajusta el formato de las horas (puedes usar 'h' para formato de 12 horas si lo prefieres)
                                        $horaFormato = sprintf('%02d:00:00', $hora2);
                                        
                                        $seleccionado = ($horaFormato == $datos->hora) ? 'selected' : '';
                                        echo "<option value=\"$horaFormato\" $seleccionado>$horaFormato</option>";
                                    }
                                    ?>
                                </select>
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