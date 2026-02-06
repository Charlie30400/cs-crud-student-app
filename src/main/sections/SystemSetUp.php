<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="SystemSetUpPage">
  <meta name="keywords" content="StudentApp/SystemSetUpPage">
  <meta name="author" content="Carlos Ernesto Rodríguez Méndez">


  <title>Document</title>
  <!--Navabar-->
  <style>
    input[type="text"],
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

    input[type="submit"] {
      background-color: #4caf50;
      color: white;
      padding: 12px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }

    input[type="submit"]:hover {
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
      content: "";
      display: table;
      clear: both;
    }

    /* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
    @media screen and (max-width: 600px) {

      .col-25,
      .col-75,
      input[type="submit"] {
        width: 100%;
        margin-top: 0;
      }
    }
  </style>
  <?php

  require './admin/config/includes/navbar.html'; ?>


</head>

<body>

  <h2>System Set up</h2>
  <form autocomplete="off" action="./admin/send-SystemSetUp-Data.php" method="post">
    <button type="submit">Save</button>
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">University</label>
        </div>
        <div class="col-75">
          <input type="text" id="uniName" name="uniName" placeholder="Enter University Name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Campus</label>
        </div>
        <div class="col-75">
          <input type="text" id="campName" name="campName" placeholder="Enter University Campus">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="campEmail" name="campEmail" placeholder="Enter University Email">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Phone</label>
        </div>
        <div class="col-75">
          <input type="tel" id="campPhone" name="campPhone" placeholder="Enter University Phone">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Address</label>
        </div>
        <div class="col-75">
          <input type="text" id="campAddress" name="campAddress" placeholder="Enter University Address">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Term</label>
        </div>
        <select name="admiTerm">
          <?php
          include './admin/server/Connect.php';
          $sql = "SELECT * FROM academicterms ";
          if ($result = mysqli_query($conn, $sql)) {
            if (mysqli_num_rows($result) > 0) {
              while ($row = mysqli_fetch_assoc($result)) {
                echo "<option value=" . $row['academicTermsId']  . " >" . $row['termName'] . "</option>";
              }
            } else {
              echo "Error:" . $conn->error;
            }
          }
          ?>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Professor</label>
      </div>
      <div class="col-75">
        <input type="text" id="profName" name="profName" placeholder="Enter Professor Name">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Phone</label>
      </div>
      <div class="col-75">
        <input type="tel" id="ProfessorPhone" name="profPhone" placeholder="Enter Profesor Phone">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Email</label>
      </div>
      <div class="col-75">
        <input type="text" id="profEmail" name="profEmail" placeholder="Enter Professor Email">
      </div>
    </div>
    <div class="row">
      <div class="col-25">
        <label for="lname">Position</label>
      </div>
      <div class="col-75">
        <input type="text" id="jobDescription" name="jobDescription" placeholder="Enter Profesor Job Position">
      </div>
    </div>

    <div class="row">
      <button type="submit">Save</button>
      <!-- <button onclick="location.href='./index.php'" type="submit">Save</button> -->
    </div>
  </form>
</body>

</html>