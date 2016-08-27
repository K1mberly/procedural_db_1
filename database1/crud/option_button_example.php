<!DOCTYPE html>
<html>
  <head>
    <?php   require_once("layouts/header.html");?>
  </head>
  <body>
    <h1>Option Button</h1>
    <p id="demo"></p>
    <p id="demo1"></p>
    <form class="" action="option_button_example_receive.php" method="post">
        <input type="radio" name="ejemplo1" value="option1">Option 1<br>
        <input type="radio" name="ejemplo1" value="option2" checked>Option 2<br>
        <a href="javascript:void(0)" class="btn btn-danger" role="button" id="alert">Alert</a>
        <a href="javascript:void(0)" class="btn btn-info" role="button" id="verifica">Verifica Opcion</a>
        <div class="form-group">
            <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
        </div>
    </form>

    <script>
      $(document).ready(function() {
        $("#alert").click(function(){
          alert("Esto es una alerta activada por un boton");
        });
        console.log("documento cargado");
        document.getElementById("demo").innerHTML = 5 + 6;
        document.getElementById("demo1").innerHTML ="Este es un aviso";
        $("#verifica").click(function(){
          if ($('input:radio[name=ejemplo1]:checked').val()=="option1") {
            alert("opcion 1 seleccionada");
          }else {
            alert("opcion 2 seleccionada");
          }
        });
      });
    </script>

  </body>
</html>
