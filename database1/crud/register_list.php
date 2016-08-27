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
                      <a href="register_view.php?id=<?php echo $row['id'];?>">
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
  <script type="text/javascript" src="public/js/crud.js"></script>
</html>
