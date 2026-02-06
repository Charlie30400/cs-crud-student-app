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
  <h2>UPDATE COMPANY INFO</h2>


  <?php
  include '../server/Connect.php';
  $update = $_GET['id'];


  if (isset($update)) {

    $sql = "SELECT * FROM company WHERE compId = '$update'";

    $result = mysqli_query($conn, $sql);
    $queryResult = mysqli_num_rows($result);
    if ($queryResult > 0) {
      while ($row = $result->fetch_assoc()) {
        $compId = $row['compId'];
        $compName = $row['compName'];
        $compDepName = $row['compDepName'];
        $compStatus = $row['compStatus'];
        $compBoss = $row['compBoss'];
        $compBossTitle = $row['compBossTitle'];
        $compPhone = $row['compPhone'];
        $compAddress = $row['compAddress'];
        $compEmail = $row['compEmail'];
        $compWebPage = $row['compWebPage'];
        $compComment = $row['compComment'];
      }
    }
  }
  //echo ("$compId ");
  ?>
  <form autocomplete='off' action='./Send-Update-Company-Data.php' method='post'>
    <div class='container'>

      <div class='row'>
        <div class='col-25'>
          <label for=lblCompanyName'>Name:</label>
          <input type='hidden' id='compId' name='compId' value='<?php echo $compId; ?>'>
        </div>
        <div class='col-75'>
          <input type='text' id='compName' name='compName' placeholder='Enter CompanyName' value='<?php echo $compName; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='lblCompanyStatus'>Status</label>
        </div>
        <div class='col-75'>
          <select id='compStatus' name='compStatus' value='<?php echo $compStatus; ?>'>
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
          <input type='text' id='compBoss' name='compBoss' placeholder='Enter Company Boss Name' value='<?php echo $compBoss; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='compcomment'>Title:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='compBossTitle' name='compBossTitle' placeholder='Enter Company Boss Title' value='<?php echo $compBossTitle; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='compcomment'>Phone:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='compPhone' name='compPhone' placeholder='Enter CompanyPhone' value='<?php echo $compPhone; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='country'>Address:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='compAddress' name='compAddress' placeholder='Enter Company Address' value='<?php echo $compAddress; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='country'>Email:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='compEmail' name='compEmail' placeholder='Enter Company Email' value='<?php echo $compEmail; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='comp-webpage'>Web Page:</label>
        </div>
        <div class='col-75'>
          <input type='text' id='compWebPage' name='compWebPage' placeholder='Enter
        Company WebPage' value='<?php echo $compWebPage; ?>'>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='comp-comment'>Comment:</label>
        </div>
        <div class='col-75'>
          <textarea cols='100' rows='5' name='compComment' style='overflow:scroll;' placeholder='Enter Comment here...'><?php echo $compComment; ?></textarea>
        </div>
      </div>
      <div class='row'>
        <div class='col-25'>
          <label for='dep-name'><a href=''>Department</a></label>
        </div>
        <div class='col-75'>
          <select id='compDepName' name='compDepName'>
            <option value='Math' <?php if ($compDepName == "Math") echo "SELECTED"; ?>>Math</option>
            <option value='Science' <?php if ($compDepName == "Science") echo "SELECTED"; ?>>Science</option>
            <option value='Spanish' <?php if ($compDepName == "Spanish") echo "SELECTED"; ?>>Spanish</option>
            <option value='English' <?php if ($compDepName == "English") echo "SELECTED"; ?>>English</option>
            <option value='History' <?php if ($compDepName == "History") echo "SELECTED"; ?>>History</option>
          </select>
        </div>
      </div>
      <div class='row'>

        <button type="submit">Save</button>
      </div>

  </form>


</body>


</html>