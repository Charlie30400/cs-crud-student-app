<?php
include '../server/Connect.php';
$compId = $_POST['compId'];
$compName = $_POST['compName'];
$compDepName = $_POST['compDepName'];
$compStatus = $_POST['compStatus'];
$compBoss = $_POST['compBoss'];
$compBossTitle = $_POST['compBossTitle'];
$compPhone = $_POST['compPhone'];
$compAddress = $_POST['compAddress'];
$compEmail = $_POST['compEmail'];
$compWebPage = $_POST['compWebPage'];
$compComment = $_POST['compComment'];



$sql =  " UPDATE  company SET compName =  '$compName', compDepName='$compDepName' compStatus= '$compStatus',
compBoss=  '$compBoss', compBossTitle='$compBossTitle',compPhone = '$compPhone',  compAddress= '$compAddress',
compEmail='$compEmail',compWebPage = '$compWebPage', compComment ='$compComment' WHERE compId ='$compId'";


echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "\nUpdate successfully";
  header('Location:../../Display-CompanyInfo-Data.php');
  exit();
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
