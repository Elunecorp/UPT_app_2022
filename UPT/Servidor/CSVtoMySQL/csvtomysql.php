<?php
    require("conexion.php");
    $archivo = fopen("attendance.csv",'r'); #Servidor\CSVtoMySQL\Att\Attendance.csv

    $con=0;
    while(($datos = fgetcsv($archivo,1000, ",")) == true)
    {
        # lee y muestra los datos del archivo.
        echo "Datos del usuario: ".$con."<br>";
        echo "Nombre: ". $datos[0]."<br>";
        echo "Id".$datos[1]."<br>";
        echo "Fecha".$datos[2]."<br>";

        $con++;
        
        // Creamos el SQL para insertar
        $sql = "INSERT INTO usuarios VALUES('', '$datos[0]', '$datos[1]','$datos[2]')";

        #Ejecutamos la sentencia SQL
        if($mysqli->query($sql) === TRUE) {
            echo "SE INSERTO CORRRECTAMENTE <br>";
            
        }
        echo "<br>";
    }
?>

<?php
#    date_default_timezone_set("America/Lima");       #01_09_22 agregamos timezone
#    date("F");


?>
<html>
<head>
<title>Refrescar la URL</title>
<META HTTP-EQUIV="REFRESH" CONTENT="10;URL=csvtomysql.php"> </head>
<body>
Hora:
<script>
miFecha = new Date()
document.write(miFecha.getHours() + ":" + miFecha.getMinutes() + ":" + miFecha.getSeconds())
</script>
</body>
</html>