<?php
require_once 'config.php';

include 'components/connect.php';

if (isset($_COOKIE['user_id'])) {
    $user_id = $_COOKIE['user_id'];
} else {
    $user_id = '';
}

if (isset($_SESSION['user_token'])) {
    header("Location:home.php");
} else {

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>home</title>

        <!-- font awesome cdn link  -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

        <!-- custom css file link  -->
        <link rel="stylesheet" href="css/style.css">

    </head>

    <body>

        <?php include 'components/user_header.php'; ?>

        <section class="form-container">

            <form action="" method="post" enctype="multipart/form-data" class="login">
                <h3>welcome back!</h3>
                <p>your email <span>*</span></p>
                <input type="email" name="email" placeholder="enter your email" maxlength="50" required class="box">
                <p>your password <span>*</span></p>
                <input type="password" name="pass" placeholder="enter your password" maxlength="20" required class="box">
                <p class="link">don't have an account? <a href="register.php">register now</a></p>
                <input type="submit" name="submit" value="login now" class="btn">
                <div style="text-align: center;">
                    <?php
                    $output = '<a href="' . $client->createAuthUrl() . '"><img style="width:50%" src="images/google-sign-in.png" alt=""/></a>';
                    echo $output
                    ?>
                </div>
            </form>

        </section>

    <?php } ?>

    <?php include 'components/footer.php'; ?>

    <!-- custom js file link  -->
    <script src="js/script.js"></script>

    </body>

    </html>