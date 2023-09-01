// Get the file input element
const fileInput = document.getElementById("image");

// Get the upload text element
const uploadText = document.querySelector(".upload-txt");

// Add click event listener to the upload text element
uploadText.addEventListener("click", () => {
  // Trigger a click event on the file input element
  fileInput.click();
});

// Add an event listener for file selection
fileInput.addEventListener("change", () => {
  // Check if a file is selected
  if (fileInput.files.length > 0) {
    // Set the innerText to "Image selected"
    uploadText.innerText = "Image selected";
    uploadText.style.color = "#4A55A2";
    uploadText.style.borderBottom = "2px solid #4A55A2";
  } else {
    // Reset the innerText to "Upload profile picture"
    uploadText.innerText = "Upload profile picture";
  }
});
