const encodedCredentials = btoa("chicken" + ":" + "pleasant"); // change to nonce in prod
const apiSuffix = "https://sturdy-lake.localsite.io/wp-json/custom/v1/";

function set_done(mobile_number) {
  console.log("Marking as done for mobile number:", mobile_number);
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

  const statusCell = row.cells[3];
  statusCell.textContent = "Hold";

  actionsCell.innerHTML = `<button onclick="removeHoldFlag(this, ${row.cells[0].textContent})">Remove Hold</button>`;

  const apiUrl = apiSuffix + "set-hold-flag/";

  // Send the POST request to the API
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

    const statusCell = row.cells[3];
    statusCell.textContent = "Pending";

    actionsCell.innerHTML = `<button data-status="done" onclick="setDone(${row.cells[0].textContent})">Done</button>
                   <button data-status="not interested" onclick="setNoInterestFlag(this, ${row.cells[0].textContent})">No Interest</button>
                   <button data-status="hold" onclick="setHoldFlag(this, ${row.cells[0].textContent})">Hold</button>`;
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

const fetchLeads = async (helperId) => {
  const apiUrl = apiSuffix + "fetch-leads";
  try {
    // Make a GET request to the custom REST endpoint
    const response = await fetch(apiUrl + `?helper_id=${helperId}`, {
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
};

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
      lead.check_in_time,
      lead.interest_time,
      hold_num ? "Hold" : lead.interest_flag ? "Pending" : "Not interested",
      `<div>
        ${
          hold_num
            ? `<button data-status="removehold" onclick="removeHoldFlag(this, ${lead.mobile_number})">Remove Hold</button>`
            : `<button data-status="done" onclick="setDone(${lead.mobile_number})">Done</button>
               <button data-status="not interested" onclick="setNoInterestFlag(this, ${lead.mobile_number})">No interest</button>
               <button data-status="hold" onclick="setHoldFlag(this, ${lead.mobile_number})">Hold</button>`
        }
    </div>`,
    ];

    table.row.add(rowData);
  });

  table.draw();
}

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("fetchLeadsButton")
    .addEventListener("click", function () {
      fetchLeads(1);
    });
});
