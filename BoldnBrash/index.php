<?php
  error_reporting(0);
  include('session.php');

    $sql="SELECT certuser.displayName, certuser.userID, cimtuser.cimtID, sysadmin.adminID, cimtuser.phone, sysadmin.email, resourceprovider.address
    FROM certuser
    LEFT JOIN cimtuser ON cimtuser.userID = certuser.userID
    LEFT JOIN sysadmin ON sysadmin.userID = certuser.userID
    LEFT JOIN resourceprovider ON resourceprovider.userID = certuser.userID
    WHERE certuser.userID = '$logged_in_user_id' ";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();

    echo "<body>
      <div id='main'>
        <div class='row'>
          <div class='col-md-12' id='logged-in'>You are now logged in</div>
        </div>
        <div id='heading' class='row'>
          <div id='title' class='col-md-6'>Welcome</div>
          <div id='user-info' class='col-md-6'>" .$row['displayName']. "<br><span style='font-size: 20px'>" . $row['phone'] . $row['email'] . $row['address'] . "</span></div>
        </div>
        <div id='main-menu' class='row'>
          <div class='col-md-12'>Main Menu</div>
          <div class='col-md-12' id='menu-options'><a href='add_listing.php'>Create Art Listing</a>
            <br><a href='new_incident.php'>Search Listings</a>
            <br><a href='search_resources.php'>View Gallery</a>
            <br><a href='resource_report.php'>Upload Art for Gallery</a>
          </div>
        </div>
        <div class='row'>
          <div class='col-md-10'></div>
          <div class='col-sm-2'>
            <a class='btn btn-primary' href='logout.php' role='button'>Log Out</a>
          </div>
        </div>
      </div>
    </body>"
?>

<!DOCTYPE>
<html>

<head>
  <meta charset="utf-8">
  <title>CIMT Main Menu</title>
  <link rel="stylesheet" href="bnb.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css">
</head>

</html>
