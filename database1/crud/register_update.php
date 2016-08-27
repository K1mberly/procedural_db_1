<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once("layouts/header.html");?>
  </head>
  <body>
    <?php
    if (isset($_SESSION["aviso"])) {

    }else {
      $_SESSION["aviso"] = "";
    }

    if(empty($_GET['id'])){
        header('Location: register_list.php');
    }else {
        /* Consigo la informacion del registroo a editar desde la base de datos
        para luego insertarla en el TEXTAREA, y que el usuario pueda ver lo que
        va a modificar*/
        require_once('../mysqli_connect_1.php');

        $sql = "SELECT id, text_area FROM tinymce";
        $sql.=" WHERE id= ".$_GET['id'];
        //echo $sql;
        if($response= $dbc->query($sql)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register= mysqli_fetch_array($response);
          //echo $register['id'];
        }else{
          echo "No response from the database";
        }

    }


    ?>
    <div class="container">
      <h3>Update: Tiny MCE</h3>
      <a href="register_list.php" class="btn btn-danger" role="button">Return</a>
      <hr>
    </div>

    <?php
      if ($_SESSION["aviso"] != "") {
        echo "<div id='verde1'>".$_SESSION["aviso"]."</div><hr>";
        $_SESSION["aviso"]="";
      }
    ?>
    <div class="container">
      <form class="" action="register_update_process.php" method="post">
          <div class="row">
            <div class="col-md-8 text-center">
              <textarea name="text" rows="8" cols="40"><?php echo $register['text_area']; ?></textarea>
            </div>
          </div>
          <div class="">
            <input type="text" name="id" value=<?php echo $_GET['id']; ?> hidden="true">
          </div>
          <br>
          <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
      </form>
    </div>

    <hr>
    <?php  require_once("layouts/footer.html");?>
  </body>
</html>
