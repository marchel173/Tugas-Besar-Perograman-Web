<?php
    require_once "php/config.php";
    $select;

    // echo '<div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
    //     <h1 class="mb-3">'.$_POST['lokasi'].'</h1> </div>';

    if($_POST['nama'] != "" ){
        $nama = $_POST['nama'];
        $select = "SELECT * FROM villa WHERE nama_villa LIKE '%$nama%' ORDER BY rating DESC";

    } elseif ($_POST['lokasi'] != "" || ($_POST['desc'] != "" && $_POST['jumlah'] != "") ) {

        // echo '<div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
        // <h1 class="mb-3">IEU ASUP KA ELSE IF</h1> </div>';

        $no = $_POST['desc'];
        $desc = "desc".$no;
        $jumlah = $_POST['jumlah'];
        $lokasi = $_POST['lokasi'];

        if($_POST['lokasi'] != "" && ($_POST['desc'] != "" && $_POST['jumlah'] != "") ){
            $select = "SELECT * FROM villa WHERE $desc LIKE '%$jumlah%' AND lokasi LIKE '%$lokasi%' ORDER BY rating DESC";
        }elseif($_POST['desc'] != "" && $_POST['jumlah'] != ""){
            $select = "SELECT * FROM villa WHERE $desc LIKE '%$jumlah%' ORDER BY rating DESC";
        }else { 
            $select = "SELECT * FROM villa WHERE lokasi LIKE '%$lokasi%' ORDER BY rating DESC";
        }

    } else {
        $select = "SELECT * FROM villa ORDER BY rating DESC";
    }

    $result = mysqli_query($conn, $select);
    while ($row = mysqli_fetch_assoc($result)) {
        echo '
    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="property-item rounded overflow-hidden">
            <div class="position-relative overflow-hidden">
                <a href="order.php?id=' . $row['villa_id'] . '"><img class="img-fluid" src="' . $row['pic_villa'] . '" alt=""></a>
                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                    For Rent
                </div>
                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"> &#9733;' . $row['rating'] . '</div>
            </div>
            <div class="p-4 pb-0">
                <h5 class="text-primary mb-3">Rp' . number_format($row['harga'], 2, ',', '.') . '</h5>
                <a class="d-block h5 mb-2" href="order.php?id=' . $row['villa_id'] . '">' . $row['nama_villa'] . '</a>
                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $row['lokasi'] . '
                </p>
            </div>
            <div class="d-flex border-top">
                <small class="flex-fill text-center border-end py-2"><i
                            class="fa fa-ruler-combined text-primary me-2"></i>' . $row['desc1'] . '</small>
                <small class="flex-fill text-center border-end py-2"><i
                            class="fa fa-bed text-primary me-2"></i>' . $row['desc2'] . '</small>
                <small class="flex-fill text-center py-2"><i
                            class="fa fa-bath text-primary me-2"></i>' . $row['desc3'] . '</small>
            </div>
        </div>
    </div>
    ';
    }
    exit();
?>