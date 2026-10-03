<?php
    /* Incluye informacion del archivo conexion.php */
    include("conexion.php");

    /* Mandamos a llamr para ejecutar la funcion */
    $con = conectar();

    /* Dame todo lo que tengas en la tabla de alumnos */
    $sql = "SELECT * FROM alumnos";

    /*  */
    $query = mysqli_query($con, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD DE ALUMNOS</title>
</head>
<body>
    <BODY bgcolor="#a4946e">
        <FONT COLOR="White"> 
        <div>
        <font size="+10">TABLA DE ALUMNOS</font size="+10">
        <br>
        <table border="2">
            <thead>
               <tr> 
                    <th>Matrícula</th>
                    <th>Nombre</th>
                    <th>Apellido Paterno</th>
                    <th>Apellido Materno</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while($row=mysqli_fetch_array($query)){
                ?>
                 <tr>
                        <td><?php echo $row['matricula']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['apellido_p']?></td>
                        <td><?php echo $row['apellido_m']?></td>
                        <td><?php echo $row['edad']?></td>
                </tr>
                <?php
                    }
                ?>
            </tbody>
        </table>
</div>
<div>
    <h1>Formulario</h1>

    <from action="insertar.php" method="POST">

        <div style="display: flex; gap: 10px;">

            <input type="text"
                class="form-control"
                name="matricula"
                placeholder="Matrícula">

            <input type="text"
                class="form-control"
                name="nombre"
                placeholder="Nombre">

            <input type="text"
                class="form-control"
                name="apellido_p"
                placeholder="Apellido Paterno">

            <input type="text"
                class="form-control"
                name="apellido_m"
                placeholder="Apellido Materno">

            <input type="text"
                class="form-control"
                name="edad"
                placeholder="Edad">
            
            <button type="submit">Guardar</button>

        </div>
    
</form>
</di>


</body>
</html>