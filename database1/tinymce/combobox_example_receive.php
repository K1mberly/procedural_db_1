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

          header('Location: combobox_example.php');
        }

    ?>

    <div class="container">
      <h2>Details of the Selected Combobox</h2>
      <a href="combobox_example.php" class="btn btn-warning" role="button">Return</a>
    </div>
    <hr>
    <div class="container">
        <br>
        <b>Seleccion del Combobox Llenado manualmente: </b><?php   echo $_POST["manual"];?>
        <br><br>
        <b>Seleccion del Combobox Llenado automaticamente (Solo el ID): </b><?php   echo $_POST["automatico"];?>
        <br><br>
        <?php print_r($_POST); ?>
    </div>
    <?php   require_once("layouts/footer.html");?>
  </body>
</html>
