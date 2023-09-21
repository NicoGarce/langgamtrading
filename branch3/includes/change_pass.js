//Change Password
document.addEventListener("DOMContentLoaded", () => {
  const registrationForm = document.getElementById("registration-form");
  const oldPasswordInput = document.getElementById("old-pass");
  const oldPasswordMessage = document.getElementById("old-pass-msg");

  const newPasswordInput = document.getElementById("new-pass");
  const confirmNew = document.getElementById("confirm-new");
  const confirmMessage = document.getElementById("confirm-message");

  async function checkConfirmation(endpoint, data) {
    return new Promise((resolve, reject) => {
      const xhr = new XMLHttpRequest();
      xhr.open("POST", endpoint, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
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
      xhr.open("POST", endpoint, true);
      xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
      xhr.onload = () => {
        if (xhr.status === 200) {
          const response = xhr.responseText;
          messageElement.innerHTML = response;
          resolve(response.includes("Confirmed"));
        } else {
          reject(xhr.statusText);
        }
      };
      xhr.onerror = () => reject(xhr.statusText);
      xhr.send(data);
    })
      .then((result) => {
        return result;
      })
      .catch((error) => {
        console.error(error);
        return false;
      });
  }

  // Add event listener to the registration form submit button
  registrationForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    const newPassword = newPasswordInput.value.trim();

    const formData = new FormData();
    formData.append("change", "true");
    formData.append("new-pass", newPassword);

    try {
      const response = await fetch(
        "/langgamtrading/branch3/includes/password.php",
        {
          method: "POST",
          body: formData,
        }
      );
      //console.log(await response.text())
      if (response.ok) {
        const data = await response.json();
        // Display success message if user was added successfully
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Password Change Successful",
          showConfirmButton: false,
          timer: 2000,
          showClass: {
            popup: "swal2-show",
          },
        }).then(() => {
          // Reset form after success message is closed
          document.getElementById("registration-form").reset();
          oldPasswordMessage.textContent = "";
          confirmMessage.textContent = "";
          newPasswordInput.setAttribute("disabled", null);
          confirmNew.setAttribute("disabled", null);
          document.getElementById("change").setAttribute("disabled", "true");
          location.reload();
        });
      } else {
        // Display error message if user was not added
        Swal.fire({
          icon: "error",
          title: "Oops...",
          text: "Error: Unable to change password.",
          showConfirmButton: false,
          timer: 2000,
          showClass: {
            popup: "swal2-show",
          },
        });
      }
      const modal = document.getElementById("changePass");
      const modalInstance = bootstrap.Modal.getInstance(modal);
      modalInstance.hide();
    } catch (error) {
      // Handle the JSON parsing error
      console.error("Error parsing JSON:", error);
      // You might want to display an error message to the user here
    }
  });

  oldPasswordInput.addEventListener("blur", async () => {
    const oldPassword = oldPasswordInput.value.trim();

    if (oldPassword !== "") {
      const response = await checkOldPassword(
        "/langgamtrading/branch3/includes/check_old_pass.php",
        `old-pass=${oldPassword}`,
        oldPasswordMessage
      );
      if (response === true) {
        newPasswordInput.removeAttribute("disabled");
        confirmNew.removeAttribute("disabled");
        newPasswordInput.classList.add("fade-in");
        confirmNew.classList.add("fade-in");

        setTimeout(() => {
          newPasswordInput.classList.remove("fade-in");
          confirmNew.classList.remove("fade-in");
        }, 500);
      } else if (response === false) {
        newPasswordInput.setAttribute("disabled", null);
        confirmNew.setAttribute("disabled", null);
        newPasswordInput.classList.add("fade-in");
        confirmNew.classList.add("fade-in");

        setTimeout(() => {
          newPasswordInput.classList.remove("fade-in");
          confirmNew.classList.remove("fade-in");
        }, 500);
      }
    } else {
      newPasswordInput.setAttribute("disabled", null);
      confirmNew.setAttribute("disabled", null);
      newPasswordInput.classList.add("fade-in");
      confirmNew.classList.add("fade-in");

      setTimeout(() => {
        newPasswordInput.classList.remove("fade-in");
        confirmNew.classList.remove("fade-in");
      }, 500);
    }
  });

  confirmNew.addEventListener("input", async () => {
    const newPassword = newPasswordInput.value.trim();
    const confirm = confirmNew.value.trim();

    if (confirm !== "") {
      const response = await checkConfirmation(
        "/langgamtrading/branch3/includes/check_confirmation.php",
        `password=${newPassword}&confirm=${confirm}`
      );
      confirmMessage.innerHTML = response;

      if (response.includes("Password Matched")) {
        document.getElementById("change").removeAttribute("disabled");
      } else {
        document.getElementById("change").setAttribute("disabled", "true");
      }
    } else {
      confirmMessage.innerHTML = "";
    }
  });
  const headCloseButton = document.getElementById("headClose");
  headCloseButton.addEventListener("click", resetForm);

  // Function to reset the form
  function resetForm() {
    // Reset the form when a "Close" button is clicked
    document.getElementById("registration-form").reset();
    newPasswordInput.setAttribute("disabled", null);
    confirmNew.setAttribute("disabled", null);
    document.getElementById("change").setAttribute("disabled", "true");
    oldPasswordMessage.textContent = "";
    confirmMessage.textContent = "";
  }
});
