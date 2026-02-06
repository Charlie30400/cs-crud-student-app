<?php
include '../server/Connect.php';
$academicTermsId = $_POST['academicTermsId'];
$termName = $_POST['termName'];
$termCode = $_POST['termCode'];
$termStatus = $_POST['termStatus'];

$sql = " UPDATE  academicTerms SET termName ='$termName', termCode='$termCode', termStatus= '$termStatus'
WHERE academicTermsId='$academicTermsId'";


echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "\nUpdate successfully";
  header('Location:../../Display-term-Data.php');
  exit();
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
