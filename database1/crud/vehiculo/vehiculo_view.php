<!DOCTYPE html>
<html>
  <head>
  <?php   require_once("../layouts/headerVehiculo.html");?>
  </head>

  <body>

    <?php
        if(empty($_GET['placa'])){
            //header('Location: vehiculo_list.php');
        }else {
            /* Consigo la informacion del registroo a editar desde la base de datos
            para luego insertarla en el TEXTAREA, y que el usuario pueda ver lo que
            va a modificar*/
            require_once('../../mysqli_connect_1.php');

            $sql = "SELECT id, modelo, color, duenio, placa, status FROM vehiculos";
            $sql.=" WHERE id= ".$_GET['placa']." LIMIT 1";

            //echo $sql;
            if($response= $dbc->query($sql)){
              //printf("%d fila modificada.\n", $dbc->affected_rows);
              $register= mysqli_fetch_array($response);

            }else{
              echo "No response from the database";
            }
        }
    ?>

    <div class="container">
    <h2>Detalles del Vehiculo Seleccionado</h2>
    <a href="vehiculo_list.php" class="btn btn-warning" role="button">Return</a>
    </div>
    <hr>

        <div class="container">
            <br><br>
            <b>Id del Vehiculo: </b><?php   echo $register['id'];?>
            <br><br>
            <b>Modelo del Vehiculo: </b><?php   echo $register['automatico'];?>
            <br><br>
            <b>Color del Vehiculo: </b><?php   echo $register['color'];?>
            <br><br>
            <b>Dueño del Vehiculo: </b><?php   echo $register['duenio'];?>
            <br><br>
            <b>Placa del Vehiculo: </b><?php   echo $register['placa'];?>
            <br><br>
            <b>Status del Vehiculo: </b><?php   echo $register['tipo'];?>
            <br><br>

        </div>
  </body>
</html>
