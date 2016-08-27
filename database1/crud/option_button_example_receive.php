<!DOCTYPE html>
<html>
  <head>
  <?php   require_once("layouts/header.html");?>
  </head>

  <body>

    <?php

        if(isset($_POST["submit"])){
          echo "Se recibio la variable POST: ".$_POST["submit"];

        }else {
          echo "Post no recibido";

          header('Location: option_button_example.php');
        }

    ?>

    <div class="container">
      <h2>Details of the Selected Option Button</h2>
      <a href="option_button_example.php" class="btn btn-warning" role="button">Return</a>
    </div>
    <hr>
    <div class="container">
        <br>
        <b>Seleccion del Option Button: </b><?php   echo $_POST["ejemplo1"];?>
        <br><br>
        <?php print_r($_POST); ?>
    </div>
    <?php   require_once("layouts/footer.html");?>
  </body>
</html>
