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

if ($current_page === "voided.php") {
    $navbar_brand = "VOIDED";
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
if ($current_page === "activity_logs.php") {
    $navbar_brand = "ACTIVTY LOGS";
}

if ($current_page === "logbook.php") {
    $navbar_brand = "LOG BOOK";
}

$result = $users->getID();

$image_src = (!empty($result[0]->photo)) ? '../' . $result[0]->photo : '../../assets/user_upload/default.png';

if ($current_page === "admin_dashboard.php" || $current_page === "sales.php" || $current_page === "acc_manage.php" || $current_page === "emp_dashboard.php" || $current_page === "activity_logs.php" || $current_page === "logbook.php") {
    $image_src = (!empty($result[0]->photo)) ? '../../' . $result[0]->photo : '../../../assets/user_upload/default.png';
}
?>

<div id="progress">
    <span id="progress-value" title="Back To Top"><i class='bx bxs-chevron-up'></i></span>
</div>

<nav class="navbar navbar-expand-md navbar-light gradient-navbar rounded-4 shadow-lg">
    <div class="container-fluid">
        <div class="d-flex justify-content-between d-md-none d-block">
            <button class="btn px-1 py-0 open-btn me-2"><i class='bx bx-menu text-white'></i></i></button>
            <a class="navbar-brand fs-4 text-white" id="namebrand"><?php echo $navbar_brand; ?></a>
        </div>
        <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <i class='bx bx-cog text-white'></i>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
            <div class="container-fluid">
                <span class="navbar-brand text-uppercase text-white" id="navbrand"><?php echo $navbar_brand; ?></span>
            </div>
            <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                <li class="nav-item profile">
                    <a class="nav-link active profile-img" aria-current="page" href="/langgamtrading/branch2/pages/profile.php" title="Profile">
                        <img src="<?php echo $image_src; ?>" alt="photo" class="img-fluid border border-2 rounded-circle" width="30px" height="30px">
                    </a>
                    
                    <a class="nav-link active profile-text text-white" aria-current="page" href="/langgamtrading/branch2/pages/profile.php">Profile</a>
                </li>

                <li class="nav-item logout">
                    <a class="nav-link active logout-icon" title="Logout" aria-current="page" href="/langgamtrading/includes/logout_b2.php">
                        <i class='bx bx-log-out-circle text-white'></i>
                    </a>
                    <a class="nav-link active logout-text text-white" aria-current="page" href="/langgamtrading/includes/logout_b2.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>