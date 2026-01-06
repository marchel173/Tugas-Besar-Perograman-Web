<?php

if(isset($_GET['villa_id'])) {
    require_once "php/config.php";

    $id = $_GET['villa_id'];
    $sql = "SELECT * FROM villa WHERE villa_id='$id'";
    
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $nama_villa = $row['nama_villa'];
        $pic_villa = $row['pic_villa'];
        $deskripsi = $row['deskripsi'];
        $desc1 = $row['desc1'];
        $desc2 = $row['desc2'];
        $desc3 = $row['desc3'];
        $harga = $row['harga'];
        $lokasi = $row['lokasi'];
    } else {
        echo "Data not found!";
        exit(); 
    }
} else {
    echo "ID not provided!";
    exit(); 
}

if(isset($_POST['submit'])) {
    $nama_villa = $_POST['nama_villa'];
    $pic_villa = $_POST['pic_villa'];
    $deskripsi = $_POST['deskripsi'];
    $desc1 = $_POST['desc1'];
    $desc2 = $_POST['desc2'];
    $desc3 = $_POST['desc3'];
    $harga = $_POST['harga'];
    $lokasi = $_POST['lokasi'];

    $sql = "UPDATE villa SET nama_villa='$nama_villa', pic_villa='$pic_villa', deskripsi='$deskripsi', desc1='$desc1', desc2='$desc2', desc3='$desc3', harga='$harga', lokasi = '$lokasi' WHERE villa_id='$id'";
    $result = mysqli_query($conn, $sql);

    if($result) {
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
    <title>Edit Data Villa</title>
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
        input[type="file"],
        textarea {
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
        <h2>Edit Data Villa</h2>
        <form action="" method="POST">
            <input type="hidden" name="villa_id" value="<?php echo $id; ?>">

            <label for="nama_villa">Nama Villa:</label>
            <input type="text" id="nama_villa" name="nama_villa" value="<?php echo $nama_villa; ?>">

            <label for="pic_villa">Gambar Villa:</label>
            <input type="file" id="pic_villa" name="pic_villa" accept="image/*">

            <label for="deskripsi">Deskripsi:</label>
            <textarea id="deskripsi" name="deskripsi"><?php echo $deskripsi; ?></textarea>

            <label for="desc1">Deskripsi 1:</label>
            <textarea id="desc1" name="desc1"><?php echo $desc1; ?></textarea>

            <label for="desc2">Deskripsi 2:</label>
            <textarea id="desc2" name="desc2"><?php echo $desc2; ?></textarea>

            <label for="desc3">Deskripsi 3:</label>
            <textarea id="desc3" name="desc3"><?php echo $desc3; ?></textarea>

            <label for="harga">Harga:</label>
            <input type="text" id="harga" name="harga" value="<?php echo $harga; ?>">

            <label for="lokasi">Lokasi:</label>
            <input type="text" id="lokasi" name="lokasi" value="<?php echo $lokasi; ?>">

            <input type="submit" name="submit" value="Update">
        </form>
    </div>
</body>
</html>
