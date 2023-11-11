<?php

require_once('storeclass.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/custom.css">
    <link rel="stylesheet" href="../css/main.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <title>Sign Up | Langgam Trading</title>
</head>

<body style="background-color: lightgray;">
    <div class="pt-1 m-2 pb-5">
        <?php include('header.php'); ?>
    </div>
    <div class="container p-lg-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-6">
                <div class="card p-3" style="border-radius: 1rem;">
                    <div class="card-body">
                        <h2 class="card-title text-center font">Choose Branch</h2>
                        <form method="post" id="registration-form">

                            <div class="form-group pt-4 font">
                                <select class="form-control" id="branch" name="branch" required>
                                    <option value="" disabled selected class="text-center">Select Branch</option>
                                    <option value="branch1" class="text-center">Langgam Trading</option>
                                    <option value="branch2" class="text-center">NOAC Materials Trading Corp.</option>
                                    <option value="branch3" class="text-center">Branch 3</option>
                                </select>
                            </div>
                            <div class="text-center pt-4">
                                <button name="add" id="proceed" type="button" class="btn btn-primary rounded-3" title="Proceed"><i class='bx bx-chevron-right' style="font-size: 30px;"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Get references to the select element and button
        const branch = document.getElementById('branch');
        const proceed = document.getElementById('proceed');

        // Add a click event listener to the button
        proceed.addEventListener('click', () => {
            // Get the selected option's value
            const selectedBranch = branch.value;

            // Define URLs based on the selected option
            let redirectUrl;

            switch (selectedBranch) {
                case 'branch1':
                    redirectUrl = '../branch1/includes/signup.php';
                    break;
                case 'branch2':
                    redirectUrl = '../branch2/includes/signup.php';
                    break;
                case 'branch3':
                    redirectUrl = '../branch3/includes/signup.php';
                    break;
                default:
                    return;
            }

            // Redirect the user to the selected URL
            window.location.href = redirectUrl;
        });
    </script>
</body>

</html>