<?php
require_once('../../branch3/includes/sups_function.php');
require_once('../../branch3/includes/users_function.php');
require_once('../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: ../../index.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 1') {
    header('Location: /langgamtrading/branch1/pages/suppliers.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/suppliers.php');
    exit();
}

$sups->delete_supp();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Langgam Trading</title>
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

                    <?php include('modals/add_supplier.php') ?>

                    <div class="card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-striped table-hover">
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
                                $sups->edit_supplier();
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
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
    });

    function verifyPassword() {
        return Swal.fire({
            title: 'Enter your password',
            input: 'password',
            inputAttributes: {
                autocapitalize: 'off',
                autocorrect: 'off',
            },
            showCancelButton: true,
            confirmButtonText: 'Confirm',
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            customClass: {
                title: 'smaller-title',
            },
            preConfirm: (password) => {
                return new Promise((resolve, reject) => {
                    $.ajax({
                        url: '../includes/validate_password.php',
                        method: 'POST',
                        data: {
                            password: password,
                        },
                        success: (response) => {
                            try {
                                const result = JSON.parse(response);
                                console.log('Server response:', result);
                                resolve(result);
                            } catch (error) {
                                console.error('Error parsing JSON response:', error);
                                reject('Invalid JSON response from the server');
                            }
                        },
                        error: (xhr, status, error) => {
                            console.error('Server error:', status, error);
                            reject(`Server error: ${status} - ${error}`);
                        },
                    });
                });
            },
            allowOutsideClick: false,
        });
    }

    $(document).ready(function() {
        // Listen for the custom event
        $(document).on("customButtonAppended", function() {
            // Attach the click event handler to the dynamically generated button
            $('#add-supp-btn').on('click', function() {
                verifyPassword()
                    .then((result) => {
                        if (result.value && result.value.valid) {
                            $('#addSupplier').modal('show');
                        } else if (result.dismiss === Swal.DismissReason.cancel) {

                        } else {
                            // Password is invalid or an error occurred
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: result.value ? result.value.message : 'Incorrect password',
                                showConfirmButton: false,
                            });
                        }
                    })
                    .catch((error) => {
                        console.log('Password verification failed:', error);
                        // Handle the error (e.g., show an error message)
                    });
            });
        });
    });

    $(document).ready(function() {
        // Attach the click event handler to the dynamically generated button with class 'btn-edit-product'
        $('.btn-edit-supplier').on('click', function() {
            verifyPassword()
                .then((result) => {
                    if (result.value && result.value.valid) {
                        const modalId = $(this).data('bs-target');

                        // Show the modal using the retrieved ID
                        $(modalId).modal('show');
                    } else if (result.dismiss === Swal.DismissReason.cancel) {

                    } else {
                        // Password is invalid or an error occurred
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: result.value ? result.value.message : 'Incorrect password',
                            showConfirmButton: false,
                        });
                    }
                })
                .catch((error) => {
                    console.log('Password verification failed:', error);
                    // Handle the error (e.g., show an error message)
                });
        });
    });


    $('.delete-btn').on('click', function() {
        var supplier_id = $(this).data('id');

        verifyPassword(supplier_id).then((result) => {
            if (result.value && result.value.valid) {
                // Password is valid
                // Perform the deletion
                // Display success message after deletion
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Suppplier deleted successfully',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                }).then(() => {
                    window.location.href = 'suppliers.php?delete=true&supplier_id=' + supplier_id;
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {

            } else {
                // Password is invalid or an error occurred
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: result.value ? result.value.message : 'Incorrect password',
                    showConfirmButton: false,
                });
            }
        });
    });
</script>

</html>