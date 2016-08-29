<?php
require_once('../../mysqli_connect_1.php');

$message = "";
/*si la variable id esta vacia no hace nada y regresa*/
if(empty($_POST['id']) && empty($_POST['text'])){
    header('Location: vehiculo_list.php');
}

$updateVehicle=$_POST['id'];

        $sql= "UPDATE "."`vehiculos`"." SET ";
        $sql.= "`text_area`="."'".$_POST['text']."'";
        $sql.= " WHERE id= ".$updateVehicle;

        /*sobre la conexion abierta dbc se hace la consulta query tomando en cuenta el codigo $sql*/
        if($dbc->query($sql)){
          printf("%d fila modificada.\n", $dbc->affected_rows);
        }
        $dbc->close();

        echo "<br>";
        echo "paso: "."<br>";
        echo $sql."<br>";
        echo $updateVehicle."<br>";

//header('Location: vehiculo_list.php');
?>
