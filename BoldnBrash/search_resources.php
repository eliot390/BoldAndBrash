<?php
include('config.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Search Resources</title>
  <link rel="stylesheet" href="TEVG.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
  integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
   integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
</head>

  <body>
    <div id='main'>
      <div class='row' id='logged-in'>
        <div class='col-md-11' id='ARtitle'>Search Resources</div>
        <div class='col-md-1' id='ARtitle'><span id='close'></span></div>
      </div>
      <div class='row'>
        <div id='tableHeading1' class='col-md-12'></div>
      </div>
      <form action="search_resources.php" method="POST">
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Keyword<br><span id=subtext>(optional)</span></div>
          <div class='col-md-8'><input type="text" name="keyword" class="form-control" value="<?php if(isset($_GET["keyword"])) echo $_GET["keyword"]; ?>"></div>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Primary Function</div>
            <select name='primary_func' id='primary_func' style='margin-left: 15px; height:40px' class='btn btn-primary'>
              <option>Primary Function</option>
              <option value='1'>Transportation</option>
              <option value='2'>Communications</option>
              <option value='3'>Engineering</option>
              <option value='4'>Search and Rescue</option>
              <option value='5'>Education</option>
              <option value='6'>Energy</option>
              <option value='7'>Firefighting</option>
              <option value='8'>Human Services</option>
            </select>
        </div>
        <div class='row'>
          <div id='tableHeading' class='col-md-4'>Distance<br><span id=subtext>(optional)</span></div>
          <div class='col-md-4'><input type="text" name="distance" class="form-control" value="<?php if(isset($_GET["distance"])) echo $_GET["distance"]; ?>" /></div>
          <div>miles from PCC</div>
        </div>
        <div class='row' id='cancelSave'>
          <div>
            <a class='btn btn-primary' href='index.php' role='button'>Main Menu</a>
            <input name='reset' type='reset' value='Cancel' class='reset_button btn btn-default' />
            <input type="submit" name="submit" class="btn btn-primary" value="Search" />
          </div>
        </div>
      </form>
      <div class="table-responsive">
        <table class="table table-bordered">
          <?php
          if(isset($_POST["submit"]))
          {
            $condition = '';
            if($_POST["keyword"] != "")
            {
              $condition .= "(`resource_name` LIKE '%" . mysqli_real_escape_string($conn, $_POST["keyword"]) . "%' OR `description` LIKE '%".mysqli_real_escape_string($conn, $_POST["keyword"])."%')";
            }
            if($_POST["primary_func"] != "Primary Function")
            {
              if($condition != "")
              {
                $condition .= " AND ";
              }
              $condition .= "`primary_func` = " . mysqli_real_escape_string($conn, $_POST["primary_func"]);
            }
            if($_POST["distance"] != "" )
            {
              if($condition != "")
              {
                $condition .= " AND ";
              }
              $condition .= "`distance` <= " . mysqli_real_escape_string($conn, $_POST["distance"]);
            }
            if($condition != '')
            {
              $condition = " WHERE " . $condition;
            }
            
            $sql_query = "SELECT * FROM `resources` JOIN certuser ON resources.userID=certuser.userID $condition ORDER BY distance ASC";
            $result = mysqli_query($conn, $sql_query);

             if(mysqli_num_rows($result) > 0)
              {
                echo "<body>
                      <table class=table>
                        <thead>
                          <h2 style='text-align: center; margin-top: 30px;'>Search Results</h2>
                          <tr>
                            <th>Resource ID</th>
                            <th>Resource Name</th>
                            <th>Owner</th>
                            <th>Cost/Unit</th>
                            <th>Distance</th>
                          </tr>";
                   while($row = mysqli_fetch_array($result))
                  {
                    echo "<tr>
                          <td>" . $row["resourceID"] . "</td>
                          <td>" . $row["resource_name"] . "</td>
                          <td>" . $row["displayName"] . "</td>
                          <td>" . "$" . $row["cost"] . "/" . $row["cost_unit"] . "</td>
                          <td>" . $row["distance"] . " mi." . "</td>
                          </tr>";
                  }
              }
              else
              {
                echo "<div class='alert alert-warning' role='alert' style='margin-top: 30px; text-align: center; font-size: 20px;'>
                        <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                        <strong>Oops!</strong> No results found. <i class='fa fa-exclamation-triangle' aria-hidden='true'></i>
                      </div>";
              }
          }

           ?>
           </table>
      </div>
 </div>
</body>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
  <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
  <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
  <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
</html>
