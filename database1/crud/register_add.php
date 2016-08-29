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
     ?>
    <h3>Tiny MCE</h3>
    <a href="../index.php" class="btn btn-danger" role="button">Return</a>
    <hr>
    <?php
      if ($_SESSION["aviso"] != "") {
        echo "<div id='verde1'>".$_SESSION["aviso"]."</div><hr>";
        $_SESSION["aviso"]="";
      }
    ?>
    <form class="" action="register_add_process.php" method="post">
      <div class="row">
        <div class="col-md-8 text-center">
          <textarea name="text" rows="8" cols="40"></textarea>
        </div>
      </div>
      <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
    </form>
    <hr>
    <?php  require_once("layouts/footer.html");?>
  </body>
</html>
