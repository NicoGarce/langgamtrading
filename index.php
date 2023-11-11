<?php
    require_once('includes/login_function.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="css/main.css">
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Langgam Trading</title>
    <link rel="icon" href="assets/icon.png" type="image/png">

    <style>
    .card-bg {
        background: url('assets/BG1.png') no-repeat center center;
        background-size: cover;
    }
    </style>
</head>


    <div class="pt-1">
        <?php include('./includes/login.php');  ?>
    </div>

    

</html>