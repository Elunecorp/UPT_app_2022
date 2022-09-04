<?php
$conexion=mysqli_connect('localhost','root','','upt','3306');   # Probando con localhost = 192.168.2.27
        if($conexion){
            echo("Conexion exitosa");
            #return $conexion;
        }
        else{
            return 'Error en la conexion ';
        }  
    
?>  