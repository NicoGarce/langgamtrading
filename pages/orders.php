<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/sidebar.css">
    <link rel="stylesheet" href="/langgamtrading/css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-3 pb-3">
            <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
                include("C:/xampp/htdocs/langgamtrading/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("C:/xampp/htdocs/langgamtrading/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content pt-1">
            <nav class="navbar navbar-expand-md navbar-light bg-light rounded-4 m-3 shadow-lg">
                <div class="container-fluid">
                    <div class="d-flex justify-content-between d-md-none d-block">
                        <button class="btn px-1 py-0 open-btn me-2"><i class='bx bxs-chevrons-right'></i></button>
                        <a class="navbar-brand fs-4" href="#">LANGGAM TRADING</a>
                    </div>
                    <button class="navbar-toggler p-0 border-0" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                        <div class="container-fluid">
                            <span class="navbar-brand text-uppercase" href="#">Orders</span>
                        </div>
                        <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                            <li class="nav-item profile">
                                <a class="nav-link active" aria-current="page" href="/langgamtrading/pages/profile.php">Profile</a>
                            </li>
                            <li class="nav-item logout">
                                <a class="nav-link active" aria-current="page"
                                    href="/langgamtrading/includes/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content px-3 pt-4">
                <h2>Orders</h2>
                <p>This is the Orders Page</p>
            </div>
        </div>
    </div>
</body>
<script>
    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');
    });

</script>

</html>