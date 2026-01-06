<?php
if (isset($_SESSION['username'])) {
    echo '
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Account</a>
        <div class="dropdown-menu rounded-0 m-0">
            <a href="profile.php" class="dropdown-item">View Profile</a>
            <a href="settings.php" class="dropdown-item">Settings</a>
        </div>
    </div>
</div>
    ';//div penutup class="navbar-nav ms-auto"
    echo '<a href="logout.php" class="btn btn-primary px-3 d-none d-lg-flex" " ">Logout</a>';
} else {
    echo '</div>
    <a href="login.html" class="btn btn-primary px-3 d-none d-lg-flex">Login</a>';
}
?>