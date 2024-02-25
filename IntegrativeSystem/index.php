<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Integrative System</title>

    <style>
        .container-fluid-1 {
            overflow-x: hidden;
            overflow-y: hidden;
        }

        .moveIt {
            position: relative;
            animation-name: slide;
            animation-duration: 10s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .custom-alert-height {
            height: 50px;
            /* set the desired height here */
            padding: 10px;
            /* adjust the padding to maintain the text's position */
        }

        .btn-close-1 {
            font-size: 0.5rem;
            /* set the desired font size here */
        }

        @keyframes slide {
            0% {
                transform: translateX(100%);
            }

            100% {
                transform: translateX(-100%);
            }
        }
    </style>

</head>
<?php
include 'includes/navbar.php';
include 'includes/modals.php';
include 'includes/db.php';
include 'style/bootstrap.php';
include 'includes/JSfunctions.php';


?>



<script>
    $(document).ready(function () {
        $('.editbtn').click(function () {
            var userid = $(this).data('employeeid');
            $.ajax({
                url: 'includes/updateEmployee.php',
                type: 'post',
                data: { userid: userid },
                success: function (response) {
                    $('#editModal .modal-body').html(response);
                    $('#editModal').modal('show');
                }
            });

        });

    });
</script>

<script>
    $(document).ready(function () {
        $('.printModal').click(function () {
            var userid = $(this).data('employeeid');
            $.ajax({
                url: 'includes/printPreview.php',
                type: 'post',
                data: { userid: userid },
                success: function (response) {
                    $('#printModal .modal-body').html(response);
                    $('#printModal').modal('show');

                }
            });

        });


    });
</script>

<script>
    $(document).ready(function () {
        $('.deletebtn').on('click', function () {

            $('#deleteModal').modal('show');
            $tr = $(this).closest('tr');

            var data = $tr.children('td').map(function () {
                return $(this).text().trim();

            }).get();

            console.log(data);

            $('#deleteEmpID').val(data[0]);


        });
    });

</script>

<body>


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>


    <?php
    if (isset($_SESSION["loggedIn"]) && (array_key_exists("Position", $_SESSION) && ($_SESSION["Position"] == "Admin" || $_SESSION["Position"] == "HR"))) {
        ?>

        <div class="container-fluid-1">
            <div class="alert alert-dismissible fade show custom-alert-height" role="alert"
                style="background-color:#f0f1f2;">
                <button type="button" class="btn-close btn-close-1" data-bs-dismiss="alert" aria-label="Close"></button>
                <p class="text-center moveIt">Welcome,
                    <b>
                        <?php echo $_SESSION["FirstName"] . " " . $_SESSION["LastName"]; ?>
                    </b>!!
                </p>
            </div>
        </div>

        <div class="container-fluid my-5">
            <table class="table table-bordered">
                <tr>
                    <td>
                        <h2 class="my-3 text-center">Employees Dashboard</h2>


                        <?php if (isset($_GET['error'])) { ?>
                            <div class="alert alert-danger alert-dismissible fade show " role="alert">
                                <?php echo $_GET['error']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>

                        <?php if (isset($_GET['success'])) { ?>
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <?php echo $_GET['success']; ?>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        <?php } ?>
                        <table id="myTable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Employee ID</th>
                                    <th>Salutation</th>
                                    <th>Employee Name</th>
                                    <th>Gender</th>
                                    <th>Date of Birth</th>
                                    <th>Age</th>
                                    <th>Date of Hired</th>
                                    <th>End of Contract</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                // select data from table
                                $sql = "SELECT employee.employeeID, employee.Salutation, CONCAT(employee.firstName, ' ', employee.middleName, ' ', employee.lastName) AS fullName, employee.gender, employee.dateOfBirth, employee.age, employee.dateHired, employee.endOfContract
        FROM employee";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $empID = $row['employeeID'];
                                        $Salutation = $row['Salutation'];
                                        $fullName = $row['fullName'];
                                        $gender = $row['gender'];
                                        $dateOfBirth = $row['dateOfBirth'];
                                        $age = $row['age'];
                                        $dateHired = $row['dateHired'];
                                        $endOfContract = $row['endOfContract'];
                                        ?>
                                        <tr>
                                            <td>
                                                <?php echo $empID ?>
                                            </td>
                                            <td>
                                                <?php echo $Salutation ?>
                                            </td>
                                            <td>
                                                <?php echo $fullName ?>
                                            </td>
                                            <td>
                                                <?php echo $gender ?>
                                            </td>
                                            <td>
                                                <?php echo $dateOfBirth ?>
                                            </td>
                                            <td>
                                                <?php echo $age ?>
                                            </td>
                                            <td>
                                                <?php echo $dateHired ?>
                                            </td>
                                            <td>
                                                <?php echo $endOfContract ?>
                                            </td>

                                            <td>
                                                <button class="btn btn-success editbtn" data-employeeid="<?php echo $empID; ?>"><i
                                                        class="fa-solid fa-pen-to-square"></i></button>
                                                <button class="btn btn-primary printModal"
                                                    data-employeeid="<?php echo $empID; ?>"><i
                                                        class="fa-solid fa-print"></i></button>
                                                <button class=" btn btn-danger deletebtn" data-bs-toggle="modal"
                                                    data-bs-target="#deleteModal"><i class="fa-solid fa-trash"></i></button>
                                            </td>

                                        </tr>
                                        <?php
                                    }
                                }
                                ?>
                            </tbody>
                        </table>
                    </td>
                </tr>
            </table>
        </div>

        <?php

    } else if (isset($_SESSION["Position"]) == "Employee") {
        ?>
            <div class="text-center my-4">
                <h1>
                    My Daily Time Records
                </h1>
            </div>
            <script>
                $(document).ready(function () {
                    $('.timesheet').click(function () {
                        var userid = $(this).data('employeeid');
                        $.ajax({
                            url: 'includes/timesheet.php',
                            type: 'post',
                            data: { userid: userid },
                            success: function (response) {
                                $('#timesheet .modal-body').html(response);
                                $('#timesheet').modal('show');

                            }
                        });

                    });


                });
            </script>

            <div class="container ps-5 pe-5 ">


                <?php
                $empID = $_SESSION["empID"];
                $sql = "SELECT * FROM employee JOIN currentemployment ON employee.employeeID = currentemployment.employeeID
                 WHERE employee.employeeID = '$empID'";
                $result = $conn->query($sql);
                foreach ($result as $row) {
                    $employeeID = $row['employeeID'];
                    $employeeName = $row['Salutation'] . ". " . $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'];
                    $collegeDepartment = $row['collegeDepartment'];
                    $officeDepartment = $row['officeDepartment'];
                }
                ?>

                <table class="table table-bordered border-dark">
                    <tr>
                        <th>Employee Number:</th>
                        <td colspan="3">
                            <?php
                            if (empty($employeeID)) {
                                echo "N/A";
                            } else {
                                echo $employeeID;
                            }
                            ?>
                        </td>

                        <th>Employee Name:</th>
                        <td colspan="3">
                            <?php
                            if (empty($employeeName)) {
                                echo "N/A";
                            } else {
                                echo $employeeName;
                            }
                            ?>
                        </td>
                    </tr>
                    <tr>

                        <th>College Department:</th>
                        <td colspan="3">
                            <?php
                            if (empty($collegeDepartment)) {
                                echo "N/A";
                            } else {
                                echo $collegeDepartment;

                            } ?>
                        </td>


                        <th>Office Department:</th>
                        <td>
                            <?php
                            if (empty($officeDepartment)) {
                                echo "N/A";
                            } else {
                                echo $officeDepartment;
                            } ?>
                        </td>
                    </tr>


                </table>
                <table table id="myTable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Date</th>
                            <th>Time In</th>
                            <th>Break In</th>
                            <th>Break Out</th>
                            <th>Time Out</th>
                            <th>Total Hours</th>
                        </tr>
                    </thead>
                    <?php
                    $sql = "SELECT * FROM employee RIGHT JOIN employee_attendance ON employee.employeeID = employee_attendance.employeeID
WHERE employee.employeeID = '$empID'";
                    $result = $conn3->query($sql);
                    $total_minutes = 0;
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $Date = $row['Date'];
                            $TimeIn = $row['TimeIn'];
                            $BreakIn = $row['BreakIn'];
                            $BreakOut = $row['BreakOut'];
                            $TimeOut = $row['TimeOut'];
                            $TotalHours = $row['TotalHours'];
                            if (!empty($TotalHours)) {
                                // split the hours_worked string into hours and minutes
                                $parts = explode(' ', $TotalHours);
                                $hours = intval($parts[0]);
                                $minutes = intval($parts[2]);

                                // convert hours and minutes to minutes and add to the total
                                $total_minutes += $hours * 60 + $minutes;

                                // convert total minutes to hours and minutes
                                $hours = floor($total_minutes / 60);
                                $minutes = $total_minutes % 60;

                                // format the result as a string
                                $total_hours = sprintf('%d hr %02d mins', $hours, $minutes);

                            }
                            ?>

                            <tbody>
                                <tr>
                                    <td>
                                    <?php echo date('l, F j, Y', strtotime($Date)); ?>
                                    </td>

                                    <td>
                                    <?php echo $TimeIn ?>
                                    </td>

                                    <td>
                                    <?php echo $BreakIn ?>
                                    </td>

                                    <td>
                                    <?php echo $BreakOut ?>
                                    </td>

                                    <td>
                                    <?php echo $TimeOut ?>
                                    </td>

                                    <td>
                                    <?php echo $TotalHours ?>
                                    </td>
                                </tr>


                            <?php
                        }
                    }

                    ?>

                        <tr>
                            <th>Grand Total Hours: </th>
                            <td colspan="6" class="text-center">
                                <?php
                                if (empty($total_hours)) {
                                    echo "N/A";
                                } else
                                    echo $total_hours ?>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>



        <?php
    } else {
        $output = '<div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src="https://global-uploads.webflow.com/5b6c3bffe5d6e2113ee81c10/627e740a42d0644e07caaf2a_Guide%20to%20Employee%20Background%20Checks%20for%20Financial%20Institutions.jpg"
                        class="d-block w-100" alt="..." width="1559" height="400">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>WELCOME,</h5>
                        <p>Employees</p>
                    </div>
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src="https://backcheckgroup.com/wp-content/uploads/2016/01/HUMAN-RESOURCE.jpg"
                        class="d-block w-100" alt="..." width="1559" height="400">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Second slide label</h5>
                        <p>Some representative placeholder content for the second slide.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="https://wayneforster.com/wp-content/uploads/2020/06/What-is-HR-Management-1920x800-1.jpg"
                        class="d-block w-100" alt="..." width="1559" height="400">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>Third slide label</h5>
                        <p>Some representative placeholder content for the third slide.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        
        <div class="container py-5">
            <h1>What should we do?</h1>
            <div class="row" align="justify">
                <div class="col">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="col order-5">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
                <div class="col order-1">
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the
                    industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type
                    and scrambled it to make a type specimen book. It has survived not only five centuries, but also the
                    leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s
                    with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop
                    publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </div>
            </div>
        </div>
        ';

        echo $output;
    }

    include('includes/footer.php');
    ?>



</body>

</html>