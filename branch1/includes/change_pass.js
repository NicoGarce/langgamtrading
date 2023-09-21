//Change Password
document.addEventListener('DOMContentLoaded', () => {
    const registrationForm = document.getElementById('registration-form');
    const oldPasswordInput = document.getElementById('old-pass');
    const oldPasswordMessage = document.getElementById('old-pass-msg');

    const newPasswordInput = document.getElementById('new-pass');
    const confirmNew = document.getElementById('confirm-new');
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
    async function checkOldPassword(endpoint, data, messageElement) {
        return new Promise((resolve, reject) => {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', endpoint, true);
            xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            xhr.onload = () => {
                if (xhr.status === 200) {
                    const response = xhr.responseText;
                    messageElement.innerHTML = response;
                    resolve(response.includes('Confirmed'));
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
        const oldPassword = oldPasswordInput.value.trim();

    });

    oldPasswordInput.addEventListener('blur', async () => {
        const oldPassword = oldPasswordInput.value.trim();

        if (oldPassword !== '') {
            const response = await checkOldPassword('/langgamtrading/branch1/includes/check_old_pass.php', `old-pass=${oldPassword}`, oldPasswordMessage);
            if (response === true) {
                newPasswordInput.removeAttribute('disabled');
                confirmNew.removeAttribute('disabled');
                newPasswordInput.classList.add('fade-in');
                confirmNew.classList.add('fade-in');

                setTimeout(() => {
                    newPasswordInput.classList.remove('fade-in');
                    confirmNew.classList.remove('fade-in');
                }, 500);
            
            }
        } else {
            oldPasswordMessage.innerHTML = '';
        }
    });
    const headCloseButton = document.getElementById('headClose');
    headCloseButton.addEventListener('click', resetForm);

    // Function to reset the form
    function resetForm() {
        // Reset the form when a "Close" button is clicked
        document.getElementById('registration-form').reset();
        newPasswordInput.setAttribute('disabled',null);
        confirmNew.setAttribute('disabled',null);
        oldPasswordMessage.textContent = '';
    }
});