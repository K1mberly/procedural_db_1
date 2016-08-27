<!DOCTYPE html>
<html>
  <head>
    <?php   require_once("crud/layouts/headerIndex.html");?>
    <title></title>

  </head>
  <body>

    <?php
    // Get a connection for the database
    require_once('mysqli_connect.php');

    // Create a query for the database
    $query = "SELECT first_name, last_name, email, street, city, state, zip,
    phone, birth_date FROM students";

    // Get a response from the database by sending the connection
    // and the query
    $response = @mysqli_query($dbc, $query);

    // If the query executed properly proceed


    // mysqli_fetch_array will return a row of data from the query
    // until no further data is available



    ?>


    <div class="container">
    <h2>List of Students</h2>
    <a href="index.php" class="btn btn-warning" role="button">Return Index</a>
    <p>The .table-striped class adds zebra-stripes to a table:</p>
    <table id="tabla1" class="table table-striped table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>Email</th>
          <th>Street</th>
          <th>City</th>
          <th>State</th>
          <th>Zip</th>
          <th>Phone</th>
          <th>Birth Day</th>
        </tr>
      </thead>
      <tbody>
        <?php  if($response){
                  while($row = mysqli_fetch_array($response)){ ?>
        <tr>
          <td><?php echo $row['first_name'];?></td>
          <td><?php echo $row['last_name']; ?></td>
          <td><?php echo $row['email']; ?></td>
          <td><?php echo $row['street']; ?></td>
          <td><?php echo $row['city']; ?></td>
          <td><?php echo $row['state']; ?></td>
          <td><?php echo $row['zip']; ?></td>
          <td><?php echo $row['phone']; ?></td>
          <td><?php echo $row['birth_date']; ?></td>
        </tr>
        <?php }
                }
                else {

                echo "Couldn't issue database query<br />";

                echo mysqli_error($dbc);

                }

                // Close connection to the database
                mysqli_close($dbc); ?>
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
