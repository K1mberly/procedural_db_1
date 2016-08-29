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
        require_once('../../mysqli_connect_1.php');

        $sql = "SELECT id, modelo FROM modelos";
        // $sql.="";
        //echo $sql;
        $response= $dbc->query($sql);

        // if($response){
        //   $register= mysqli_fetch_array($response);
        //   print_r($register);
        // }else{
        //   echo "No response from the database";
        // }

    if (isset($_SESSION["aviso"])) {

    }else {
      $_SESSION["aviso"] = "";
    }
     ?>
    <h3>Add Vehicle</h3>
    <a href="vehiculo_list.php" class="btn btn-danger" role="button">Return</a>
    <hr>
    <?php
      if ($_SESSION["aviso"] != "") {
        echo "<div id='verde1'>".$_SESSION["aviso"]."</div><hr>";
        $_SESSION["aviso"]="";
      }
    ?>

      <form class="form-horizontal" action="vehiculo_add_process.php" role="form" method="post">
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
                <option value="<?php echo $row['id'];?>"><?php echo $row['modelo'];?></option>
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
            <input type="text" class="form-control" placeholder="Enter Color" name="color" size="20" required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Owner: </label>
          <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter Name" name="duenio" size="50" required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">License Plate: </label>
          <div class="col-sm-4">
            <input type="text" class="form-control" placeholder="Enter License Plate" name="placa" size="10" required="true">
          </div>
        </div>

        <div class="form-group">
          <label class="control-label col-sm-2" for="">Status:</label>
          <div class="col-sm-10">
            <input type="radio" name="tipo" value="option0" checked>Sin Seguro<br>
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
  </body>
</html>
