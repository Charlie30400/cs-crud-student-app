<?php
// Create connection
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "studentapp";

// Create connection string
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

$table = "CREATE TABLE `administer` (
  `admId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `uniName` varchar(50) DEFAULT NULL,
  `campName` varchar(25) DEFAULT NULL,
  `campEmail` varchar(50) DEFAULT NULL,
  `campPhone` varchar(10) DEFAULT NULL,
  `campAddress` varchar(50) DEFAULT NULL,
  `admiTerm` varchar(7) DEFAULT NULL,
  `profName` varchar(20) DEFAULT NULL,
  `profPhone` varchar(12) NOT NULL,
  `profEmail` varchar(50) DEFAULT NULL,
  `jobDescription` varchar(35) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if ($conn->query($table) === TRUE) {
  echo "Administer Table created successfully";
} else {
  echo "Error creating Administer Table : " . $conn->error;
}
