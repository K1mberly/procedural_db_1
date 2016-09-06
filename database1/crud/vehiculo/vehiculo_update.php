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

        $sql = "SELECT id, modelo, color, duenio, placa, status FROM vehiculos";
        $sql.=" WHERE id= ".$_GET['id'];
        //echo $sql;
        if($response= $dbc->query($sql)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register= mysqli_fetch_array($response);
          //echo $register['id'];
        }else{
          echo " ERROR1. No response from the database";
          header('Location: vehiculo_list.php');
        }
        /***********************************/
        $sql_1 = "SELECT id, modelo FROM modelos";
        $sql_1.=" WHERE id= ".$register['modelo'];
        //echo $sql;
        if($response_1= $dbc->query($sql_1)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register_1= mysqli_fetch_array($response_1);
          // echo "el modelo es ".$register_1['modelo'];
        }else{
          echo " ERROR2. No response from the database";
          header('Location: vehiculo_list.php');
        }
        /***********************************/
        $sql_2 = "SELECT id, modelo FROM modelos";
        //echo $sql;
        $response_2= $dbc->query($sql_2);
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          // echo "el modelo es ".$register_1['modelo'];
        /***********************************/
        $sql_3 = "SELECT id, status FROM status";
        $sql_3.=" WHERE id= ".$register['status'];
        //echo $sql;
        if($response_3= $dbc->query($sql_3)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register_3= mysqli_fetch_array($response_3);
          // echo "el modelo es ".$register_1['modelo'];
        }else{
          echo "ERROR3. No response from the database";
          header('Location: vehiculo_list.php');
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
                    <option value="<?php echo $register['modelo'];?>"><?php echo $register_1['modelo'];?></option>
                        <?php
                          if($response_2){
                              $contador=1;
                              while($row = mysqli_fetch_array($response_2)){
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
            <div class="col-sm-10">
              <!-- TERNARY OPERATOR  (condition) ? (true return value) : (false return value) -->
              <input type="radio" name="tipo" value="1" <?php echo ($register_3['id'] ==1) ?  "checked"  : ""; ?> >Sin Seguro<br>
              <input type="radio" name="tipo" value="2" <?php echo ($register_3['id'] ==2) ?  "checked"  : ""; ?> >Seguro Particular<br>
              <input type="radio" name="tipo" value="3" <?php echo ($register_3['id'] ==3) ?  "checked"  : ""; ?> >SOAT<br>

            </div>
          </div>

          <div class="">
            <input type="text" name="id" value=<?php echo $_GET['id']; ?> hidden="true">
          </div>


      <hr>
        <div class="form-group">
          <div class="col-sm-offset-2 col-sm-10">
            <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
          </div>
        </div>
        <?php //echo $register['status']; ?> <?php// echo $register_3['status']; ?> <?php //echo $register_3['id']; ?>
        <?php //echo ($register_3['id'] ==1) ?  "checked"  : "no"; ?>
      </form>
    </div>

    <hr>
  </body>
</html>
