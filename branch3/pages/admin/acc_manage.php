<?php
require_once('../../../branch3/includes/users_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}   

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/branch3/pages/employee/emp_dashboard.php');
    exit();
}

$users->delete_user();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accounts | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    
    <link rel="stylesheet" href="/langgamtrading/assets/js/datatables.1.13.5.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="/langgamtrading/assets/js/custom.js"></script>
    <script defer src="/langgamtrading/assets/js/datatables.min.js"></script>
    <script defer src="/langgamtrading/assets/js/pdfmake.min.js"></script>
    <script defer src="/langgamtrading/assets/js/vfs_fonts.js"></script>
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
            <?php include('../../includes/navbar.php')?>    

            <div class="dashboard-content px-3">

                <div class="m-0 m-sm-3">

                    <?php include('../modals/addAccModal.php') ?>
                    
                    <div class="card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th class="d-none d-sm-table-cell">Photo</th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Username</th>
                                        <th class="d-none d-sm-table-cell">Role</th>
                                        <th class="d-none d-sm-table-cell">Date Added</th>
                                        <th style="width: 50px;">Options</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                    $users->getID();
                                    $users->update_user();
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