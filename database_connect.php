<?php

date_default_timezone_set('America/Sao_Paulo');
$data = date("Y-m-d h:i:s");

$servername = "localhost";
$database = "icrypto";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
?>