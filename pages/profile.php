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
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                            <span class="navbar-brand text-uppercase" href="#">Profile</span>
                        </div>
                        <ul class="navbar-nav mb-2 mb-lg-0 text-center">
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page"
                                    href="/langgamtrading/pages/profile.php">Profile</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link active" aria-current="page" id="logout"
                                    href="/langgamtrading/includes/logout.php">Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="dashboard-content px-3 pt-4">
                
                <?php 
                    $result = $store -> getID();
                ?>
                <div class="container pt-4">
                    <div class="row d-flex pt-4 justify-content-end">
                        <div class="col-lg-7 pt-4">
                            <div class="card p-3" style="border-radius: 1rem;">
                                <div class="card-body">
                                    <h3 class="card-title text-center">General Information</h3>
                                    <form method="post" id="registration-form">
                                        <div class="pt-3" id="alerts"></div>
                                        <div class="form-group row justify-content-center">
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="firstName" name="firstName"
                                                    value="<?php echo $result[0]-> firstName ?>" placeholder="First Name" required>   
                                            </div>
                                            <div class="form-group col-md-6">
                                                <input type="text" class="form-control" id="lastName" name="lastName"
                                                    value="<?php echo $result[0]-> lastName ?>" placeholder="Last Name"required>
                                            </div>
                                        </div>
                                        <div class="form-group pt-2">
                                            <input type="text" class="form-control" id="username" name="username"
                                                minlength="6" value="<?php echo $result[0]-> username ?>" placeholder="Username" required>
                                            <span id="username-message"></span>
                                        </div>
                                        
                                        <div class="form-group pt-2">
                                            <input type="tel" class="form-control" id="mobile" name="mobile"
                                                pattern="0\d{10}" placeholder="Mobile Number" 
                                                value="<?php echo $result[0]-> mobile ?>" required>
                                            <span id="mobile-message"></span>
                                        </div>
                                        <div class="form-group pt-2">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Email Address" value="<?php echo $result[0]-> email ?>" required>
                                            <span id="email-message"></span>
                                        </div>
                                        <div class="form-group pt-2">
                                            <textarea class="form-control" id="address" name="address"
                                                placeholder="Address" required><?php echo $result[0]-> address ?></textarea>
                                        </div>
                                        <div class="form-group pt-2">
                                            <select class="form-control" id="role" name="role" required>
                                                <option value=""><?php echo $result[0]-> role ?></option>
                                                <option value="Employee">Employee</option>
                                                <option value="Administrator">Administrator</option>
                                            </select>
                                        </div>
                                        <div class="text-center pt-3">
                                            <button name="add" type="submit" class="btn btn-primary"
                                                style="width: 200px;">Update My Account</button>
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