<!DOCTYPE html>
<?php session_start(); ?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <h3>Acceso denegado</h3>
        <p>Descripción: <?php echo $_SESSION['error']; ?></p>
        <?php
        // put your code here
        ?>
        <a href="../controlador/cerrarSesion.php">Regresar</a>
    </body>
</html>
