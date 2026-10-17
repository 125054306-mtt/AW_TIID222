<?php
    /* CONEXION */
    include("conexion.php");

    $con = conectar();

    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    $sql = "UPDATE alumnos SET nombre='$nombre', apellido_p ='$apellido_p', apellido_m='$apellido_m', edad='$edad' WHERE matricula='$matricula'";
    $query = mysqli_query($con, $sql);
    if ($query) {
        Header("Location: alumnos.php");
    }
    ?>
    