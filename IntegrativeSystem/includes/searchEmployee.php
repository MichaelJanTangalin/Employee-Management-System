<!DOCTYPE html>
<?php
include 'db.php';
include '../style/bootstrap.php';


?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Query</title>
</head>

<body>
    <?php
    include 'modals.php';
    $searchQuery = $_GET['data'];
    ?>

    <script>
        $(document).ready(function () {
            $('.printModal').click(function () {
                var userid = $(this).data('employeeid');
                $.ajax({
                    url: 'printSearch.php',
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

    <div class="container-fluid my-5">
        <table class="table table-bordered text-center">
            <tr>
                <td>
                    <h2 class="my-3 text-center">Search Results</h2>
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
                            $sql = "SELECT * FROM employee WHERE CONCAT(employeeID, Salutation, firstName, middleName, lastName, gender, dateOfBirth, age, dateHired, endOfContract) LIKE '%{$searchQuery}%'";
                            $result = $conn->query($sql);

                            if ($result->num_rows > 0) {
                                while ($row = $result->fetch_assoc()) {
                                    $empID = $row['employeeID'];
                                    $Salutation = $row['Salutation'];
                                    $fullName = $row['firstName'] . " " . $row['middleName'] . " " . $row['lastName'];
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
                                            <button class="btn btn-success printModal"
                                                data-employeeid="<?php echo $empID; ?>"><i
                                                    class="fa-regular fa-eye"></i></button>
                                    </tr>
                                    <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan='9' class='text-center'>No matching records found</td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>