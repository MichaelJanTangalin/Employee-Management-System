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

<div class="col-md-5 col-md-offset-4">
<div class="page-header">
			<h1>Data Entry Form </h1>
		</div>

		<form action="Result.php" method="POST">
			<div class="form-group">
				<label for="name">Student No.</label>
				<input type="text" name="studentNo" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">First Name</label>
				<input type="text" name="firstName" class="form-control">
			</div>

			<div class="form-group">
				<label for="name">Last Name</label>
				<input type="text" name="LastName" class="form-control">
			</div>

            <div class="form-group">
				<div class="text-center">
					<button class="btn btn-success">Submit</button>
                    <button class="btn btn-danger" type="reset">Clear</button>
				</div>
			</div>
		</form>

</div>

    
</body>
</html>