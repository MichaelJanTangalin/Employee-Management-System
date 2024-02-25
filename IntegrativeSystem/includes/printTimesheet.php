<?php
include 'db.php';
include '../style/bootstrap.php'
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DTR Records</title>

    <style media="print">
        @page {
            size: landscape;
        }
    </style>
</head>

<body id="printData">
    <div class="container-fluid ps-5 pe-5 ">


        <?php
        $empID = $_GET['userid'];
        $sql = "SELECT * FROM employee WHERE employee.employeeID = '$empID'";
        $result = $conn3->query($sql);
        foreach ($result as $row) {
            $employeeID = $row['employeeID'];
            $employeeName = $row['employeeName'];
            $collegeDepartment = $row['collegeDepartment'];
            $officeDepartment = $row['officeDepartment'];
        }
        ?>

        <table class="table table-bordered border-dark">
            <tr>
                <th>Employee Number:</th>
                <td colspan="3">
                    <?php echo $employeeID ?>
                </td>

                <th>Employee Name:</th>
                <td colspan="3">
                    <?php echo $employeeName ?>
                </td>
            </tr>
            <tr>

                <th>College Department:</th>
                <td colspan="3">
                    <?php echo $collegeDepartment ?>
                </td>


                <th>Office Department:</th>
                <td>
                    <?php echo $officeDepartment ?>
                </td>
            </tr>


        </table>
        <table class="table table-bordered border-dark">
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
                            echo "NO PREVIOUS RECORD";
                        } else
                            echo $total_hours ?>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>

    </html>

    <script>
        window.print();
    </script>