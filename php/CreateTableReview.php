<?php
require_once "config.php";

$ctable = "CREATE TABLE review
        (
            id INT AUTO_INCREMENT PRIMARY KEY,
            villa_id INT,
            user_id INT,
            name VARCHAR(32) NOT NULL,
            comment VARCHAR(320) NOT NULL,
            rating DECIMAL(3, 1) NOT NULL,
            FOREIGN KEY (villa_id) REFERENCES villa(villa_id),
            FOREIGN KEY (user_id) REFERENCES user(id)
        );";
if (mysqli_query($conn, $ctable)) {
    echo "Successfully created review<br>";
} else {
    echo "Error creating user: " . mysqli_error($conn);
}