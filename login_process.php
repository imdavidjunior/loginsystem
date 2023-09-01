<?php
require 'db_connect.php';
session_start();

$message = array(); // Initialize an empty array to store error messages

if (isset($_POST['submit'])) {
    // INPUT VALIDATION & SANITATION
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $password = $_POST['password'];

    if (!$email) {
        $message['email'] = 'Email address is required!';
    }
    if (empty($password)) {
        $message['password'] = 'Password is required!';
    }

    // If there are no error messages, proceed with the login process
    if (empty($message)) {
        try {
            // new PDO INSTANCE
            $pdo = new PDO('mysql:host=localhost;dbname=users_db', 'root', '');

            // Prepare and execute a parameterized query to prevent SQL injection
            $stmt = $pdo->prepare("SELECT id, password FROM users WHERE email = ?");
            $stmt->execute([$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($row) {
                // Verify the password
                if (password_verify($password, $row['password'])) {
                    $_SESSION['user_id'] = $row['id'];
                    header('Location: ./');
                    exit;
                } else {
                    $message['password'] = 'Incorrect password, please try again!';
                }
            } else {
                $message['email'] = 'Invalid credentials, please try again!';
            }
        } catch (PDOException $e) {
            // Handle database connection errors
            $message[] = 'Database error: ' . $e->getMessage();
        }
    }
}