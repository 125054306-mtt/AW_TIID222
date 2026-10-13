<?php

    /* Creacion de una funcion llamada conectar */
    /* Funcion → Bloque de codigo que podemos mandar a llamar cuando lo necesitemos */
    function conectar(){
        /* Informacion del servidor */
        $host="localhost";
        $user="root";
        $pass="";

        /* Base de datos */
        $db="aw_crud";

        /* Funcion de PHP que permite conectar a MySQL */
        $con=mysqli_connect($host,$user,$pass);

        /* Con eso nosotros les estamos diciendo que BD vamos a utilizar, pasamos la informacion de con y de bd */
        mysqli_select_db($con, $db);

        return $con;

    }
?>