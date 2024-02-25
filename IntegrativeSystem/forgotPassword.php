<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Reset My Password</title>
</head>

<?php
include 'includes/navbar.php';
include 'style/bootstrap.php';
?>

<style>
    .w-450 {
        width: 600px;
    }

    .vh-100 {
        min-height: 100vh;
    }
</style>

<body>
    <div class="d-flex justify-content-center align-items-center vh-100">

        <form class="shadow w-450 p-3" action="#" method="post">

            <h4 class="display-4  fs-1"><strong>Forgot Password</strong></h4><br>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="">
            </div>
            <button type="submit" class="btn btn-dark">Reset Password</button>
        </form>
    </div>

    <?php
    include('includes/footer.php');

    ?>

</body>



</html>