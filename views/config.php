<?php

$DB_SERVER   = "localhost";
$DB_USER     = "root";
$DB_PASS     = "";
$DB_NAME     = "das";

// Create connection
$conn = new mysqli($DB_SERVER, $DB_USER, $DB_PASS,$DB_NAME);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

