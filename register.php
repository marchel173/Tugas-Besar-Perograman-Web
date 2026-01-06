<?php
// Koneksi ke database
require_once "php/config.php";

// Fungsi untuk membersihkan inputan
function clean_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Periksa apakah ada pengiriman data dari form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = clean_input($_POST["username"]);
    $fullname = clean_input(ucwords($_POST["fullname"]));
    $password = clean_input($_POST["password"]);
    $handphone = clean_input($_POST["handphone"]);
    $email = clean_input($_POST["email"]);

    // Query ke database untuk memeriksa username yang sama
    $query = "SELECT * FROM user WHERE username='$username' ";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) {

        // Jika ada profile picture
        if ($_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
            $profilePicture = $_FILES['profilePicture'];
            $targetDir = "img/";
            $pic = $targetDir . basename($profilePicture['name']);
            if (move_uploaded_file($profilePicture['tmp_name'], $pic)) {
            } else {
                //jika memindahkan profile picture gagal
                $pic = "img/blank_pic.jpg";
            }
        }else {//jika tidak ada profile picture
            $pic = "img/blank_pic.jpg";
        }

        $sql = "INSERT INTO user (username, fullname, password, email, handphone, pic_profile)
            VALUES ('$username', '$fullname', '$password', '$email', '$handphone', '$pic')";

        if(mysqli_query($conn, $sql)){
            header("Location: login.html");
            exit();
        }else {
            header("Location: register.html");
            exit();
        }
    } else {
        // Jika username sama
        header("Location: register.html");
        exit();
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
