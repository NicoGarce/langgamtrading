<?php
require_once('../../../branch1/includes/dash_function.php');
require_once('../../../branch1/includes/users_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/branch1/pages/employee/emp_dashboard.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/admin/admin_dashboard.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: /langgamtrading/branch3/pages/admin/admin_dashboard.php');
    exit();
}

$inv_row = $dash->inv_row();
$sale_row = $dash->sale_row();
$ord_row = $dash->ord_row();
$acc_row = $dash->acc_row();
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php include("../../includes/admin_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php') ?>
            <div class="dashboard-content mx-4">
                <div class="row">
                    <div class="col-lg-8 col-md-7 pb-2">
                        <div class="card rounded-4 p-1">
                            <div class="row">
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'" title="Inventory Count">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-clipboard fs-4'></i>
                                                    <?php echo $inv_row; ?>
                                                </h2>
                                                <p class="card-text">Inventory</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='sales.php'" title="Sales Count">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-line-chart fs-4'></i>
                                                    <?php echo $sale_row; ?>
                                                </h2>
                                                <p class="card-text">Sales</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../orders.php'" title="Order Count">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-list-ul fs-4'></i>
                                                    <?php echo $ord_row; ?>
                                                </h2>
                                                <p class="card-text">Orders</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='acc_manage.php'" title="Accounts Count">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bxs-user-account fs-4'></i>
                                                    <?php echo $acc_row; ?>
                                                </h2>
                                                <p class="card-text">Accounts</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <?php include('graphs.php')?>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-5 pb-2">
                        <div class="card rounded-4">

                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>
                                <p class="card-text">Some quick example text to build on the card title and make up the
                                    bulk of the card's content.</p>

                            </div>
                        </div>
                    </div>


                </div>

            </div>
        </div>
</body>
<script>
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
    });
</script>

</html>