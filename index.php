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
                    <a href="index.php" class="nav-item nav-link active">Home</a>
                    <a href="about.php" class="nav-item nav-link">About</a>
                    <a href="villa.php" class="nav-item nav-link">Villa</a>
                    <a href="contact.php" class="nav-item nav-link">Contact</a>
                    <?php
                    session_start();;
                    include "buttonLogin.php";
                    ?>
                </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid header bg-white p-0">
        <div class="row g-0 align-items-center flex-column-reverse flex-md-row">
            <div class="col-md-6 p-5 mt-lg-5">
                <h1 class="display-5 animated fadeIn mb-4">Find A <span class="text-primary">Perfect Villa</span> To
                    Live Your Vacation</h1>
                <p class="animated fadeIn mb-4 pb-2">Temukan keindahan yang tak terlupakan di setiap sudut, nikmati
                    momen ketenangan yang tiada tara di Villz. Pengalaman menyewa villa yang menghadirkan kemewahan dan
                    kesejahteraan, di sini, di Villz, tempat di mana kenangan abadi bermula.</p>
                <a href="villa.php" class="btn btn-primary py-3 px-5 me-3 animated fadeIn">Get Started</a>
            </div>
            <div class="col-md-6 animated fadeIn">
                <div class="owl-carousel header-carousel">
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-1.jpg" alt="">
                    </div>
                    <div class="owl-carousel-item">
                        <img class="img-fluid" src="img/carousel-2.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Header End -->

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img position-relative overflow-hidden p-5 pe-0">
                        <img class="img-fluid w-100" src="img/about.jpg">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <h1 class="mb-4">#1 Place To Find The Perfect Villa</h1>
                    <p class="mb-4">Dengan lokasi yang menakjubkan dan fasilitas terbaik, setiap momen di villa kami
                        menjadi pengalaman yang tak terlupakan. Nikmati privasi Anda dengan pemandangan spektakuler dan
                        layanan berkualitas tinggi yang kami tawarkan.</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Kemewahan Tak Terbantahkan</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Lokasi Pilihan</p>
                    <p><i class="fa fa-check text-primary me-3"></i>Pelayanan Prima</p>
                    <a class="btn btn-primary py-3 px-5 mt-3" href="about.php">Read More</a>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Property List Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-0 gx-5 align-items-end">
                <div class="col-lg-6">
                    <div class="text-start mx-auto mb-5 wow slideInLeft" data-wow-delay="0.1s">
                        <h1 class="mb-3">List Villa</h1>
                    </div>
                </div>
            </div>
            <div class="tab-content">
                <div id="tab-1" class="tab-pane fade show p-0 active">
                    <div class="row g-4">
                        <?php
                        require_once "php/config.php";
                        $sql = "SELECT * FROM villa ORDER BY rating DESC LIMIT 3";
                        $result = mysqli_query($conn, $sql);
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
                        } ?>
                        <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.1s">
                            <a class="btn btn-primary py-3 px-5" href="villa.php">Browse More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Property List End -->


    <!-- Call to Action Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="bg-light rounded p-3">
                <div class="bg-white rounded p-4" style="border: 1px dashed rgba(0, 185, 142, .3)">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                            <img class="img-fluid rounded w-100" src="img/call-to-action.jpg" alt="">
                        </div>
                        <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                            <div class="mb-4">
                                <h1 class="mb-3">Contact With Our Certified Agent</h1>
                            </div>
                            <a href="contact.php" class="btn btn-primary py-3 px-4 me-2"><i
                                        class="fa fa-phone-alt me-2"></i>Make A Call</a>
                            <a href="contact.php" class="btn btn-dark py-3 px-4"><i class="fa fa-calendar-alt me-2"></i>Get
                                Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Call to Action End -->


    <!-- Team Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <h1 class="mb-3">Property Agents</h1>
                <p>Introducing our talented team members, each bringing unique skills and perspectives to the table.</p>
            </div>
            <div class="row g-4">
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-1.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1"
                                   href="https://www.linkedin.com/in/jefanya-brian-89443120b"><i
                                            class="fab fa-linkedin"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/jefanyabrian"><i
                                            class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Jefanya Brian</h5>
                            <small>Chief Executive Officer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-2.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1"
                                   href="https://www.linkedin.com/in/marchel-immanuel-sinatrawan-322a76240"><i
                                            class="fab fa-linkedin"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/i.marchel"><i
                                            class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Marchel Immanuel Sinatrawan</h5>
                            <small>Chief Operating Officer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-3.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1" href="https://www.linkedin.com/in/hans-38a689297"><i
                                            class="fab fa-linkedin"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/640509_040148"><i
                                            class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Hans</h5>
                            <small>Chief Information Officer</small>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.7s">
                    <div class="team-item rounded overflow-hidden">
                        <div class="position-relative">
                            <img class="img-fluid" src="img/team-4.jpg" alt="">
                            <div class="position-absolute start-50 top-100 translate-middle d-flex align-items-center">
                                <a class="btn btn-square mx-1"
                                   href="https://www.linkedin.com/in/agustinus-juan-kurniawan-9a9387297"><i
                                            class="fab fa-linkedin"></i></a>
                                <a class="btn btn-square mx-1" href="https://www.instagram.com/agustinusjuan_"><i
                                            class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                        <div class="text-center p-4 mt-3">
                            <h5 class="fw-bold mb-0">Agustinus Juan Kurniawan</h5>
                            <small>Chief Technology Officer</small>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->

    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-3 col-md-6">
                    <h5 class="text-white mb-4">Get In Touch</h5>
                    <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Jl. Dipati Ukur No.80, Bandung, Jawa Barat
                    </p>
                    <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+62 022 2506636</p>
                    <p class="mb-2"><i class="fa fa-envelope me-3"></i>ithb@ithb.ac.id</p>
                    <div class="d-flex pt-2">
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                        <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
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
                        <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">
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

                        <!--/* This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. */-->
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
</div>

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