document.addEventListener("DOMContentLoaded", () => {
    const addRowButton = document.getElementById("addRowButton");
    const orderTable = document.getElementById("orderTable");
    let totalCost = 0;

    function updateTotalCost() {
        totalCost = 0;
        const priceInputs = document.querySelectorAll("#price");
        priceInputs.forEach(input => {
            totalCost += parseFloat(input.value) || 0;
        });

        const totalCostInput = document.getElementById("totalCost");
        totalCostInput.value = totalCost.toFixed(2);
    }

    async function fetchProductOptions() {
        try {
            const response = await fetch('modals/get_inventory.php');
            const products = await response.json();
            return products;
        } catch (error) {
            console.error("Error fetching product options:", error);
        }
    }
    
    async function createRow() {
        const newRow = document.createElement("tr");
        newRow.className = "fade-in row gx-1";

        const products = await fetchProductOptions();
        newRow.innerHTML = `
            <td class="col-6 col-auto">
                <div class="form-group px-0">
                    <select class="form-control form-control-sm" id="ChooseProduct" name="ChooseProduct" required>
                        <option value="">Select Product</option>
                        ${products.map(product => `<option value="${product.product_id}" data-price="${product.price}">${product.product_name}</option>`).join('')}
                    </select>
                </div>
            </td>
            <td class="col">
                <div class="form-group px-0">
                    <input type="number" class="form-control form-control-sm" id="quantity" name="quantity" placeholder="Qty" required>
                </div>
            </td>
            <td class="col">
                <div class="form-group px-0">
                    <input class="form-control form-control-sm" id="price" name="price" placeholder="Price" readonly>
                </div>
            </td>
            <td class="col-auto">
                <div class="form-group px-0">
                    <button type="button" class="btn btn-danger btn-sm removeRowButton" title="Remove Item"><i class='bx bx-minus'></i></button>
                </div>
            </td>
        `;

        const newInputs = newRow.querySelectorAll("input");
        newInputs.forEach(input => {
            input.setAttribute("required", "true");
        });

        const chooseProductSelect = newRow.querySelector("#ChooseProduct");
        const quantityInput = newRow.querySelector("#quantity");
        const priceInput = newRow.querySelector("#price");

        chooseProductSelect.addEventListener("change", () => {
            const selectedOption = chooseProductSelect.options[chooseProductSelect.selectedIndex];
            const selectedPrice = selectedOption.getAttribute("data-price");
            priceInput.value = selectedPrice;

            quantityInput.value = 1;

            const initialTotalPrice = selectedPrice * 1;
            priceInput.value = initialTotalPrice.toFixed(2);

            updateTotalCost();
        });

        quantityInput.addEventListener("input", () => {
            const selectedOption = chooseProductSelect.options[chooseProductSelect.selectedIndex];
            const selectedPrice = selectedOption.getAttribute("data-price");
            let quantity = parseFloat(quantityInput.value);

            // Prevent entering 0
            if (!isNaN(quantity) && quantity <= 0) {
                quantityInput.value = 1;
                quantity = 1;
            }

            const totalPrice = selectedPrice * quantity;
            priceInput.value = totalPrice.toFixed(2);

            // Set price to default when quantity is empty
            if (isNaN(quantity) || quantity === '') {
                priceInput.value = '0.00';
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

    addRowButton.addEventListener("click", createRow);

    // Add an initial row on page load
    createRow();

    updateTotalCost();
});
