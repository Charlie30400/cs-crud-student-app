<?php
include '../admin/server/Connect.php';

$depName = $_POST['depName'];
$depStatus = $_POST['depStatus'];
$depBossName = $_POST['depBossName'];
$depBossTitle   = $_POST['depBossTitle'];
$depEmail = $_POST['depEmail'];
$depPhone = $_POST['depPhone'];
$depAddress = $_POST['depAddress'];
$depComment = filter_input(INPUT_POST, 'depComment');


$sql =  "INSERT INTO department(depName,depStatus,depBossName,depBossTitle	,depEmail,depPhone,depAddress, depComment)
VALUES('$depName','$depStatus','$depBossName','$depBossTitle	','$depEmail','$depPhone','$depAddress','$depComment')";

//echo ($depBossName);


if ($conn->query($sql) == TRUE) {
  echo "\nNew record created successfully in department table";
  header("location:../Display-Department-Data.php");
} else {
  echo "\nError:" . $sql . "<br>" . $conn->error;
}
