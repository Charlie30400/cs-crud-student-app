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
  <h2>UPDATE TERM INFO</h2>


  <?php
  include '../server/Connect.php';
  $update = $_GET['id'];


  if (isset($update)) {

    $sql = "SELECT * FROM academicterms WHERE academicTermsId= '$update'";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
      while ($row = $result->fetch_assoc()) {
        $academicTermsId  = $row['academicTermsId'];
        $termName = $row['termName'];
        $termCode = $row['termCode'];
        $termStatus = $row['termStatus'];
      }
    }
  }

  ?>
  <form autocomplete="off" action="./send-Update-Term-Data.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">Term Name:</label>
          <input type='hidden' id='academicTermsId' name='academicTermsId' value='<?php echo $academicTermsId; ?>'>
        </div>
        <div class="col-75">
          <input type="text" id="termName" name="termName" value='<?php echo $termName; ?>'>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Term Code:</label>
        </div>

        <div class="col-75">
          <input type="text" id="termCode" name="termCode" value='<?php echo $termCode; ?>'>
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">term Status:</label>
        </div>
        <div class="col-75">
          <input type="text" id="termStatus" name="termStatus" value='<?php echo $termStatus; ?>'>

        </div>
      </div>


      <div class="row">

        <button type="submit">Save </a></button>


      </div>
  </form>

</body>


</html>