<?php
  include('session.php');

  $sql = "SELECT primaryfunction.functionname, primaryfunction.functionnumber, COUNT(primary_func) AS 'count' FROM primaryfunction
  LEFT JOIN resources ON  primaryfunction.functionnumber = resources.primary_func
  GROUP BY functionnumber";
  $result = $conn->query($sql);

  $sql2 = "SELECT COUNT(primary_func) AS 'total' FROM resources";
  $result2 = $conn->query($sql2);

  if ($result->num_rows > 0)
  {
    echo "<body style='width: 99%; padding-left: 10px;'>
          <table class='table table-md'>
            <thead class='thead-light'>
              <h1>Resource Report</h1>
              <tr>
                <th scope='col'>Primary Function #</th>
                <th scope='col'>Primary Function</th>
                <th scope='col'>Total Resources</th>
              </tr>";
    // output data of each row
    while($row = $result->fetch_assoc())
    {
      echo "<tr>
              <td>" . $row["functionnumber"] . "</td>
              <td>" . $row["functionname"] . "</td>
              <td>" . $row["count"] . "</td>
            </tr>";
    }
    while($row = $result2->fetch_assoc())
    {
      echo "<tr>
              <th></td>
              <th style='font-weight: bold;'>Total: </td>
              <th>" . $row["total"] . "</td>
            </tr>";
    }
    echo "
          </table>
          <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'></script>
          <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js'></script>
          <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js'></script>
        </body>";
  }
  else
  {
    echo "0 results";
  }
  $conn->close();
?>

<!DOCTYPE>
<html>

  <head>
    <meta charset="utf-8">
    <title>Resource Report</title>
    <link rel="stylesheet" href="TEVG.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>

  <body>
    <div class='row' id='cancelSave'>
      <div class='col-md-2'>
        <a class='btn btn-primary' href='index.php' role='button'>Main Menu</a>
      </div>
    </div>
  </body>

</html>
