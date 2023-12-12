<?php    include 'Static/connect/conexion.php';  ?>

<?php
    session_start();

    session_destroy();
    header("Location: login.php");
?>
