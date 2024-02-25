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
    <div class="container-fluid my-5">
        <table class="table table-bordered">
            <tr>
                <td>

                    <h2 class="mb-4 text-center">Employee Timesheet</h2>
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
                                <th>Employee ID</th>
                                <th>Employee Name</th>
                                <th>College Department</th>
                                <th>Office Department</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // select data from table
                            $sql = "SELECT * FROM employee";
                            $result = $conn3->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $employeeID = $row['employeeID'];
                                    $employeeName = $row['employeeName'];
                                    $collegeDepartment = $row['collegeDepartment'];
                                    $officeDepartment = $row['officeDepartment'];
                                    ?>
                                    <tr>
                                        <td>
                                            <?php echo $employeeID ?>
                                        </td>
                                        <td>
                                            <?php echo $employeeName ?>
                                        </td>
                                        <td>
                                            <?php echo $collegeDepartment ?>
                                        </td>
                                        <td>
                                            <?php echo $officeDepartment ?>
                                        </td>

                                        <td class="text-center">
                                            <button class="btn btn-success timesheet"
                                                data-employeeid="<?php echo $employeeID; ?>">
                                                View Timesheet
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