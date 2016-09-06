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
              window.location.href="register_delete.php"+deleteString;
            }else{
              alert("Al menos seleccionar un registro a borrar");
            }
          } );

    $('#deleteVehicle').click(function(){
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
              // alert("Record deleted successfully");
              window.location.href="vehiculo_delete.php"+deleteString;
              //alert("Record deleted successfully");
            }else{
              alert("Al menos seleccionar un registro a borrar");
            }
    } );

    $('#updateVehicle').click(function(){

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
            window.location.href="vehiculo_update.php"+updateString;
        }else if (checkBoxesValues.length===0) {
          alert("update 1: Por favor seleccione un elemento a editar");

        }else{
          alert("update 2:Muchos elementos seleccionados. Solo seleccione uno");
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
            window.location.href="register_update.php"+updateString;
        }else if (checkBoxesValues.length===0) {
          alert("update 1: Por favor seleccione un elemento a editar");

        }else{
          alert("update 2:Muchos elementos seleccionados. Solo seleccione uno");
        }
    } );
} );
