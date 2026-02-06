<?php

// Create connection
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "studentapp";

// Create connection
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

$table = "CREATE TABLE `department` (
  `depRecordId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `depName` varchar(15) DEFAULT NULL,
  `depStatus` varchar(8) DEFAULT NULL,
  `depBossName` varchar(25) DEFAULT NULL,
  `depBossTitle` varchar(25) DEFAULT NULL,
  `depEmail` varchar(50) DEFAULT NULL,
  `depPhone` varchar(12) DEFAULT NULL,
  `depAddress` varchar(50) DEFAULT NULL,
  `depComment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if ($conn->query($table) === TRUE) {
  echo "Department Table created successfully";
} else {
  echo "Error creating Department Table : " . $conn->error;
}
