<?php
// Start the session
session_start();
?>
<?php
// Get a connection for the database
require_once('../mysqli_connect.php');

if(isset($_POST["submit"])){
    if (isset($_POST["text"]) && $_POST["text"]!="" ) {
        $sql = "INSERT INTO `tinymce`(`text_area`) VALUES ('".$_POST["text"]."')";

        if ($dbc->query($sql) === TRUE) {
          //echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
          $_SESSION["aviso"]="New record created successfully";
        } else {
          //echo "<script type= 'text/javascript'>alert('Error: " . $sql . "<br>" . $dbc->error."');</script>";
          $_SESSION["aviso"]="Error. No data was registered";
        }

        $dbc->close();

    }
}
header('Location: tinymce.php');
?>
