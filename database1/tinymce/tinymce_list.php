<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- boostrap3-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- datatable-->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.css"/>
    <script type="text/javascript" src="https://cdn.datatables.net/v/bs-3.3.6/jq-2.2.3/jszip-2.5.0/pdfmake-0.1.18/dt-1.10.12/af-2.1.2/b-1.2.2/b-colvis-1.2.2/b-flash-1.2.2/b-html5-1.2.2/b-print-1.2.2/cr-1.3.2/fc-3.2.2/fh-3.1.2/kt-2.1.3/r-2.1.0/rr-1.1.2/sc-1.4.2/se-1.2.0/datatables.min.js"></script>


    <title></title>

  </head>
  <body>

    <?php
    // Get a connection for the database
    require_once('../mysqli_connect.php');

    // Create a query for the database
    $query = "SELECT id, text_area FROM tinymce";

    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    // If the query executed properly proceed


    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available



    ?>


    <div class="container">
    <h2>List of Comments</h2>
    <a href="../index.html" class="btn btn-warning" role="button">Return Index</a>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
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
            <td><?php echo $row['id'];?></td>
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
  </div>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#tabla1').DataTable();
    } );
  </script>

  </body>
</html>
