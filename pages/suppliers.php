<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: /langgamtrading/index.php');
    exit();
}

$store->delete_supp();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/sidebar.css">
    <link rel="stylesheet" href="/langgamtrading/css/navbar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap5.min.js"></script> 
    <style>
        .dataTables_wrapper .dataTables_filter input[type="search"] {
            width: 300px; /* Adjust the desired width */
            margin-right: 5px;
        }

    </style>
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
                            <a class="navbar-brand text-uppercase" href="#">Suppliers</a>
                        </div>
                        <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" href="/langgamtrading/pages/profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="/langgamtrading/includes/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content px-3 pt-4">

                <div class="m-5">
                    <div class="row">
                        <div class="col-lg-8">
                            <h2>Suppliers</h2>
                            <p>This is the Suppliers Page</p>
                        </div>
                        <div class="col-lg-4 p-3 d-flex justify-content-end" style="margin-top: 20px;">
                            <?php include("modals/addsupplier.php") ?>
                        </div>
                    </div>



                    <div class="card p-3">
                        <div class="table-responsive pt-2">
                            <table id="suppliers" class="table table-bordered table-striped">
                                <thead class="text-center">
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th style="width: 50px;">Options</th>
                                    </tr>
                                </thead>
                                
                                <?php 
                                    $store ->edit_supplier();
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
        $(document).ready(function(){
            $('#suppliers').DataTable({
                "language": {
                    "searchPlaceholder": "Search",
                    "search": ""
                }
            });
        })
    </script>
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