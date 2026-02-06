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
  require '../config/./includes/./navbar.html';

  ?>
</head>
<br>

<body>
  <h2>UPDATE DEPARTMENT INFO</h2>


  <?php
  include '../server/Connect.php';
  $update = $_GET['id'];

  echo "('$update')";
  if (isset($update)) {

    $sql = "SELECT * FROM department WHERE depRecordId = '$update'";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
      while ($row = $result->fetch_assoc()) {
        $depRecordId = $row['depRecordId'];
        $depName = $row['depName'];
        $depStatus = $row['depStatus'];
        $depBossName = $row['depBossName'];
        $depBossTitle = $row['depBossTitle'];
        $depEmail = $row['depEmail'];
        $depPhone = $row['depPhone'];
        $depAddress = $row['depAddress'];
        $depComment = $row['depComment'];
      }
    }
  }
  //echo ("$depRecordId ");
  ?>
  <form autocomplete='off' action='./send-Update-Department.php' method='post'>
    <div class='container'>

      <div class='row'>
        <div class='col-25'>
          <label for=lblCompanyName'>Name:</label>
          <input type='hidden' id='depRecordId' name='depRecordId' value='<?php echo $depRecordId; ?>'>
        </div>
        <div class='col-75'>
          <input type='text' id='depName' name='depName' placeholder='Enter CompanyName' value='<?php echo $depName; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='lblCompanyStatus'>Status</label>
        </div>
        <div class='col-75'>
          <select id='depStatus' name='depStatus' value='<?php echo $depStatus; ?>'>
            <option value='Active'>Active</option>
            <option value='Inactive'>Inactive</option>

          </select>

        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='compcomment'>Boss:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='depBossName' name='depBossName' placeholder='Enter Company Boss Name' value='<?php echo $depBossName; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='compcomment'>Title:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='depBossTitle' name='depBossTitle' placeholder='Enter Company Boss Title' value='<?php echo $depBossTitle; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='compcomment'>Phone:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='depPhone' name='depPhone' placeholder='Enter CompanyPhone' value='<?php echo $depPhone; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='country'>Address:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='depAddress' name='depAddress' placeholder='Enter Company Address' value='<?php echo $depAddress; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='country'>Email:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='depEmail' name='depEmail' placeholder='Enter Company Email' value='<?php echo $depEmail; ?>'>
        </div>
      </div>

      <div class='row'>
        <div class='col-25'>
          <label for='comp-comment'>Comment:</label>
        </div>
        <div class='col-75'>
          <textarea cols='100' rows='5' name='depComment' style='overflow:scroll;' placeholder='Enter Comment here...'><?php echo $depComment; ?></textarea>
        </div>
      </div>

      <div class='row'>

        <button type="submit">Save</button>
      </div>

  </form>

</body>


</html>