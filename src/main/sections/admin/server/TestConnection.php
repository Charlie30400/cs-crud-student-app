 <?php
  $dbservername = "localhost";
  $dbusername = "root";
  $dbpassword = "";



  // Create connection
  $conn = new mysqli($dbservername, $dbusername, $dbpassword);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  } else {
    echo "Connection successfully established ";
  }


  ?>
