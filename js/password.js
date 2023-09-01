const passwordInput = document.getElementById("password");
const showPasswordToggle = document.getElementById("show-password-toggle");

showPasswordToggle.addEventListener("change", function () {
  if (showPasswordToggle.checked) {
    passwordInput.type = "text";
  } else {
    passwordInput.type = "password";
  }
});
