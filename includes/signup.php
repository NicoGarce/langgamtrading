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
        <form method="post" id="registration-form">
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
            <span id="confirm-message"></span>
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
          <button name="add" type="submit" class="btn btn-primary">Sign Up</button>
        </form>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Get the input fields and message span elements
      const usernameInput = document.getElementById('username');
      const usernameMessage = document.getElementById('username-message');

      const emailInput = document.getElementById('email');
      const emailMessage = document.getElementById('email-message');

      const mobileInput = document.getElementById('mobile');
      const mobileMessage = document.getElementById('mobile-message');

      const registrationForm = document.getElementById('registration-form');

      const passwordInput = document.getElementById('password');
      const confirmInput = document.getElementById('confirm');
      const confirmMessage = document.getElementById('confirm-message');

      async function checkConfirmation(endpoint, data) {
        return new Promise((resolve, reject) => {
          const xhr = new XMLHttpRequest();
          xhr.open('POST', endpoint, true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = () => {
            if (xhr.status === 200) {
              const response = xhr.responseText;
              resolve(response);
            } else {
              reject(xhr.statusText);
            }
          };
          xhr.onerror = () => reject(xhr.statusText);
          xhr.send(data);
        });
      }
      // Define a function to send the AJAX request to check availability
      async function checkAvailability(endpoint, data, messageElement) {
        return new Promise((resolve, reject) => {
          const xhr = new XMLHttpRequest();
          xhr.open('POST', endpoint, true);
          xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
          xhr.onload = () => {
            if (xhr.status === 200) {
              // Get the response from the server
              const response = xhr.responseText;

              // Show the message of input value availability
              messageElement.innerHTML = response;

              // Resolve the Promise with the availability status
              resolve(response === 'Available');
            } else {
              // Reject the Promise with the error message
              reject(xhr.statusText);
            }
          };
          xhr.onerror = () => reject(xhr.statusText);
          xhr.send(data);
        });
      }

      // Add event listener to the registration form submit button
      // Add event listener to the registration form submit button
      registrationForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Get the values of the input fields
        const username = usernameInput.value.trim();
        const email = emailInput.value.trim();
        const mobile = mobileInput.value.trim();
        const password = passwordInput.value.trim();
        const confirm = confirmInput.value.trim();

        // Check if the password and confirm password fields match
        if (password !== confirm) {
          // Display SweetAlert message if passwords do not match
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Passwords do not match.',
          });
        } else {
          // Send AJAX requests to check the availability of each attribute
          const isUsernameAvailable = await checkAvailability('/langgamtrading/includes/check_username.php', `username=${username}`, usernameMessage);
          const isEmailAvailable = await checkAvailability('/langgamtrading/includes/check_email.php', `email=${email}`, emailMessage);
          const isMobileAvailable = await checkAvailability('/langgamtrading/includes/check_mobile.php', `mobile=${mobile}`, mobileMessage);

          // If any of the attributes is not available, display a SweetAlert message
          if (!isUsernameAvailable || !isEmailAvailable || !isMobileAvailable) {
            Swal.fire({
              icon: 'error',
              title: 'Oops...',
              text: 'Some attributes are already in use.',
            });
          } else {
            // If all attributes are available and passwords match, submit the form
            registrationForm.submit();
          }
        }
      });


      // Add event listener to the input fields for live checking
      usernameInput.addEventListener('input', async () => {
        const username = usernameInput.value.trim();
        if (username.length >= 3) {
          await checkAvailability('/langgamtrading/includes/check_username.php', `username=${username}`, usernameMessage);
        } else {
          usernameMessage.innerHTML = '';
        }
      });

      emailInput.addEventListener('input', async () => {
        const email = emailInput.value.trim();
        if (email.length >= 3) {
          await checkAvailability('/langgamtrading/includes/check_email.php', `email=${email}`, emailMessage);
        } else {
          emailMessage.innerHTML = '';
        }
      });

      mobileInput.addEventListener('input', async () => {
        const mobile = mobileInput.value.trim();
        if (mobile.length >= 3) {
          await checkAvailability('/langgamtrading/includes/check_mobile.php', `mobile=${mobile}`, mobileMessage);
        } else {
          mobileMessage.innerHTML = '';
        }
      });

      confirmInput.addEventListener('input', async () => {
        const password = passwordInput.value.trim();
        const confirm = confirmInput.value.trim();

        if (confirm !== '') {
          const response = await checkConfirmation('/langgamtrading/includes/check_confirmation.php', `password=${password}&confirm=${confirm}`);
          confirmMessage.innerHTML = response;
        } else {
          confirmMessage.innerHTML = '';
        }
      });

    });
  </script>


  <?php $store->add_user() ?>
</body>

</html>