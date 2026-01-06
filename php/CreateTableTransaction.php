<?php
require_once "config.php";


$ctable = "CREATE TABLE transaction
        (
            transaction_id INT AUTO_INCREMENT PRIMARY KEY,
            villa_id INT,
            user_id INT,
            transaction_date DATE NOT NULL,
            payment_status VARCHAR(20) NOT NULL,
            booking_date DATE NOT NULL,
            check_in DATE NOT NULL,
            check_out DATE NOT NULL,
            FOREIGN KEY (villa_id) REFERENCES villa(villa_id),
            FOREIGN KEY (user_id) REFERENCES user(id)
        );";
if (mysqli_query($conn, $ctable)) {
    echo "Successfully created transaction<br>";
} else {
    echo "Error creating user: " . mysqli_error($conn);
}