<html>
<head>
  <!-- boostrap3-->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<title>Add Student</title>
</head>
<body>
  <h3>Add Student</h3>
        <a href="index.html" class="btn btn-warning" role="button">Return Index</a>
      <hr>
<?php

if(isset($_POST['submit'])){

    $data_missing = array();

    if(empty($_POST['first_name'])){

        // Adds name to array
        $data_missing[] = 'First Name';

    } else {

        // Trim white space from the name and store the name
        $f_name = trim($_POST['first_name']);

    }

    if(empty($_POST['last_name'])){

        // Adds name to array
        $data_missing[] = 'Last Name';

    } else{

        // Trim white space from the name and store the name
        $l_name = trim($_POST['last_name']);

    }

    if(empty($_POST['email'])){

        // Adds name to array
        $data_missing[] = 'Email';

    } else {

        // Trim white space from the name and store the name
        $email = trim($_POST['email']);

    }

    if(empty($_POST['street'])){

        // Adds name to array
        $data_missing[] = 'Street';

    } else {

        // Trim white space from the name and store the name
        $street = trim($_POST['street']);

    }

    if(empty($_POST['city'])){

        // Adds name to array
        $data_missing[] = 'City';

    } else {

        // Trim white space from the name and store the name
        $city = trim($_POST['city']);

    }

    if(empty($_POST['state'])){

        // Adds name to array
        $data_missing[] = 'State';

    } else {

        // Trim white space from the name and store the name
        $state = trim($_POST['state']);

    }

    if(empty($_POST['zip'])){

        // Adds name to array
        $data_missing[] = 'Zip Code';

    } else {

        // Trim white space from the name and store the name
        $zip = trim($_POST['zip']);

    }

    if(empty($_POST['phone'])){

        // Adds name to array
        $data_missing[] = 'Phone Number';

    } else {

        // Trim white space from the name and store the name
        $phone = trim($_POST['phone']);

    }

    if(empty($_POST['birth_date'])){

        // Adds name to array
        $data_missing[] = 'Birth Date';

    } else {

        // Trim white space from the name and store the name
        $b_date = trim($_POST['birth_date']);

    }

    if(empty($_POST['sex'])){

        // Adds name to array
        $data_missing[] = 'Sex';

    } else {

        // Trim white space from the name and store the name
        $sex = trim($_POST['sex']);

    }

    if(empty($_POST['lunch'])){

        // Adds name to array
        $data_missing[] = 'Lunch Cost';

    } else {

        // Trim white space from the name and store the name
        $lunch = trim($_POST['lunch']);

    }

    if(empty($data_missing)){

        require_once('mysqli_connect.php');

        $query = "INSERT INTO students (first_name, last_name, email,
        street, city, state, zip, phone, birth_date, sex, date_entered,
        lunch_cost, student_id) VALUES (?, ?, ?,
        ?, ?, ?, ?, ?, ?, ?, NOW(), ?, NULL)";

        $stmt = mysqli_prepare($dbc, $query);

    /*    i Integers
        d Doubles
        b Blobs
        s Everything Else*/

        mysqli_stmt_bind_param($stmt, "ssssssisssd", $f_name,
                               $l_name, $email, $street, $city,
                               $state, $zip, $phone, $b_date,
                               $sex, $lunch);

        mysqli_stmt_execute($stmt);

        $affected_rows = mysqli_stmt_affected_rows($stmt);

        if($affected_rows == 1){

            echo 'Student Entered';

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        } else {

            echo 'Error Occurred<br />';
            echo mysqli_error();

            mysqli_stmt_close($stmt);

            mysqli_close($dbc);

        }

    } else {

        echo 'You need to enter the following data<br />';

        foreach($data_missing as $missing){

            echo "$missing<br />";

        }

    }

}

?>


<div class="container">


    <form class="form-horizontal" action="studentadded.php" role="form" method="post">
      <div class="form-group">
        <label class="control-label col-sm-2" for="">First Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter first name" name="first_name" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Last Name:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Last Name" name="last_name" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Email:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Email" name="email" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Street:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Street" name="street" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">City:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter City" name="city" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">State (2 characters):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter State" name="state" size="30" maxlength="2" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Zip:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Zip" name="zip" size="30" maxlength="5" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Phone Number:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Phone Number" name="phone" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Birth Date (YYYY-MM-DD):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Birth Date" name="birth_date" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Sex (M or F):</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Sex" name="sex" size="30" maxlength="2" required="true">
        </div>
      </div>

      <div class="form-group">
        <label class="control-label col-sm-2" for="">Lunch Cost:</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="Enter Lunch Cost" name="lunch" size="30" required="true">
        </div>
      </div>

      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-primary" value="Send" name="submit">Submit</button>
        </div>
      </div>
    </form>
</div>
</body>
</html>
