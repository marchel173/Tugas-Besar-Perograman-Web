<?php

if(isset($_GET['villa_id'])) {
    require_once "php/config.php";

    $id = $_GET['villa_id']; // Menggunakan 'id' sebagai parameter

    $sql = "DELETE FROM villa WHERE villa_id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "Villa dengan ID $id berhasil dihapus";
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    mysqli_close($conn);
} else {
    echo "ID not provided";
}

?>
