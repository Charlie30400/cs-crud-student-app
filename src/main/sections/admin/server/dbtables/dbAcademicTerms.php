<?php

// Create connection
$dbservername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "studentapp";

// Create connection string
$conn = new mysqli($dbservername, $dbusername, $dbpassword, $dbname);


$table = "CREATE TABLE `academicterms` (
  `academicTermsId` int(11) NOT NULL  AUTO_INCREMENT PRIMARY KEY,
  `termName` varchar(25) DEFAULT NULL,
  `termCode` varchar(7) DEFAULT NULL,
  `termStatus` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";


if ($conn->query($table) === TRUE) {
  echo "AcademicTerms Table created successfully";
} else {
  echo "Error creating AcademicTerms Table : " . $conn->error;
}



$insert = "INSERT INTO academicTerms (academicTermsId,termName,termCode)
  VALUES 
  (1, 'Julio', '2022-04'),
(2, 'Agosto Intensivo', '2022-07'),
(3, 'Agosto a Diciembre', '2022-10'),
(4, 'Trimestre I', '2022-13'),
(5, 'Trimestre II', '2022-23'),
(6, 'Enero Intensivo', '2022-27'),
(7, 'Enero a Mayo', '2022-30'),
(8, 'Trimestre III', '2022-33'),
(9, 'Junio', '2022-50') ";



if ($conn->query($insert) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $insert . "<br>" . $conn->error;
}