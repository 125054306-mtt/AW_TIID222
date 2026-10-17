<?php
    /* CONEXION */
    include("conexion.php");
    $con = conectar();

    $id = $_GET['id'];

    $sql = "SELECT * FROM alumnos WHERE matricula='$id'";

    $query = mysqli_query($con, $sql);

    $row = mysqli_fetch_array($query);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar alumnos</title>
</head>
<body>
    <h1>Formulario</h1>

            <form action="actualizar.php" method="POST">

                <div style="display: flex; gap: 10px;">

                    <input type="text"
                        class="form-control"
                        name="matricula"
                        placeholder="Matrícula"
                        value= "<?php echo $row['matricula'] ?>">

                    <input type="text"
                        class="form-control"
                        name="nombre"
                        placeholder="Nombre"
                         value= "<?php echo $row['nombre'] ?>">

                    <input type="text"
                        class="form-control"
                        name="apellido_p"
                        placeholder="Apellido Paterno"
                         value= "<?php echo $row['apellido_p'] ?>">

                    <input type="text"
                        class="form-control"
                        name="apellido_m"
                        placeholder="Apellido Materno"
                         value= "<?php echo $row['apellido_m'] ?>">

                    <input type="text"
                        class="form-control"
                        name="edad"
                        placeholder="Edad"
                         value= "<?php echo $row['edad'] ?>">
                    <input type="submit"
                        value = "Actualizar">
                </div>
            </form>
</body>
</html>