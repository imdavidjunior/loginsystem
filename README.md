# User Registration PHP Code Explanation

This Markdown file explains the functionality and structure of a PHP script for user registration. This script allows users to create new accounts by providing their name, last name, email address, and password. It also handles image uploads for user avatars.

## Includes and Logout Handling

- The script starts by including a file named `db_connect.php`, which presumably contains the database connection code.

- It checks if a `logout` query parameter is set in the URL. If set, it unsets the `user_id` session variable, destroys the session, and then redirects the user to the login page.

## Error Handling

- An empty array called `$errors` is initialized to store validation errors.

## Form Submission Handling

- If the HTTP POST request contains a parameter named `submit`, the script proceeds to handle user registration.

## Input Validation

- The script performs several input validations:
  - It checks if the `name`, `lastName`, `email`, and `password` fields are not empty.
  - It validates the email address using the `FILTER_VALIDATE_EMAIL` filter.
  - It ensures that the `password` and `confirm_password` fields match.

## Checking Email Availability

- It checks whether the provided email address already exists in the database to prevent duplicate registrations.

## Image Upload Handling

- The script checks the size of the uploaded image and ensures it's not larger than 4,000,000 bytes (about 4 MB).

## Database Interaction

- If there are no validation errors, the script proceeds to:
  - Hash the user's password securely using `password_hash`.
  - Insert the user's data into the database table `users`. If an image is uploaded, the image path is also stored in the database.

## Success and Failure Handling

- If the registration is successful, it sets a success message and redirects the user to the login page.

- If the registration fails, it adds an error message to the `$errors` array.

---

This PHP script provides basic user registration functionality, including input validation, email availability check, and optional image upload. You may need to adapt and integrate it into a larger web application, ensuring that your database structure and file paths align with your project's requirements.

Remember to secure your database connection and implement additional security measures to protect against common web application vulnerabilities.

# PHP Login Script Explanation

This Markdown file provides an explanation of the PHP login script. This script is responsible for handling user login attempts and interacting with a MySQL database to authenticate users.

## Overview

The script performs the following tasks:

1. **Database Connection**: It establishes a connection to a MySQL database using PDO (PHP Data Objects).

2. **Session Start**: It starts a PHP session, which is used to persist user authentication across multiple pages.

3. **Input Validation & Sanitization**: It validates and sanitizes user input, specifically the email address and password submitted via a login form. This is done to enhance security and prevent potential security vulnerabilities like SQL injection.

4. **Error Handling**: The script uses an array called `$message` to store error messages related to the input validation, database connection, and login process.

5. **Login Attempt Handling**: When the user submits the login form (identified by the presence of the `submit` key in the `$_POST` superglobal), the script proceeds to check the validity of the provided email and password.

6. **Database Query**: It prepares and executes a parameterized SQL query to retrieve the user's ID and hashed password from the database based on the provided email address.

7. **Password Verification**: If a matching user record is found in the database, it verifies the submitted password against the stored hashed password using `password_verify()`.

8. **Successful Login**: If the password is verified successfully, it sets a session variable `$_SESSION['user_id']` with the user's ID and redirects the user to the homepage (`'Location: ./`).

9. **Login Failures**: If any errors occur during the login process, appropriate error messages are stored in the `$message` array and displayed to the user.

10. **Database Error Handling**: If a database connection error occurs, it catches the `PDOException` exception and adds an error message to the `$message` array.

## Usage

To use this script:

1. Include the `db_connect.php` file, which presumably contains database connection configuration.

2. Create a login form in your HTML code with fields for email and password, and a submit button with the `name` attribute set to `"submit"`.

3. When the user submits the form, this script will handle the login process, including input validation and database interaction.

4. Error messages or successful login redirects are based on the contents of the `$message` array.

Note: Make sure to secure your database credentials and use a strong hashing algorithm for storing passwords in the database. This script assumes that password hashing has been done using `password_hash()` when user accounts were created.

## Security Considerations

This script demonstrates some important security practices, such as input validation, password hashing, and the use of parameterized queries to prevent SQL injection. However, the overall security of a web application depends on various factors, including server configuration, session management, and more. Additional security measures may be required to protect against common web application vulnerabilities.
