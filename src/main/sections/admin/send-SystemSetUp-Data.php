<?php
include '../admin/server/Connect.php';


$uniName = filter_input(INPUT_POST, 'uniName');
$campName = filter_input(INPUT_POST, 'campName');
$campEmail = filter_input(INPUT_POST, 'campEmail');
$campPhone = filter_input(INPUT_POST, 'campPhone');
$campAddress = filter_input(INPUT_POST, 'campAddress');
$admiTerm = filter_input(INPUT_POST, 'admiTerm');
$profName = filter_input(INPUT_POST, 'profName');
$profPhone = filter_input(INPUT_POST, 'profPhone');
$profEmail = filter_input(INPUT_POST, 'profEmail');
$jobDescription = filter_input(INPUT_POST, 'jobDescription');


// //INSERT DATA

$sql =  "INSERT INTO administer(uniName,campName,campEmail,campPhone,campAddress,admiTerm,profName,profPhone,profEmail,jobDescription)
VALUES('$uniName','$campName','$campEmail','$campPhone','$campAddress','$admiTerm','$profName','$profPhone','$profEmail','$jobDescription')";
echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "New record created successfully";
  header("location:../index.php");
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}
