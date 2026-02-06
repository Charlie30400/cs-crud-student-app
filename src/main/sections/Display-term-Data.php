<!--cotains  the data of the all the terms-->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
</head>

<body>
  <!--Navabar-->
  <?php include './admin/config/includes/navbar.html'; ?>

  <h1 style="text-align: center;"> Term Table</h1>
  <form method="POST">
    <label for="Term">🔍</label>
    <input type="search" id="termSearch" name="termSearch" />
    <input type="submit" id="termSearch-submit" name="termSearch-submit" /><br><br>
    </div>
  </form>
  <?php

  // $sql = "SELECT * FROM student WHERE studId LIKE '%$search%' OR studFullName LIKE '%$search%' OR studId LIKE '%$search%' OR studTerm'%$search%'";
  include '../admin/server/Connect.php';

  if (isset($_POST['termSearch-submit'])) {
    $search = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'termSearch'));
    if (strlen($search) > 0) {
      $sql = "SELECT * FROM academicTerms WHERE academicTermsId LIKE'%$search%' OR termName LIKE '%$search%' OR termCode LIKE '%$search%' OR termStatus LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "There are " . $queryResult . "results!";
      if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "
          <table id='customers'>
           <tr>
           <th>ID</th>
           <th>NAME</th>
           <th>CODE</th>
           <th>STATUS</th>
           </tr>
           <tr>
            <td>" . $row['academicTermsId'] . "</td>
           
            <td>" . $row['termName'] . "</td>
            <td>" . $row['termCode'] . "</td>
            <td>" . $row['termStatus'] . "</td>
        
         </table>
          ";
        }
      } else {
        echo "There are no students results matching your option";
      }
    }
  }

  ?>



  <?php
  //include '../admin/config/includes/table.html'; no funciona

  //include '../admin/config/Connection.php';

  // $sql = "SELECT studId,studFullName as 'nombre',academicterm.* FROM student
  // LEFT JOIN academicterm ON academicterm.academicTermsId=student.studTerm;
  // ";

  $sql = "SELECT * FROM academicterms";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      echo "<table id='customers'>";
      echo "<tr>";
      echo "<th>ID</th>";
      echo "<th>NAME</th>";
      echo "<th>CODE</th>";
      echo "<th>STATUS</th>";
      echo " </tr>";
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['academicTermsId'] . "</td>";
        echo "<td>" . $row['termName'] . "</td>";
        echo "<td>" . $row['termCode'] . "</td>";
        echo "<td>" . $row['termStatus'] . "</td>";
        echo "<td>";
        echo '<a href="Term.php?id=' . $row['academicTermsId'] . '" class="mr-3" title="Add New Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
        echo '<a href="../admin/./update/Update-Term-Data.php?id=' . $row['academicTermsId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
        echo "</td>";
        echo "</tr>";
        echo "</td>";
        echo "</tr>";

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