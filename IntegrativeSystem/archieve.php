<!DOCTYPE html>
<html lang="en">

<?php
require("includes/dataEntryINC.php");
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Employee Archieves</title>

    <style>
    </style>
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

                    <h2 class="mb-4 text-center">Employee Archieves</h2>
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
                            $result = $conn2->query($sql);

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
                                            <button class="btn btn-success printModal" data-employeeid="<?php echo $empID; ?>">
                                                <i class="fa-regular fa-eye"></i>
                                            </button>

                                            <button class="btn btn-danger restoreBtn" data-bs-toggle="modal"
                                                data-bs-target="#restoreModal"><i class="fa-solid fa-rotate-right"></i></i>
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

    <script>
        $(document).ready(function () {
            $('.printModal').click(function () {
                var userid = $(this).data('employeeid');
                $.ajax({
                    url: 'includes/archiveView.php',
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
            $('.restoreBtn').on('click', function () {

                $('#restoreModal').modal('show');
                $tr = $(this).closest('tr');

                var data = $tr.children('td').map(function () {
                    return $(this).text().trim();

                }).get();

                console.log(data);

                $('#restoreEmpID').val(data[0]);


            });
        });

    </script>


    <script>
        $(document).ready(function () {
            $('#myTable').DataTable();
        });
    </script>

    <?php
    include('includes/footer.php');

    ?>


</body>

</html>