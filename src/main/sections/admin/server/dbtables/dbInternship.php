<?php

// Create connection
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "studentapp";

// Create connection string
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

$table = "CREATE TABLE `internship` (
  `internshipId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `studRecordId` int(11) DEFAULT NULL,
  `compId` int(11) DEFAULT NULL,
  `depRecordId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($table) === TRUE) {
  echo "Internship Table created successfully";
} else {
  echo "Error creating Internship Table : " . $conn->error;
}
