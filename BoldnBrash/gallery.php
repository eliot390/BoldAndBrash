<?php
  include('session.php');

  $sql = "SELECT images.id, images.name, images.filename, images.price, images.bid, images.artist FROM images
  GROUP BY id";
  $result = $conn->query($sql);

  if ($result->num_rows > 0)
  {
    echo "<body id=galleryTable>
          <table class='table table-md'>
            <thead class='thead-light'>
              <h1>Bold and Brash Gallery</h1>
              <tr>
                <th scope='col'>ID #</th>
                <th scope='col'>Title</th>
                <th scope='col'>Artist</th>
                <th scope='col'>Preview</th>
                <th scope='col'>Price</th>
                <th scope='col'>Bids</th>
              </tr>";
    // output data of each row
    while($row = $result->fetch_assoc())
    {
      echo "<tr>
              <td>" . $row["id"] . "</td>
              <td>" . $row["name"] . "</td>
              <td>" . $row["artist"] . "</td>
              <td><img src=" . $row["filename"] . " id=image></td>
              <td>$" . $row["price"] . "</td>
              <td>" . $row["bid"] . "</td>
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
    <link rel="stylesheet" href="bnb.css">
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
