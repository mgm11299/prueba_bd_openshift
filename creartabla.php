<?php
/* definimos el nombre de la tabla */
$tabla="demo4";
/* crearemos antes una variable que recoja toda la sentencia
y será luego cuando la ejecutemos
Definiremos una varable llamada $crear e iremos añadiendo cosas */
# la primera parte de la instrucción es esta (espacio final incluido
$crear="CREATE TABLE  $tabla (";
# definimos como autoincremental el campo contador
# de esta forma irá tomando valores automaticamente
# este tipo de campo va a requerir que lo definamos como campo INDICE
$crear.="Contador TINYINT(8)  UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,";
$crear.="DNI CHAR(8) NOT NULL,  ";
$crear.="Nombre VARCHAR (20)  NOT NULL, ";
$crear.="Apellido1 VARCHAR (15)  not null, ";
$crear.="Apellido2 VARCHAR (15)  not null, ";
# insertamos un valor por defecto en la fecha de nacimiento
$crear.="Nacimiento DATE DEFAULT '1970-12-21', ";
$crear.="Hora TIME DEFAULT '00:00:00', ";
# insertamos un campo tipo Enum
$crear.="Sexo Enum('M','F') DEFAULT 'M' not null, ";
$crear.="Fumador CHAR(0) , ";
$crear.="Idiomas SET(' Castellano',' Francés','Inglés',' Alemán',' Búlgaro',' Chino'), ";
# ahor insertamos el indice principal que evitará que se puedan repetirse
# los numeros de DNI
$crear.=" PRIMARY KEY(DNI), ";
# el indice asociado al contador
# que por su caracter autonumerico es inevitable
$crear.=" UNIQUE auto (Contador)";
$crear.=")type=MyISAM";


/* tenemos completa la sentencia MYSQL  solo falta ejecutarla crear la conexión y ejecutarla */

/*incluimos los parámetros de conexión */
include('mysqli.inc.php');

    /*
 $conexion=@mysqli_connect ($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp1);

    if(!mysqli_connect_errno()==0){
        print "<br>No ha podido realizarse la conexión mediante procesos<br>";
        print "Error número: ". mysqli_connect_errno()." equivalente a: ". mysqli_connect_error();
        exit();
    }
      */
    

    try {
    $mbd = new PDO($cfg_servidor, $cfg_basephp1, $cfg_usuario, $cfg_password);
    }
    catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
    }
    

     # gestion de la base de datos. Los parámetros requieren el ordn aquí indicado

    if(mysqli_query($conexion,$crear)){
            print "La tabla ha sido CREADA";
    }else{
               print "<br>No ha podido crearse la base de datos mediante procesos<br>";
            print "Error : ". mysqli_error($conexion);
            exit();
    }
    
    mysqli_close($conexion);
    
    
?>
