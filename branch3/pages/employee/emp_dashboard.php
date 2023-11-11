<?php
require_once('../../../branch3/includes/users_function.php');
require_once('../../../branch3/includes/dash_function.php');
require_once('../../../branch3/includes/log_function.php');
require_once('../../../branch3/includes/sales_function.php');
require_once('../../../includes/login_function.php');
$login->login();

if(!isset($_SESSION['m_un']) && empty($_SESSION['m_un'])){
    header('Location: /langgamtrading/index.php');
    exit();
}

if(isset($_SESSION['access']) && $_SESSION['access'] == 'Administrator') {
    header('Location: /langgamtrading/branch3/pages/admin/admin_dashboard.php');
    exit();
}

if(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 1') {
    header('Location: /langgamtrading/branch1/pages/employee/emp_dashboard.php');
    exit();
}elseif(isset($_SESSION['branch']) && $_SESSION['branch'] == 'Branch 2') {
    header('Location: /langgamtrading/branch2/pages/employee/emp_dashboard.php');
    exit();
}

$emp_ord_row = $dash->emp_ord_row();

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
    <link rel="stylesheet" href="/langgamtrading/css/custom.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body id="body" class="bg-light">
    <div class="main-container d-flex">
        <div class="sidebar pt-2 pb-3">
            <?php include("../../includes/emp_sidebar.php") ?>
        </div>
        <div class="content">
            <?php include('../../includes/navbar.php') ?>

            <div class="dashboard-content px-3 pt-2">
                <div class="row">
                    <div class="col-lg-9 col-md-7 pb-2">
                        <?php
                        $result = $users->getID();
                        if (!$welcomeMessageDisplayed) {
                            echo '<h3 class="p-2">Welcome ' . $result[0]->firstName . '!</h3>';
                        }
                        ?>
                        <div class="">
                            <?php include('inv_graph.php'); ?>
                        </div>

                        <div class="pt-2">
                            <div class="card rounded-4 p-2">
                                <h6 class="text-center p-2">Top Products</h6>
                                <ul class="nav nav-tabs" id="myTabs" role="tablist">
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
                                                    <div style="max-height: 150px; overflow-y: auto;">
                                                        <table class="table table-striped table-hover">
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
                                    <div class="tab-pane fade" id="month" role="tabpanel" aria-labelledby="monthTab">
                                        <div class="pt-2">
                                            <div>
                                                <div class="card-body">
                                                    <?php $top10Items = $sales->getTop10Month(); ?>
                                                    <div style="max-height: 150px; overflow-y: auto;">
                                                        <table class="table table-striped table-hover">
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

                    </div>
                    <div class="col-lg-3 col-md-12 pt-2 pb-2">
                        <div class="text-center">
                            <div class="card rounded-4">
                                <div class="card-body">
                                    <a class="btn" href="../../../branch1/pages/orders.php">
                                        <h6>Your On Going Orders</h6>
                                        <h1><?php echo $emp_ord_row ?></h1>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="pt-2">
                            <div class="card rounded-4">
                                <div class="card-body">

                                    <h6 class="text-center">Your Logs</h6>
                                    <div style="max-height: 450px; overflow-y: auto;">
                                        <table class="table table-striped table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Action</th>
                                                    <th>Time</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $logs = new Logs();
                                                $emp_log = $logs->get_emp_logs(); // Assuming you call the get_emp_logs function here and retrieve the logs

                                                foreach ($emp_log as $log) {
                                                    echo "<tr>";
                                                    echo "<td>{$log->action}</td>"; // Assuming the column name is "action"
                                                    echo "<td>{$log->log_date} {$log->log_time}</td>"; // Assuming columns are "log_date" and "log_time"
                                                    echo "</tr>";
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