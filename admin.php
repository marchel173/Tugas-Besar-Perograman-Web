<?php
    // Koneksi ke database
    require_once "php/config.php";

    $sql = "SELECT * FROM villa";

    if (isset($_GET['search_name'])) {
        $search_name = $_GET['search_name'];
        $sql .= " WHERE nama_villa LIKE '%$search_name%'";
    }

    $result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Villa</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        form {
            margin-bottom: 20px;
        }
        input[type="text"], input[type="submit"], input[type="reset"] {
            padding: 8px;
            margin-right: 10px;
        }
        input[type="submit"], input[type="reset"] {
            cursor: pointer;
        }
        .add-new {
            margin-top: 20px;
            display: inline-block;
            padding: 8px 16px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 4px;
        }
        .add-new:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<form action="" method="GET">
    <input type="text" name="search_name" placeholder="Cari berdasarkan nama">
    <input type="submit" value="Cari Nama">
    <input type="reset" value="Reset">
</form>

<?php
if (mysqli_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr>";
    echo "<th>Nama Villa</th>";
    echo "<th>Gambar Villa</th>";
    echo "<th>Deskripsi</th>";
    echo "<th>Luas</th>";
    echo "<th>Kamar</th>";
    echo "<th>Kamar Mandi</th>";
    echo "<th>Harga</th>";
    echo "<th>Lokasi</th>";
    echo "<th>Aksi</th>";
    echo "</tr>";

    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $row["nama_villa"] . "</td>";
        echo "<td><img src='" . $row["pic_villa"] . "' alt='Gambar Villa' style='max-width: 100px;'></td>";
        echo "<td>" . $row["deskripsi"] . "</td>";
        echo "<td>" . $row["desc1"] . "</td>";
        echo "<td>" . $row["desc2"] . "</td>";
        echo "<td>" . $row["desc3"] . "</td>";
        echo "<td>" . $row["harga"] . "</td>";
        echo "<td>" . $row["lokasi"] . "</td>";
        echo "<td>";
        echo "<form action='edit.php' method='GET' style='display:inline;'>";
        echo "<input type='hidden' name='villa_id' value='" . $row["villa_id"] . "'>";
        echo "<input type='submit' value='Edit'>";
        echo "</form>";
        echo "<form action='delete.php' method='GET' style='display:inline;'>";
        echo "<input type='hidden' name='villa_id' value='" . $row["villa_id"] . "'>";
        echo "<input type='submit' value='Hapus' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data?\")'>";
        echo "</form>";
        echo "</td>";
        echo "</tr>";
    }

    echo "</table>";
} else {
    echo "0 results";
}

mysqli_close($conn);
?>
<a href="insert.php" class="add-new">Tambah Villa Baru</a>

</body>
</html>
