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

$inv_row = $store->inv_row();
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
            <?php include('../../includes/navbar.php') ?>
            <div class="dashboard-content mx-4">
                <div class="row">
                    <div class="col-lg-8 col-md-7 pb-2">
                        <div class="card rounded-4 p-1">
                            <div class="row">
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'"
                                        title="Inventory">
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
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'"
                                        title="Inventory">
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
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'"
                                        title="Inventory">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bx-list-ul fs-4'></i>
                                                    <?php echo $inv_row; ?>
                                                </h2>
                                                <p class="card-text">Inventory</p>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="btn dashbtn p-0" onclick="window.location.href='../inventory.php'"
                                        title="Inventory">
                                        <div class="card-body d-flex">
                                            <div class="d-flex flex-column flex-grow-1">
                                                <h2 class="card-title">
                                                    <i class='bx bxs-user-account fs-4'></i>
                                                    <?php echo $inv_row; ?>
                                                </h2>
                                                <p class="card-text">Inventory</p>
                                            </div>
                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 pb-2">
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
    $('.open-btn').on('click', function () {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function () {
        $('.sidebar').removeClass('active');
    });
</script>

</html>