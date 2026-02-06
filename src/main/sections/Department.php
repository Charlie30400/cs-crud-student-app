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
  <!--Navabar-->
  <?php
  require './admin/config/includes/navbar.html' ?>

</head>


<body>
  <h2> CREATE DEPARTMENT </h2>
  <form autocomplete="off" action="./admin/send-Department-Data.php" method="post">
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">Company:</label>
        </div>
        <div class="col-75">
          <select name="compRecord">
            <?php
            include './admin/server/Connect.php';
            $sql = "SELECT * FROM  company";
            if ($result = mysqli_query($conn, $sql)) {
              if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                  echo "<option value=" . $row['compId']  . " >" . $row['compName'] . "</option>";
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
          <label for="fname">Department Name</label>
        </div>
        <div class="col-75">
          <input type="text" id="depName" name="depName" placeholder="Enter Professor Email">

        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lbldepStatus">Status</label>
        </div>
        <div class="col-75">
          <select id="depStatus" name="depStatus">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>

          </select>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Boss:</label>
        </div>
        <div class="col-75">
          <input type="text" id="depBossName" name="depBossName" placeholder="Enter Department Boss">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Job Title:</label>
        </div>
        <div class="col-75">
          <input type="text" id="	depBossTitle" name="depBossTitle" placeholder="Enter Boss Title">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="depEmail" name="depEmail" placeholder="Enter Professor Email">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Phone:</label>
        </div>
        <div class="col-75">
          <input type="tel" id="depPhone" name="depPhone" placeholder="Enter Departement Phone">
        </div>
      </div>

      <div class="row">
        <div class="col-25">
          <label for="lname">Address:</label>
        </div>
        <div class="col-75">
          <input type="text" id="depAddress" name="depAddress" placeholder="Enter Departement Address">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Comment:</label>
        </div>
        <div class="col-75">
          <textarea cols="100" rows="5" id="depComment" name="depComment" style="overflow:scroll;" placeholder="Enter Comment here..."></textarea>
        </div>
      </div>
      <div class="row">
        <button type="submit">Save</button>



      </div>
  </form>

</body>

</html>