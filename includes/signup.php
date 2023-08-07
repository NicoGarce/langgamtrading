<?php

require_once('C:\xampp\htdocs\langgamtrading\includes\storeclass.php');


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
    <?php include('header.php'); ?>
  </div>
  <div class="container p-lg-5">
    <div class="row d-flex justify-content-center">
      <div class="col-md-5">
        <div class="card p-3" style="border-radius: 1rem;">
          <div class="card-body">
            <h2 class="card-title text-center">Sign Up</h2>
            <form method="post" id="registration-form">
              <div class="pt-3" id="alerts"></div>
              <div class="form-group row justify-content-center">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name"
                    required>
                </div>
                <div class="form-group col-md-6">
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
                <span id="mobile-message"></span>
              </div>
              <div class="form-group pt-2">
                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" required>
                <span id="email-message"></span>
              </div>
              <div class="form-group pt-2">
                <textarea class="form-control" id="address" name="address" placeholder="Address" required></textarea>
              </div>
              <div class="form-group pt-2">
                <select class="form-control" id="role" name="role" required>
                  <option value="">Select Role</option>
                  <option value="Employee">Employee</option>
                  <option value="Administrator">Administrator</option>
                </select>
              </div>

              <div class="form-group pt-2">
                <select class="form-control" id="branch" name="branch" required>
                  <option value="">Select Branch</option>
                  <option value="1">Langgam Trading</option>
                  <option value="2">NOAC Materials Trading Corp.</option>   
                  <option value="3">Branch 3</option>
                </select>
              </div>
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

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      // Get the input fields and message span elements
      const firstNameInput = document.getElementById('firstName');
      const lastNameInput = document.getElementById('lastName');
      const addressInput = document.getElementById('address');
      const roleInput = document.getElementById('role');

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

      const alertsContainer = document.getElementById('alerts');

      // Function to create and display a Bootstrap alert
      function showAlert(type, message) {
        const alertDiv = document.createElement('div');
        alertDiv.className = `alert alert-${type} alert-dismissible fade show`;
        alertDiv.role = 'alert';
        alertDiv.style = 'padding: 0.5rem 1rem; font-size: 0.875rem;';
        alertDiv.innerHTML = `
          ${message}
          <button type="button" class="btn-close" style="padding: 0.7rem 1rem;" data-bs-dismiss="alert" aria-label="Close"></button>
        `;
        alertsContainer.appendChild(alertDiv);
      }

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
              const response = xhr.responseText;
              messageElement.innerHTML = response;
              resolve(response.includes('Available'));
            } else {
              reject(xhr.statusText);
            }
          };
          xhr.onerror = () => reject(xhr.statusText);
          xhr.send(data);
        })
          .then(result => {
            return result;
          })
          .catch(error => {
            console.error(error);
            return false;
          });
      }


      // Add event listener to the registration form submit button
      registrationForm.addEventListener('submit', async (event) => {
        event.preventDefault();

        // Get the values of the input fields
        const firstName = firstNameInput.value.trim();
        const lastName = lastNameInput.value.trim();
        const username = usernameInput.value.trim();
        const email = emailInput.value.trim();
        const mobile = mobileInput.value.trim();
        const password = passwordInput.value.trim();
        const confirm = confirmInput.value.trim();
        const address = addressInput.value.trim();
        const role = roleInput.value.trim();

        // Check if the password and confirm password fields match
        if (password !== confirm) {
          // Display SweetAlert message if passwords do not match
          showAlert('danger', 'Passwords do not match.');
        } else {
          // Send AJAX requests to check the availability of each attribute
          const isUsernameAvailable = await checkAvailability('/langgamtrading/includes/check_username.php', `username=${username}`, usernameMessage);
          const isEmailAvailable = await checkAvailability('/langgamtrading/includes/check_email.php', `email=${email}`, emailMessage);
          const isMobileAvailable = await checkAvailability('/langgamtrading/includes/check_mobile.php', `mobile=${mobile}`, mobileMessage);

          // If any of the attributes is not available, display a SweetAlert message
          if (!isUsernameAvailable || !isEmailAvailable || !isMobileAvailable) {
            showAlert('danger', 'Some attributes are already in use.');
          } else {
            // If all attributes are available and passwords match, submit the form
            // Send AJAX request to add the user to the database
            const formData = new FormData();
            formData.append('add', 'true');
            formData.append('firstName', firstName);
            formData.append('lastName', lastName);
            formData.append('username', username);
            formData.append('password', password);
            formData.append('mobile', mobile);
            formData.append('email', email);
            formData.append('address', address);
            formData.append('role', role);

            const response = await fetch('/langgamtrading/includes/addToDb.php', {
              method: 'POST',
              body: formData

            });

            if (response.ok) {
              const data = await response.json();
              // Display success message if user was added successfully
              Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'User added successfully.',
                confirmButtonColor: '#3085d6',
                customClass: {
                  confirmButton: '#3085d6',
                }
              }).then(() => {
                // Reset form after success message is closed
                document.getElementById('registration-form').reset();
                usernameMessage.textContent = '';
                emailMessage.textContent = '';
                mobileMessage.textContent = '';
                confirmMessage.textContent = '';

                //window.location.href = 'index.php';
              });

            } else {
              // Display error message if user was not added
              Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'Error: Unable to add user.',
                confirmButtonColor: '#3085d6',
                customClass: {
                  confirmButton: '#3085d6',
                }
              });
            }
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



</body>

</html>