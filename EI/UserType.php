<?php
    session_start();
    
    

    if (isset($_SESSION['email'])) {
        $user = $_SESSION['email'];
        $password = $_SESSION['contra'];
        echo "<h1>Iniciaste sesion como: ".$user."</h1>"; ?>
        <?php
            

            // Autenticación del administrador
            if ($user == "max175@gmail.com" && $password == "max175") {
                $_SESSION['user_type'] = 'admin';
                // Otros datos del administrador si es necesario
                ?>
                <?php include'includes/header.php' ?>
                <?php
            } else{
                $_SESSION['user_type'] = 'cliente';
                // Otros datos del alumno si es necesario
                ?>
                <?php include'includes/headerClien.php' ?>
                <?php
            }
            
        ?>
        
        <?php
    }else{
        ?>
        
        <?php include'includes/headerCiber.php' ?>
        <?php
    }

?>
