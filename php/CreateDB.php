<?php
$conn = mysqli_connect("localhost", "root", "");
if (mysqli_query($conn, "CREATE DATABASE villa")) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . mysqli_error($conn) . "<br>";
}

require_once "CreateTableUser.php";
require_once "CreateTableVilla.php";
require_once "CreateTableTransaction.php";
require_once "CreateTableReview.php";

mysqli_close($conn);
?>

