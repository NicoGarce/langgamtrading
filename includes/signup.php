<?php

require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');
include('header.php');


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
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2 class="pt-4">Sign Up</h2>
      <form method="post">  
        <div class="form-row">
          <div class="form-group col-md-6">
            <label for="firstName">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" required>
          </div>
          <div class="form-group col-md-6">
            <label for="lastName">Last Name:</label>
            <input type="text" class="form-control" id="lastName" name="lastName" required>
          </div>
        </div>
        <div class="form-group">
          <label for="username">Username:</label>
          <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
          <label for="password">Password:</label>
          <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
          <label for="confirm">Confirm Password:</label>
          <input type="password" class="form-control" id="confirm" name="confirm" required>
        </div>
        <div class="form-group">
          <label for="mobile">Mobile No.:</label>
          <input type="tel" class="form-control" id="mobile" name="mobile" required>
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="address">Address:</label>
          <textarea class="form-control" id="address" name="address" required></textarea>
        </div>
        <div class="form-group">
          <label for="role">Role:</label>
          <select class="form-control" id="role" name="role" required>
            <option value="">--Select Role--</option>
            <option value="Employee">Employee</option>
            <option value="Administrator">Administrator</option>
          </select>
        </div>
        <button name="add" type="submit" class="btn btn-primary">Register</button>
      </form>
    </div>
  </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php $store->add_user()?>
</body>
</html>