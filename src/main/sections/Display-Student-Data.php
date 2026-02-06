<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Tabla de estudiantes">
  <meta name="keywords" content="StudentTable">
  <meta name="author" content="Carlos Ernesto Rodríguez Méndez">
  <link rel="stylesheet" href="../style/displayTable.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


  <style>
    body {
      background-color: #BCC1D3;
    }

    .navbar {
      overflow: hidden;
      background-color: #89E3B7;
    }

    h2 {
      text-align: center;
      font-size: 24px;
    }

    .navbar a {
      float: left;
      font-size: 16px;
      color: white;
      text-align: center;
      padding: 14px 16px;
      text-decoration: none;
    }

    .dropdown {
      float: left;
      overflow: hidden;
    }

    .dropdown .dropbtn {
      font-size: 16px;
      border: none;
      outline: none;
      color: white;
      padding: 14px 16px;
      background-color: inherit;
      font-family: inherit;
      margin: 0;
    }

    .navbar a:hover,
    .dropdown:hover .dropbtn {
      background-color: red;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      z-index: 1;
    }

    .dropdown-content a {
      float: none;
      color: green;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
      text-align: left;
    }

    .dropdown-content a:hover {
      background-color: #ddd;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }
  </style>
  <!--Navabar-->




</head>

<body>
  <!--Navabar-->
  <?php include './admin/config/includes/navbar.html'; ?>
  <h2> Student Information </h2>


  <?php
  //include '../admin/config/includes/table.html'; no funciona
  include './admin/server/Connect.php';

  $sql = "SELECT * FROM  student INNER JOIN academicterms ON academicterms.academicTermsId=student.studTerm";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      echo "<table id='customers'>";
      echo "<tr>";


      echo "<th>Record</th>";
      echo "<th>ID</th>";
      echo "<th>Name</th>";
      echo "<th>Status</th>";
      echo "<th>Phone</th>";
      echo "<th>Address</th>";
      echo "<th>Email</th>";
      echo "<th>DOD</th>";
      echo "<th>Gender</th>";
      echo "<th>Term</th>";
      echo "<th>Comment</th>";
      echo "<th>Actions</th>";
      echo " </tr>";
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['studRecordId'] . "</td>";
        echo "<td>" . $row['studId'] . "</td>";
        echo "<td>" . $row['studFullName'] . "</td>";
        echo "<td>" . $row['studStatus'] . "</td>";
        echo "<td>" . $row['studPhone'] . "</td>";
        echo "<td>" . $row['studAddress'] . "</td>";
        echo "<td>" . $row['studEmail'] . "</td>";
        echo "<td>" . $row['studDateOfBirth'] . "</td>";
        echo "<td>" . $row['studGender'] . "</td>";
        echo "<td>" . $row['termName'] . "</td>";
        echo "<td>" . $row['studComment'] . "</td>";
        echo "<td>";
        echo '<a href="CreateStudent.php?id=' . $row['studRecordId'] . '" class="mr-3" title="Add New Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';

        echo '<a href="./admin/update/./Send-Update-Student-Data.php?id=' . $row['studRecordId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
        echo "</tr>";
      }
      echo "</table>";
      //Free result set;
      mysqli_free_result($result);
    } else {
      echo "No records were found matching your query.";
    }
  } else {
    echo "Error:Could not execute $sql," . mysqli_error($conn);
  }
  mysqli_close($conn);
  ?>
</body>

</html>