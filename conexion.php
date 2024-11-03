<?php
    $HOST="localhost";
    $PUERTO=3306;
    $USUARIO="root";
    $PASSWORD="";
    $DB="uniquindio";

    function conectarse(){
        global $HOST, $PUERTO, $USUARIO, $PASSWORD, $DB;

        if(!($connection=mysqli_connect($HOST, $USUARIO, $PASSWORD, $DB, $PUERTO))){
            echo "No fue posible conectarse";
            exit();
        }

        return $connection;
    }

    $connection = conectarse();
?>