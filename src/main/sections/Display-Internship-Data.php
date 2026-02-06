 <!-- contains all data from the student jobForm -->
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

   <!-- C:\xampp\htdocs\Student-App -Test- Copy\src\main\sections\admin\config\includes\navbar.html -->

 </head>

 <body>
   <?php include './admin/config/includes/navbar.html'; ?>

   <h1 style="text-align: center;"> Job Table</h1>
   <form method="post">
     <div style="text-align:left;">
       <label for="studentTerm">🔍</label>
       <input type="text" id="studentSearch" name="studentSearch" />
       <input type="submit" id="studentSearch-submit" name="studentSearch-submit" /><br><br>
     </div>
   </form>
   <?php
    include './admin/server/Connect.php';



    ?>
   <?php
    //include '../admin/config/includes/table.html'; no funciona

    //include '../admin/config/Connection.php';
    $sql = "SELECT * FROM internship
          INNER JOIN student ON student.studRecordId=internship.studRecordId
          INNER JOIN company ON company.compId= internship.compId
          INNER JOIN department ON department.depRecordId=internship.depRecordId
          ";
    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
        echo "<table id='customers'>";
        echo "<tr>";


        echo "<th>STUDENT ID</th>";
        echo "<th>NAME</th>";
        echo "<th>COMPANY</th>";
        echo "<th>DEPARTMENT</th>";
        echo "<th>Actions</th>";

        echo " </tr>";
        while ($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['studId'] . "</td>";
          echo "<td>" . $row['studFullName'] . "</td>";
          echo "<td>" . $row['compName'] . "</td>";
          echo "<td>" . $row['depName'] . "</td>";
          echo "<td>";
          echo '<a href="./Internship.php?id=' . $row['internshipId'] . '" class="mr-3" title="View Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
          echo '<a href="./admin/update/Send-Update-Internship-Data.php?id=' . $row['internshipId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';

          echo "</td>";
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