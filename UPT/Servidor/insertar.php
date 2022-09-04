<?php 
    include_once 'conexion.php';
    $con=conexion();


    #CAPTURA DE LOS DATOS
    #$nombre = $_GET['nombre'];
    #$email = $_GET['email'];
    #$password = $_GET['password'];
    #$vacunas = $_GET['nuevoVacunas'];


    $nombre =$_POST['nombre'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    #$usuario_pais=$_POST['pais'];              #Se conserva
    $vacunas=$_POST['vacunas'];

    if($vacunas!=''){
        $sql="INSERT INTO vacunas(nombre) VALUES('$vacunas')";
        $query=mysqli_query($con,$sql);

        #capturamos el id de las vacunas
        $sql="SELECT * FROM vacunas WHERE nombre='$vacunas'";
        $query=mysqli_query($con,$sql);

        $row=mysqli_fetch_array($query);
        $idvacunas=$row['id'];


        #consulta
        $sql="INSERT INTO usuario(nombre,email,password,vacunas) VALUES ('$nombre','$email','$password','$vacunas')";
        $query=mysqli_query($con,$sql);
        if($query){
            header('refresh:0;url=index.php?registrado');
        }else{
            header('refresh:0;url=index.php?error');
        }
    }
    
    else{

    }
?>