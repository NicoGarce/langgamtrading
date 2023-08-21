<?php
require_once('../../branch2/includes/sups_function.php');
require_once('../../branch2/includes/users_function.php');
require_once('../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: /langgamtrading/index.php');  
    exit();
}

$sups->delete_supp();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
            <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
                include("../../branch2/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../../branch2/includes/emp_sidebar.php");
            }
            ?>
        </div>  
        <div class="content">
            <?php include('../includes/navbar.php')?>
            <div class="dashboard-content px-3">
                
                <div class="m-0 m-sm-3">
            
                    <?php include('modals/add_supplier.php') ?>

                    <div class="card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th class="d-none d-sm-table-cell">Description</th>
                                        <th class="d-none d-sm-table-cell">Address</th>
                                        <th class="d-none d-sm-table-cell">Contact</th>
                                        <th style="width: 50px;">Options</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                    $sups ->edit_supplier();
                                    include('modals/edit_supplier.php') 
                                ?>
                 
                            </table>
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
    
     $('.delete-btn').on('click', function () {
            var supplier_id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You are about to delete this supplier',
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
                        text: 'Supplier deleted successfully',
                        showConfirmButton: false,
                        timer: 2000,
                        showClass: {
                            popup: 'swal2-show'
                        }
                    }).then(() => {
                        // Redirect to acc_manage.php
                        window.location.href = 'suppliers.php?delete=true&supplier_id=' + supplier_id;

                        window.location.href = 'suppliers.php';
                    });
                }
            });
        });

        
</script>

</html>