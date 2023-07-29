<?php
// Get the current page name
$current_page = basename($_SERVER['PHP_SELF']);

// Set the default navbar-brand value
$navbar_brand = "LANGGAM TRADING";

if ($current_page === "admin_dashboard.php") {
    $navbar_brand = "DASHBOARD";
}

if ($current_page === "inventory.php") {
    $navbar_brand = "INVENTORY";
}

if ($current_page === "orders.php") {
    $navbar_brand = "ORDERS";
}

if ($current_page === "sales.php") {
    $navbar_brand = "SALES";
}

if ($current_page === "acc_manage.php") {
    $navbar_brand = "ACCOUNTS";
}

if ($current_page === "suppliers.php") {
    $navbar_brand = "SUPPLIERS";
}

if ($current_page === "profile.php") {
    $navbar_brand = "PROFILE";
}

if ($current_page === "emp_dashboard.php") {
    $navbar_brand = "HOME";
}
?>

<nav class="navbar navbar-expand-md navbar-light bg-light rounded-4 shadow-lg">
    <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class='bx bx-menu'></i></i></button>
            <a class="navbar-brand fs-4" href="#">LANGGAM TRADING</a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class='bx bx-cog'></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="container-fluid">
                <span class="navbar-brand text-uppercase" href="#"><?php echo $navbar_brand; ?></span>
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                <li class="nav-item profile">
                    <a class="nav-link active" aria-current="page" href="/langgamtrading/pages/profile.php">Profile</a>
                </li>
                <li class="nav-item logout">
                    <a class="nav-link active" aria-current="page" href="/langgamtrading/includes/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>