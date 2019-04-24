<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="../img/favicon.png">

    <title>Register Page</title>

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

</head>
<center>

    <body>

        <div class="container">
            <h1>Sign Up - Warunk DAKORA</h1>
            <form class="login-form" method="post" action="script/signup.php">
                <div class="login-wrap">
                    <p class="login-img"><i class="fas fa-user-plus"></i></p>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-id-card"></i></span>
                        <input name="name" type="text" class="form-control" placeholder="Name" autofocus required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_profile"></i></span>
                        <input name="uname" type="text" class="form-control" placeholder="Username" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                        <input name="pword" type="password" class="form-control" placeholder="Password" required>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="icon_mail"></i></span>
                        <input name="email" type="email" class="form-control" placeholder="E-mail" required>
                    </div>
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Register</button>
                </div>
            </form>

        </div>


    </body>
</center>

</html>