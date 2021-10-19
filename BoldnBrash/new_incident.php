<?php
  include('session.php');

  // check for submit
  if(isset($_POST['submit'])){
    $category = mysqli_real_escape_string($conn, $_POST['category']);
    $userID = $logged_in_user_id;
    $date = mysqli_real_escape_string($conn, $_POST['date']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);

    $query = "INSERT INTO new_incident(category, userID, date_of, description)
    VALUES('$category', $userID, '$date', '$description')";

    if(mysqli_query($conn, $query)){
      header('Location: index.php');
    }
    else
    {
      echo 'ERROR: ' . mysqli_error($conn);
    }
  }

  echo "<body>
    <div id='main'>
      <div class='row' id='logged-in'>
        <div class='col-md-11' id='ARtitle'>New Incident Information</div>
        <div class='col-md-1' id='ARtitle'><span id='close'></span></div>
      </div>
      <div class='row'>
        <div id='tableHeading1' class='col-md-12'></div>
      </div>
      <form action='new_incident.php' method='POST'>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Category</div>
          <select name='category' id='incident' style='margin-left: 15px; height:40px' class='btn btn-primary'>
            <option>Category</option>
            <option value='1'>Must Evacuate, Secure Lockdown</option>
            <option value='2'>May Evacuate, Secure Lockdown</option>
            <option value='3'>No Evacuation, Limited Lockdown</option>
            <option value='4'>No Evacuation, No Lockdown</option>
          </select>
        </div>
        <div class='row'>
          <div id='tableHeading1' class='col-md-12'>Incident ID<br><span id=subtext>(assigned on save)</span></div>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Date<span id=required>*</span><br><span id=subtext>(required)</span></div>
          <div class='col-md-4'><input type='text' name='date' class='form-control' id='exampleInputName2' placeholder='mm/dd/yyyy'></div>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Description<span id=required>*</span><br><span id=subtext>(required)</span></div>
          <div class='col-md-4'><input type='text' name='description' class='form-control' id='exampleInputName2' placeholder='description'></textarea></div>
        </div>
        <div class='row' id='cancelSave'>
          <div>
            <a class='btn btn-primary' href='index.php' role='button'>Main Menu</a>
            <input name='reset' type='reset' value='Cancel' class='reset_button btn btn-default' />
            <button class='btn btn-primary submit' name='submit' type='submit'>Save</button>
          </div>
        </div>
      </form>
    </div>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
  </body>"

?>

<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <title>Add Emergency Incident</title>
  <link rel="stylesheet" href="TEVG.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<script>
$(".dropdown-menu li a").click(function(){
  $(this).parents(".dropdown").find('.btn').html($(this).text() + ' <span class="caret"></span>');
  $(this).parents(".dropdown").find('.btn').val($(this).data('value'));
});
</script>

</html>
