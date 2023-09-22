<?php
require_once('../../branch1/includes/pf_function.php');
require_once('../../branch1/includes/users_function.php');
require_once('../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: /langgamtrading/index.php');
    exit();
}

if (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/profile.php');
    exit();
} elseif (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: /langgamtrading/branch3/pages/profile.php');
    exit();
}

$current_page = $_SERVER['PHP_SELF'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile | Langgam Trading</title>
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <style>
        .photo-container {
            position: relative;
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            display: none;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            border-radius: 50%;
        }

        .photo-container:hover .overlay {
            display: flex;
        }
    </style>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php if (isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
                include("../../branch1/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../../branch1/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../includes/navbar.php') ?>

            <div class="dashboard-content px-3">

                <?php
                $result = $users->getID();
                ?>
                <div class="container">

                    <div class="col-md-9 mx-auto">
                        <div class="card p-3" style="border-radius: 1rem;">
                            <div class="card-body">
                                <h3 class="card-title text-center">Change Password</h3>
                                <div class="row">
                                    <div class="col-md-12 pt-2">

                                        <div class="px-lg-5">
                                            <form method="post" id="registration-form">
                                                <input id="ID" name="ID" value="<?php echo $result[0]->order_id ?>" type="hidden">

                                                <div class="pt-2 pb-2">
                                                    <input type="password" id="old-pass" name="old-pass" class="form-control" placeholder="Enter Old Password">
                                                    <span id="old-pass-msg"></span>
                                                </div>
                                                <hr>
                                                <div class="pt-2 pb-4">
                                                    <div class="pb-2">
                                                        <input type="password" id="new-pass" name="new-pass" class="form-control" placeholder="Enter New Password" disabled>
                                                    </div>
                                                    <div>
                                                        <input type="password" id="confirm-new" name="confirm-new" class="form-control" placeholder="Confirm New Password" disabled>
                                                        <span id="confirm-message"></span>
                                                    </div>
                                                </div>

                                                <div class="modal-footer">
                                                    <button type="submit" name="change" id="change" class="btn btn-dark" disabled>Change</button>
                                                </div>
                                            </form>
                                        </div>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../branch1/includes/change_pass.js"></script>

</html>