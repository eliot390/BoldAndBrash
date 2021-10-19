<?php
  include('config.php');
  session_start();

  if($_SERVER["REQUEST_METHOD"] == "POST")
  {
    # username and password sent from form
    $myusername = mysqli_real_escape_string($conn, $_POST['username']);
    $mypassword = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = "SELECT userID FROM certuser WHERE userName = '$myusername' AND password = '$mypassword'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $count = mysqli_num_rows($result);

    # If result matched $myusername and $mypassword, table row must be 1 row
    if($count == 1)
    {
      $_SESSION['logged_in_user_id'] = $row['userID'];

      header("location: index.php");
    }
    else
    {
      $error = "Invalid Username or Password";
      echo "<div class='alert alert-danger' style='font-weight: 500; text-align: center; font-size: 20px; width: 52%; margin: auto;' role='alert'>
            <i class='fa fa-exclamation-circle' aria-hidden='true'></i> ". $error ." <i class='fa fa-exclamation-circle' aria-hidden='true'></i></div>";
    }
  }
?>

<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <title>Bold and Brash Login</title>
	<link rel="stylesheet" href="bnb.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<body style="background-image: url('i5s306a.png');">
  <div id="main" >
    <div class="row" id="logged-in">
      <div id="ARtitle">Welcome to Bold and Brash Art Designs</div>
			<div id="loginHeading">Where nothing here belongs in the trash.</div>
    </div>
		<div class="col-md-12">
			<h1 style="color: rgb(252, 249, 28)">Login</h1>
		</div>
    <form action = "" method = "post">
  		<div class="col-md-12">
  			<h5 style="color: rgb(252, 249, 28)">Username</h5>
  		</div>
  		<div class="col-md-4">
  			<div><input type="text" name="username" class="form-control" id="exampleInputName2" placeholder="username"></div>
  		</div>
  		<div class="col-md-12">
  			<h5 style="color: rgb(252, 249, 28)">Password</h5>
  		</div>
  		<div class="col-md-4">
  			<div><input type="password" name="password" class="form-control" id="exampleInputName2" placeholder="password"></div>
  		</div>
  		<div class="col-md-2" id="submit">
        <input class='btn btn-primary submit' type="submit" value=" Submit ">
  		</div>
    </form>

  </div>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</body>

</html>
