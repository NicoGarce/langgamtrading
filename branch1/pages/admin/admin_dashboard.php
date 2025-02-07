<?php
require_once('../../../branch1/includes/dash_function.php');
require_once('../../../branch1/includes/users_function.php');
require_once('../../../branch1/includes/sales_function.php');
require_once('../../../branch1/includes/ord_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if (!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])) {
    header('Location: ../../../index.php');
    exit();
}

if (isset($_SESSION['access']) && $_SESSION['access'] == 'Employee') {
    header('Location: /branch1/pages/employee/emp_dashboard.php');
    exit();
}

if (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: ./branch2/pages/admin/admin_dashboard.php');
    exit();
} elseif (isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 3') {
    header('Location: ./branch3/pages/admin/admin_dashboard.php');
    exit();
}


$inv_row = $dash->inv_row();
$sale_row = $dash->sale_row();
$ord_row = $dash->ord_row();
$acc_row = $dash->acc_row();

$topVoid = $orders->getTopVoided();

// Check if the "Welcome" message has been displayed
$welcomeMessageDisplayed = isset($_SESSION['welcome_message_displayed']) && $_SESSION['welcome_message_displayed'];

// Set a session variable to indicate that the message has been displayed
if (!$welcomeMessageDisplayed) {
    $_SESSION['welcome_message_displayed'] = true;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Langgam Trading</title>
    <link rel="icon" href="../../../assets/icon.png" type="image/png">
    <link rel="stylesheet" href="../../../css/custom.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="../../../assets/js/custom.js"></script>
    <link rel="stylesheet" href="../../../css/main.css">
    <script src="../../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php include("../../includes/admin_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php') ?>
            <div class="dashboard-content mx-4">
                <div class="row">
                    <div class="col-lg-9 col-md-7 pb-2">
                        <?php
                        $result = $users->getID();
                        if (!$welcomeMessageDisplayed) {
                            echo '<h3 class="p-2 font">Welcome ' . $result[0]->firstName . '!</h3>';
                        }
                        ?>
                        <div class="row">
                            <div class="col col-lg-6 col-md-12 pt-2">
                                <?php include('sales_graph.php') ?>
                            </div>
                            <div class="col col-lg-6 col-md-12 pt-2">
                                <?php include('sales_per_yr.php') ?>
                            </div>
                            <div class="col col-lg-6 col-md-12 pt-2">
                                <?php include('inv_graph.php'); ?>
                            </div>
                            <div class="col col-lg-6 col-md-12 pt-2">
                                <?php include('donut_graph.php'); ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-12 pt-2 pb-2">
                        <div class="text-center">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <a class="btn font" href="../../../branch1/pages/orders.php">
                                        <h6>On Going Orders</h6>
                                        <h1 class="fw-semibold"><?php echo $ord_row ?></h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="card rounded-4 p-2">
                                <h6 class="text-center p-2 font fw-semibold">Top Products</h6>
                                <ul class="nav nav-tabs font" id="myTabs" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" id="allTimeTab" data-bs-toggle="tab" href="#allTime" role="tab" aria-controls="allTime" aria-selected="true">All Time</a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" id="monthTab" data-bs-toggle="tab" href="#month" role="tab" aria-controls="month" aria-selected="false">Current Month</a>
                                    </li>
                                </ul>

                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="allTime" role="tabpanel" aria-labelledby="allTimeTab">
                                        <div class="pt-2">
                                            <div>
                                                <div class="card-body">
                                                    <?php $top10Items = $sales->getTop10MostBoughtItems(); ?>
                                                    <div style="max-height: 200px; overflow-y: auto;">
                                                        <table class="table table-striped table-hover font">
                                                            <thead>
                                                                <tr style="position: sticky; top: 0; background-color: #f9f9f9;">
                                                                    <th>Product</th>
                                                                    <th>Count</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($top10Items as $productName => $count) : ?>
                                                                    <tr>
                                                                        <td><?php echo $productName; ?></td>
                                                                        <td><?php echo $count; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="monthTab">
                                        <div class="pt-2">
                                            <div>
                                                <div class="card-body">
                                                    <?php $top10Items = $sales->getTop10Month(); ?>
                                                    <div style="max-height: 200px; overflow-y: auto;">
                                                        <table class="table table-striped table-hover font">
                                                            <thead>
                                                                <tr>
                                                                    <th>Product</th>
                                                                    <th>Count</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php foreach ($top10Items as $productName => $count) : ?>
                                                                    <tr>
                                                                        <td><?php echo $productName; ?></td>
                                                                        <td><?php echo $count; ?></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-center pt-2">
                            <div class="card rounded-4" id="slideshow-container">
                                <div class="card-body slide" style="display: block;">
                                    <a class="btn font" href="../../../branch1/pages/voided.php">
                                        <h6>Most Cancelled Item</h6>
                                        <p class="fw-semibold"><?php echo $topVoid['Cancelled'] ?? 'N/A'; ?></p>
                                    </a>
                                </div>

                                <div class="card-body slide" style="display: none;">
                                    <!-- Content for the second slide -->
                                    <a class="btn font" href="../../../branch1/pages/voided.php">
                                        <h6>Most Refunded Item</h6>
                                        <p class="fw-semibold"><?php echo $topVoid['Refunded'] ?? 'N/A'; ?></p>
                                    </a>
                                </div>

                                <div class="card-body slide" style="display: none;">
                                    <!-- Content for the third slide -->
                                    <a class="btn font" href="../../../branch1/pages/voided.php">
                                        <h6>Most Returned Item</h6>
                                        <p class="fw-semibold"><?php echo $topVoid['Returned'] ?? 'N/A'; ?></p>
                                    </a>
                                </div>
                            </div>
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

    document.addEventListener('DOMContentLoaded', function() {
        var currentSlide = 0;
        var slides = document.querySelectorAll('.slide');

        function showSlide(index) {
            slides.forEach(function(slide) {
                slide.style.display = 'none';
                slide.style.opacity = 0;
            });

            slides[index].style.display = 'block';

            // Trigger reflow to apply the transition
            slides[index].offsetHeight;

            // Fade in the current slide
            slides[index].style.opacity = 1;
        }

        function nextSlide() {
            currentSlide = (currentSlide + 1) % slides.length;
            showSlide(currentSlide);
        }

        // Set the interval to switch slides (in milliseconds)
        var interval = 5000; // Change this value as needed

        // Start the slideshow
        var slideshowInterval = setInterval(nextSlide, interval);
    });
</script>

</html>