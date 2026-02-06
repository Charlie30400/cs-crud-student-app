<?php
include '../server/Connect.php';
$internshipId = $_POST['internshipId'];
$studRecordId = $_POST['studRecordId'];
$compId = $_POST['compId'];
$depRecordId = $_POST['depRecordId'];

$sql = " UPDATE  internship SET studRecordId =  '$studRecordId', compId='$compId', depRecordId= '$depRecordId'
WHERE internshipId  ='$internshipId'";


echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "\nUpdate successfully";
  header('Location:../../Display-Internship-Data.php');
  exit();
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
