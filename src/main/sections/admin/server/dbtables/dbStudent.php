<?php

// Create connection
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "studentapp";

// Create connection string
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);

$table = "CREATE TABLE `student` (
  `studRecordId` int(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `studId` varchar(10) DEFAULT NULL,
  `studFullName` varchar(50) DEFAULT NULL,
  `studStatus` varchar(8) DEFAULT NULL,
  `studPhone` varchar(12) DEFAULT NULL,
  `studAddress` varchar(50) DEFAULT NULL,
  `studEmail` varchar(50) DEFAULT NULL,
  `studDateOfBirth` date DEFAULT NULL,
  `studGender` varchar(2) DEFAULT NULL,
  `studTerm` varchar(7) DEFAULT NULL,
  `studComment` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";

if ($conn->query($table) === TRUE) {
  echo "Student Table created successfully";
} else {
  echo "Error creating Student Table : " . $conn->error;
}
