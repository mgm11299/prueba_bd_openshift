 <?php
/* incluimos los datos de conexi�n al servidor MySQL */
include("mysqli.inc.php");
/* incluimos la tabla a consultar la sentencia */
$tabla="demo4";

/* esta es la sentencia MySQL */
$sentenciaMYSQL="SELECT Nombre, Apellido1, Apellido2 FROM $tabla WHERE (Sexo='M') ";

/******    Programaci�n mediante procesos ***********/

#conexion  y seleccion de base de datos
$conexion=@mysqli_connect ($cfg_servidor,$cfg_usuario,$cfg_password,$cfg_basephp1);

# realiza la consulta
if($resultado=mysqli_query($conexion,$sentenciaMYSQL)){
 # comprueba si ha habido resultados, caso de no haberlos produce un mensaja de aviso
 if(mysqli_affected_rows($conexion)>0){
        print "La consulta ha producido ".mysqli_affected_rows($conexion)." resultados<br /><br />";

        # CREAMOS UNA CABECERA DE UNA TABLA (codigo HTML)
        echo "<table align=center border=2>";

        # establecemos un bucle que recoge en un array cada una de las LINEAS DEL RESULTADO DE LA CONSULTA
        # utilizamos en esta ocasi�n �mysqli_fetch_row� en vez de �mysql_fetch_array� para EVITAR DUPLICADOS
        # recuerda que esta ultima funci�n devuelve un array escalar y otro asociativo con los resultados

        while ($registro = mysqli_fetch_row($resultado)){
                    # insertamos un salto de l�nea en la tabla HTML
                    echo "<tr>";

                    # establecemos el bucle de lectura del ARRAY   con los resultados de cada LINEA
                    # y encerramos cada valor en etiquetas <td></td> para que aparezcan en celdas distintas de la tabla
                    foreach($registro  as $clave){
                            echo "<td>",$clave,"</td>";
                    }
        }
        echo "</table>";
 }else{
        # mensaje de aviso para el caso de que la consulta no devuelva ning�n resultado
        print "La consulta no ha producido ning�n resultado";
        exit;
 }

}else{
    print "<br>No ha podido realizarse la consulta. Ha habido un error<br>";
    print "<i>Error:</i> ". mysqli_error($conexion)." <i>C�digo:</i> ".mysqli_errno($conexion) ;
    exit();
}
mysqli_close($conexion);



?>
