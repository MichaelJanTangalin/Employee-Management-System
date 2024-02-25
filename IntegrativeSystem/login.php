<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Login</title>
</head>

<body>
    <?php
    include 'includes/navbar.php';
    include 'style/bootstrap.php';
    ?>

    <style>
        .w-450 {
            width: 500px;
        }

        .vh-100 {
            min-height: 100vh;
        }
    </style>
    <script>
        function preventBack() { window.history.forward() };
        setTimeout("preventBack()", 0);
        window.onunload = function () { null; }
    </script>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3" action="includes/loginINC.php" method="post">



            <h4 class="display-4  fs-1"><strong>Login</strong></h4><br>

            <?php

            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                            <strong>Fill up all the fields</strong>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                      </div>";
                } else if ($_GET["error"] == "wrongLogin") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Incorrect Email or Password</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                }
            }
            ?>


            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address" value="">
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password" value="">
            </div>

            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" value="">
                <label class="form-check-label" for="rememberMe">
                    Remember Me
                </label>
                <a href="forgotPassword.php" class="link-secondary float-end">Forgot Password</a>
            </div>

            <button type="submit" class="btn btn-dark" name="submit">Login</button>
            <a href="register.php" class="link-secondary">Register</a>
        </form>
    </div>

    <?php
    include('includes/footer.php');

    ?>

</body>

</html>