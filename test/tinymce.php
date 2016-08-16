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

    <!-- tinymce -->
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
    <title></title>

  </head>
  <body>

    <?php
    // Get a connection for the database
    require_once('mysqli_connect.php');

    // Create a query for the database
    $query = "SELECT texto FROM tinymce";

    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    // If the query executed properly proceed


    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available



    ?>


    <h3>Tiny MCE</h3>
    <a href="database/index.html" class="btn btn-danger" role="button">Return</a>
  <!--  <hr>
    <div class="btn-group" role="group" aria-label="...">
      <button type="button" class="btn btn-primary">Left</button>
      <button type="button" class="btn btn-danger">Middle</button>
      <button type="button" class="btn btn-success">Right</button>
    </div>-->



  <!--  <div class="container-fluid">-->
      <hr>
      <div class="row">
        <div class="col-md-8 text-center">
          <textarea name="text" rows="8" cols="40"></textarea>
        </div>
      </div>


  </body>
</html>
