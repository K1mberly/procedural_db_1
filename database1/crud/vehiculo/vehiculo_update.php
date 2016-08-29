<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php require_once("../layouts/headerVehiculo.html");?>
  </head>
  <body>
    <?php
    if (isset($_SESSION["aviso"])) {

    }else {
      $_SESSION["aviso"] = "";
    }

    if(empty($_GET['id'])){
        header('Location: vehiculo_list.php');
    }else {
        /* Consigo la informacion del registroo a editar desde la base de datos
        para luego insertarla en el TEXTAREA, y que el usuario pueda ver lo que
        va a modificar*/
        require_once('../../mysqli_connect_1.php');

        $sql = "SELECT id, modelo , color, duenio, placa, status FROM vehiculos";
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
      <h3>Update: Vehicle</h3>
      <a href="vehiculo_list.php" class="btn btn-danger" role="button">Return</a>
      <hr>
    </div>

    <?php
      if ($_SESSION["aviso"] != "") {
        echo "<div id='verde1'>".$_SESSION["aviso"]."</div><hr>";
        $_SESSION["aviso"]="";
      }
    ?>
    <div class="container">
        <form class="form-horizontal" action="vehiculo_update_process.php" role="form" method="post">
          <div class="form-group">
              <label class="control-label col-sm-2" for="automatico">Model: </label>
              <div class="col-sm-4">
                  <select name="automatico" class="form-control" required>
                  <option value=""></option>
                    <?php
                      if($response){
                          $contador=1;
                          while($row = mysqli_fetch_array($response)){
                    ?>
                  <option value="<?php echo $register['id'];?>"><?php echo $register['modelo'];?></option>
                    <?php
                          }
                      } else{
                                echo "Couldn't issue database query<br />";
                                echo mysqli_error($dbc);
                            }
                            // Close connection to the database
                            mysqli_close($dbc);
                     ?>

              </select>
              </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">Color: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Enter Color" value=<?php echo $register['color']; ?> name="color" size="20" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">Owner: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Enter Name" value=<?php echo $register['duenio']; ?> name="duenio" size="50" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">License Plate: </label>
            <div class="col-sm-4">
              <input type="text" class="form-control" placeholder="Enter License Plate" value=<?php echo $register['placa']; ?> name="placa" size="10" required="true">
            </div>
          </div>

          <div class="form-group">
            <label class="control-label col-sm-2" for="">Status:</label>
            <div class="col-sm-10" value=<?php echo $register['status']; ?>>
              <input type="radio" name="tipo" value="option0">Sin Seguro<br>
              <input type="radio" name="tipo" value="option1">Seguro Particular<br>
              <input type="radio" name="tipo" value="option2">SOAT<br>

            </div>
          </div>
      <hr>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
          </div>
        </div>
      </form>
    </div>

    <hr>
  </body>
</html>
