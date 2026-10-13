<?php
    include("conexion.php")

    $con = conectar();

    $sql = "SELECT * FROM alumnos";

    $query = mysqli_query($con, $sql);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Examen</title>
</head>
<body>
    <div>
        <font size = "+10"> TABLA DE ALUMNOS </font size = "+10">
        <br>
        <table border = "2">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>MARCA</th>
                    <th>STOCK</th>
                    <th>PRECIO</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                 <tr>
                        <td><?php echo $row['id']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['marca']?></td>
                        <td><?php echo $row['stock']?></td>
                        <td><?php echo $row['precio']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
</div>
<div>

    
</body>
</html>