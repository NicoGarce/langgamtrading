<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: /langgamtrading/index.php');
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
    <link rel="stylesheet" href="/langgamtrading/css/sidebar.css">
    <link rel="stylesheet" href="/langgamtrading/css/navbar.css">
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
                include("C:/xampp/htdocs/langgamtrading/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("C:/xampp/htdocs/langgamtrading/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../includes/navbar.php')?>

            <div class="dashboard-content px-3">

                <?php
                    $result = $store->getID();
                ?>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-3 col-md-4 pb-3">
                            <div class="card" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <h5 class="card-title">Profile Photo</h5>
                                    <div class="container pt-3">
                                        <div class="d-flex justify-content-center position-relative">
                                            <div class="photo-container" data-bs-toggle="modal" data-bs-target=#upload>
                                                <img src="<?php echo (!empty($result[0]->photo)) ? '' . $result[0]->photo : '../assets/user_upload/default.png' ?>" alt="photo" class="img-fluid rounded-circle" width="150px" height="150px">
                                                <span class="overlay">
                                                    <i class='bx bx-image-add text-light'></i>
                                                </span>
                                            </div>
                                        </div>

                                        <?php include('modals/upload_image.php'); ?>
                                    </div>
                                </div>

                            </div>
                            
                        </div>

                        <div class="col-lg-8 col-md-8">
                            <div class="card p-3" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <h3 class="card-title text-center">General Information</h3>
                                    <form method="post" id="registration-form">
                                        <div class="pt-3" id="alerts"></div>
                                        <div class="form-group row justify-content-center">
                                            <div class="form-group col-md-6 pt-2">
                                                <label for="role" class="mx-1 small">First</label>
                                                <input type="text" class="form-control" id="firstName" name="firstName"
                                                    value="<?php echo $result[0]->firstName ?>" placeholder="First Name"
                                                    required>
                                            </div>
                                            <div class="form-group col-md-6 pt-2">
                                                <label for="role" class="mx-1 small">Last</label>
                                                <input type="text" class="form-control" id="lastName" name="lastName"
                                                    value="<?php echo $result[0]->lastName ?>" placeholder="Last Name"
                                                    required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="form-group pt-2 col-md-6">
                                                <label for="role" class="mx-1 small">Username</label>
                                                <input type="text" class="form-control" id="username" name="username"
                                                    minlength="6" value="<?php echo $result[0]->username ?>"
                                                    placeholder="Username" required>
                                                <span id="username-message"></span>
                                            </div>

                                            <div class="form-group pt-2 col-md-6">
                                                <label for="role" class="mx-1 small">Mobile Number</label>
                                                <input type="tel" class="form-control" id="mobile" name="mobile"
                                                    pattern="0\d{10}" placeholder="Mobile Number"
                                                    value="<?php echo $result[0]->mobile ?>" required>
                                                <span id="mobile-message"></span>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group pt-2">
                                            <label for="role" class="mx-1 small">Email</label>
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address" value="<?php echo $result[0]->email ?>"
                                                required>
                                            <span id="email-message"></span>
                                        </div>
                                        <div class="form-group pt-2">
                                            <label for="role" class="mx-1 small">Address</label>
                                            <textarea class="form-control" id="address" name="address"
                                                placeholder="Address"
                                                required><?php echo $result[0]->address ?></textarea>
                                        </div>
                                        <div class="form-group pt-2 pb-4">
                                            <label for="role" class="mx-1 small">Role</label>
                                            <select class="form-control" id="role" name="role" required>
                                                <option value="<?php echo $result[0]->role ?>"><?php echo $result[0]->role ?></option>
                                                <option value="Employee">Employee</option>
                                                <option value="Administrator">Administrator</option>
                                            </select>
                                        </div>

                                        <div class="form-group text-center">
                                            <div class="row justify-content-center">
                                                <div class="form-group p-1 col-md-4">
                                                    <button name="add" type="submit" class="btn btn-dark">Update Account</button>
                                                </div>
                                                <div class="form-group p-1 col-md-4">
                                                    <button name="add" type="submit" class="btn btn-dark">Change Password</button>
                                                </div>
                                            </div>
                                            
                                        </div>


                                    </form>
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

    $(document).ready(function () {
        var currentUrl = "<?php echo $current_page; ?>";
        if (currentUrl.includes('/profile.php')) {
            $('.nav-link[href="/langgamtrading/pages/profile.php"]').addClass('active');
        }
    });

</script>

</html>