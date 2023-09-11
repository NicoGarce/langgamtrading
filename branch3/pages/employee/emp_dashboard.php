<?php
require_once('../../../branch2/includes/users_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if(!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])){
    header('Location: /langgamtrading/index.php');
    exit();
}

if(isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
    header('Location: /langgamtrading/branch3/pages/admin/admin_dashboard.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 1') {
    header('Location: /langgamtrading/branch1/pages/employee/emp_dashboard.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/employee/emp_dashboard.php');
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
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php include("../../includes/emp_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php')?>

            <div class="dashboard-content px-3 pt-4">
                <h2>Home Page</h2>
                <p>This is the Home Page</p>
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