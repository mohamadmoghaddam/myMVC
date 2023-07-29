
<!doctype html>
<html lang="en">
  <head>
  	<title>Table 02</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700' rel='stylesheet' type='text/css'>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	
	<link rel="stylesheet" href="css/style.css">

	</head>
	<body>
	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-md-6 text-center mb-5">
					<h2 class="heading-section">Users Table</h2>
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					<div class="table-wrap">
						<table class="table">
						  <thead class="thead-dark">    
						    <tr>
                                <th>id</th>
                                <th>Username</th>
                                <th>First name</th>
                                <th>Last name</th>
						        <th>&nbsp;</th>
                                <th>&nbsp;</th>
						    </tr>
						  </thead>
						  <tbody>
<?php 
                            $rows = $data;
                            foreach ($rows as $row)
                            {
                                $userId = $row['user_id'];
                                $username = $row['username'];
                                $firstname = $row['firstname'];
                                $lastname = $row['lastname'];
?>
                                <tr class='alert' role='alert'>
                                <th scope='row'> <?php echo $userId; ?> </th>
                                <td> <?php echo $username; ?> </td>
                                <td> <?php echo  $firstname; ?></td>
                                <td><?php echo $lastname ?></td>
                                <td>
                                    <a href='#' class='close'>
                                        <i class='fa fa-edit'></i>
                                    </a>
                                </td>
                                <td>
                                    <a href='#' class='close'>
                                        <i class='fa fa-close'></i>
                                    </a>
                                </td>
                                </tr>
<?php } ?>
						  </tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="js/jquery.min.js"></script>
  <script src="js/popper.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/main.js"></script>

	</body>
</html>

