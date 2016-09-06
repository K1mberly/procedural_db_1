<?php
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
  <?php   require_once("../layouts/headerVehiculo.html");?>
  </head>
  <body>

    <?php
    require_once('../../mysqli_connect.php');
    $query = "SELECT id, placa, color FROM vehiculos";
    $response = @mysqli_query($dbc, $query);
    ?>


    <div class="container">
    <h2>List of Vehicles</h2>
    <a href="../../index.php" class="btn btn-warning" role="button">Return Index</a>
    <a href="javascript:void(0)" class="btn btn-info" role="button" id="deleteVehicle">Delete</a>
    <a href="vehiculo_add.php" class="btn btn-danger" role="button">Add</a>
    <a href="javascript:void(0)" class="btn btn-default" role="button" id="updateVehicle">Update</a>

    <!-- <p>The .table-striped class adds zebra-stripes to a table:</p> -->
    <hr>
    <?php
      if ($_SESSION["aviso"] != "") {
        echo "<div id='verde1'>".$_SESSION["aviso"]."</div><hr>";
        $_SESSION["aviso"]="";
      }
    ?>
    <form id="myTableForm" name="myForm" method="post" action="" onSubmit="" enctype = text/plain>
      <table id="tabla1" class="table table-striped table-bordered">
        <thead>
          <tr>
            <th>Id</th>
            <th>Placa</th>
            <th>Color</th>
          </tr>
        </thead>
        <tbody>
          <?php
            if($response){
                $contador=1;
                while($row = mysqli_fetch_array($response)){
          ?>
          <tr>
            <td class="col-sm-1">
              <div class="form-group">
                      <input type="checkbox" name="myCheckbox" value="<?php echo $row['id'];?>">
                      <!--&nbsp; -->
                          <?php echo $contador;
                          $contador++;
                          ?>
                      </a>
              </div>

            </td>
            <td>
                <a href="vehiculo_view.php" role="button" id="placa"><?php echo $row['placa'];?></a>

            </td>
            <td><?php echo $row['color'];?></td>
          </tr>

          <?php
                }
            } else{
                      echo "Couldn't issue database query<br />";
                      echo mysqli_error($dbc);
                  }
                  // Close connection to the database
                  mysqli_close($dbc);
           ?>
        </tbody>
      </table>
      </form>
      </div>
  <script type="text/javascript" src="../public/js/crud.js"></script>
</html>
