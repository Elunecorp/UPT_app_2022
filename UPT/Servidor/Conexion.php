<?php 
    function conexion(){
        $conexion=mysqli_connect('localhost','root','','jvh','3306');
        return $conexion;
    }

?>