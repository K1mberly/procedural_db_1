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
    <p>The .table-striped class adds zebra-stripes to a table:</p>
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
              while($row = mysqli_fetch_array($response)){
        ?>
        <tr>
            <td class="col-sm-1">
              <div class="form-group">
                      <input type="checkbox" name="myCheckbox" value="<?php echo $row['id'];?>">
                      <!--&nbsp; -->
                      <a href=""><?php echo $row['id'];?></a>
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
      <hr>
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

              if(checkBoxesValues.length>0){ /*si la longitud de cbv es mayor a cero quiere decir q se han hecho check y ejecuta lo de abajo*/

                //alert("delete");
                //alert(data['deleteFromTable']);
                /*modalAction="../../../modules/admin/views/user_delete.php";*/
                //modalAction=data['deleteFromTable'];
                //$('#userAuthenticationModal').modal('show');
                window.location.href="delete_register.php"+deleteString;/**/
              }else{
                // Al menos seleccionar un registro a borrar
                //document.getElementById("myMessage1").innerHTML = MESSAGE_WARNING_3;
                //document.getElementById("myMessage1").className ="row bg-danger";
                alert("Al menos seleccionar un registro a borrar");
              }
              //Quitar el FOCUS del boton
              //$("#delete").blur();
        //  });

      } );

      $('#update').click(function(){

          /* UPDATE BUTTON*/
          var checkBoxesValues=[]; /* arreglo vacio*/
          var editString=""; /* variable vacia*/
          var boxes = document.myForm.myCheckbox.length; /*creando una variale boxes y esta asignando el valor de la cantidad de checkbox que tiene el form en ese doc*/

          k=0;
          for (i = 0; i < boxes; i++) {/*buscar y guardar todos los q estan checkeados*/
            if (document.myForm.myCheckbox[i].checked) {/*si en este formulario i esta checkado, si esta checkeado es truee y ejecuta lo q sigue*/
              checkBoxesValues[k] = document.myForm.myCheckbox[i].value; /* el valor del checkbox se lo asigno a la variable checkbox value y lo guarda en la posicion k*/
              k++;
            }
          }

          for (var i=0; i<checkBoxesValues.length; i++) {
              if (checkBoxesValues.length===1) {
                  updateString= "?id="+checkBoxesValues[i];
              }
          }

            if(checkBoxesValues.length===1){
              //"../../../modules/admin/views/user_edit.php";
                window.location.href = data['edit']+updateString; /* w.l.href hace que se mueva a otra pag*/
            }else if (checkBoxesValues.length===0) {
              alert("update: por favor seleccione un elemento a editar");
                //document.getElementById("myMessage1").innerHTML = MESSAGE_WARNING_1;
                //document.getElementById("myMessage1").className ="row bg-danger";
            }else{
              alert("edit 2:muchos elementos seleccionados");
              //document.getElementById("myMessage1").innerHTML = MESSAGE_WARNING_2+" : [ "+checkBoxesValues.length+" registers selected ]";
              //document.getElementById("myMessage1").className ="row bg-danger";
            }
            //Quitar el FOCUS del boton
            $("#updateButton").blur();

        } );

    } );
  </script>

  </body>
</html>
