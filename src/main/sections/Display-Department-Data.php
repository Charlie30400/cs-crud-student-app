<!--contains data from the Departments-->
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
  <!--Navabar-->



</head>

<body>
  <?php include './admin/config/includes/navbar.html';
  ?>
  <h1> Department Table</h1>
  <form method="post">
    <div style="text-align:left;">
      <label for="deparment">🔍</label>
      <input type="text" id="depSearch" name="depSearch" />
      <input type="submit" id="depSearch-submit" name="depearch-submit" /><br><br>
    </div>
  </form>
  <?php

  include './admin/server/Connect.php';

  if (isset($_POST['depSearch-submit'])) {
    $search = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'depSearch'));
    if (strlen($search) > 0) {
      $sql = "SELECT * FROM department WHERE depName LIKE '%$search%' OR depBossName LIKE '%$search%'";
      $result = mysqli_query($conn, $sql);
      $queryResult = mysqli_num_rows($result);
      echo "There are " . $queryResult . "results!";
      if ($queryResult > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<table id='customers'>";
          echo "<tr>";
          echo "<th>ID</th>";
          echo "<th>Name</th>";
          echo "<th>Status</th>";
          echo "</tr>";
          echo "<tr>";
          echo "<td>" . $row['depRecordId'] . "</td>";
          echo "<td>" . $row['depName'] . "</td>";
          echo "<td>" . $row['depStatus'] . "</td>";
          echo "<td>";
          echo '<a href="/Department.php?id=' . $row['depRecordId'] . '" class="mr-3" title="Add New Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
          // sections/admin/update/Update-Department.php?id=1
          echo '<a href="./admin/update/./Send-Update-Department.php?id=' . $row['depRecordId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
          echo "</tr>";
          echo "</td>";
          echo "</tr>";

          echo "</table>";
          mysqli_free_result($result);
        }
      } else {
        echo "There are no departments matching your option";
      }
    }
  }

  ?>
  <?php

  $sql = "SELECT*FROM department";
  if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
      echo "<table id='customers'>";
      echo "<tr>";
      echo "<th>Company</th>";
      echo "<th>Department</th>";
      echo "<th>Status</th>";
      echo "<th>Email</th>";
      echo "<th>Phone</th>";
      echo "<th>Address</th>";
      echo "<th>Comment</th>";
      echo "<th>Actions</th>";
      echo " </tr>";
      while ($row = mysqli_fetch_array($result)) {
        echo "<tr>";
        echo "<td>" . $row['depRecordId'] . "</td>";
        echo "<td>" . $row['depName'] . "</td>";
        echo "<td>" . $row['depStatus'] . "</td>";
        echo "<td>" . $row['depEmail'] . "</td>";
        echo "<td>" . $row['depPhone'] . "</td>";
        echo "<td>" . $row['depAddress'] . "</td>";
        echo "<td>" . $row['depComment'] . "</td>";
        echo "<td>";
        echo '<a href="./Department.php?id=' . $row['depRecordId'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
        echo '<a href="./admin/./update/Update-Department.php?id=' . $row['depRecordId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
        echo "</td>";
        echo "</tr>";

        //  echo "<td a href="DepartmentTable.html" target="_blank">Department</a> </td>";  //Editar la tabla de Departamento
        // <td><a href="/src/main/sections/Forms/CreateCompany.html" target="_blank">Edi</a></td>
        //           <td><button type="reset"
        //   onclick="location.href='../Forms/Department.html'">
        //   Edit
        // </button></td>
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
  </form>

</body>

</html>