<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Register</title>
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
        min-height: 100px;
    }

    /* Style for the radio buttons */
    .form-check-input[type="radio"] {
        width: 1.2em;
        height: 1.2em;
        margin-top: 0.25em;
        margin-right: 0.5em;
        border-color: #343a40;
    }

    /* Style for the selected radio button */
    .form-check-input[type="radio"]:checked {
        background-color: #343a40;
        border-color: #343a40;
    }

    /* Style for the radio button label */
    .form-check-label {
        color: #343a40;
    }
</style>

<body>
    <br><br><br>
    <div class="d-flex justify-content-center align-items-center vh-100 my-5"
        style="padding-top: 100px; padding-bottom: 100px;">

        <form class=" shadow w-450 p-3" action="includes/registerINC.php" method="post">

            <h4 class="display-4  fs-1"><strong>Register</strong></h4><br>

            <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyinput") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                            <strong>Fill up all the fields</strong>
                        <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                      </div>";
                } else if ($_GET["error"] == "invalidemail") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Invalid Email Format</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                } else if ($_GET["error"] == "passwordsdontmatch") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Password not Match</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                } elseif ($_GET["error"] == "stmtfailed") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Something went wrong, Try Again</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                } elseif ($_GET["error"] == "emailalreadyexist") {
                    echo "<div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
                        <strong>Email Already Exist</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                } elseif ($_GET["error"] == "none") {
                    echo "<div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
                        <strong>Registered Successfully</strong>
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                  </div>";
                }
            }
            ?>

            <div class="row g-3">
                <?php
                function generateEmployeeID()
                {
                    $year = date('y');
                    $random_number1 = rand(10000, 99999);
                    $random_number2 = rand(100, 999);
                    $employee_id = $year . '-' . $random_number1 . '-' . $random_number2;
                    return $employee_id;
                }
                ?>

                <div class="col mb-3" style="display:none;">
                    <input type="text" class="form-control" value="<?php echo generateEmployeeID();
                    ; ?>" name="inputEmployeeID" id="inputEmployeeID" readonly style="font-weight:bold;">
                </div>

                <div class="col mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" placeholder="Enter First Name">

                </div>



                <div class="col mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" placeholder="Enter Middle Name">

                </div>

                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" placeholder="Last Name">
                </div>
            </div>

            <div class="mb-3">
                <label class="form-label">Gender</label>
                <br>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="male" value="Male" checked>
                    <label class="form-check-label" for="male">
                        Male
                    </label>
                </div>
                <div class="form-check-inline">
                    <input class="form-check-input" type="radio" name="gender" id="female" value="Female">
                    <label class="form-check-label" for="female">
                        Female
                    </label>
                </div>

            </div>
            <div class="mb-3">
                <label class="form-label">Position</label>
                <select class="form-select" name="position">
                    <option selected>Choose your Position</option>
                    <option value="Admin">Admin</option>
                    <option value="HR">HR</option>
                    <option value="Employee">Employee</option>
                </select>
            </div>


            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="text" class="form-control" name="email" placeholder="Enter Email Address">
            </div>



            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" class="form-control" name="password" placeholder="Enter Password">
            </div>

            <div class="mb-3">
                <label class="form-label">Re-type Password</label>
                <input type="password" class="form-control" name="passwordRepeat" placeholder="Re-type Password">
            </div>

            <button type="submit" class="btn btn-dark" name="submit">Register</button>
            <a href="login.php" class="link-secondary">Login</a>
        </form>

    </div>

    <br><br><br>
    <?php
    include('includes/footer.php');

    ?>

</body>

</html>