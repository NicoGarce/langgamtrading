<?php
require_once('../../includes/storeclass.php');
require_once('../../branch3/includes/users_function.php');
require_once('../../branch3/includes/ord_function.php');
require_once('../../branch3/includes/inv_function.php');
require_once('../../includes/login_function.php');
$login->login();


if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: ../../index.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 1') {
    header('Location: /langgamtrading/branch1/pages/orders.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/orders.php');
    exit();
}

$orders->delete_order();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <link rel="icon" href="../../assets/icon.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
    <script defer src="/langgamtrading/assets/js/custom.js"></script>

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
                include("../../branch3/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../../branch3/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../includes/navbar.php') ?>
            <div class="dashboard-content px-3">
                <div class="m-0 m-sm-3">
                    <div>
                        <?php include('modals/create_order.php') ?>
                    </div>

                    <div class="container-fluid card p-3 rounded-4">

                        <div class="table-responsive pt-2 tab-pane fade show active" id="table1Container" role="tabpanel" aria-labelledby="tab1">
                            <table id="table" class="table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>Order ID</th>
                                        <th class="d-none d-sm-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Time</th>
                                        <th class="d-none d-sm-table-cell">Salesperson</th>
                                        <th class="d-none d-sm-table-cell">Payment Method</th>
                                        <th class="d-none d-sm-table-cell">Total</th>
                                        <th class="d-none d-sm-table-cell">Order Status</th>
                                        <th class="d-none d-sm-table-cell">Payment Status</th>
                                        <th class="d-none d-sm-table-cell">Type</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>


                                <?php
                                $orders->update_stat();
                                include('modals/order_details.php')
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
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
    });

    $('.delete-btn').on('click', function () {
        var order_id = $(this).data('id');
        // Show a modal with a password input field
        Swal.fire({
            title: 'Enter your password to confirm deletion',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off'
            },
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            showLoaderOnConfirm: true,
            customClass: {
                title: 'smaller-title'
            },
            preConfirm: (password) => {
                // Return a Promise that resolves with the server response
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: '../includes/validate_password.php',
                        method: 'POST',
                        data: {
                            password: password
                        },
                        success: (response) => {
                            try {
                                const result = JSON.parse(response);
                                console.log('Server response:', result); // Log the server response
                                resolve(result);
                            } catch (error) {
                                console.error('Error parsing JSON response:', error);
                                reject('Invalid JSON response from the server');
                            }
                        },
                        error: (xhr, status, error) => {
                            console.error('Server error:', status, error);
                            reject(`Server error: ${status} - ${error}`);
                        }
                    });
                });
            },
            allowOutsideClick: false,
        }).then((result) => {
            if (result.value && result.value.valid) {
                // Perform the deletion

                // Display success message after deletion
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Order deleted successfully',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                }).then(() => {
                    // Redirect to acc_manage.php
                    window.location.href = 'orders.php?delete=true&order_id=' + order_id;
                });
            }else if (result.dismiss === Swal.DismissReason.cancel) {
                // User canceled the modal
                console.log('User canceled the deletion');
            } else {
                // Password is invalid or an error occurred
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: result.value ? result.value.message : 'Incorrect password',
                    showConfirmButton: false
                });
            }
        });
    });
</script>

</html>