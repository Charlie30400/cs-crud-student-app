<!DOCTYPE html>

<head>

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta charset="utf-8">

  <a href="../Display-CompanyInfo-Data.php" </head>

<body>
</body>

</html>

<?php
include '../admin/server/Connect.php'; //Connection to database



$compName = filter_input(INPUT_POST, 'compName');
$compDepName = filter_input(INPUT_POST, 'compDepName');
$compStatus = filter_input(INPUT_POST, 'compStatus');
$compBoss = filter_input(INPUT_POST, 'compBoss');
$compBossTitle = filter_input(INPUT_POST, 'compBossTitle');
$compPhone = filter_input(INPUT_POST, 'compPhone');
$compAddress = filter_input(INPUT_POST, 'compAddress');
$compEmail = filter_input(INPUT_POST, 'compEmail');
$compWebPage = filter_input(INPUT_POST, 'compWebPage');
$compComment = filter_input(INPUT_POST, 'compComment');



$sql =  "INSERT INTO COMPANY(compName,compDepName,compStatus,compBoss,compBossTitle,compPhone,compAddress ,compEmail,compWebPage,compComment)
VALUES('$compName','$compDepName','$compStatus','$compBoss','$compBossTitle','$compPhone','$compAddress','$compEmail','$compWebPage','$compComment')";




// if (isset($sql)) {
//   echo '<script  type ="text/JavaScript">';
//   echo 'alert("No text has been added")';
//   echo '</script>';
//   header("location:../CreateCompany.php");
//   exit();
// }
if ($conn->query($sql) == TRUE) {
  echo "\nNew record created successfully";
  header("location:../Display-CompanyInfo-Data.php");
  exit();
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
