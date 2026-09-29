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
    <BODY bgcolor="#0B615E">
        <FONT COLOR="White"> 
        <div align='center'>
        <font size="+10">TABLA DE ALUMNOS</font size="+10">
        <br>
        <br>
        <TABLE BORDER="5">
        <TR><TH>Matricula</TH><TH>Nombre</TH><TH>Apellido Paterno</TH><TH>Apellido Materno</TH><TH>Acciones</TH><TH></TH></TR>
        <TR><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
        <TR><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
        <TR><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
        <TR><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
        <TR><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD><TD></TD></TR>
        </TABLE>
        <br>

</body>
</html>