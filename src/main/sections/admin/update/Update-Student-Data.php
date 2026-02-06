<!DOCTYPE html>
<html lang=' en'>

<head>
  <meta charset=' UTF-8'>
  <meta http-equiv=' X-UA-Compatible' content=' IE=edge'>
  <meta name=' viewport' content=' width=device-width, initial-scale=1.0'>
  <meta name=' description' content='UpdateCompanyPage'>
  <meta name=' keywords' content=' Update Company'>
  <meta name=' author' content=' Carlos Ernesto Rodríguez Méndez'>
  <link rel=' stylesheet' href=' ../style/template/style.css'>

  <style>
    input[type=' text'],
    select,
    textarea {
      width: 100%;
      padding: 12px;
      border: 1px solid #ccc;
      border-radius: 4px;
      resize: vertical;
    }

    label {
      padding: 12px 12px 12px 0;
      display: inline-block;
    }

    input[type=' submit'] {
      background-color: #4caf50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type=' submit']:hover {
      background-color: #45a049;
    }

    .container {
      border-radius: 5px;
      background-color: #f2f2f2;
      padding: 20px;
    }

    .col-25 {
      float: left;
      width: 25%;
      margin-top: 6px;
    }

    .col-75 {
      float: left;
      width: 75%;
      margin-top: 6px;
    }

    /* Clear floats after the columns */
    .row:after {
      content: '';
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type='submit'] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
  <?php
  require_once '../config/./includes/./navbar.html';

  ?>
</head>
<br>

<body>
  <h2>UPDATE STUDENT INFO</h2>


  <?php
  include '../server/Connect.php';
  $update = $_GET['id'];

  $sql = "SELECT * FROM student WHERE studRecordId= '$update'";

  $result = mysqli_query($conn, $sql);
  $queryResult = mysqli_num_rows($result);
  if ($queryResult > 0) {
    while ($row = $result->fetch_assoc()) {
      $studRecordId  = $row['studRecordId'];
      $studId = $row['studId'];
      $studFullName = $row['studFullName'];
      $studStatus = $row['studStatus'];
      $studPhone = $row['studPhone'];
      $studPhone = $row['studPhone'];
      $studAddress = $row['studAddress'];
      $studEmail = $row['studEmail'];
      $studDateOfBirth = $row['studDateOfBirth'];
      $studGender = $row['studGender'];
      $studTerm = $row['studTerm'];
      $studComment = $row['studComment'];
      // echo "( $result)";
      // echo "( $queryResult)";
      //error no tiene las variables declaradas
    }
  }


  ?>
  <form autocomplete="off" action="./send-Update-Student-Data.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">StudId:</label>
          <input type='hidden' id='studRecordId' name='studRecordId' value='<?php echo $studRecordId; ?>'>
        </div>
        <div class="col-75">
          <input type="text" id="studId" name="studId" placeholder="P005504010" value='<?php echo $studId; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Name:</label>
        </div>

        <div class="col-75">
          <input type="text" id="studFullName" name="studFullName" placeholder="Enter fullname" value='<?php echo $studFullName; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lblCompanyStatus">Status</label>
        </div>
        <div class="col-75">
          <select id='studStatus' name='studStatus' value='<?php echo $studStatus; ?>'>
            <option value='Active'>Active</option>
            <option value='Inactive'>Inactive</option>

          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Address:</label>
        </div>
        <div class="col-75">
          <input type="text" id="studAddress" name="studAddress" placeholder="Enter student address" value='<?php echo $studAddress; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Phone:</label>
        </div>
        <div class="col-75">
          <input type="text" id="studPhone" name="studPhone" placeholder="Enter student phone number" value='<?php echo $studPhone; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="studEmail" name="studEmail" placeholder="Enter Professor Email" value='<?php echo $studEmail; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Date of Birth:</label>
        </div>
        <div class="col-75">
          <input type="date" id="studDateOfBirth" name="studDateOfBirth" value='<?php echo $studDateOfBirth; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Gender:</label>
        </div>
        <div class="col-75">

          <select name="studGender">
            <option value='Male' <?php if ($studGender == "M") echo "SELECTED"; ?>>Male</option>
            <option value='Female' <?php if ($studGender == "F") echo "SELECTED"; ?>>Female</option>
            <option value='Trans-Female' <?php if ($studGender == "TF") echo "SELECTED"; ?>>Trans-Female</option>
            <option value='Trans-Male' <?php if ($studGender == "TM") echo "SELECTED"; ?>>Trans-Male</option>
            <option value='Other' <?php if ($studGender == "O") echo "SELECTED"; ?>>Other</option>
            <option value='None' <?php if ($studGender == "N") echo "SELECTED"; ?>>None</option>

          </select>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='current-semester'>Current Semester:</label>
        </div>

      </div>
      <select name="studTerm">
        <?php

        $sql = "SELECT * FROM academicterms";
        if ($result = mysqli_query($conn, $sql)) {
          if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<option value=" . $row['termName'] . "";
              if ($studTerm == $row['academicTermsId']) echo " SELECTED ";
              echo " >" . $row['termName'] . "</option>";
            }
          } else {
            echo "Error:" . $conn->error;
          }
        }
        echo ('$')
        ?>
      </select>
      <div class=" row">
        <div class="col-25">
          <label for="lname">Comment:</label>
        </div>
        <div class="col-75">
          <textarea cols="100" rows="5" id="studComment" name="studComment" style="overflow:scroll;" placeholder="Enter Comment here..."><?php echo $studComment; ?></textarea>
        </div>

      </div>
      <div class="row">

        <button type="submit">Save </a></button>


      </div>
  </form>

</body>


</html>