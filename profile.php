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
    <style>
        #profile-pic {
            width: 40%;
            border-radius: 50%;
            padding: 10px;
            overflow: hidden;
        }
    </style>
</head>

<body>
<div class="container-xxl bg-white p-0">
    <!-- Spinner Start -->
    <div id="spinner"
         class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
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
                    <a href="villa.php" class="nav-item nav-link">Villa</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php
                    session_start();
                    include "buttonLogin.php";
                    ?>
                </div>
        </nav>
    </div>
    <!-- Navbar End -->

    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                <h1 class="mb-3">Profile</h1>
            </div>
            <div class="position-static">
                <?php
                include "php/config.php";
                $session = $_SESSION['username'];
                $get = mysqli_query($conn, "SELECT * FROM user WHERE username = '$session'");
                $fetch = mysqli_fetch_array($get);
                if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    $username = $_POST['username'];
                    $fullname = $_POST['fullname'];
                    $email = $_POST['email'];
                    $phone = $_POST['handphone'];
                    $oldPass = $_POST['oldPassword'];
                    $newPass = $_POST['newPassword'];
                    $dbPass = $fetch['password'];
                    if ($oldPass == $dbPass) {
                        $update = "UPDATE user SET username = '$username', fullname = '$fullname', email = '$email', handphone = '$phone', password = '$newPass' WHERE username = '$session'";
                        if (mysqli_query($conn, $update)) {
                            if ($_FILES['profilePicture']['error'] == UPLOAD_ERR_OK) {
                                $profilePicture = $_FILES['profilePicture'];
                                $targetDir = "img/";
                                $targetFile = $targetDir . basename($profilePicture['name']);
                                if (move_uploaded_file($profilePicture['tmp_name'], $targetFile)) {
                                    $updatePic = "UPDATE user SET pic_profile = '$targetFile' WHERE username = '$session'";
                                    mysqli_query($conn, $updatePic);
                                } else {
                                    echo "Error uploading profile picture.";
                                }
                            }
                            require_once 'logout.php';
                            exit;
                        } else {
                            echo 'Error Occured';
                        }
                    } else {
                        echo 'Edit Profile Success';
                    }
                    exit;
                }
                ?>
                <div style="display: flex; align-items: center;">
                    <img id="profile-pic" src="<?= $fetch['pic_profile'] ?>"
                         alt="img/blank_pic.jpg"
                         title="Profile Picture">
                    <form method="post" action="profile.php" enctype="multipart/form-data" onsubmit="editProfile()">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="username" class="form-control" id="username"
                                           placeholder="Username"
                                           value="<?= $session ?>" required>
                                    <label for="username">Username*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="fullname" class="form-control" id="fullname"
                                           placeholder="Full Name"
                                           value="<?= $fetch['fullname'] ?>" required>
                                    <label for="fullname">Full Name*</label>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="email" name="email" class="form-control" id="email"
                                           placeholder="Your Email"
                                           value="<?= $fetch['email'] ?>" required>
                                    <label for="email">Email*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="text" name="handphone" class="form-control" id="handphone"
                                           placeholder="Phone Number"
                                           value="<?= $fetch['handphone'] ?>" required>
                                    <label for="handphone">Phone Number*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="file" name="profilePicture" class="form-control" id="profilePicture"
                                           accept="image/*">
                                    <label for="profilePicture">Profile Picture</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" name="oldPassword" class="form-control" id="oldPassword"
                                           placeholder="Old Password" value="" required>
                                    <label for="oldPassword">Old Password*</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-floating">
                                    <input type="password" name="newPassword" class="form-control" id="newPassword"
                                           placeholder="New Password" value="" required>
                                    <label for="newPassword">New Password*</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <a href="login.html">
                                    <button class="btn btn-primary w-100 py-3" type="submit"><i
                                                class="fa fa-pencil-alt me-2"></i>Edit Your Profile
                                    </button>
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <br>
        </div>
    </div>
    <br>
</div>

<script>
    function editProfile() {
        alert("Edit Profile Success");

    }
</script>


<!-- Footer Start -->
<div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Get In Touch</h5>
                <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Dipati Ukur No.80, Bandung,
                    Jawa
                    Barat
                </p>
                <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 022 2506636</p>
                <p class="mb-2"><i class="fa fa-envelope me-3"></i>ithb@ithb.ac.id</p>
                <div class="d-flex pt-2">
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                    <a class="btn btn-outline-light btn-social" href=""><i
                                class="fab fa-linkedin-in"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Quick Links</h5>
                <a class="btn btn-link text-white-50" href="">About Us</a>
                <a class="btn btn-link text-white-50" href="">Contact Us</a>
                <a class="btn btn-link text-white-50" href="">Our Services</a>
                <a class="btn btn-link text-white-50" href="">Privacy Policy</a>
                <a class="btn btn-link text-white-50" href="">Terms & Condition</a>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Photo Gallery</h5>
                <div class="row g-2 pt-2">
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-1.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-2.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-3.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-4.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-5.jpg" alt="">
                    </div>
                    <div class="col-4">
                        <img class="img-fluid rounded bg-light p-1" src="img/property-6.jpg" alt="">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <h5 class="text-white mb-4">Newsletter</h5>
                <p>Put your email below to receive an update from us !</p>
                <div class="position-relative mx-auto" style="max-width: 400px;">
                    <input class="form-control bg-transparent w-100 py-3 ps-4 pe-5" type="text"
                           placeholder="Your email">
                    <button type="button"
                            class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
                        SignUp
                    </button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright">
            <div class="row">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    &copy; <a class="border-bottom" href="#">Villz</a>, All Right Reserved.

                    <!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
                    Designed By <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <div class="footer-menu">
                        <a href="">Home</a>
                        <a href="">Cookies</a>
                        <a href="">Help</a>
                        <a href="">FQAs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>

<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="lib/wow/wow.min.js"></script>
<script src="lib/easing/easing.min.js"></script>
<script src="lib/waypoints/waypoints.min.js"></script>
<script src="lib/owlcarousel/owl.carousel.min.js"></script>

<!-- Template Javascript -->
<script src="js/main.js"></script>
</body>

</html>