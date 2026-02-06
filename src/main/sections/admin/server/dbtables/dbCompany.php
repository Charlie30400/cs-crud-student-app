
  <?php

  // Create connection
  $dbservername = "localhost";
  $dbusername = "root";
  $dbpassword = "";
  $dbname = "studentapp";

  // Create connection string
  $conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

  $table = "CREATE TABLE `company` (
  `compId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `compName` varchar(15) DEFAULT NULL,
  `compDepName` varchar(50) DEFAULT NULL,
  `compStatus` varchar(8) DEFAULT NULL,
  `compBoss` varchar(25) DEFAULT NULL,
  `compBossTitle` varchar(50) DEFAULT NULL,
  `compPhone` varchar(12) DEFAULT NULL,
  `compAddress` varchar(50) DEFAULT NULL,
  `compEmail` varchar(50) DEFAULT NULL,
  `compWebPage` varchar(100) DEFAULT NULL,
  `compComment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

  if ($conn->query($table) === TRUE) {
    echo "Company Table created successfully";
  } else {
    echo "Error creating Company Table : " . $conn->error;
  }
