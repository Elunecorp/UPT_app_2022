<?php     
    # Antes de iniciar a programar con PHP en VSCode deberemos configurar la path del PHP linter , si no es asi tendremos problemas al ejecutar 
    # nuestros archivos en la terminal de VSC.
    # Para esto seguimos los pasos que se muestran en esta pagina:
    # https://code.visualstudio.com/docs/languages/php#_windows
    # o tambien en el video: 
    # Configurar VISUAL STUDIO CODE para PHP:
    # https://www.youtube.com/watch?v=nSd5Q-xmKQo&t=195s&ab_channel=SamTeachYou
    # Una vez este hecho revisaremos nuestro servidor local host en:
    # http://localhost/dashboard/
    # y tendremos que ver la dashboard de Xampp
    # imagenes de esto en: Main\Conexiones\imagenes_configuracion

    include_once 'Conexion.php';  #La sentencia include_once incluye y evalúa el fichero especificado durante la ejecución del script   
    # Debemos especificar la ruta de el fichero , pero como en nuestro caso Conexion.php esta en la misma carpeta que index.php no tendriamso problemas.
    # include_once se puede utilizar en casos donde el mismo fichero podría ser incluido y evaluado más de una vez durante una ejecución particular de un script
    # así que en este caso, puede ser de ayuda para evitar problemas como la redefinición de funciones, reasignación de valores de variables, etc.
    # MAS INFO: https://www.php.net/manual/es/function.include-once.php

    # Elaboramos la funcion if
    # isset --> Determina si una variable está definida y no es null
    # Si una veriable ha sido removida con unset() , esta ya no estara definida.
    # Si una variable ha sido definida como null , isset devolvera false.
    # Si son pasados varios parámetros, entonces isset() devolverá true únicamente si todos los parámetros están definidos.
    # isset solo trabaja con variables 
    # MAS INFO: https://www.php.net/manual/es/function.isset.php

    # Nuestro uso de isset en el programa:
    # si por ejemplo tenemos una variable : $var = 'a';
    # Esto al evaluarse nos dara TRUE por lo que el texto se imprimira:
    #   if(isset($var)) {
    #       echo "Esta variable está definida, así que este texto se imprimirá";}
    #   


    # Para la funcion tendremos en cuenta:
    # MAS INFO: https://es.acervolima.com/php-funcion-isset/
    # Ademas se realizara un test de la funcion if que nos pide evaluar con isset la variable o array $_GET y su valor ["eliminado"]
    # y si isset devuelve true , entonces echo nos imprimira en la pagina la variable $mensaje  , que tiene el valor de '<strong>Usuario eliminado</strong>';
    # recordemos que la etiqueta <strong> es utilizada en HTML para resaltar con enfasis (en negrita) una palabra o texto importante.

    #TEST_01 : En el archivo Test_codigo.php realize el test del uso de la funcion isset en un array de 4 valores 
    # El test fue exitoso :D

    if(isset($_GET["eliminado"]))
        {                             
        $mensaje='<strong class="eliminado">Usuario eliminado</strong>';
        }
    # Else elimnado = FALSE
    else{
        $mensaje='';
        }


    if(isset($_GET["insertado"]))
        {                             
        $mensaje1='<strong class="insertado">>Usuario insertado</strong>';
        }
    # Else insertado = FALSE
    else{
        $mensaje1='';
        }
    # Eso seria todo el codigo , pondremos la etiqueta de cierre.    
?>



<!DOCTYPE html>       <!-- Ahora tendremos nuestro codigo en HTML , por cierto este es un comentario --> 
<html lang="en">      <!-- El atributo lang es la manera convencional de identificar información sobre idioma en XML, 
                           lang="en" indica al navegador que todo el contenido de la página está en inglés. -->
<!-- Ahora estableceremos la estructura de la pagina en HTML , detalles de esto lo podemos ver en: Main\Conexiones\Estructura_HTML -->
<head>  
    <meta charset = "UTF-8">  <!-- especifica la codificación de caracteres del documento utf-8 es un conjunto de caracteres 
                                universal que incluye casi todos los caracteres de casi cualquier idioma humano. -->
    <meta http-equiv="X-UA-Compatible" content="IE-edge">     

                                <!--  La X-UA-Compatibleetiqueta meta permite a los autores web elegir en qué versión 
                                      de Internet Explorer se debe representar la página.
                                      Mas informacion sobre las opciones en la pagina:
                                      https://stackoverflow.com/questions/6771258/what-does-meta-http-equiv-x-ua-compatible-content-ie-edge-do  -->

    <meta name="viewport" content="width-device-width, initial-scale-1.0">  
    <!--  Este tag meta esta unicamente con la funcion de controlar las dimensiones y la escala de la pagina web
          La width=device-widthparte establece el ancho de la página para seguir el ancho de pantalla del dispositivo (que variará según el dispositivo).
          La initial-scale=1.0parte establece el nivel de zoom inicial cuando el navegador carga la página por primera vez.
          MAS INFO:
          https://www.w3schools.com/css/css_rwd_viewport.asp
        -->

    <link rel='stylesheet' href="carpeta1/estilos.css">     <!-- El href original estaba asi y no conectaba: <link rel='stylesheet' href="estilos.css"> -->   
    <!--Una hoja de estilo externa puede ser enlazada a un documento HTML mediante el elemento LINK de HTML , en este caso estaremos enlazando
        nuestro documento estilos.css
      -->                                  
    <title>PRINCIPAL</title>
</head>



<body>
    <h1>Conexion con la base de datos <h1>


    <form action ="insertar.php" method="POST">
        <h2> Formulario </h2>
        <?php echo $mensaje;
              echo $mensaje1; 
        ?>
        
        <label for = ""> Nombre </label></br>
        <input type="text" name="nombre" id=""></br>     
        <label for=""> Email </label></br>
        <input type="email" name="email" ></br>
        <label for=""> Password </label></br>
        <input type="password" name="password" </br></br>
        <label for=""> vacunas </label></br>
        <input type="vacunas" name="vacunas" </br></br>

        <input type="submit" value="Enviar datos">

    </form>
     <!--    
        <label >Nombre *</label></br>
        <input type="text" name="nombre" id=""></br></br>
        <label >Email*</label></br>
        <input type="text" name="email" id=""></br></br>
        <label >Password*</label></br>
        <input type="password" name="password" id=""></br></br>
        <label >Pais *</label></br>
      -->


    <h3> Lista de usuario </h3>
    <table>
        <tr>
            <th>N°</th>
            <th>Nombre</th>
            <th>Email</th>
            <th>Password</th>
            <th>vacunas</th>
            <th>Eliminar</th>
        <tr>

        <!-- Volvemos a abrir php --> 
        <?php
            #Capturamos la conexion
            $con = conexion();
            $sql="SELECT * FROM usuario";            #Nuestra tabla es alumnos , no usuario
            $query=mysqli_query($con,$sql);
            if($query){
                $contador=1;
                while ($row=mysqli_fetch_assoc($query)) {
                    #Capturamos los datos
                    $nombre=$row['nombre'];
                    $email=$row['email'];
                    $id=$row['id'];
                    $password=$row['password'];
                    $vacunas=$row['vacunas'];
        ?>


        <tr>
            <td><?php echo $contador; ?></td>    
            <td><?php echo $nombre; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $password; ?></td>
            <td><?php echo $vacunas; ?></td>

            <td><a href="eliminar.php?id= <?php echo $id;?>">Elimnar</a></td>
        </tr>
        <?php
            $contador++;
            }
        }
        ?>
        </table>
</body>
</html>