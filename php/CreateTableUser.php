<?php
require_once "config.php";

$ctable = "CREATE TABLE user
            (
                id INT AUTO_INCREMENT PRIMARY KEY,
                username VARCHAR(30) NOT NULL,
                fullname VARCHAR(70) NOT NULL,
                password VARCHAR(60) NOT NULL,
                email VARCHAR(320) NOT NULL,
                handphone VARCHAR(15) NOT NULL,
                pic_profile VARCHAR(255)
            );";
if (mysqli_query($conn, $ctable)) {
    echo "Successfully created user<br>";
} else {
    echo "Error creating user: " . mysqli_error($conn);
}
