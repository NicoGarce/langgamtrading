<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/pages/employee/emp_dashboard.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="../../assets/js/custom.js"></script>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php include("C:/xampp/htdocs/langgamtrading/includes/admin_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php')?>
            <div class="dashboard-content ps-4 pt-3">
                <h2>Dashboard</h2>
                <p>This is the Dashboard</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident adipisci explicabo, voluptatem inventore corrupti deleniti, quos molestiae odit possimus aut libero quisquam! A quae maiores deleniti asperiores corporis id omnis!</p>
                
                <div class="container">
                    <div class="row pe-4">
                        <div class="card col-6 ">
                            <div class="card-body">
                                <h5 class="card-title">Something Here</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>


    
                        <div class="card col-6">
                            <div class="card-body">
                                <h5 class="card-title">Something Here</h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
                </div>
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