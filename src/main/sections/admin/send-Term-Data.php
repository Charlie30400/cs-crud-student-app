<?php
include '../admin/server/Connect.php';
$depRecordId = $_POST['depRecordId'];
$depName = $_POST['depName'];
$depStatus = $_POST['depStatus'];
$depBossName = $_POST['depBossName'];
$depBossTitle = $_POST['depBossTitle'];
$depPhone = $_POST['depPhone'];
$depAddress = $_POST['depAddress'];
$depEmail = $_POST['depEmail'];
$depComment = $_POST['depComment'];



$sql =  "INSERT INTO administer(uniName,campName,campEmail,campPhone,campAddress,admiTerm,profName,profPhone,profEmail,jobDescription)
VALUES('$uniName','$campName','$campEmail','$campPhone','$campAddress','$admiTerm','$profName','$profPhone','$profEmail','$jobDescription')";
echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "New record created successfully";
  header("location:../Display-term-Data.php");
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}
