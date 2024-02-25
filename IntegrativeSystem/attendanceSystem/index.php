<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/style.css">
    <title>Integrative System</title>

    <?php
    include 'includes/navbar.php';
    include '../includes/modals.php';
    include '../includes/db.php';
    include '../style/bootstrap.php';


    ?>

    <style>
        .nav-link-dark {
            color: #343a40;
        }
    </style>
</head>

<body>

    <div class="container my-5">
        <div class="card shadow">
            <h2 class="card-header text-center">Employee Attendance System</h2>
            <div class="card-body">

                <div class="row justify-content-center">


                    <?php

                    if (isset($_SESSION['message']) && isset($_SESSION['alert_type'])) {
                        $message = $_SESSION['message'];
                        $alert_type = $_SESSION['alert_type'];
                        unset($_SESSION['message']);
                        unset($_SESSION['alert_type']);
                    } else {
                        $message = "";
                        $alert_type = "";
                    }

                    // Display the alert
                    if (!empty($message) && !empty($alert_type)) {
                        echo "
                            
                            <div class=\"container alert alert-$alert_type alert-dismissible fade show\" role=\"alert\">
                                $message
                    <button type=\"button\" class=\"btn-close\" data-bs-dismiss=\"alert\" aria-label=\"Close\"></button>
                            </div>
                            
                    ";
                    }
                    ?>

                    <div class="col-md-3 mb-3">

                        <img src="images/Default.jpg" class="img-fluid" alt="Responsive image" id="employeeImage">

                        <div class="mt-3 text-lead text-muted text-center">
                            <b>
                                <div id="date" class="mb-0"></div>
                                <div id="time" class="mb-0"></div>
                            </b>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <ul class="nav nav-tabs">
                            <li class="nav-item">
                                <a class="nav-link active nav-link-dark" href="#t1" data-bs-toggle="tab">Time-In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-dark" href="#t2" data-bs-toggle="tab">Break-In</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-dark" href="#t3" data-bs-toggle="tab">Break-Out</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link nav-link-dark" href="#t4" data-bs-toggle="tab">Time-Out</a>
                            </li>
                        </ul>



                        <form id="search-form">
                            <div class="my-3 input-group">
                                <input type="text" class="form-control" id="searchEmpID"
                                    placeholder="Enter Employee ID">
                                <button class="btn btn-dark" id="searchBtn" type="button"><span
                                        class="fas fa-search"></span></button>
                            </div>
                        </form>


                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="t1">
                                <form action="includes/timeIn.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" readonly id="empID1" name="empID">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="empNameTI" name="empName"
                                            placeholder="Employee Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="collegeDeptTI"
                                            name="collegeDept" placeholder="College Department">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="officeDeptTI"
                                            name="officeDept" placeholder="Office Department">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-dark w-100" name="submit">Time In</button>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="t2">
                                <form action="includes/breakIn.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" readonly id="empID2" name="empID">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="empNameBI" name="empName"
                                            placeholder="Employee Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="collegeDeptBI"
                                            name="collegeDept" placeholder="College Department">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="officeDeptBI"
                                            name="officeDept" placeholder="Office Department">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-dark w-100" name="submit">Break In</button>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="t3">
                                <form action="includes/breakOut.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" readonly id="empID3" name="empID">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="empNameBO" name="empName"
                                            placeholder="Employee Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="collegeDeptBO"
                                            name="collegeDept" placeholder="College Department">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="officeDeptBO"
                                            name="officeDept" placeholder="Office Department">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-dark w-100" name="submit">Break
                                            Out</button>
                                    </div>
                                </form>

                            </div>
                            <div class="tab-pane fade" id="t4">
                                <form action="includes/timeOut.php" method="post">
                                    <div class="mb-3">
                                        <input type="hidden" class="form-control" readonly id="empID4" name="empID">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="empNameTO" name="empName"
                                            placeholder="Employee Name">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="collegeDeptTO"
                                            name="collegeDept" placeholder="College Department">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control" readonly id="officeDeptTO"
                                            name="officeDept" placeholder="Office Department">
                                    </div>
                                    <div class="">
                                        <button type="submit" class="btn btn-dark w-100" name="submit">Time Out</button>
                                    </div>
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include 'includes/JSfunctions.php';
    ?>


</body>

<?php

include('../includes/footer.php');
?>


</html>