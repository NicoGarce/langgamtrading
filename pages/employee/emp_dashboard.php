<?php

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Dashboard</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/langgamtrading/css/main.css">
    <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Langgam Trading</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Sales</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Inventory</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Settings</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/langgamtrading/includes/logout.php">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

    <div class="container my-4">
        <h1 class="text-center">Welcome to the Sales and Inventory Management Dashboard</h1>
        <p class="text-center">This is your dashboard where you can manage your sales and inventory.</p>
        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Sales Report</h2>
                        <p class="card-text">View your sales report by date range.</p>
                        <a href="#" class="btn btn-primary">View Sales Report</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card h-100">
                    <div class="card-body">
                        <h2 class="card-title">Inventory Management</h2>
                        <p class="card-text">Manage your inventory, including adding, editing, and deleting products.</p>
                        <a href="#" class="btn btn-primary">Manage Inventory</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
