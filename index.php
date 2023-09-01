<?php
require 'db_connect.php';
session_start();
$user_id = $_SESSION['user_id'];

if (!isset($user_id)) {
    header('location:login');
    exit(0);
};

if (isset($_GET['logout'])) {
    unset($user_id);
    session_destroy();
    header('location:login');
}

?>

<?php include('header.php') ?>

<div class="welcome">
    <div class="avatar">
        <div>
            <?php
            $dsn = 'mysql:host=localhost;dbname=users_db;charset=utf8';
            $username = 'root';
            $password = '';

            try {
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $select = $pdo->prepare("SELECT * FROM `users` WHERE id = :user_id");
                $select->bindParam(':user_id', $user_id);
                $select->execute();

                $fetch = $select->fetch(PDO::FETCH_ASSOC);

                if ($fetch['image'] == '') {
                    echo '<img width="200px" src="images/avatar.png">';
                } else {
                    echo '<img  width="200px" src="' . $fetch['image'] . '">';
                }
            } catch (PDOException $e) {
                echo 'Connection failed: ' . $e->getMessage();
            }
            ?>
        </div>
    </div>
    <div class="welcome-header">
        <h1>Welcome <span><?php echo $fetch['name']; ?></span> ! </h1>
    </div>

    <div class='welcome-paragraph'>
        <p class=''>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nesciunt eum quam animi odit, facilis
            esse sapiente accusamus similique sed, aspernatur temporibus iusto mollitia tempora! Culpa, perspiciatis
            voluptate? Repudiandae eius natus rerum maxime, dolores fuga dolore!</p>
    </div>

    <div class="logout">
        <a href="logout">Logout</a>
    </div>

</div>


<?php include("footer.php") ?>