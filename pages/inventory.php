<?php
require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');

$store->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    print_r('user');
    header('Location: /langgamtrading/index.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory | Langgam Trading</title>
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
                            <a class="navbar-brand text-uppercase" href="#">Inventory</a>
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
                <h2>Inventory</h2>
                <p>This is the Inventory Page</p>
                
                <div class="row px-5">
                    <div class = "card p-2 col-sm-8">
                        <div class="d-flex align-items-center p-1 justify-content-center">
                            <span class="h3 mb-0">Add Product</span>
                        </div>
                        <div class ="card-body row">
                            <div class="">
                                <input type="text" class="form-control" id="pname" name="pname" placeholder="Product Name" required>
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <input type="text" class="form-control" id="qty" name="qty" placeholder="Quantity" required>
                                
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <input type="text" class="form-control" id="price" name="price" placeholder="Price" required>
                                
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <input type="text" class="form-control" id="category" name="category" placeholder="Category" required>
                                
                            </div>
                            <div class="form-group col-md-6 pt-3">
                                <select class="form-control" id="supplier" name="supplier" required>
                                    <option value="">Select Supplier</option>
                                    
                                </select>
                            </div>
                            <div class="form-group pt-3">
                                <button class="btn btn-dark w-100 ">Add Item</button>
                            </div>
                        </div>
                    </div>
                    <div class ="col-sm-4">
                        <input type="text" class="form-control" id="description" name="description"
                        placeholder="Description" required>
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

</script>

</html>