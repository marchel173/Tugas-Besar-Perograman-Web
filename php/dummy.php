<?php
require_once "config.php";
//User
$dummy_data = array(
    array("JohnDoe", "John Doe", "password123", "johndoe@example.com", "123456789"),
    array("JaneSmith", "Jane Smith", "abc123", "janesmith@example.com", "987654321"),
    array("BobJohnson", "Bob Johnson", "securepwd", "bobjohnson@example.com", "555666777"),
    array("AliceWilliams", "Alice Williams", "passpass", "alicewilliams@example.com", "999888777"),
    array("SamBrown", "Sam Brown", "qwerty", "sambrown@example.com", "111222333")
);

foreach ($dummy_data as $data) {
    $username = $data[0];
    $fullname = $data[1];
    $password = $data[2];
    $email = $data[3];
    $handphone = $data[4];

    $sql = "INSERT INTO user (username, fullname, password, email, handphone)
            VALUES ('$username', '$fullname', '$password', '$email', '$handphone')";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted user data<br>";
    } else {
        echo "Error inserting user data: " . mysqli_error($conn);
    }
}

//Villa
$villa_data = array(
    array("Villa Indah", "img/property-2.jpg", "A luxurious villa with stunning ocean views", "500m²", "4 Bed", "3 bath", 5000000.00, "2024-04-19", "Denpasar, Bali", 4.5),
    array("Villa Santai", "img/property-3.jpg", "Villa tenang yang terletak di hutan tropis yang rimbun", "400m²", "3 Bed", "3 Bath", 3000000.00, "2024-04-20", "Ubud, Bali", 4.2),
    array("Villa Pantai", "img/property-6.jpg", "Villa dengan suasana real-estate dilengkapi pemandangan matahari terbenam yang menakjubkan", "600m²", "4 Bed", "5 Bath", 8000000.00, "2024-04-21", "Pulau Gili, Bali", 4.8)
);

// Memasukkan data villa ke database
foreach ($villa_data as $data) {
    $nama_villa = $data[0];
    $pic_villa = $data[1];
    $deskripsi = $data[2];
    $ukuran_villa = $data[3];
    $jumlah_kamar = $data[4];
    $jumlah_kamar_mandi = $data[5];
    $harga = $data[6];
    $booking_date = $data[7];
    $lokasi = $data[8];
    $rating = $data[9];

    $sql = "INSERT INTO villa (nama_villa, pic_villa, deskripsi, desc1, desc2, desc3, harga, booking_date, lokasi, rating)
            VALUES ('$nama_villa', '$pic_villa', '$deskripsi', '$ukuran_villa', '$jumlah_kamar', '$jumlah_kamar_mandi', $harga, '$booking_date', '$lokasi', $rating)";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted villa data<br>";
    } else {
        echo "Error inserting villa data: " . mysqli_error($conn);
    }
}

//Reviews
$reviews_data = array(
    array(1, 1, 'JohnDoe', 'It is a nice and relaxing place.', 4.5),
    array(1, 2, 'JaneSmith', 'It is the perfect spot for a tranquil getaway or a...', 4.8),
    array(1, 3, 'BobJohnson', 'A nice place to seek peace.', 4.9)
);

//Memasukkan data review ke database
foreach ($reviews_data as $data) {
    $villa_id = $data[0];
    $user_id = $data[1];
    $name = $data[2];
    $comment = $data[3];
    $rating = $data[4];

    $sql = "INSERT INTO review (villa_id, user_id, name, comment, rating)
    VALUES ($villa_id, $user_id, '$name', '$comment', $rating)";

    if (mysqli_query($conn, $sql)) {
        echo "Successfully inserted review<br>";
    } else {
        echo "Error inserting review data: " . mysqli_error($conn);
    }
}
?>