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
        if ($_SESSION == null) {
            header("Location: login.html");
            exit; // stop further execution
        }

        require_once "php/config.php";

        // Check if villa ID is set
        if (!isset($_GET['id'])) {
            header("Location: villa.php"); // Redirect to villa page if ID is not set
            exit; // stop further execution
        }

        $id = $_GET['id'];

        // Fetch villa details from the database
        $sql = "SELECT * FROM villa WHERE villa_id = '$id'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if (!$row) {
            header("Location: villa.php"); // Redirect to villa page if villa ID is not found
            exit; // stop further execution
        }

        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Ambil data pembayaran dari formulir
        $villa_id = $_POST['villa_id'];
        $checkin_date = strtotime($checkin);
        $checkout_date = strtotime($checkout);
        $days_stay = ($checkout_date - $checkin_date) / (60 * 60 * 24); // Number of days between check-in and check-out
        $total_price = $days_stay * $row['price'];

        // Redirect to a thank you page or any confirmation page after successful payment
        header("Location: payment-confirmation.php");
        exit; // stop further execution
        }
    ?>
    <div class="container">
        <h2 class="mt-5 mb-3">Payment for <?php echo $row['nama_villa']; ?></h2>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Villa Details</h5>
                        <p class="card-text">Villa Name: <?php echo $row['nama_villa']; ?></p>
                        <p class="card-text">Price: Rp <?php echo number_format($row['harga'], 2, ',', '.'); ?></p>
                        <!-- You can display other villa details here -->
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Payment Information</h5>
                        <!-- Your payment form -->
                        <!-- Di dalam tag <body> -->
                        <div class="container">
                            <h2>Order Villa</h2>
                            <form action="process-payment.php?id=<?php echo $id; ?>" method="post">
                                <div class="mb-3">
                                    <label for="checkin" class="form-label">Check-in Date:</label>
                                    <input type="date" class="form-control" id="checkin" name="checkin" required>
                                </div>
                                <div class="mb-3">
                                    <label for="checkout" class="form-label">Check-out Date:</label>
                                    <input type="date" class="form-control" id="checkout" name="checkout" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit Order</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Your footer section -->
</body>

</html>
