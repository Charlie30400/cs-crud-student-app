<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="StudentJobPracticeForm">
  <meta name="keywords" content="StudentJobPracticeForm">
  <meta name="author" content="Carlos Ernesto Rodríguez Méndez">
  <link rel="stylesheet" href="../style/template/style.css">
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
<br>

<body>
  <h2>Company Registration</h2>
  <div class="row">
    <a href="./Department.php"> <button> Create Department</button></a><br><br>
  </div>
  <form autocomplete="off" action="./admin/send-Company-Data.php" method="post">

    <div class="container">
      <div class="row">
        <div class="col-25">
          <label for="lblCompanyName">Company:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compName" name="compName" placeholder="Enter Company name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lblCompanyName">Department:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compDepName" name="compDepName" placeholder="Enter Department name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="lblCompanyStatus">Status</label>
        </div>
        <div class="col-75">
          <select id="compStatus" name="compStatus">
            <option value="Active">Active</option>
            <option value="Inactive">Inactive</option>

          </select>

        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="compcomment">Boss:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compBoss" name="compBoss" placeholder="Enter Company Boss Name">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="compcomment">Title:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compBossTitle" name="compBossTitle" placeholder="Enter Company Boss Title">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="compcomment">Phone:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compPhone" name="compPhone" placeholder="Enter CompanyPhone">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Address:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compAddress" name="compAddress" placeholder="Enter Company Address">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="country">Email:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compEmail" name="compEmail" placeholder="Enter Company Email">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="comp-webpage">Web Page:</label>
        </div>
        <div class="col-75">
          <input type="text" id="compWebPage" name="compWebPage" placeholder="Enter
        Company WebPage">
        </div>
      </div>
      <div class="row">
        <div class="col-25">
          <label for="comp-comment">Comment:</label>
        </div>
        <div class="col-75">
          <textarea cols="100" rows="5" name="compComment" style="overflow:scroll;" placeholder="Enter Comment here..."></textarea>
        </div>
      </div>
      <div class="row">
        <button type="submit">Save</button>
      </div>
    </div>
  </form>

</body>

</html>
</table>