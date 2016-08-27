<?php
session_start();

require_once('../mysqli_connect.php');
if(isset($_POST["submit"])){
    if (isset($_POST["text"]) && $_POST["text"]!="" ) {
        $sql = "INSERT INTO `tinymce`(`text_area`) VALUES ('".$_POST["text"]."')";

        if ($dbc->query($sql) === TRUE) {
          $_SESSION["aviso"]="New record created successfully";
        } else {
          $_SESSION["aviso"]="Error. No data was registered";
        }
        $dbc->close();
    }
}
header('Location: register_add.php');
?>
