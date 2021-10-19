<?php
  include('session.php');

  // check for submit
  if(isset($_POST['submit'])){
    $resource_name = mysqli_real_escape_string($conn, $_POST['resource_name']);
    $userID = $logged_in_user_id;
    $primary_func = mysqli_real_escape_string($conn, $_POST['primary_func']);
    $secondary_func = mysqli_real_escape_string($conn, $_POST['secondary_func']);
    if($secondary_func == 'Secondary Function')
    {
      $secondary_func = 'NULL';
    }
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $distance = mysqli_real_escape_string($conn, $_POST['distance']);
    $cost = mysqli_real_escape_string($conn, $_POST['cost']);
    $cost_unit = mysqli_real_escape_string($conn, $_POST['cost_unit']);

    $query = "INSERT INTO resources(resource_name, userID, primary_func, secondary_func, description, distance, cost, cost_unit)
    VALUES('$resource_name', $userID, $primary_func, $secondary_func, '$description', '$distance', '$cost', '$cost_unit')";

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
        <div class='col-md-11' id='ARtitle'>New Art Listing</div>
      </div>
      <div class='row'>
        <div id='tableHeading1' class='col-md-12'>Resource ID<br><span id=subtext>(assigned on save)</span></div>
      </div>
      <div class='row'>
        <div id='tableHeading' class='col-md-4'>Owner</div>
        <div class='col-md-4' style='font-size: 20px;	font-weight: 500;'>" . $row['displayName'] . "</div>
      </div>
      <form action='add_resource.php' method='POST'>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Piece Name<span id=required>*</span><br><span id=subtext>(required)</span></div>
          <div class='col-md-6'><input type='text' class='form-control' name='resource_name' type='text' value=''></div>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Medium</div>
            <select name='primary_func' id='primary_func' style='margin-left: 10px; height:40px; width:150px;' class='btn btn-primary'>
              <option>Choose One</option>
              <option value='1'>Painting</option>
              <option value='2'>Sculpture</option>
              <option value='3'>Photography</option>
              <option value='4'>Other</option>
            </select>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Description<br><span id=subtext>(optional)</span></div>
          <div class='col-md-6'><input type='text' name='description' class='form-control' id='exampleInputName2' placeholder='Description'></div>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Cost<span id=required>*</span><br><span id=subtext>(USD)</span></div>
          <div class='col-md-4'><input type='text' name='cost' class='form-control' id='exampleInputName2' placeholder='$0.00'></div>
        </div>
        <div class='row' id='cancelSave'>
          <div>
            <a class='btn btn-primary' href='index.php' role='button'>Main Menu</a>
            <input name='reset' type='reset' value='Cancel' class='reset_button btn btn-default' />
            <button class='btn btn-primary cancel' name='cancel' type='cancel'>Cancel</button>
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
  <title>Add Art Listing</title>
  <link rel="stylesheet" href="bnb.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
  <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css">
</head>

<script>
var $select = $("select");
$select.on("change", function(){
  var selected = [];
  $.each($select, function(index, select) {
    if (select.value !== ""){ selected.push(select.value); }
  });
   $("option").attr("hidden", false);
   for (var index in selected) { $('option[value="'+selected[index]+'"]').attr("hidden", true); }
});
</script>

<script>
var x = 0;
var arrayData = Array();

function add_element_to_array()
{
 arrayData[x] = document.getElementById("capabilities").value;
 //alert("Element: " + array[x] + " Added at index " + x);
 alert("\"" + arrayData[x] + "\"" + " added to capabilities");
 x++;
 document.getElementById("capabilities").value = "";
}
</script>

</html>
