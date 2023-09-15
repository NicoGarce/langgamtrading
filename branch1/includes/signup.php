<?php

require_once('../../includes/storeclass.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/langgamtrading/css/main.css">
  <script src="/langgamtrading/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <title>Sign Up | Langgam Trading</title>
</head>

<body style="background-color: lightgray;">
  <div class="pt-1 m-2">
    <?php include('../../includes/header.php'); ?>
  </div>
  <div class="container p-lg-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-8">
        <div class="card p-3" style="border-radius: 1rem;">
          <div class="card-body">
            <div class="card-title text-center">
              <h2>Sign Up</h2>
              <h6>Langgam Trading</h6>
            </div>
            
            <form method="post" id="registration-form">
              <div class="pt-3" id="alerts"></div>
              <div class="form-group row justify-content-center">
                <div class="form-group col-md-6 pt-2">
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                    required>
                </div>
                <div class="form-group col-md-6 pt-2">
                  <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name"
                    required>
                </div>
              </div>
              <div class="form-group pt-2">
                <input type="text" class="form-control" id="username" name="username" minlength="6"
                  placeholder="Username (minimum 6 characters)" required>
                <span id="username-message"></span>
              </div>
              <div class="form-group pt-2">
                <input type="password" class="form-control" id="password" name="password" minlength="8"
                  placeholder="Password (minimum 8 characters)" required>
              </div>
              <div class="form-group pt-2">
                <input type="password" class="form-control" id="confirm" name="confirm" placeholder="Confirm Password"
                  required>
                <span id="confirm-message"></span>
              </div>
              <div class="form-group pt-2">
                <input type="tel" class="form-control" id="mobile" name="mobile" pattern="0\d{10}"
                  placeholder="Mobile Number" required>
              </div>
              <div class="form-group pt-2">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <span id="email-message"></span>
              </div>
              <div class="form-group pt-2">
                <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
              </div>
              <input type="hidden" class="form-control" id="role" name="role" value="Employee">
              <div class="text-center pt-3">
                <button name="add" type="submit" class="btn btn-primary" style="width: 200px;">Sign Up</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script src="signup_check.js"></script>

</body>

</html>