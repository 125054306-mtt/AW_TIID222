<?php
/* CONEXION */
    include("conexion.php");

    $con = conectar();

    /* RECIBE LA INFORMACION DEL FORMULARIO */
    $matricula = $_POST['matricula'];
    $nombre = $_POST['nombre'];
    $apellido_p = $_POST['apellido_p'];
    $apellido_m = $_POST['apellido_m'];
    $edad = $_POST['edad'];

    /* CINSTRUIMOS LA CONSULTA PARA INSERTAR LA INFORMACIÓN A LA BS */
    $sql = "INSERT INTO alumnos 
    (matricula, nombre, apellido_p, apellido_m, edad)
    VALUES
    ('$matricula','$nombre','$apellido_p','$apellido_m','$edad')";
    
    /* EJECUTAMOS LA CONSULTA */
    $query = mysqli_query($con, $sql);

    /* COMPROBAMOS SI SE INSERTO O NO EL ALUMNO */
    if($query){
        header("Location: alumnos.php");
        }
        else{
            echo"Erro al insertar el alumno";
        }



?>