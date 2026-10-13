<?php
    /* Incluye la informacion del archivo conecxion.php */
    include("conexion.php");

    /* Mandamos a llamar para ejecutar la funcion */
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
      <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 30px;">
        <div>
            <h1>TABLA DE ALUMNOS</h1>
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
                                            
                        <td>
                            <a href="update.php?id=<?php echo $row['matricula']; ?>">Editar</a>
                        </td>
                            <br>
                        <td>
                            <a href="delete.php?id=<?php echo $row['matricula']; ?>">Eliminar</a>
                        </td>

                    </tr>
                    <?php
                        }
                    ?>
                   
                </tbody>
            </table>
        </div>
        <div>
            <h1>Formulario</h1>

            <form action="insertar.php" method="POST">

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
        </div>
    </div>
</body>
</html>
