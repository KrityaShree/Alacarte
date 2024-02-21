<?php

// Create connection

$conn1 = new mysqli('localhost', 'root', '', 'recipes');

// Check connection
if (!$conn1) {
    die("Connection failed: " . mysqli_connect_error());
}

?>