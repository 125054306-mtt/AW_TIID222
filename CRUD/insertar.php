<?php
    /* CONEXION */
    include("conexion.php");

    $con = conectar();

    /* RECIBIR LA INFORMACION DEL FORMULARIO */
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    /* CONSTRUIMOS LA CONSULTA PARA INSERTAR LA INFORMACION A LA BD */
    $sql = "INSERT INTO alumnos 
    (matricula, nombre, apellido_p, apellido_m, edad)
    VALUES 
    ('$matricula','$nombre','$apellido_p','$apellido_m','$edad')";

    /* EJECUTAMOS LA CONSULTA */
    $query = mysqli_query($con, $sql);

    /* Comprobamos si se inserto o no al alumno */
    if($query){
        header("Location: alumnos.php");
        }
        else{
            echo"Error al insertar al alumno";
        }

?>