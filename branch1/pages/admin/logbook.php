<?php
require_once('../../../includes/storeclass.php');
require_once('../../../branch1/includes/users_function.php');
require_once('../../../branch1/includes/log_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: ../../../index.php');
    exit();
}

if (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: ../../../branch2/pages/logs.php');
    exit();
} elseif (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: ../../../branch3/pages/logs.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log Book | Langgam Trading</title>
    <link rel="stylesheet" href="../../../css/custom.css">
    <link rel="icon" href="../../../assets/icon.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script defer src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <link href="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.css" rel="stylesheet">

    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/v/bs5/jszip-3.10.1/dt-1.13.6/b-2.4.2/b-html5-2.4.2/b-print-2.4.2/datatables.min.js"></script>
    <script defer src="../../../assets/js/custom.js"></script>

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
                include("../../../branch1/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../../../branch1/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php') ?>
            <div class="dashboard-content px-3">

                <div class="m-0 m-sm-3">

                    <div class="container-fluid card p-3 rounded-4">
                        <div class="table-responsive pt-2">
                            <table id="table" class="table table-striped table-hover">
                                <thead class="text-center">
                                    <tr>
                                        <th class="d-none d-sm-table-cell">#</th>
                                        <th>Username</th>
                                        <th class="d-none d-sm-table-cell">Name</th>
                                        <th class="d-none d-sm-table-cell">Role</th>
                                        <th class="d-none d-sm-table-cell">Action</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th><i class='bx bx-info-circle'></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $results = $logs->get_user_logs();

                                    $cnt = 1;
                                    if (count($results) > 0) {
                                        foreach ($results as $result) {
                                    ?>
                                            <tr class="">
                                                <td class="text-center d-none d-sm-table-cell">
                                                    <?php echo htmlentities($result->log_id); ?>
                                                </td>

                                                <td>
                                                    <?php echo htmlentities($result->username); ?>
                                                </td>

                                                <td class="d-none d-sm-table-cell">
                                                    <?php echo htmlentities($result->name); ?>
                                                </td>

                                                <td class="d-none d-sm-table-cell">
                                                    <?php echo htmlentities($result->role); ?>
                                                </td>

                                                <td class="d-none d-sm-table-cell">
                                                    <?php echo htmlentities($result->action); ?>
                                                </td>

                                                <td>
                                                    <?php echo htmlentities($result->log_date); ?>
                                                </td>
                                                <td>
                                                    <?php echo htmlentities($result->log_time); ?>
                                                </td>
                                                <td>
                                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#logDetails<?php echo $cnt ?>" title="Account Details (<?php echo $result->firstName ?>)">
                                                        <i class='bx bx-info-circle'></i></button>


                                                    <div class="modal modal-lg fade" id="logDetails<?php echo $cnt ?>" tabindex="-1" aria-labelledby="label" data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="labelEdit">System Log Details</h5>
                                                                    <button type="button" id="headClose<?php echo $cnt ?>" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form method="post" id="registration-form<?php echo $cnt ?>">
                                                                        <div class="row pt-2">
                                                                            <div class="form-group col-md-3">
                                                                                <label for="action_id" class="label small px-1">Log ID</label>
                                                                                <input type="text" class="form-control" id="action_id<?php echo $cnt ?>" name="log_id" value="<?php echo $result->log_id; ?>" required readonly disabled>
                                                                            </div>
                                                                                <div class="form-group col-md-9">
                                                                                <label for="action" class="label small px-1">Action</label>
                                                                                <input type="text" class="form-control" id="action<?php echo $cnt ?>" name="action" value="<?php echo $result->action ?>" required readonly disabled>
                                                                            </div>
                                                                        </div>
                                                                        
                                                                        <div class="row pt-2">
                                                                            <div class="form-group col">
                                                                                <label for="date" class="label small px-1">Date</label>
                                                                                <input type="text" class="form-control" id="date<?php echo $cnt ?>" name="date" value="<?php echo $result->log_date ?>" required readonly disabled>
                                                                            </div>
                                                                            <div class="form-group col">
                                                                                <label for="time" class="label small px-1">Time</label>
                                                                                <input type="text" class="form-control" id="time<?php echo $cnt ?>" name="time" value="<?php echo $result->log_time ?>" required readonly disabled>
                                                                            </div>
                                                                        </div>
                                                                        <hr>
                                                                        <div class="row pt-2 pb-3">
                                                                            <div class="form-group col-md-6">
                                                                                <label for="user_id" class="label small px-1">User ID</label>
                                                                                <input type="user_id" class="form-control" id="user_id<?php echo $cnt ?>" name="username" value="<?php echo $result->user_id ?>" required readonly disabled>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="name" class="label small px-1">Name</label>
                                                                                <input type="text" class="form-control" id="name<?php echo $cnt ?>" name="name" value="<?php echo $result->name ?>" required readonly disabled>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="mobile" class="label small px-1">Username</label>
                                                                                <input type="text" class="form-control" id="mobile<?php echo $cnt ?>" name="mobile" value="<?php echo $result->username ?>" required readonly disabled>
                                                                            </div>
                                                                            <div class="form-group col-md-6">
                                                                                <label for="role" class="label small px-1">Role</label>
                                                                                <input type="text" class="form-control" id="role<?php echo $cnt ?>" name="role" value="<?php echo $result->role ?>" required readonly disabled>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="button" id="footClose<?php echo $cnt ?>" class="btn btn-dark" data-bs-dismiss="modal">Close</button>
                                                                        </div>

                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                    <?php
                                            $cnt++;
                                        }
                                    }
                                    ?>
                                </tbody>
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
    
</script>

</html>