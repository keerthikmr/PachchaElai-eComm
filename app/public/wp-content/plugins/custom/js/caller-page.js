const encodedCredentials = btoa("chicken" + ":" + "pleasant"); // change to nonce in prod
const apiSuffix =
  "https://ecom-technically-inspiring-widget.wpcomstaging.com/wp-json/custom/v1/";

function setDone(mobileNumber) {
  const popup = document.getElementById("order-popup");

  popup.style.display = "block";

  document.addEventListener("click", function (e) {
    if (!popup.contains(e.target)) {
      // popup.style.display = "none";
    }
  });

  // const apiUrl = apiSuffix + "mark-done/";

  // fetch(apiUrl, {
  //   method: "POST",
  //   headers: {
  //     Authorization: "Basic " + encodedCredentials,
  //     "Content-Type": "application/json",
  //   },
  //   body: JSON.stringify({
  //     mobile_number: mobileNumber,
  //   }),
  // })
  //   .then((response) => response.json())
  //   .then((data) => {
  //     if (data.success) {
  //       removeCustomer(mobileNumber);
  //       console.log("Lead marked as done");
  //     } else {
  //       console.error("Error: " + data.message);
  //     }
  //   })
  //   .catch((error) => {
  //     console.error("Error making the request:", error);
  //   });
}

function setNoInterestFlag(button, mobileNumber) {
  const row = button.closest("tr");

  const tableElement = document.getElementById("leadsTable");
  const table = new DataTable(tableElement);

  table.row(row).remove().draw();

  const apiUrl = apiSuffix + "set-no-interest-flag/";

  // Send the POST request to the API
  fetch(apiUrl, {
    method: "POST",
    headers: {
      Authorization: "Basic " + encodedCredentials,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      mobile_number: mobileNumber,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log("Interest flag disabled.");
      } else {
        console.error("Error: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error making the request:", error);
    });
}

function setHoldFlag(button, mobileNumber) {
  const row = button.closest("tr");

  var actionsCell = row.querySelector("td:last-child");
  console.log(row.cells);
  const statusCell = row.cells[1];

  statusCell.textContent = "Hold";

  actionsCell.innerHTML = `<button onclick="removeHoldFlag(this, ${row.cells[0].textContent})">Remove Hold</button>`;

  const apiUrl = apiSuffix + "set-hold-flag/";

  fetchHelperId(mobileNumber).then((helperId) =>
    fetch(apiUrl, {
      method: "POST",
      headers: {
        Authorization: "Basic " + encodedCredentials,
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        mobile_number: mobileNumber,
        helper_id: helperId,
      }),
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          console.log("Hold flag updated successfully.");
        } else {
          console.error("Error: " + data.message);
        }
      })
      .catch((error) => {
        console.error("Error making the request:", error);
      })
  );
}

async function fetchHelperId(mobileNumber) {
  try {
    const response = await fetch(apiSuffix + "get-helper-id/", {
      method: "POST",
      headers: {
        Authorization: "Basic " + encodedCredentials,
        "Content-Type": "application/json",
      },
      body: JSON.stringify({
        mobile_number: mobileNumber,
      }),
    });

    const data = await response.json();

    const helperId =
      data.success && data.data.length > 0 ? data.data[0].helper_id : null;
    console.log("Helper ID:", helperId);

    return helperId;
  } catch (error) {
    console.error("Error fetching helper ID:", error);
    return null;
  }
}

function removeHoldFlag(button, mobileNumber) {
  if (button !== null) {
    const row = button.closest("tr");

    var actionsCell = row.querySelector("td:last-child");

    const statusCell = row.cells[1];
    statusCell.textContent = "Pending";

    actionsCell.innerHTML = `
    <div class="action-buttons">
      <button id="mark-done-btn" data-status="done" onclick="setDone(${row.cells[0].textContent})">Done</button>
      <button data-status="not interested" onclick="setNoInterestFlag(this, ${row.cells[0].textContent})">No Interest</button>
      <button data-status="hold" onclick="setHoldFlag(this, ${row.cells[0].textContent})">Hold</button>
    </div>`;
  }

  const apiUrl = apiSuffix + "remove-hold-flag/";

  // Send the POST request to the API
  fetch(apiUrl, {
    method: "POST",
    headers: {
      Authorization: "Basic " + encodedCredentials,
      "Content-Type": "application/json",
    },
    body: JSON.stringify({
      mobile_number: mobileNumber,
    }),
  })
    .then((response) => response.json())
    .then((data) => {
      if (data.success) {
        console.log("Hold flag updated successfully.");
      } else {
        console.error("Error: " + data.message);
      }
    })
    .catch((error) => {
      console.error("Error making the request:", error);
    });
}

async function getCurrentUser() {
  const apiUrl = apiSuffix + "get-user-id";

  try {
    const response = await fetch(apiUrl);
    const data = await response.json();

    if (data.success) {
      console.log("User ID:", data.data);
      return data.data;
    } else {
      console.error("Error: " + data.message);
      return null;
    }
  } catch (error) {
    console.error("Error making the request:", error);
    return null;
  }
}

async function fetchLeads(helper_id) {
  console.log("Fetching leads for " + helper_id);
  const apiUrl = apiSuffix + "fetch-leads";

  try {
    // Make a GET request to the custom REST endpoint
    const response = await fetch(apiUrl + `?helper_id=${helper_id}`, {
      method: "GET",
      headers: {
        "Content-Type": "application/json",
      },
    });

    const data = await response.json();

    if (response.ok) {
      console.log("Leads fetched successfully:", data);
      populateTable(data.data);
    } else {
      console.error("Error fetching leads:", data.message);
    }
  } catch (error) {
    console.error("Network or server error:", error.message);
  }
}

function populateTable(leads) {
  const tableElement = document.querySelector("#leadsTable");
  const table = new DataTable(tableElement);

  const existingNumbers = new Set();
  table.rows().every(function () {
    const rowData = this.data();
    existingNumbers.add(rowData[0]);
  });

  leads.forEach((lead) => {
    if (existingNumbers.has(lead.mobile_number)) {
      return;
    }

    existingNumbers.add(lead.mobile_number);

    const hold_num = parseInt(lead.hold_flag);

    const rowData = [
      lead.mobile_number,
      hold_num ? "Hold" : lead.interest_flag ? "Pending" : "Not interested",
      `<div class="action-buttons">
        ${
          hold_num
            ? `<button data-status="removehold" onclick="removeHoldFlag(this, ${lead.mobile_number})">Remove Hold</button>`
            : `<button data-status="done" id="mark-done-btn" onclick="setDone(${lead.mobile_number})">Done</button>
               <button data-status="not interested" onclick="setNoInterestFlag(this, ${lead.mobile_number})">No interest</button>
               <button data-status="hold" onclick="setHoldFlag(this, ${lead.mobile_number})">Hold</button>`
        }
    </div>`,
    ];

    table.row.add(rowData);
  });

  table.draw();
}

function removeCustomer(mobileNumber) {
  const tableElement = document.querySelector("#leadsTable");
  const table = new DataTable(tableElement);

  table.rows().every(function () {
    const rowData = this.data();

    if (!rowData) {
      console.error("Row data is undefined");
      return;
    }
    if (rowData[0] == mobileNumber) {
      this.remove();
    }
  });

  table.draw();
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("fetchLeadsButton")
    .addEventListener("click", async function () {
      const userID = await getCurrentUser();
      console.log("User ID:", userID);
      fetchLeads(userID);
    });

  const popup = document.getElementById("order-popup");
  const closeBtn = document.getElementById("close-popup");

  closeBtn.addEventListener("click", () => {
    popup.style.display = "none";
  });

  document.getElementById("manualAddButton").addEventListener("click", () => {
    setDone(1);
  });
});

async function fetchProducts() {
  try {
    const response = await fetch(apiSuffix + "get-products/", {
      method: "GET",
    });

    const data = await response.json();

    return data;
  } catch (error) {
    console.error("Error fetching products from database:", error);
    return null;
  }
}

let availableProducts = [];

// Product selection component
function createProductSelection() {
  const div = document.createElement("div");
  div.className = "product-selection";

  const select = document.createElement("select");
  select.required = true;
  select.innerHTML = `
        <option value="">Select a product</option>
        ${availableProducts.map((product) => `<option value="${product}">${product}</option>`).join("")}
    `;

  const quantityDiv = document.createElement("div");
  quantityDiv.className = "quantity-selector hidden";
  quantityDiv.innerHTML = `
        <input type="number" min="1" value="1" required>
    `;

  const removeButton = document.createElement("button");
  removeButton.type = "button";
  removeButton.className = "remove-button";
  removeButton.textContent = "×";
  removeButton.onclick = () => {
    // Add the product back to available products if it was selected
    const selectedProduct = select.value;
    if (selectedProduct) {
      availableProducts.push(selectedProduct);
      updateAllSelects();
    }
    div.remove();
  };

  div.appendChild(select);
  div.appendChild(quantityDiv);
  div.appendChild(removeButton);

  select.onchange = () => {
    const previousValue = select.dataset.previousValue;
    const newValue = select.value;

    // Add previous value back to available products if it exists
    if (previousValue) {
      availableProducts.push(previousValue);
    }

    // Remove newly selected value from available products
    if (newValue) {
      availableProducts = availableProducts.filter((p) => p !== newValue);
    }

    // Store the new value as previous value
    select.dataset.previousValue = newValue;

    // Update all select dropdowns
    updateAllSelects();

    // Show/hide quantity selector
    quantityDiv.classList.toggle("hidden", !newValue);
  };

  return div;
}

// Update all select dropdowns with current available products
function updateAllSelects() {
  const selects = document.querySelectorAll(".product-selection select");
  selects.forEach((select) => {
    const currentValue = select.value;
    const options = [
      '<option value="">Select a product</option>',
      ...availableProducts.map(
        (product) => `<option value="${product}">${product}</option>`
      ),
    ];

    // Add currently selected value if it exists
    if (currentValue && !availableProducts.includes(currentValue)) {
      options.push(`<option value="${currentValue}">${currentValue}</option>`);
    }

    select.innerHTML = options.join("");
    select.value = currentValue;
  });
}

// Modal functions
function showModal(data) {
  const modalContent = document.getElementById("modalContent");
  modalContent.innerHTML = `
        <div class="address-summary">
            <h3>Delivery Address</h3>
            <p>${data.name}</p>
            <p>${data.mobile}</p>
            <p>${data.alternate_mobile}</p>
            <p>${data.address}</p>
            <p>${data.city}, ${data.state}</p>
            <p>Pincode: ${data.pincode}</p>
        </div>
        <div class="products-summary">
            <h3>Products</h3>
            ${data.products
              .map((item) => `<p>${item.quantity}x ${item.product}</p>`)
              .join("")}
        </div>
    `;

  document.getElementById("modal").style.display = "flex";
}

// Initialize the form
document.addEventListener("DOMContentLoaded", () => {
  // Add initial product selection
  fetchProducts().then((data) => {
    data.data.map((product) => {
      availableProducts.push(product.post_title);
    });

    document
      .getElementById("productSelections")
      .appendChild(createProductSelection());

    // Add product button handler
    document.getElementById("addProduct").onclick = () => {
      if (availableProducts.length === 0) {
        alert("All products have been selected");
        return;
      }
      document
        .getElementById("productSelections")
        .appendChild(createProductSelection());
    };
  });

  // Form submission handler
  document.getElementById("productForm").onsubmit = (e) => {
    e.preventDefault();
    document.body.scrollTop = document.getElementById("order-popup").scrollTop =
      0;
    const formData = {
      name: document.getElementById("name").value,
      number: document.getElementById("mobile").value,
      alternate_mobile: document.getElementById("alternate_mobile").value,
      address: document.getElementById("address").value,
      city: document.getElementById("city").value,
      state: document.getElementById("state").value,
      pincode: document.getElementById("pincode").value,
      products: [],
    };

    document.querySelectorAll(".product-selection").forEach((selection) => {
      const product = selection.querySelector("select").value;
      const quantity = selection.querySelector("input").value;
      if (product && quantity) {
        formData.products.push({ product, quantity: parseInt(quantity) });
      }
    });

    showModal(formData);

    document.getElementById("submitOrder").onclick = () => {
      console.log("Form Data JSON:", JSON.stringify(formData, null, 2));
      sendFormData(formData);
      document.getElementById("productForm").reset();
      document.getElementById("modal").style.display = "none";
      document.getElementById("order-popup").style.display = "none";
    };
  };

  // Modal close handler
  document.getElementById("closeModal").onclick = () => {
    document.getElementById("modal").style.display = "none";
  };
});

async function sendFormData(formData) {
  try {
    const response = await fetch(apiSuffix + "set-order", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(formData),
    });

    if (!response.ok) {
      throw new Error(`HTTP error! Status: ${response.status}`);
    }

    const result = await response.json();
    console.log("API Response:", result);
  } catch (error) {
    console.error("Error sending data:", error);
  }
}
