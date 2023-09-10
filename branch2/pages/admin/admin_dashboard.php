<?php
require_once('../../../branch2/includes/dash_function.php');
require_once('../../../branch2/includes/users_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/branch2/pages/employee/emp_dashboard.php');
    exit();
}

$inv_row = $dash->inv_row();
$ord_row = $dash->ord_row();
$acc_row = $dash->acc_row();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">

    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script defer src="/langgamtrading/assets/js/custom.js"></script>


    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>

    <style>
        .dataTables_wrapper .dataTables_filter input[type="search"] {

            margin-right: 5px;
        }
    </style>
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
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'" title="Inventory">
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
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'" title="Inventory">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-line-chart fs-4'></i>
                                                    <?php echo $inv_row; ?>
                                                </h2>
                                                <p class="card-text">Inventory</p>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../orders.php'" title="Inventory">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-list-ul fs-4'></i>
                                                    <?php echo $ord_row; ?>
                                                </h2>
                                                <p class="card-text">Inventory</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../acc_manage.php'" title="Inventory">
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
                        <div class="">
                            <h1>GRAPH CONTENT</h1>
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