<?php
session_start();
if (isset($_SESSION['name'])) {
    header("Location:index.php");
}
if (isset($_SESSION['false'])) {
    echo $_SESSION['false'];
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../img/favicon.png">

    <title>Login Page</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>
<center>

    <body>

        <div class="container">
            <h1>Login - Warunk DAKORA</h1>
            <form class="login-form" method="post" action="script/auth.php">



                <div class="login-wrap">
                    <p class="login-img"><i class="icon_lock_alt"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input name="uname" type="text" class="form-control" placeholder="Username" autofocus required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input name="pword" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
                    <a href="register.php" class="btn btn-info btn-lg btn-block">Register</a>
                </div>
            </form>

        </div>


    </body>
</center>

</html>