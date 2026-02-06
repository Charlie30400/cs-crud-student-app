<?php
include '../admin/server/Connect.php';
$studId =  filter_input(INPUT_POST, 'studId');
$studFullName =  filter_input(INPUT_POST, 'studFullName');
$studStatus = filter_input(INPUT_POST, 'studStatus');
$studPhone = $_POST['studPhone'];
$studAddress = $_POST['studAddress'];
$studEmail = $_POST['studEmail'];
$studDateOfBirth = $_POST['studDateOfBirth'];
$studGender = $_POST['studGender'];
$studTerm = $_POST['studTerm'];
$studComment = $_POST['studComment'];

//for testing 
foreach ($_POST as $key => $value) {
     echo "Field " . htmlspecialchars($key) . " is " . htmlspecialchars($value) . "<br>";
} //INSERT DATA

$sql =  "INSERT INTO student(studId,studFullName,studStatus, studPhone, studAddress, studEmail, studDateOfBirth, studGender, studTerm,studComment)
VALUES('$studId','$studFullName','$studStatus',' $studPhone',' $studAddress',' $studEmail',' $studDateOfBirth',' $studGender',' $studTerm','$studComment')";

echo "$sql";
if ($conn->query($sql) == TRUE) {
     echo "New record created successfully";
     header("location:../Display-Student-Data.php");
} else {
     echo "Error:" . $sql . "<br>" . $conn->error;
}
