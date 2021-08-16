<?php

  $servername = "localhost";
  $username = "root";
  $password = "" ; 
  
  $conn = new mysqli($servername, $username, $password);
  
  // Checking connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  
   // Creating database
   $sql = "CREATE DATABASE IF NOT EXISTS studentdb";
   
   if ($conn->query($sql) === TRUE) {
      //
   } else {
     echo "Error creating database: " . $conn->error;
   }
   $conn = new mysqli($servername, $username, $password,'studentdb');
   // creating tables
   $sql_table = "CREATE TABLE IF NOT EXISTS studentdetails (
     studentname VARCHAR(50) ,
     email VARCHAR(50), birth DATE  
   )";
   
  if($conn->query($sql_table))
  {
    // echo 'SuccessFull';
  }
  else
  {
    echo 'Table not created' .$conn->error;
  }
   
?>