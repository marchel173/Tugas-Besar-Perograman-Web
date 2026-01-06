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
    $id = $_GET['id'];
    $checkin = $_POST['checkin']; 
    $checkout = $_POST['checkout'];

    require_once "php/config.php";

    // Retrieve villa information
    $sql = "SELECT * FROM villa WHERE villa_id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Calculate total price based on check-in and check-out dates
    $currentDate = date('Y-m-d'); 
    $status = true;
    $checkin_date = strtotime($checkin);
    $checkout_date = strtotime($checkout);
    $days_stay = ($checkout_date - $checkin_date) / (60 * 60 * 24); 
    $total_price = $days_stay * $row['harga'];

    // Assuming you have a form to collect payment information
    // Process payment here...
    // This could involve integrating with a payment gateway like Stripe, PayPal, etc.
    // For example, with PayPal:
    // 1. Send payment details to PayPal
    // 2. Receive payment response from PayPal
    // 3. Check payment status and update database accordingly

    // For the sake of example, let's assume payment is successful

    // Update database or perform any other necessary actions
    // For example, you might want to store the booking information in your database
    $user_id = $id; // Assuming you have stored user ID in session after login
    $insert_query = "INSERT INTO transaction (villa_id, user_id, transaction_date, payment_status, check_in, check_out, price) 
                    VALUES ('$id', '$user_id', '$currentDate', '$status', '$checkin', '$checkout', '$total_price')";
    mysqli_query($conn, $insert_query);

    // Check if user is logged in
    if ($_SESSION == null) {
        header("Location: login.html");
        exit; // stop further execution
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Payment Confirmation - Villz</title>
    <!-- Your other meta tags, stylesheets, and scripts -->
</head>

<body>
    <!-- Your header and navigation section -->
    <!-- This is just a basic structure, you can design the confirmation page as per your requirements -->
    <div class="container">
        <h2 class="mt-5 mb-3">Payment Confirmation</h2>
        <div class="alert alert-success" role="alert">
            Thank you for your payment!
        </div>
        <p>Your payment has been successfully processed. Your booking is confirmed.</p>
        <!-- Optionally, you can display more details about the booking or provide a link to view booking details -->
        <!-- Example: <a href="booking_details.php">View Booking Details</a> -->
    </div>
    <!-- Your footer section -->
</body>

</html>
