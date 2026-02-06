<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="SystemSetUpPage">
  <meta name="keywords" content="StudentApp/SystemSetUpPage">
  <meta name="author" content="Carlos Ernesto Rodríguez Méndez">
  <link rel="stylesheet" href="../../style/template/style.css">

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
  require './admin/config/includes/navbar.html' ?>

</head>

<body>
  <h2>Academic Term</h2>
  <form autocomplete="off" action="./admin/send-AcademicTerm-Data.php">
    <div class="container">

      <div class="row">
        <div class="col-25">
          <label for="lname">Choose a Term:</label>
        </div>
        <div class="col-75">
          <select id="CurrentSemester" name="currentSemester">

        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="subject">Status</label>
        </div>
        <div class="col-75">
          <input type="radio" id="status-active" name="termStatus" value="Active">
          <label for="status">ACTIVE</label>
          <input type="radio" id="status-inactive" name="termStatus" value="Inactive">
          <label for="status-inactive">INACTIVE</label>
        </div>
      </div>

      <div class="row">
        <button type="submit">Save</button>


      </div>
  </form>

</body>

</html>