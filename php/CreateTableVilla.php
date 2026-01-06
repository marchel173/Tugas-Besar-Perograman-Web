<?php
require_once "config.php";

$ctable = "CREATE TABLE villa
            (
                villa_id INT AUTO_INCREMENT PRIMARY KEY,
                nama_villa VARCHAR(30) NOT NULL,
                pic_villa VARCHAR(255) NOT NULL,
                deskripsi TEXT NOT NULL,
                desc1 VARCHAR(15) NOT NULL,
                desc2 VARCHAR(15) NOT NULL,
                desc3 VARCHAR(15) NOT NULL,
                harga DECIMAL(10, 2) NOT NULL CHECK (harga <= 100000000),
                booking_date DATE NOT NULL,
                lokasi VARCHAR(100) NOT NULL,
                rating DECIMAL(3, 1)
            );";
if (mysqli_query($conn, $ctable)) {
    echo "Successfully created villa<br>";
} else {
    echo "Error creating user: " . mysqli_error($conn);
}