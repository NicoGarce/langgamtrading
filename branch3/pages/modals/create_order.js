const orderList = [];

document.addEventListener("DOMContentLoaded", () => {
  const orderTypeSelect = document.getElementById("order_type");
  const shippingDetailsContainer = document.createElement("div");
  shippingDetailsContainer.className = "form-group pt-2";
  shippingDetailsContainer.innerHTML = `
        <textarea class="form-control" id="shipping_details" name="shipping_details" placeholder="Shipping Details" title="Shipping Details"></textarea>
    `;

  orderTypeSelect.addEventListener("change", () => {
    const selectedOption =
      orderTypeSelect.options[orderTypeSelect.selectedIndex].value;
    const form = document.getElementById("registration-form");
    const orderTypeDiv = document
      .querySelector("#order_type")
      .closest(".form-group");

    if (selectedOption === "Delivery") {
      form.insertBefore(shippingDetailsContainer, orderTypeDiv.nextSibling);
    } else {
      if (form.contains(shippingDetailsContainer)) {
        form.removeChild(shippingDetailsContainer);
      }
    }
  });

  const addRowButton = document.getElementById("addRowButton");
  const orderTable = document.getElementById("orderTable");
  let totalCost = 0;

  function updateTotalCost() {
    totalCost = 0;
    const priceInputs = document.querySelectorAll("#price");
    priceInputs.forEach((input) => {
      totalCost += parseFloat(input.value) || 0;
    });

    const totalCostInput = document.getElementById("total_cost");
    totalCostInput.value = totalCost.toFixed(2);
  }

  async function fetchProductOptions() {
    try {
      const response = await fetch("modals/get_inventory.php");
      const products = await response.json();
      const filteredProducts = products.filter(product => product.stock > 0);

      return filteredProducts;
    } catch (error) {
      console.error("Error fetching product options:", error);
    }
  }

  async function createRow() {
    const newRow = document.createElement("tr");
    newRow.className = "fade-in row gx-1";

    const products = await fetchProductOptions();
    newRow.innerHTML = `
            <td class="col-12 col-sm-12 col-lg-6">
                <div class="form-group px-0">
                    <select class="form-control form-control-sm" id="selectProduct" name="selectProduct" required title="Select Product">
                        <option value="">Select Product</option>
                        ${products
                          .map(
                            (product) =>
                              `<option value="${product.product_name}" 
                                data-price="${product.price}" 
                                data-stock="${product.stock}">
                                ${product.product_name}</option>`
                          )
                          .join("")}
                    </select>
                </div>
            </td>
            <td class="col">
                <div class="form-group input-group input-group-sm px-0">
                    <input type="number" class="form-control form-control-sm" id="quantity" name="quantity" placeholder="Qty" required>
                    <span class="input-group-text" id="stockSpan">Stock</span>
                </div>
            </td>
            <td class="col">
                <div class="form-group input-group input-group-sm px-0">
                    <span class="input-group-text">₱</span>
                    <input class="form-control form-control-sm" id="price" name="price" placeholder="Price" readonly>
                </div>
            </td>
            <td class="col-auto">
                <div class="form-group px-0">
                    <button type="button" class="btn btn-danger btn-sm removeRowButton" title="Remove Item"><i class='bx bx-minus'></i></button>
                </div>
            </td>
            <hr>
        `;

    const newInputs = newRow.querySelectorAll("input");
    newInputs.forEach((input) => {
      input.setAttribute("required", "true");
    });

    const chooseProductSelect = newRow.querySelector("#selectProduct");
    const quantityInput = newRow.querySelector("#quantity");
    const priceInput = newRow.querySelector("#price");
    const stockSpan = newRow.querySelector("#stockSpan");

    chooseProductSelect.addEventListener("change", () => {
      const selectedOption =
        chooseProductSelect.options[chooseProductSelect.selectedIndex];
      const selectedPrice = selectedOption.getAttribute("data-price");
      priceInput.value = selectedPrice;

      quantityInput.value = 1;

      const initialTotalPrice = selectedPrice * 1;
      priceInput.value = initialTotalPrice.toFixed(2);

      const selectedProduct = products.find(
        (product) => product.product_name === selectedOption.value
      );
      if (selectedProduct) {
        stockSpan.textContent = `/ ${selectedProduct.stock}`;
      } else {
        stockSpan.textContent = ""; 
      }

      updateTotalCost();
    });

    quantityInput.addEventListener("input", () => {
      const selectedOption =
        chooseProductSelect.options[chooseProductSelect.selectedIndex];
      const selectedPrice = selectedOption.getAttribute("data-price");
      const stock = selectedOption.getAttribute("data-stock"); 
      let quantity = parseFloat(quantityInput.value);

      // Prevent entering 0
      if (!isNaN(quantity) && quantity <= 0) {
        quantityInput.value = 1;
        quantity = 1;
      }

      const totalPrice = selectedPrice * quantity;
      priceInput.value = totalPrice.toFixed(2);

      // Set price to default when quantity is empty
      if (isNaN(quantity) || quantity === "") {
        priceInput.value = "0.00";
      } else if (!isNaN(quantity) && quantity > stock){
        quantityInput.value = stock;
        quantity = stock;
      }

      updateTotalCost();
    });

    orderTable.appendChild(newRow);

    void newRow.offsetWidth;

    setTimeout(() => {
      newRow.style.opacity = "1";
    }, 10);

    const removeRowButton = newRow.querySelector(".removeRowButton");
    removeRowButton.addEventListener("click", () => {
      orderTable.removeChild(newRow);

      updateTotalCost();
    });
  }

  const registrationForm = document.getElementById("registration-form");

  const customerNameInput = document.getElementById("customer_name");
  const contactInfoInput = document.getElementById("contact_info");
  const orderTypeInput = document.getElementById("order_type");
  const payMethodInput = document.getElementById("pay_method");
  const totalCostInput = document.getElementById("total_cost");
  const orderStatusSelect = document.getElementById("order_status");
  const paymentStatusSelect = document.getElementById("pay_status");

  orderStatusSelect.addEventListener("change", () => {
    if (orderStatusSelect.value === "Complete") {
      paymentStatusSelect.value = "Paid";
    }
  });
  registrationForm.addEventListener("submit", async (event) => {
    event.preventDefault();

    orderList.length = 0;

    const rows = orderTable.querySelectorAll("tr.fade-in.row.gx-1");

    rows.forEach((row) => {
      const chooseProductSelect = row.querySelector("#selectProduct");
      const quantityInput = row.querySelector("#quantity");
      const selectedOption =
        chooseProductSelect.options[chooseProductSelect.selectedIndex];
      const selectedPrice = selectedOption.getAttribute("data-price");
      let quantity = parseFloat(quantityInput.value);

      // Prevent entering 0
      if (!isNaN(quantity) && quantity <= 0) {
        quantityInput.value = 1;
        quantity = 1;
      }

      const totalPrice = (selectedPrice * quantity).toFixed(2);
      //console.log(totalPrice);
      const orderItem = {
        product_name: selectedOption.value,
        quantity: parseFloat(quantityInput.value),
        price: totalPrice,
      };
      orderList.push(orderItem);
    });

    const customer_name = customerNameInput.value.trim();
    const contact_info = contactInfoInput.value.trim();
    const order_type = orderTypeInput.value.trim();

    let pay_method = payMethodInput.value.trim();
    pay_method =
      pay_method.charAt(0).toUpperCase() + pay_method.slice(1).toLowerCase();

    const total_cost = totalCostInput.value.trim();
    const order_status = orderStatusSelect.value.trim();
    const pay_status = paymentStatusSelect.value.trim();

    const orderListCopy = JSON.parse(JSON.stringify(orderList));

    // Convert the copied orderList array into a JSON object
    const orderListJson = JSON.stringify(orderListCopy);

    const formData = new FormData();
    formData.append("create_order", "true");
    formData.append("customer_name", customer_name);
    formData.append("contact_info", contact_info);
    formData.append("order_type", order_type);
    formData.append("pay_method", pay_method);
    formData.append("total_cost", total_cost);
    formData.append("order_status", order_status);
    formData.append("pay_status", pay_status);
    formData.append("user_id",document.getElementById("user_id").value);
    formData.append(
      "salesperson",
      document.getElementById("salesperson").value
    );

    if (order_type === "In-Store") {
      formData.append("shipping_details", "N/A");
    } else if (order_type === "Delivery") {
      const shipDetailsInput = document.getElementById("shipping_details");
      const shipping_details = shipDetailsInput.value.trim();
      formData.append("shipping_details", shipping_details);
    }

    // Append the orderListJson to the form data
    formData.append("order_list", orderListJson);

    const response = await fetch(
      "/langgamtrading/branch3/includes/order_function.php",
      {
        method: "POST",
        body: formData,
      }
    );
    //console.log(await response.text());
    if (response.ok) {
      if (order_status === "Complete") {
        Swal.fire({
          icon: "success",
          title: "Order Complete",
          text: "Sale successfully made.",
          showConfirmButton: false,
          timer: 2000,
          showClass: {
            popup: "swal2-show",
          },
        }).then(() => {
          document.getElementById("registration-form").reset();
          location.reload();
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "Success",
          text: "Order Created Succesfully.",
          showConfirmButton: false,
          timer: 2000,
          showClass: {
            popup: "swal2-show",
          },
        }).then(() => {
          document.getElementById("registration-form").reset();
          location.reload();
        });
      }
    } else {
      Swal.fire({
        icon: "error",
        title: "Oops...",
        text: "Error: Unable to create order.",
        showConfirmButton: false,
        timer: 2000,
        showClass: {
          popup: "swal2-show",
        },
      });
    }
    const modal = document.getElementById("addOrder");
    const modalInstance = bootstrap.Modal.getInstance(modal);
    modalInstance.hide();
  });

  addRowButton.addEventListener("click", createRow);

  createRow();

  updateTotalCost();
});
