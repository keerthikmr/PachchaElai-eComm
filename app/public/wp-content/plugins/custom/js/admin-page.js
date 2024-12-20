const apiSuffix =
  "https://ecom-technically-inspiring-widget.wpcomstaging.com/wp-json/custom/v1/";

async function downloadCSV() {
  try {
    // Send GET request to export-csv endpoint
    const response = await fetch(apiSuffix + "export-csv", {
      method: "GET",
    });

    if (!response.ok) {
      throw new Error("Failed to download CSV");
    }

    // Create a blob from the response
    const blob = await response.blob();
    const url = window.URL.createObjectURL(blob);

    // Create a temporary download link
    const a = document.createElement("a");
    a.href = url;
    a.download = "leads.csv"; // File name for download
    document.body.appendChild(a);
    a.click();

    // Clean up the temporary URL and link
    a.remove();
    window.URL.revokeObjectURL(url);
  } catch (error) {
    console.error("Error:", error);
    alert("Failed to download CSV");
  }
}

console.log("adming page js loaded");

document.addEventListener("DOMContentLoaded", function () {
  document
    .getElementById("getCsvButton")
    .addEventListener("click", function () {
      downloadCSV();
    });
});
