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
    $password = clean_input($_POST["password"]);
    $get = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
    $fetch = mysqli_fetch_array($get);

    // Query ke database untuk memeriksa username dan password
    $query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        // Jika login berhasil
        if ($username == "admin" && $password == "admin123") {
            // Jika admin
            session_start();
            $_SESSION['username'] = $username;
            header("Location: admin.php");
            exit();
        } else {
            // Jika user umum
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        }
    } else {
        // Jika login gagal
        echo "Login gagal. Username atau password salah.";
    }
}

// Tutup koneksi ke database
mysqli_close($conn);
?>
