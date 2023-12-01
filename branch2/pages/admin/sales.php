<?php
require_once('../../../includes/storeclass.php');
require_once('../../../branch2/includes/users_function.php');
require_once('../../../branch2/includes/sales_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: ../../../index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /langgamtrading/branch2/pages/employee/emp_dashboard.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 1') {
    header('Location: /langgamtrading/branch1/pages/admin/sales.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: /langgamtrading/branch3/pages/admin/sales.php');
    exit();
}
$sales->delete_sale();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sales | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <link rel="icon" href="../../../assets/icon.png" type="image/png">
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
            <?php include("../../includes/admin_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php') ?>

            <div class="dashboard-content px-3">
                <div class="m-0 m-sm-3">
                    <div>
                        <?php include('../modals/sales_import.php') ?>
                    </div>
                    <div class="mb-2">
                        <div class="container-fluid card p-3 rounded-4">
                            <div class="row p-2 justify-content-center">
                                <div class="col-md-5 p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">Start Date:</span>
                                        <input type="date" id="start_date" class="form-control" aria-describedby="start_date">
                                    </div>
                                </div>
                                <div class="col-md-5 p-2">
                                    <div class="input-group">
                                        <span class="input-group-text">End Date:</span>
                                        <input type="date" id="end_date" class="form-control" aria-describedby="end_date">
                                    </div>
                                </div>
                                <div class="col-md-2 p-2">
                                    <div class="input-group">
                                        <button class="btn btn-primary" type="button" id="generateBtn" onclick="generateReport()">Generate Report</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th>Sale ID</th>
                                        <th class="d-none d-sm-table-cell">Date</th>
                                        <th class="d-none d-sm-table-cell">Time</th>
                                        <th class="d-none d-sm-table-cell">Salesperson</th>
                                        <th class="d-none d-sm-table-cell">Payment Method</th>
                                        <th class="d-none d-sm-table-cell">Total</th>
                                        <th class="d-none d-sm-table-cell">Type</th>
                                        <th>Options</th>
                                    </tr>
                                </thead>

                                <?php
                                include('../modals/sale_details.php');
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

    $('.delete-btn').on('click', function() {
        var sale_id = $(this).data('id');

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
                        url: '../../includes/validate_password.php',
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
                // Password is valid
                // Perform the deletion
                // Display success message after deletion
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Sale deleted successfully',
                    showConfirmButton: false,
                    timer: 2000,
                    showClass: {
                        popup: 'swal2-show'
                    }
                }).then(() => {
                    window.location.href = 'sales.php?delete=true&sale_id=' + sale_id;
                });
            } else if (result.dismiss === Swal.DismissReason.cancel) {
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

    // Move the generateReport function outside the click event block
    function generateReport() {
        var startDate = $('#start_date').val();
        var endDate = $('#end_date').val();

        // Check if the start date is ahead of the end date
        if (new Date(startDate) > new Date(endDate)) {
            // Display SweetAlert message
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Start date cannot be ahead of the end date',
                position: 'top-end',
                toast: true,
                showConfirmButton: false,
                timer: 3000 // Adjust the timer as needed
            });
        } else {
            // Perform an AJAX request to fetch sales records
            $.ajax({
                url: '../../includes/fetch_sales.php',
                type: 'POST',
                data: {
                    start_date: startDate,
                    end_date: endDate
                },
                success: function(data) {
                    var url = '../../includes/fetch_sales.php?start_date=' + startDate + '&end_date=' + endDate;
                    window.open(url, '_blank');
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while generating the PDF: ' + error);
                }
            });
        }
    }

    $(document).ready(function() {
        // Function to check if the button should be disabled
        function shouldDisableButton() {
            var startDate = $('#start_date').val();
            var endDate = $('#end_date').val();

            // Disable the button if there is no date input or only one date input
            return !startDate || !endDate;
        }

        // Update button state on page load
        $('#generateBtn').prop('disabled', shouldDisableButton());

        // Update button state when date inputs change
        $('#start_date, #end_date').on('change', function() {
            $('#generateBtn').prop('disabled', shouldDisableButton());
        });

        $('#generateBtn').on('click', generateReport);
    });
</script>

</html>