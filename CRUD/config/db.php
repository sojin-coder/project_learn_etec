
<?php
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "php_db"; 
$port = 3306;

$conn = new mysqli($host, $user, $pass, $dbname,$port);
if ($conn->connect_error) {
    echo "Connection failed";
    }
      
?>