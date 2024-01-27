<?php
    try{
        $conexion = new PDO("mysql:host=localhost;port=3306;dbname=registro_alumnos",'root','');

        $conex = mysqli_connect("localhost","root","","registro_alumnos");
        $consulta = "SELECT * FROM administrador WHERE ID='0'";
        $resultado = mysqli_query($conex,$consulta);
        $admin = mysqli_fetch_array($resultado);

    }catch(Exception $e){
        echo $e->getMessage();
    }
?>