<!DOCTYPE html>
<html>
  <head>
  <?php   require_once("layouts/header.html");?>
  </head>
  <body>

    <?php
    require_once('../mysqli_connect.php');
    $query = "SELECT id, text_area FROM tinymce";
    $response = @mysqli_query($dbc, $query);
    ?>


    <div class="container">
    <h2>List of Comments</h2>
    <a href="../index.html" class="btn btn-warning" role="button">Return Index</a>
    <a href="javascript:void(0)" class="btn btn-info" role="button" id="delete">Delete</a>
    <a href="javascript:void(0)" class="btn btn-danger" role="button" id="alert">Alert</a>
    <a href="javascript:void(0)" class="btn btn-default" role="button" id="update">Update</a>
    <!-- <p>The .table-striped class adds zebra-stripes to a table:</p> -->
    <hr>
    <form id="myTableForm" name="myForm" method="post" action="" onSubmit="" enctype = text/plain>
    <table id="tabla1" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Comments</th>
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
                      <a href="view_register.php?id=<?php echo $row['id'];?>">
                          <?php echo $contador;
                          $contador++;
                          ?>
                      </a>
              </div>

            </td>
            <td><?php echo $row['text_area'];?></td>
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

  <?php  require_once("layouts/footer.html");?>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#tabla1').DataTable();

      $('#alert').click(function(){
        //window.location.href="delete_register.php";/**/
        alert("Esto es una alerta");
      } );

      $('#delete').click(function(){
        deleteString=""; /* creando variable vacia*/

        //$.getJSON('../../../ajax/currentRootVerify.php', function(data) {

            /* DELETE BUTTON*/
            var checkBoxesValues=[]; /*array vacio*/

            var boxes = document.myForm.myCheckbox.length;/*variable boxes y asignando cuantos cb existe en el form del doc*/

            k=0;
            for (i = 0; i < boxes; i++) {
              if (document.myForm.myCheckbox[i].checked) {
                checkBoxesValues[k] = document.myForm.myCheckbox[i].value;
                k++;
              }
            }

            for (var i=0; i<checkBoxesValues.length; i++) {
                if (checkBoxesValues.length===1) { /*si solo hay una casilla con cb ejecuto 90*/
                    deleteString="?id="+checkBoxesValues[i]; /**/
                }else{
                    if (i===0) {
                       deleteString=deleteString+"?id="+checkBoxesValues[i];
                    }else{
                        deleteString=deleteString+","+checkBoxesValues[i];
                    }
                    if (i===checkBoxesValues.length-1) {
                        deleteString=deleteString;
                    }
                }
            }
              /*si la longitud de cbv es mayor a cero quiere decir q se han hecho check y ejecuta lo de abajo*/
              if(checkBoxesValues.length>0){
                window.location.href="delete_register.php"+deleteString;
              }else{
                alert("Al menos seleccionar un registro a borrar");
              }
      } );

      $('#update').click(function(){

          /* UPDATE BUTTON*/
          /* arreglo vacio*/
          var checkBoxesValues=[];
           /* variable vacia*/
          var editString="";
          /*creando una variale boxes y esta asignando el valor de la cantidad de checkbox que tiene el form en ese doc*/
          var boxes = document.myForm.myCheckbox.length;

          k=0;
          /*buscar y guardar todos los q estan checkeados*/
          for (i = 0; i < boxes; i++) {
            /*si en este formulario i esta checkado, si esta checkeado es truee y ejecuta lo q sigue*/
            if (document.myForm.myCheckbox[i].checked) {
              /* el valor del checkbox se lo asigno a la variable checkbox value y lo guarda en la posicion k*/
              checkBoxesValues[k] = document.myForm.myCheckbox[i].value;
              k++;
            }
          }

          for (var i=0; i<checkBoxesValues.length; i++) {
              if (checkBoxesValues.length===1) {
                  updateString= "?id="+checkBoxesValues[i];
              }
          }

          if(checkBoxesValues.length===1){
              /* w.l.href hace que se mueva a otra pag*/
              window.location.href="update_register.php"+updateString;
          }else if (checkBoxesValues.length===0) {
            alert("update 1: Por favor seleccione un elemento a editar");

          }else{
            alert("update 2:Muchos elementos seleccionados. Solo seleccione uno");
          }
      } );

    } );
  </script>

  </body>
</html>
