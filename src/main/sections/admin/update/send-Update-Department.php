<?php
include '../server/Connect.php';
$depRecordId = $_POST['depRecordId'];
$depName = $_POST['depName'];
$depStatus = $_POST['depStatus'];
$depBossName = $_POST['depBossName'];
$depBossTitle = $_POST['depBossTitle'];
$depPhone = $_POST['depPhone'];
$depAddress = $_POST['depAddress'];
$depEmail = $_POST['depEmail'];
$depComment = $_POST['depComment'];



$sql =  " UPDATE  department SET depName =  '$depName', depName='$depName',depStatus= '$depStatus',
depBossName=  '$depBossName', depBossTitle='$depBossTitle',
depEmail='$depEmail',depPhone = '$depPhone',  depAddress= '$depAddress', depComment ='$depComment' WHERE depRecordId ='$depRecordId'";


echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "\nUpdate successfully";
  header('Location:../../Display-Department-Data.php');
  exit();
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
