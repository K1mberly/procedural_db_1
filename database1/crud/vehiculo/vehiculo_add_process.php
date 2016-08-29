<?php
session_start();

require_once('../../mysqli_connect_1.php');
if(isset($_POST["submit"])){
    $sql = "INSERT INTO `vehiculos` (`modelo`,`color`,`duenio`,`placa`,`status`) VALUES ('".$_POST["automatico"]."','".$_POST["color"]."','".$_POST["duenio"]."','".$_POST["placa"]."','".$_POST["tipo"]."')";
    if ($dbc->query($sql)) {
        echo $_SESSION["aviso"]="New record created successfully";
    }else {
        echo $_SESSION["aviso"]="Error. No data was registered";
     }
    $dbc->close();
}
//echo $sql;
header('Location: vehiculo_add.php');
?>
