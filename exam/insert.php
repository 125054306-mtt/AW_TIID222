<?php
    include("conexion.php");

    $con = conectar();

    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $marca = $_POST['marca'];
    $stock = $_POST['stock'];
    $precio = $_POST['precio'];

    $sql = "INSERT INTO productos 
    (id, nombre, marca, stock, precio)
    VALUES
    ('$id','$nombre','$marca','$stock','$precio')";
    
    $query = mysqli_query($con, $sql);

    if($query){
        header("Location: productos.php");
        }
        else{
            echo"No se pudo insertar el producto";
        }



?>