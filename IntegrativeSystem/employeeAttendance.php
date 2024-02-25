<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Integrative System</title>

</head>
<?php
include 'includes/navbar.php';
include 'style/bootstrap.php';
include 'includes/db.php';
include 'includes/JSfunctions.php';
include 'includes/modals.php';

?>

<body>

    <div class="container-fluid my-5">
        <table class="table table-bordered">
            <tr>
                <td>

                    <h2 class="mb-4 text-center">Attendance Monitoring</h2>
                    <?php if (isset($_GET['error'])) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <th>Date</th>
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>Time In</th>
                                <th>Break In</th>
                                <th>Break Out</th>
                                <th>Time Out</th>
                                <th>Total Hours</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // select data from table
                            $sql = "SELECT * FROM employee RIGHT JOIN employee_attendance ON employee.employeeID = employee_attendance.employeeID";
                            $result = $conn3->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $Date = $row['Date'];
                                    $employeeID = $row['employeeID'];
                                    $employeeName = $row['employeeName'];
                                    $TimeIn = $row['TimeIn'];
                                    $BreakIn = $row['BreakIn'];
                                    $BreakOut = $row['BreakOut'];
                                    $TimeOut = $row['TimeOut'];
                                    $TotalHours = $row['TotalHours'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php
                                            echo date('l, F j, Y', strtotime($Date)); ?>
                                        </td>
                                        <td>
                                            <?php echo $employeeID ?>
                                        </td>
                                        <td>
                                            <?php echo $employeeName ?>
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
                                        <td>
                                            <button class="btn btn-success printModal" data-employeeid="<?php echo $empID; ?>">
                                                <i class="fa-solid fa-pen-to-square"></i>
                                            </button>

                                            <button class="btn btn-danger restoreBtn" data-bs-toggle="modal"
                                                data-bs-target="#deleteEntry"><i class="fa-solid fa-trash"></i></i>
                                            </button>
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



</body>

<?php

include('includes/footer.php');
?>
<script>
    $(document).ready(function () {
        $('#myTable').DataTable();
    });
</script>

</html>