<?php
session_start();
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
	header("location: user_dashboard.php");
	exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Library Management System</title>
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Style.css">

</head>


<body>
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item">
					<a class="nav-link" href="admin/index.php">Admin Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="index.php">User Login</a>
				</li>
				<li class="nav-item">
					<a class="nav-link" href="signup.php">Register</a>
				</li>
			</ul>
		</div>
	</nav>

	<div class="py-3">
		<marquee>Welcome to library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>

	<div class="full text-light">
		<div class="container-fluid login">
			<div class="row">
				<div class="col-md-4" id="side_bar">
					<h5>Library Timing</h5>
					<ul>
						<li>Opening Timing: 8:00 AM</li>
						<li>Closing Timing: 8:00 PM</li>
						<li>(Sunday off)</li>
					</ul>
					<h5>What we provide ?</h5>
					<ul>
						<li>Full furniture</li>
						<li>Free Wi-fi</li>
						<li>News Papers</li>
						<li>Discussion Room</li>
						<li>RO Water</li>
						<li>Peacefull Environment</li>
					</ul>

				</div>

				<div class="col-md-8 my-5" id="main_content">
					<center>
						<h3>User Login Form</h3>
					</center>
					<br>
					<form class="mx-5 " action="" method="post">

						<div class="form-group">
							<label for="name"><b>Email ID:</b></label>
							<input type="text" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label for="name"><b>Password:</b></label>
							<input type="password" name="password" class="form-control" required>
						</div>
						<br>
						<button type="submit" id="regibtn" name="login" class="btn btn-primary">Login</button>
					</form>
					<?php
					if (isset($_POST['login'])) {
						include 'Connection.php';
						$query = "select * from users where email = '$_POST[email]'";
						$query_run = mysqli_query($con, $query);
						while ($row = mysqli_fetch_assoc($query_run)) {
							if ($row['email'] == $_POST['email']) {
								if ($row['password'] == $_POST['password']) {
									$_SESSION['name'] = $row['name'];
									$_SESSION['email'] = $row['email'];
									$_SESSION['id'] = $row['id'];
									$_SESSION["loggedin"] = true;
									header("Location:user_dashboard.php");
								} else {
					?>
									<br><br>
									<center><span class="alert-danger h3 p-2"> Wrong Password !</span></center>
					<?php
								}
							}
						}
					}
					?>



				</div>
			</div>


		</div>


		<footer class="bg-light text-center text-lg-start">
			<!-- Copyright -->
			<div class="text-center p-3 text-light bg-dark">
				© 2021 Copyright:
				<a class="text-light" href="https://www.istiaq66.codes/">Istiaq66.com</a>
				<a href="contact.php">Contact us</a>
			</div>
			<!-- Copyright -->
		</footer>

	</div>
</body>

</html>