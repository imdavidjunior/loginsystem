<?php include "login_process.php" ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="*image/ico" href="images/logo.svg" style="width: 30px" />
    <title>Document</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>

<body>
    <div class="form-container">
        <div class="logo-bg">
            <img src="images/logo.svg" alt="">
        </div>

        <h2>Sign in</h2>
        <form class="submit-form" action="" method="post" enctype="multipart/form-data">

            <div class="input-pair">
                <div class="input-control">
                    <input type="email" name="email" placeholder="Type your email address"
                        class="box <?php if (isset($message['email'])) echo 'error-alert'; ?>"
                        value="<?php echo isset($_POST['email']) ? htmlspecialchars($_POST['email']) : ''; ?>">
                    <?php if (isset($message['email'])) echo '<div class="error">' . $message['email'] . '</div>'; ?>
                </div>
                <div class="input-control">
                    <div class="input-control">
                        <input type="password" name="password" placeholder="Type your password"
                            class="box <?php if (isset($message['password'])) echo 'error-alert'; ?>" id="password"
                            value="<?php echo isset($_POST['password']) ? htmlspecialchars($_POST['password']) : ''; ?>">
                        <?php if (isset($message['password'])) echo '<div class="error">' . $message['password'] . '</div>'; ?>
                    </div>
                </div>
            </div>

            <div class="password-check">
                <input type="checkbox" class="show-password-toggle" id="show-password-toggle">
                <span>Show password</span>
            </div>
            <div class="submit-control">
                <button type="submit" name="submit" class="btn register-btn" value="Login">Login</button>
            </div>
            <p>Or <a href="register">Sign Up here</a> if you do not have an account.</p>
        </form>


    </div>

    <script src="js/password.js"></script>
</body>

</html>