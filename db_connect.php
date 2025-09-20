<?php
$servername = "localhost";   // default for XAMPP
$username   = "root";        // default XAMPP user
$password   = "";            // default XAMPP has empty password
$dbname     = "enigma_tracksphere";   // <-- replace with your actual DB name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
