<?php

    /* Creacionde una funcion llamada conectar */
    /* Funcion -> Bloque de codigo que podemos mandar a llamar cuando lo necesitemos */
    function conectar() {
        /* Informacion del sevidor */
        $host="localhost";
        $user="root";
        $pass="";

        /* Base de datos */
        $db="aw_crud";

        /* Funcion de PHP que permite conectar a MYSQL */
        $con=mysqli_connect($host,$user,$pass);

        /* Con eso nosotros les estamos diciendon que BD vamos a utilizar, pasamos la informacion */
        mysqli_select_db($con,$db);

        return $con;

    }


?>