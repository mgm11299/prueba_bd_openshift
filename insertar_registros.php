<?php
# incluimos una variable con el nombre de la tabla
$tabla="demo4";
# incluimos los datos de la conexión y la base de datos para
include("mysqli.inc.php");

# escribimos la sentencia MySQL
$sentencia="INSERT INTO ".$tabla." (DNI,Nombre,Apellido1,Apellido2, Nacimiento,Sexo,Hora,Fumador,Idiomas) VALUES ('11234','Lupicinio','Servidor','Servido','1954-11-23','M','16:24:52',NULL,3)";

# establecemos la conexión con el servidor y seleccionamos la base de datos
$conexion=mysqli_connect ($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp1);

if(mysqli_query($conexion,$sentencia)){
            print "El registro ha sido añadido";
    }else{
               print "<br>No se ha añadido el registro a la tabla mediante procesos<br>";
            print "Error : ". mysqli_error($conexion);
            exit();
    }
    mysqli_close($conexion);
?>
