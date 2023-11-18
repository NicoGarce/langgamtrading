<?php
require_once('../../branch1/includes/pf_function.php');
require_once('../../branch1/includes/users_function.php');
require_once('../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: ../../index.php');
    exit();
}

if (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /branch2/pages/profile.php');
    exit();
} elseif (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: /branch3/pages/profile.php');
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
    <link rel="stylesheet" href="../../css/custom.css">
    <link rel="icon" href="../../assets/icon.png" type="image/png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../css/main.css">
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
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

            <div class="dashboard-content">
                <?php
                $result = $users->getID();
                ?>
                <div class="container">

                    <div class="mx-auto container">
                        <div class="card p-2" style="border-radius: 1rem;">
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link active" id="pf-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true">Profile</button>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="sc-tab" data-bs-toggle="tab" data-bs-target="#secure" type="button" role="tab" aria-controls="secure" aria-selected="false">Security</button>
                                    </li>
                                </ul>
                                <div class="tab-content pt-3">
                                    <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="pf-tab">
                                        <h3 class="card-title text-center">General Information</h3>


                                        <div class="col-md-12 pt-2">

                                            <div class="px-lg-5">
                                                <?php include('modals/upload_image.php'); ?>
                                                <form method="post" id="registration-form">
                                                    <input id="uid" name="ID" value="<?php echo $result[0]->ID ?>" type="hidden">
                                                    <div id="alerts"></div>
                                                    <div class="row pb-5">
                                                        <div class="col-12 col-md-12 col-lg-12 col-xl-5 col-sm-12">
                                                            <div class="mx-auto">
                                                                <div class="container pt-3">
                                                                    <div class="d-flex justify-content-center position-relative">
                                                                        <div class="photo-container" data-bs-toggle="modal" data-bs-target=#upload title="Upload Photo">
                                                                            <img src="<?php echo (!empty($result[0]->photo)) ? '../' . $result[0]->photo : '/langgamtrading/assets/user_upload/default.png' ?>" alt="photo" class="img-fluid border border-2 rounded-circle" width="250px" height="250px">
                                                                            <span class="overlay">
                                                                                <i class='bx bx-image-add text-light'></i>
                                                                            </span>
                                                                        </div>
                                                                    </div>


                                                                </div>
                                                            </div>
                                                            <div class="d-flex justify-content-center align-items-center">
                                                                <div class="form-group pt-1">
                                                                    <h6 style="display: flex; align-items: center;">
                                                                        <i class='bx bxs-user-circle mt-1 pe-1'></i> <?php echo $result[0]->username ?> | <?php echo $result[0]->role ?>
                                                                    </h6>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="role" class="mx-1 small">Email</label>
                                                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="<?php echo $result[0]->email ?>" required readonly disabled>
                                                                <span id="email-message"></span>
                                                            </div>
                                                        </div>

                                                        <div class="col-12 col-md-12 col-lg-12 col-xl-1 col-sm-12">
                                                        </div>
                                                        <div class="col-12 col-md-12 col-lg-12 col-xl-6 col-sm-12 pt-5" id="right">

                                                            <div class="row form-group pt-2">
                                                                <div class="col-md-6 form-group">
                                                                    <label for="role" class="mx-1 small">First</label>
                                                                    <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $result[0]->firstName ?>" placeholder="First Name" required>
                                                                </div>
                                                                <div class="col-md-6 form-group">
                                                                    <label for="role" class="mx-1 small">Last</label>
                                                                    <input type="text" class="form-control" id="lastName" name="lastName" value="<?php echo $result[0]->lastName ?>" placeholder="Last Name" required>
                                                                </div>
                                                            </div>
                                                            <div class=" form-group pt-2">
                                                                <label for="role" class="mx-1 small">Mobile Number</label>
                                                                <input type="tel" class="form-control" id="mobile" name="mobile" pattern="0\d{10}" placeholder="Mobile Number (eg.09123456789)" value="<?php echo $result[0]->mobile ?>" required>
                                                            </div>

                                                            <div class="form-group pt-2">
                                                                <label for="role" class="mx-1 small">Address</label>
                                                                <textarea class="form-control" id="address" name="address" placeholder="Address" required><?php echo $result[0]->address ?></textarea>
                                                            </div>
                                                            <hr>
                                                            <div class="form-group modal-footer">

                                                                <div class="form-group p-1">
                                                                    <button name="update" type="submit" id="update" class="btn btn-dark">Update Account</button>
                                                                </div>


                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="secure" role="tabpanel" aria-labelledby="sc-tab">
                                        <h3 class="card-title text-center">Change Password</h3>
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-md-7 pt-2">

                                                <div class="px-lg-5">
                                                    <form method="post" id="change-pass-form">
                                                        <input id="ID" name="ID" value="<?php echo $result[0]->order_id ?>" type="hidden">

                                                        <div class="pt-2 pb-2">
                                                            <input type="password" id="old-pass" name="old-pass" class="form-control" placeholder="Enter Current Password">
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
            </div>
        </div>
    </div>


</body>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="../../branch1/includes/change_pass.js"></script>
<?php $profile->edit_profile(); ?>
<script>
    $('.open-btn').on('click', function() {
        $('.sidebar').addClass('active');
    });
    $('.close-btn').on('click', function() {
        $('.sidebar').removeClass('active');
    });

    $(document).ready(function() {
        var currentUrl = "<?php echo $current_page; ?>";
        if (currentUrl.includes('/profile.php')) {
            $('.nav-link[href="/pages/profile.php"]').addClass('active');
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

    var mobileInput = document.getElementById('mobile');
    mobileInput.addEventListener('input', function() {
        // Remove any non-numeric characters from the input
        this.value = this.value.replace(/\D/g, '');
    });
</script>

</html>