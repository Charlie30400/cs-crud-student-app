<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style/displayTable.css">
  <title>Document</title>

  <?php

  require './admin/config/includes/navbar.html';
  include './admin/server/Connect.php'; ?>

</head>

<body>


  <h2>Reports</h2>


  <?php
  //include '../admin/config/includes/table.html'; no funciona
  // include '../admin/config/Connection.php';

  echo "<table id='customers'>";
  echo "<tr>";
  echo "<th>STUDENT</th>";
  echo "<th>COMPANY</th>";
  echo "<th>DEPARTMENT</th>";
  echo "<th>Actions</th>";

  echo " </tr>";

  echo "<tr>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td></td>";
  echo "<td> </td>";
  // echo '<a href=".php?id=' . $row[''] . '" class="mr-3" title="Add New Record" data-toggle="tooltip"><i class="fa fa-pencil"></i></a>';
  // echo '<a href=" ?id=' . $row[''] . '" class="mr-3" title="Update Record" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
  // echo '<a href="delete.php?id=' . $row['compId'] . '" title="Delete Record" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';

  echo "</tr>";
  ?>
</body>

</html>