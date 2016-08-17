<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <!-- boostrap3-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <title>Add Student</title>
  </head>
  <body>
<h3>Add Student</h3>
<a href="index.html" class="btn btn-danger" role="button">Cancel</a>
    <hr>
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

  <!--     <form action="studentadded.php" method="post">

      <b> Add a New Student </b>

   <p> first_name
        <input type="text" name="first_name" size="30" value=""/>
      </p>
      <p> Last Name:
        <input type="text" name="last_name" size="30" value=""/>
      </p>
      <p> Email:
        <input type="text" name="email" size="30" value=""/>
      </p>
      <p> Street:
        <input type="text" name="street" size="30" value=""/>
      </p>
      <p> City:
        <input type="text" name="city" size="30" value=""/>
      </p>
      <p> State (2 characters):
        <input type="text" name="state" size="30" maxlength="2" value=""/>
      </p>
      <p> Zip:
        <input type="text" name="zip" size="30" maxlength="5" value=""/>
      </p>
      <p> Phone Number:
        <input type="text" name="phone" size="30" value=""/>
      </p>
      <p> Birth Date (YYYY-MM-DD):
        <input type="text" name="birth_date" size="30" value=""/>
      </p>
      <p> Sex (M or F):
        <input type="text" name="sex" size="30" maxlength="1" value=""/>
      </p>
      <p> Lunch Cost:
        <input type="text" name="lunch" size="30" value=""/>
      </p>
      <p>
        <input type="submit" name="submit" value="Send"/>
      </p>
    </form>-->
  </body>
</html>
