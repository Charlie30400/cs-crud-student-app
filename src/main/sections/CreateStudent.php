<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="SystemSetUpPage">
  <meta name="keywords" content="StudentApp/SystemSetUpPage">
  <meta name="author" content="Carlos Ernesto Rodríguez Méndez">
  <link rel="stylesheet" href="../style/template/style.css">

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
  <h2>Create Student</h2>
  <form autocomplete="off" action="./admin/send-Student-Data.php" method="post">
    <button type="submit">Save </a></button>
    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="fname">StudId:</label>
        </div>
        <div class="col-75">
          <input type="text" id="studId" name="studId" placeholder="P005504010">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Name:</label>
        </div>

        <div class="col-75">
          <input type="text" id="studFullName" name="studFullName" placeholder="Enter fullname">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lblCompanyStatus">Status</label>
        </div>
        <div class="col-75">
          <input type="radio" id="status-active" name="studStatus" value="Active">
          <label for="status">ACTIVE</label>
          <input type="radio" id="status-inactive" name="studStatus" value="Inactive">
          <label for="status-inactive">INACTIVE</label>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Address:</label>
        </div>
        <div class="col-75">
          <input type="text" id="studAddress" name="studAddress" placeholder="Enter student address">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Phone:</label>
        </div>
        <div class="col-75">
          <input type="text" id="studPhone" name="studPhone" placeholder="Enter student phone number">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Email</label>
        </div>
        <div class="col-75">
          <input type="text" id="studEmail" name="studEmail" placeholder="Enter Professor Email">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lname">Date of Birth:</label>
        </div>
        <div class="col-75">
          <input type="date" id="studDateOfBirth" name="studDateOfBirth">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Gender:</label>
        </div>
        <div class="col-75">
          <input list="studGender" name="studGender" placeholder="Choose student gender">
          <datalist id="studGender">
            <option value="Male">
            <option value="Female">
            <option value="Non-Binary">
            <option value="Trans-Female">
            <option value="Trans-Male">
            <option value="Other">
            <option value="None">
          </datalist>
          </datalist>
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Term:</label>
        </div>
        <div class="col-75">
          <select name="studTerm">
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
        <div class=" row">
          <div class="col-25">
            <label for="lname">Comment:</label>
          </div>
          <div class="col-75">
            <textarea cols="100" rows="5" id="studComment" name="studComment" style="overflow:scroll;" placeholder="Enter Comment here..."></textarea>
          </div>
        </div>
        <div class="row">
          <!--No sale boton-->
          <button type="submit">Save </a></button>
        </div>
      </div>
  </form>
</body>

</html>