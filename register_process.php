<?php

include 'db_connect.php';

if (isset($_GET['logout'])) {
    unset($_SESSION['user_id']);
    session_destroy();
    header('Location: login');
    exit;
}

$errors = array();

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $image = $_FILES['image']['name'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_folder = 'uploads/' . uniqid() . '_' . $image;

    // Input validation
    if (empty($name)) {
        $errors['name'] = 'Name is required.';
    }

    if (empty($lastName)) {
        $errors['lastName'] = 'Last name is required.';
    }

    if (empty($email)) {
        $errors['email'] = 'Email address is required.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = 'Invalid email address.';
    }

    if (empty($password)) {
        $errors['password'] = 'Password is required.';
    }

    if (empty($confirm_password)) {
        $errors['confirm_password'] = 'You must confirm your password.';
    } elseif ($password !== $confirm_password) {
        $errors['confirm_password'] = 'Passwords do not match.';
    }

    // Check if the email already exists
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $stmt->bindParam(':email', $email);
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!empty($result)) {
        $errors['email'] = 'Sorry, this email address is already taken.';
    }

    if ($image_size > 0 && $image_size > 4000000) {
        $errors['image'] = 'Image size is too large.';
    }

    if (empty($errors)) {
        // Hash the password securely
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user data into the database
        if ($image_size > 0 && move_uploaded_file($image_tmp_name, $image_folder)) {
            $stmt = $pdo->prepare("INSERT INTO users (name, lastName, email, password, image) VALUES (:name, :lastName, :email, :password, :image)");
            $stmt->bindParam(':image', $image_folder);
        } else {
            $stmt = $pdo->prepare("INSERT INTO users (name, lastName, email, password) VALUES (:name, :lastName, :email, :password)");
        }

        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':lastName', $lastName);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashed_password);
        $stmt->execute();

        if ($stmt) {
            $message = 'Registered successfully!';
            header('Location: login');
            exit;
        } else {
            $errors[] = 'Registration failed.';
        }
    }
}