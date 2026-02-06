    <?php
    include '../server/Connect.php';
    $studRecordId = $_POST['studRecordId'];
    $studId = $_POST['studId'];
    $studFullName = $_POST['studFullName'];
    $studStatus = $_POST['studStatus'];
    $studPhone = $_POST['studPhone'];
    $studAddress = $_POST['studAddress'];
    $studEmail = $_POST['studEmail'];
    $studDateOfBirth = $_POST['studDateOfBirth'];
    $studGender = $_POST['studGender'];
    $studTerm = $_POST['studTerm'];
    $studComment = $_POST['studComment'];



    $sql =  " UPDATE  student SET studId =  '$studId', studFullName='$studFullName', studStatus= '$studStatus',
studPhone=  '$studPhone', studAddress='$studAddress',studEmail = '$studEmail',  studDateOfBirth= '$studDateOfBirth',
studGender='$studGender',studTerm = '$studTerm', studComment ='$studComment' WHERE studRecordId ='$studRecordId'";



    if ($conn->query($sql) == TRUE) {
      echo "\nUpdate successfully";
      header('Location:../../Display-Student-Data.php');
      exit();
    } else {
      echo "\nError:" . $sql . "<br>" . $conn->error;
    }
