<?php
/* incluimos los datos de conexión al servidor MySQL */
include("mysqli.inc.php");
/* incluimos la tabla a consultar la sentencia */
$tabla="demo4";


$conexion=@mysqli_connect($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp1);

 if(mysqli_query($conexion,"UPDATE $tabla SET Apellido2='hola' WHERE (DNI='11234')"))
    {
                        print "Registro modificado con éxito";
    }
    else
    {
                        print "No ha podido modificarse el registro. Se ha producido un error";
                        exit();
    }
    
  mysqli_close($conexion); ;


?>
