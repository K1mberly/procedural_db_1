<?php
session_start();
require_once('../../mysqli_connect_1.php');

$message = "";

$updateVehicle=$_POST['id'];
// UPDATE `vehiculos` SET `modelo`='5',`color`='azulino',`duenio`='daniel',`placa`='hdjlkd52',`status`='3' WHERE `id`='25'
        $sql= "UPDATE "."`vehiculos`"." SET ";
        $sql.="`modelo`="."'".$_POST['automatico']."',`color`="."'".$_POST['color']."',`duenio`="."'".$_POST['duenio']."',`placa`="."'".$_POST['placa']."',`status`="."'".$_POST['tipo']."'";
        $sql.= " WHERE id= ".$updateVehicle;

        /*sobre la conexion abierta dbc se hace la consulta query tomando en cuenta el codigo $sql*/
        if ($dbc->query($sql)) {
            echo $_SESSION["aviso"]="Record updated successfully";
        }else {
            echo $_SESSION["aviso"]="Error. No data was registered";
         }
        $dbc->close();

        echo "<br>";
        echo "paso: "."<br>";
        echo $sql."<br>";
        echo $updateVehicle."<br>";

header('Location: vehiculo_list.php');
?>
