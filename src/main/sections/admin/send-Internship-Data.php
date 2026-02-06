<?php

include '../admin/server/Connect.php';
$studRecordId = filter_input(INPUT_POST, 'studRecordId');
$compId = filter_input(INPUT_POST, 'compId');
$depRecordId = filter_input(INPUT_POST, 'depRecordId');
//INSERT DATA

$sql =  "INSERT INTO internship(studRecordId,compId,depRecordId)
VALUES('$studRecordId','$compId' ,'$depRecordId' )";


echo ($sql);
if ($conn->query($sql) == TRUE) {
  echo "New record created successfully in Internship table";
  header("location:../Display-Internship-Data.php");
} else {
  echo "Error:" . $sql . "<br>" . $conn->error;
}
