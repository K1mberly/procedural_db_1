<!DOCTYPE html>
<html>
  <head>
    <?php   require_once("layouts/header.html");?>
  </head>
  <body>
    <h1>Option Button</h1>
    <p id="demo"></p>
    <p id="demo1"></p>
    <form>
      <input type="radio" name="ejemplo1" value="option1">Option 1<br>
      <input type="radio" name="ejemplo1" value="option2" checked>Option 2<br>
      <a href="javascript:void(0)" class="btn btn-danger" role="button" id="alert">Alert</a>
    </form>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
      $(document).ready(function() {
        $("#alert").click(function(){
          alert("Esto es una alerta activada por un boton");
        });
        console.log("documento cargado");
        document.getElementById("demo").innerHTML = 5 + 6;
        document.getElementById("demo1").innerHTML ="Este es un aviso";
      });
    </script>

  </body>
</html>
