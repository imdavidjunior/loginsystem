<?php include "register_process.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
        integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" type="*image/ico" href="images/logo.svg" style="width: 30px" />
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="form-container">
        <div class="logo-bg">
            <img src="images/logo.svg" alt="">
        </div>
        <h2>Sign up</h2>
        <form action="" method="post" class="submit-form" enctype="multipart/form-data">
            <div class="input-pair">
                <div class="input-control">
                    <input type="text" name="name" placeholder="Type your name"
                        class="box <?php if (isset($errors['name'])) echo 'error-alert'; ?>"
                        value="<?php echo isset($_POST['name']) ? htmlspecialchars($_POST['name']) : ''; ?>">
                    <?php if (isset($errors['name'])) echo '<div class="error">' . $errors['name'] . '</div>'; ?>
                </div>
                <div class="input-control">
                    <input type="text" name="lastName" placeholder="Type your last name"
                        class="box <?php if (isset($errors['lastName'])) echo 'error-alert'; ?>"
                        value="<?php echo isset($_POST['lastName']) ? htmlspecialchars($_POST['lastName']) : ''; ?>">
                    <?php if (isset($errors['lastName'])) echo '<div class="error">' . $errors['lastName'] . '</div>'; ?>
                </div>
            </div>

            <div class="input-pair">
                <div class="input-control">
                    <input type="email" name="email" placeholder="Type your email address"
                        class="box <?php if (isset($errors['email'])) echo 'error-alert'; ?>"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php if (isset($errors['email'])) echo '<div class="error">' . $errors['email'] . '</div>'; ?>
                </div>

                <div class="input-control file-control">
                    <label for="image" class="box">
                        <span class="camera-icon"></span>
                    </label>
                    <input type="file" id="image" class="upload-img" name="image"
                        accept="image/jpg, image/jpeg, image/png">
                    <h6 class="upload-txt">Upload your picture</h6>
                </div>
            </div>

            <div class="input-pair">
                <div class="input-control">
                    <input type="password" name="password" placeholder="Type your password"
                        class="box <?php if (isset($errors['password'])) echo 'error-alert'; ?>" autocomplete="none">
                    <?php if (isset($errors['password'])) echo '<div class="error">' . $errors['password'] . '</div>'; ?>

                </div>
                <div class="input-control">
                    <input type="password" name="confirm_password" placeholder="Confirm your password"
                        class="box <?php if (isset($errors['confirm_password'])) echo 'error-alert'; ?>">
                    <?php if (isset($errors['confirm_password'])) echo '<div class="error">' . $errors['confirm_password'] . '</div>'; ?>

                </div>
            </div>

            <div class="submit-control">
                <button type="submit" class="btn register-btn" name="submit">Register Now</button>
            </div>
            <p>Already registered? <a href="login">Sign in here</a></p>
        </form>
    </div>

    <script src="js/app.js"></script>

</body>

</html>