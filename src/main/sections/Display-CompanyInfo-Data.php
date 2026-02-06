 <!--contains data from the Company-->
 <!DOCTYPE html>
 <html lang="en">

 <head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta name=' description' content='DisplayCompanyPage'>
   <meta name=' keywords' content=' DisplayCompany'>
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
 <!--Cosas que faltan
          *SearchBar
             -Term
              -Student
            Añadir opción para editar
              -compañia
             -departmento-->

 <body>
   <?php

    include './admin/config/includes/navbar.html'; ?>
   <h1> Company Table</h1>


   <table>

     <form method="post">
       <div style="text-align:left;">
         <label for="studentTerm">🔍</label>
         <input type="text" id="studentSearch" name="studentSearch" />
         <input type="submit" id="studentSearch-submit" name="studentSearch-submit" /><br><br>
       </div>

     </form>
     <?php
      include './admin/server/Connect.php';


      if (isset($_POST['studentSearch-submit'])) {
        $search = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'studentSearch'));
        if (strlen($search) > 0) {
          $sql = "SELECT * FROM student WHERE studFullName LIKE '%$search%' OR studId LIKE '%$search%'";
          $result = mysqli_query($conn, $sql);
          $queryResult = mysqli_num_rows($result);
          echo "There are " . $queryResult . "results!";
          if ($queryResult > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
              echo "
            <table id='customers'>
             <tr>
             <th>Id</th>
             <th>Name</th>
             </tr>
             <tr>
              <td>" . $row['studId'] . "</td>
              <td>" . $row['studFullName'] . "</td>
           </table>
            ";
            }
          } else {
            echo "There are no students results matching your option";
          }
        }
      }

      ?>

     <!-- http://localhost/Student-App%20-Test-%20Copy/src/main/sections/Tables/Display-CompanyInfo-Data.php -->

     <?php
      //include '../admin/config/includes/table.html'; no funciona
      // include '../admin/config/Connection.php';
      $search = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'studentSearch'));
      $sql = "SELECT * FROM company where compBoss like '%$search%' or compName like '%$search%'";
      if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
          echo "<table id='customers'>";
          echo "<tr>";
          echo "<th>Company</th>";

          echo "<th>Status</th>";
          echo "<th>Boss</th>";
          echo "<th>Title</th>";
          echo "<th>Phone</th>";
          echo "<th>Address</th>";
          echo "<th>Email</th>";
          echo "<th>WebPage</th>";
          echo "<th>Comment</th>";
          echo "<th>Actions</th>";
          echo " </tr>";
          while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['compName'] . "</td>";

            echo "<td>" . $row['compStatus'] . "</td>";
            echo "<td>" . $row['compBoss'] . "</td>";
            echo "<td>" . $row['compBossTitle'] . "</td>";
            echo "<td>" . $row['compPhone'] . "</td>";
            echo "<td>" . $row['compAddress'] . "</td>";
            echo "<td>" . $row['compEmail'] . "</td>";
            echo "<td>" . $row['compWebPage'] . "</td>";
            echo "<td>" . $row['compComment'] . "</td>";
            echo "<td>";
            echo '<a href="CreateCompany.php?id=' . $row['compId'] . '" class="mr-3" title="Add New Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
            echo '<a href="/admin/update/Update-CompanyInfo.php?id=' . $row['compId'] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
            // echo '<a href="delete.php?id=' . $row['compId'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
            echo "</td>";
            echo "</tr>";
          }
          echo "</table>";
          //Free result set;
          mysqli_free_result($result);
        } else {
          echo "No company records were found matching your query.";
        }
      } else {
        echo "Error:Could not execute $sql," . mysqli_error($conn);
      }
      mysqli_close($conn);
      ?>
     </form>