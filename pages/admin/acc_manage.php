<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) || empty($_SESSION['m_un'])) { // Use "||" instead of "&&"
    header('Location: /langgamtrading/index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/pages/employee/emp_dashboard.php');
    exit();
}

$store->delete_user();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/sidebar.css">
    <link rel="stylesheet" href="/langgamtrading/css/navbar.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    
    <link rel="stylesheet" href="../../assets/js/datatables.1.13.5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="../../assets/js/custom.js"></script>
    <script defer src="../../assets/js/datatables.min.js"></script>
    <script defer src="../../assets/js/pdfmake.min.js"></script>
    <script defer src="../../assets/js/vfs_fonts.js"></script>
    <style>
        .dataTables_wrapper .dataTables_filter input[type="search"] {
            
            margin-right: 5px;
        }

    </style>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-3 pb-3">
            <?php include("C:/xampp/htdocs/langgamtrading/includes/admin_sidebar.php") ?>
        </div>
        <div class="content pt-1 ">
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
                            <span class="navbar-brand text-uppercase" href="#">Accounts</span>
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
            <div class="dashboard-content px-3">

                <div class="m-0 m-sm-3">

                    <?php include('../modals/addAccModal.php') ?>
                    
                    <div class="card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Username</th>
                                        <th class="d-none d-sm-table-cell">Role</th>
                                        <th class="d-none d-sm-table-cell">Date Added</th>
                                        <th style="width: 50px;">Options</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                    $store->getID();
                                    $store->update_user();
                                    include('../modals/acc_details.php') 
                                ?>
                                                    
                                                    
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script>
        
        $('.open-btn').on('click', function () {
            $('.sidebar').addClass('active');
        });

        $('.close-btn').on('click', function () {
            $('.sidebar').removeClass('active');
        });

        $('.delete-btn').on('click', function () {
            var id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You are about to delete this user',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it'
            }).then((result) => {
                if (result.isConfirmed) {
                    // Perform the deletion

                    // Display success message after deletion
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'User deleted successfully',
                        showConfirmButton: false,
                        timer: 2000,
                        showClass: {
                            popup: 'swal2-show'
                        }
                    }).then(() => {
                        // Redirect to acc_manage.php
                        window.location.href = 'acc_manage.php?delete=true&ID=' + id;
                        window.location.href = 'acc_manage.php';
                    });
                }
            });
        });


    </script>
</body>

</html>