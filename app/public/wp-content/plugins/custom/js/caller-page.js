function set_done(mobile_number) {
  console.log("Marking as done for mobile number:", mobile_number);
}

function set_no_interest(mobile_number) {
  console.log("Marking as not interested for mobile number:", mobile_number);
}

function set_hold(mobile_number) {
  console.log("Marking as hold for mobile number:", mobile_number);
}

document.addEventListener("DOMContentLoaded", function () {
  function fetchLeads() {
    const username = "chicken";
    const password = "pleasant";
    const encodedCredentials = btoa(username + ":" + password);

    const apiUrl =
      "https://shut-step.localsite.io/wp-json/custom/v1/fetch-leads";

    fetch(apiUrl, {
      method: "GET",
      headers: {
        Authorization: "Basic " + encodedCredentials,
        "Content-Type": "application/json",
      },
    })
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          populateTable(data.data);
        } else {
          alert("No leads found.");
        }
      })
      .catch((error) => {
        console.error("Error fetching data:", error);
      });
  }

  function populateTable(leads) {
    const tableElement = document.querySelector("#leadsTable");
    const table = new DataTable(tableElement);

    leads.forEach((lead) => {
      // Prepare data in an array format
      const rowData = [
        lead.mobile_number,
        lead.check_in_time,
        lead.interest_time,
        "Pending",
        `<div>
            <button data-status="done" onclick="set_done(${lead.mobile_number})">Mark Done</button>
            <button data-status="not interested" onclick="set_no_interest(${lead.mobile_number})">Mark Not Interested</button>
            <button data-status="hold" onclick="set_hold(${lead.mobile_number})">Mark Hold</button>
        </div>`,
      ];

      // Add the row to the DataTable
      table.row.add(rowData);
    });

    // Redraw the table to reflect the changes
    table.draw();
  }

  document
    .getElementById("fetchLeadsButton")
    .addEventListener("click", function () {
      fetchLeads();
    });
});
