<?php
require_once('../../mysqli_connect_1.php');

$message = "";
/*si la variable id esta vacia no hace nada y regresa*/
if(empty($_GET['id'])){
    header('Location: vehiculo_list.php');
}


$deleteArray=explode(",",$_GET['id']);

$k=0;
for ($i=0; $i < sizeof($deleteArray); $i++) {

  	if (sizeof($deleteArray) >0) {
        $sql= "DELETE FROM "."`vehiculos`"." ";
        $sql.= "WHERE `id`=". $deleteArray[$i];
        $sql.= " LIMIT 1";
        /*sobre la conexion abierta dbc se hace la consulta query tomando en cuenta el codigo $sql*/
        if($dbc->query($sql)){
          printf("%d fila modificada.\n", $dbc->affected_rows);
        }

      	$k++;
        echo "<br>";
        echo "paso: "."<br>";
        echo $sql."<br>";
        echo $deleteArray[$i]."<br>";
  	}else{
      echo "No se seleciono ningun checkbox: sizeof($deleteArray) <=0";
  	}
}

header('Location: vehiculo_list.php');
?>
