<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <?php   require_once("layouts/header.html");?>


  </head>
  <body class="" id="fondo">
    <?php
        require_once('../mysqli_connect_1.php');

        $sql = "SELECT student_id, first_name, last_name FROM students";
        $sql.="";
        //echo $sql;
        if($response= $dbc->query($sql)){
          //printf("%d fila modificada.\n", $dbc->affected_rows);
          $register= mysqli_fetch_array($response);

        }else{
          echo "No response from the database";
        }

    ?>

    <br><br>
    <div class="container">
    <h2>Select a Register from the COMBOBOX</h2>
    <a href="../index.html" class="btn btn-warning" role="button">Return Index</a>

    <hr>
    <div class="container">

      <div class="row">
        <div class="col-sm-4">
          <div class="form-group">
              <label for="mro">Combobox (Llenado Manual)</label>
              <select name="manual" class="form-control" required>
                  <option value=""></option>
                  <option value="SCL Hangar 1">SCL Hangar 1</option>
                  <option value="SCL Hangar 2">SCL Hangar 2</option>
                  <option value="ETIHAD">ETIHAD</option>
                  <option value="COOPESA">COOPESA</option>
                  <option value="MEXICANA">MEXICANA</option>
                  <option value="TAM LINHAS AEREAS S.A">TAM LINHAS AEREAS S.A</option>
              </select>
          </div>
        </div>


        <div class="col-sm-4">
          <div class="form-group">
              <label for="automatico">Combobox (Sacando DATA de la DB)</label>
              <select name="automatico" class="form-control" required>
                  <option value=""></option>
                    <?php
                      if($response){
                          $contador=1;
                          while($row = mysqli_fetch_array($response)){
                    ?>
                  <option value="<?php echo $row['student_id'];?>"><?php echo $row['first_name'];?></option>
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
              <div class="">
                <?php echo $sql; ?>
              </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
