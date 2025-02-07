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
            const isUsernameAvailable = await checkAvailability('/langgamtrading/branch1/includes/check_username.php', `username=${username}`, usernameMessage);
            const isEmailAvailable = await checkAvailability('/langgamtrading/branch1/includes/check_email.php', `email=${email}`, emailMessage);
            //console.log(isUsernameAvailable,isEmailAvailable,isMobileAvailable);
            // If any of the attributes is not available, display a SweetAlert message
            if (!isUsernameAvailable || !isEmailAvailable) {
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
                
                const response = await fetch('/langgamtrading/branch1/includes/addToDb.php', {
                    method: 'POST',
                    body: formData

                });

                if (response.ok) {
                    const data = await response.json();
                    // Display success message if user was added successfully
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: 'Sign-Up Successful',
                        showConfirmButton: false,
                        timer: 2000,
                        showClass: {
                            popup: 'swal2-show'
                        }
                    }).then(() => {
                        // Reset form after success message is closed
                        document.getElementById('registration-form').reset();
                        usernameMessage.textContent = '';
                        emailMessage.textContent = '';
                        confirmMessage.textContent = '';
                        location.reload();
                        window.location.href = '../../index.php';
                    });

                } else {
                    // Display error message if user was not added
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Error: Unable to register account.',
                        showConfirmButton: false,
                        timer: 2000,
                        showClass: {
                            popup: 'swal2-show'
                        }
                    });
                }
            }
        }
    });

    mobileInput.addEventListener('input', function() {
        // Remove any non-numeric characters from the input
        this.value = this.value.replace(/\D/g, '');
    });


    // Add event listener to the input fields for live checking
    usernameInput.addEventListener('input', async () => {
        const username = usernameInput.value.trim();
        if (username.length >= 3) {
            await checkAvailability('/langgamtrading/branch1/includes/check_username.php', `username=${username}`, usernameMessage);
        } else {
            usernameMessage.innerHTML = '';
        }
    });

    emailInput.addEventListener('input', async () => {
        const email = emailInput.value.trim();
        if (email.length >= 3) {
            await checkAvailability('/langgamtrading/branch1/includes/check_email.php', `email=${email}`, emailMessage);
        } else {
            emailMessage.innerHTML = '';
        }
    });

    confirmInput.addEventListener('input', async () => {
        const password = passwordInput.value.trim();
        const confirm = confirmInput.value.trim();

        if (confirm !== '') {
            const response = await checkConfirmation('/langgamtrading/branch1/includes/check_confirmation.php', `password=${password}&confirm=${confirm}`);
            confirmMessage.innerHTML = response;
        } else {
            confirmMessage.innerHTML = '';
        }
    });
});