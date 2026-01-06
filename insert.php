<?php

require_once "php/config.php";

if(isset($_POST['submit'])) {
    $nama_villa = $_POST['nama_villa'];
    $pic_villa = $_POST['pic_villa'];
    $deskripsi = $_POST['deskripsi'];
    $desc1 = $_POST['desc1'];
    $desc2 = $_POST['desc2'];
    $desc3 = $_POST['desc3'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];

    $sql = "INSERT INTO villa(nama_villa, pic_villa, deskripsi, desc1, desc2, desc3, harga, lokasi) VALUES ('$nama_villa','$pic_villa', '$deskripsi', '$desc1', '$desc2', '$desc3', '$harga', '$lokasi' )";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Villa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }
        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Tambah Data Villa</h2>
        <form action="" method="POST">
            <label for="nama_villa">Nama Villa:</label><br>
            <input type="text" id="nama_villa" name="nama_villa" value=""><br>

            <label for="pic_villa">Gambar Villa:</label><br>
            <input type="file" id="pic_villa" name="pic_villa" value=""><br>

            <label for="deskripsi">Deskripsi:</label><br>
            <input type="text" id="deskripsi" name="deskripsi" value=""><br>

            <label for="desc1">Deskripsi 1:</label><br>
            <input type="text" id="desc1" name="desc1" value=""><br>

            <label for="desc2">Deskripsi 2:</label><br>
            <input type="text" id="desc2" name="desc2" value=""><br>

            <label for="desc3">Deskripsi 3:</label><br>
            <input type="text" id="desc3" name="desc3" value=""><br>

            <label for="harga">Harga:</label><br>
            <input type="text" id="harga" name="harga" value=""><br>

            <label for="lokasi">Lokasi:</label><br>
            <input type="text" id="lokasi" name="lokasi" value=""><br><br>

            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>
</html>
