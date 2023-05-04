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
  
    <script>
    document.addEventListener('DOMContentLoaded', () => {
        // Get the input fields and message span elements
        const usernameInput = document.getElementById('username');
        const usernameMessage = document.getElementById('username-message');

        const emailInput = document.getElementById('email');
        const emailMessage = document.getElementById('email-message');

        const mobileInput = document.getElementById('mobile');
        const mobileMessage = document.getElementById('mobile-message');

        // Define a function to send the AJAX request to check availability
        function checkAvailability(endpoint, data, messageElement) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', endpoint, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = () => {
                if (xhr.status === 200) {
                    // Get the response from the server
                    const response = xhr.responseText;

                    // Show the message of input value availability
                    messageElement.innerHTML = response;
                } else {
                    console.error(xhr.statusText);
                }
            };
            xhr.onerror = () => console.error(xhr.statusText);
            xhr.send(data);
        }

        // Add event listeners to the input fields to listen for changes
        usernameInput.addEventListener('input', () => {
            // Get the value of the input field
            const username = usernameInput.value.trim();
            // Send an AJAX request to check the availability of the username
            checkAvailability('/langgamtrading/includes/check_username.php', `username=${username}`, usernameMessage);
        });

        emailInput.addEventListener('input', () => {
            // Get the value of the input field
            const email = emailInput.value.trim();
            // Send an AJAX request to check the availability of the email
            checkAvailability('/langgamtrading/includes/check_email.php', `email=${email}`, emailMessage);
        });

        mobileInput.addEventListener('input', () => {
            // Get the value of the input field
            const mobile = mobileInput.value.trim();
            // Send an AJAX request to check the availability of the mobile number
            checkAvailability('/langgamtrading/includes/check_mobile.php', `mobile=${mobile}`, mobileMessage);
        });
    });
</script>


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
          <span id="username-message"></span>
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
          <span id="mobile-message"></span>
        </div>
        <div class="form-group">
          <label for="email">Email Address:</label>
          <input type="email" class="form-control" id="email" name="email" required>
          <span id="email-message"></span>
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