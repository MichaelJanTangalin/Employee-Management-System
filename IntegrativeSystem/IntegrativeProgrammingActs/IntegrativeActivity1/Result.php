<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Entry Activity</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    
</head>
    <body>
        <?php
            $printNo = $_POST['studentNo'];
            $printFname = $_POST['firstName'];
            $printLname = $_POST['LastName'];
        ?>

        <H1>WELCOME,</H1>

        
        <h3>Student: <?php echo $printNo?></h3>
        <h3><?php echo $printFname ." ". $printLname?></h3>

        
    </body>
</html>