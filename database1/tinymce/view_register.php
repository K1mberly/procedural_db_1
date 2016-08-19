<?php
    if(empty($_GET['id'])){
        header('Location: tinymce_list.php');
    }else {
        /* Consigo la informacion del registroo a editar desde la base de datos
        para luego insertarla en el TEXTAREA, y que el usuario pueda ver lo que
        va a modificar*/
        require_once('../mysqli_connect_1.php');

        $sql = "SELECT id, text_area FROM tinymce";
        $sql.=" WHERE id= ".$_GET['id']." LIMIT 1";
        //echo $sql;
        if($response= $dbc->query($sql)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register= mysqli_fetch_array($response);


        }else{
          echo "No response from the database";
        }
    }
?>
<!DOCTYPE html>
<html>
  <head>
  <?php   require_once("layouts/header.html");?>
  </head>

  <body>
    <div class="container">
    <h2>Details of the Selected Comment</h2>
    <a href="tinymce_list.php" class="btn btn-warning" role="button">Return</a>
    </div>
    <hr>

        <div class="container">
            <br>
            <b>Id del Comentario: </b><?php   echo $register['id'];?>
            <br><br>
            <b>Detalle del Comentario: </b><p><?php   echo $register['text_area'];?></p>

        </div>
        <?php   require_once("layouts/footer.html");?>
  </body>
</html>
