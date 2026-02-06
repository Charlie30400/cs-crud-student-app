<?php


$dbname = "CREATE DATABASE StudentApp";

if ($conn->query($dbname) == TRUE) {
  echo "Database created successfully";
} else {
  echo "Error creating Database:" . $conn->error;
}
