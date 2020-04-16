<?php
$server = "localhost";
$username = "root";
$password = "";
$dbname = "c";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error)
  die(0);
