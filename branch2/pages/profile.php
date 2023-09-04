<?php
require_once('../../branch2/includes/pf_function.php');
require_once('../../branch2/includes/users_function.php');
require_once('../../includes/login_function.php');
$login->login();

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
                include("../../branch2/includes/admin_sidebar.php");
            } else if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
                include("../../branch2/includes/emp_sidebar.php");
            }
            ?>
        </div>
        <div class="content">
            <?php include('../includes/navbar.php')?>

            <div class="dashboard-content px-3">

                <?php
                    $result = $users->getID();
                ?>
                <div class="container">
                    <div class="col-md-9 mx-auto">
                        <div class="card p-3" style="border-radius: 1rem;">
                            <div class="card-body">
                                <h3 class="card-title text-center">General Information</h3>
                                <div class="row">
                                    <div class="col-md-12 mx-auto">
                                        <div class="container pt-3">
                                            <div class="d-flex justify-content-center position-relative">
                                                <div class="photo-container" data-bs-toggle="modal" data-bs-target=#upload title="Upload Photo">
                                                    <img src="<?php echo (!empty($result[0]->photo)) ? '../' . $result[0]->photo : '/langgamtrading/assets/user_upload/default.png' ?>" alt="photo" class="img-fluid border border-2 rounded-circle" width="250px" height="250px">
                                                    <span class="overlay">
                                                        <i class='bx bx-image-add text-light'></i>
                                                    </span>
                                                </div>
                                            </div>

                                            <?php include('modals/upload_image.php'); ?>
                                        </div>
                                    </div>
                                    <div class="col-md-12 pt-2">
                                        
                                        <div class="px-lg-5">
                                            <form method="post" id="registration-form">
                                                <input name="ID" value="<?php echo $result[0]->ID ?>" type="hidden">
                                                <div class="pt-3" id="alerts"></div>
                                                <div class="form-group row justify-content-center">
                                                    <div class="form-group col-md-6">
                                                        <label for="role" class="mx-1 small">First</label>
                                                        <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $result[0]->firstName ?>" placeholder="First Name" required>
                                                    </div>
                                                    <div class="form-group col-md-6">
                                                        <label for="role" class="mx-1 small">Last</label>
                                                        <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $result[0]->lastName ?>" placeholder="Last Name" required>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="form-group pt-2 col-md-6">
                                                        <label for="role" class="mx-1 small">Username</label>
                                                        <input type="text" class="form-control" id="username" name="username" minlength="6" value="<?php echo $result[0]->username ?>" placeholder="Username" required readonly>
                                                        <span id="username-message"></span>
                                                    </div>

                                                    <div class="form-group pt-2 col-md-6">
                                                        <label for="role" class="mx-1 small">Mobile Number</label>
                                                        <input type="tel" class="form-control" id="mobile" name="mobile" pattern="0\d{10}" placeholder="Mobile Number (eg.09123456789)" value="<?php echo $result[0]->mobile ?>" required>
                                                    </div>
                                                </div>

                                                <div class="form-group pt-2">
                                                    <label for="role" class="mx-1 small">Email</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $result[0]->email ?>" required readonly>
                                                    <span id="email-message"></span>
                                                </div>
                                                <div class="form-group pt-2">
                                                    <label for="role" class="mx-1 small">Address</label>
                                                    <textarea class="form-control" id="address" name="address" placeholder="Address" required><?php echo $result[0]->address ?></textarea>
                                                </div>
                                                <div class="form-group pt-2 pb-4">
                                                    <label for="role" class="mx-1 small">Role</label>
                                                    <input type="role" class="form-control" id="role" name="role" placeholder="Role" value="<?php echo $result[0]->role ?>" required readonly>
                                                </div>

                                                <div class="form-group text-center">
                                                    <div class="row justify-content-center">
                                                        <div class="form-group p-1 col-md-4">
                                                            <button name="update" type="submit" id="update" class="btn btn-dark">Update Account</button>
                                                        </div>
                                                        <div class="form-group p-1 col-md-4">
                                                            <button name="add" type="button" class="btn btn-dark">Change Password</button>
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
                </div>
            </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $profile->edit_profile();?>
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

    $(document).ready(function() {
        var currentUrl = "<?php echo $current_page; ?>";
        if (currentUrl.includes('/profile.php')) {
            $('.nav-link[href="/langgamtrading/pages/profile.php"]').addClass('active');
        }
    });

    function checkForChanges() {
        var originalValues = {
            firstName: "<?php echo $result[0]->firstName ?>",
            lastName: "<?php echo $result[0]->lastName ?>",
            mobile: "<?php echo $result[0]->mobile ?>",
            address: "<?php echo $result[0]->address ?>",
        };

        var updatedValues = {
            firstName: $("#firstName").val(),
            lastName: $("#lastName").val(),
            mobile: $("#mobile").val(),
            address: $("#address").val(),
        };

        // Compare the current values with the original values
        var hasChanges = false;
        for (var key in updatedValues) {
            if (updatedValues.hasOwnProperty(key) && updatedValues[key] !== originalValues[key]) {
                hasChanges = true;
                break;
            }
        }

        // Enable or disable the "Update Account" button based on changes
        if (hasChanges) {
            $("#update").prop("disabled", false);
        } else {
            $("#update").prop("disabled", true);
        }
    }

    // Attach the checkForChanges function to input fields' change events
    $("#firstName, #lastName, #mobile, #address").on("change keyup paste", checkForChanges);

    // Initially, disable the "Update Account" button
    $("#update").prop("disabled", true);
</script>

</html>