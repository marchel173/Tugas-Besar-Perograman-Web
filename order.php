<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Villz</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/icon-deal.png" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Inter:wght@700;800&display=swap"
          rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <!-- <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div> -->
    <!-- Spinner End -->


    <!-- Navbar Start -->
    <div class="container-fluid nav-bar bg-transparent">
        <nav class="navbar navbar-expand-lg bg-white navbar-light py-0 px-4">
            <a href="index.php" class="navbar-brand d-flex align-items-center text-center">
                <div class="icon p-2 me-2">
                    <img class="img-fluid" src="img/icon-deal.png" alt="Icon" style="width: 30px; height: 30px;">
                </div>
                <h1 class="m-0 text-primary">Villz</h1>
            </a>
            <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto">
                    <a href="index.php" class="nav-item nav-link">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="villa.php" class="nav-item nav-link active">Villa</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php
                    session_start();
                    include "buttonLogin.php";
                    ?>
                </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <?php
    if($_SESSION == null){
        header("Location: login.html");
    }else{

$id = $_GET['id'];
require_once "php/config.php";

$sql = "SELECT * FROM villa WHERE villa_id = '$id'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
echo '<div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3 d-block">' . $row['nama_villa'] . '</h1>
                <p style="color:grey; font-size: 150%;">'.$row['deskripsi'].'</p>
            </div>
            <div class="row g-4">
                <div class="col-md-6">
                    <div class=" col-lg-4 col-md-6 position-relative rounded w-100 h-100 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                <a href="payment.php?id=' . $row['villa_id'] . '"><img class="img-fluid" src="' . $row['pic_villa'] . '" alt=""></a>
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    For Rent
                                </div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"> &#9733; ' . $row['rating'] . '</div>
                            </div>
                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">Rp' . number_format($row['harga'], 2, ',', '.') . '</h5>
                                <p><i class="fa fa-map-marker-alt text-primary me-2"></i>' . $row['lokasi'] . '</p>
                            </div>
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>' . $row['desc1'] . '</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>' . $row['desc2'] . '</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>' . $row['desc3'] . '</small>
                            </div>
                        </div>
                    </div>
                </div>';
    }
?>


<!-- Show Reviews Start -->
<?php
$sql = "SELECT * FROM review
JOIN user ON review.user_id = user.id
WHERE review.villa_id = $id
ORDER BY review.id DESC LIMIT 2";

$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_all($result, MYSQLI_ASSOC);
if (empty($rows)) {
    echo '<div class="col-md-6">
            <div class="testimonial-item bg-light rounded p-3">
                <div class="bg-white border rounded p-4">
                    <div class="d-flex align-items-center">
                        <a href="review.php?id=' . $id . '"> <h3 class="mb-3">Be the first to leave a review!</h3> </a>
                    </div>
                </div>
            </div>
        </div>';
} else {
    echo '<div class="col-md-6">
            <div class="container-xxxl py-0">
                <div class="container" onclick="review.php">
                    <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.4s" style="max-width: 600px;">
                        <h1 class="mb-3">Our Clients Say!</h1>
                    </div>';
    foreach ($rows as $row) {
        echo '<div class="testimonial-item bg-light rounded p-3 wow fadeInUp" data-wow-delay="0.5s" ">
                <div class="bg-white border rounded p-4">
                    <p>' . $row['comment'] . '</p>
                    <div class="d-flex align-items-center">
                        <img class="img-fluid flex-shrink-0 rounded" src="img/' . $row['pic_profile'] . '" style="width: 45px; height: 45px;">
                        <div class="ps-3">
                            <h6 class="fw-bold mb-1">' . $row['username'] . '</h6>
                            <small> &#9733; ' . $row['rating'] . '</small>
                        </div>
                    </div>
                </div>
            </div>
            ';
    }
    echo '</div>
            <br>
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.8s"><a href="review.php?id='.$id.'"><h4 class="mb-3">Leave a review!</h4></a></div>
        </div>
    </div>';
}
?>
</div>
</div>
</div>
</div>
</div>
</body>
<!-- Show Reviews End -->

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
