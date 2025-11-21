<?php
$servername = "localhost";
$dbusername = "root"; 
$dbpassword = "";  
$dbname = "db_lari";  

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
$conn->set_charset("utf8mb4"); 
?>