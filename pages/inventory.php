<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: /langgamtrading/index.php');
    exit();
}

$store->delete_product();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/sidebar.css">
    <link rel="stylesheet" href="/langgamtrading/css/navbar.css">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    
    <link rel="stylesheet" href="../assets/js/datatables.1.13.5.min.css">
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script defer src="../assets/js/custom.js"></script>
    <script defer src="../assets/js/datatables.min.js"></script>
    <script defer src="../assets/js/pdfmake.min.js"></script>
    <script defer src="../assets/js/vfs_fonts.js"></script>
    <style>
         .dataTables_wrapper .dataTables_filter input[type="search"] {
            
            margin-right: 5px;
        }

    </style>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2">
            <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
                include("../includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../includes/navbar.php')?>
            
            <div class="dashboard-content px-3">
                <div class="m-0 m-sm-3">
                    <?php include('modals/add_product.php') ?>

                        <div class="card p-3 rounded-4">
                            <div class="table-responsive pt-2">
                                <table id="table" class="table table-bordered table-striped">
                                    <thead class="text-center">
                                        <tr>
                                            <th>Product Name</th>
                                            <th class="d-none d-sm-table-cell">Quantity</th>
                                            <th class="d-none d-sm-table-cell" >Price</th>
                                            <th class="d-none d-sm-table-cell" >Category</th>
                                            <th class="d-none d-sm-table-cell" >Date Ordered</th>
                                            <th class="d-none d-sm-table-cell" >Date Arrival</th>
                                            <th>Options</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php 
                                        $store ->edit_product();
                                        include('modals/prod_details.php')
                                    ?>
                    
                                </table>
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

    $('.delete-btn').on('click', function () {
            var product_id = $(this).data('id');
            Swal.fire({
                icon: 'warning',
                title: 'Are you sure?',
                text: 'You are about to delete this product',
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
                        text: 'Product deleted successfully',
                        showConfirmButton: false,
                        timer: 2000,
                        showClass: {
                            popup: 'swal2-show'
                        }
                    }).then(() => {
                        // Redirect to acc_manage.php
                        window.location.href = 'inventory.php?delete=true&product_id=' + product_id;

                        window.location.href = 'inventory.php';
                    });
                }
            });
        });
</script>

</html>