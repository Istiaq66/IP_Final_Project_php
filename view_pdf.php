<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: index.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>User Dashboard</title>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
	<script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
	<script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="Style.css">
</head>


<body>

<button onclick="topFunction()" id="myBtn" title="Go to top"></button>

	<nav class="navbar navbar-expand-lg navbar-dark bg-dark">

		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="user_dashboard.php">HOME</a>
			</div>
			<font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
			<font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>

			<ul class="nav navbar-nav navbar-right">
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="view_profile.php">View Profile</a>
						<a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
						<a class="dropdown-item" href="change_password.php">Change Password</a>
					</div>
				</li>
				<li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
			</ul>
		</div>

	</nav>


	<div class="py-3">
		<marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
	</div>



	<div class="container-fluid admin-dash">
		<div class="container">
			<h3 class="text-center text-light pb-4">PDF's</h3>
			<table class="table table-bordered table-striped table-hover table-secondary">
				<thead class="bg-dark text-light">
					<tr class="text-center">
						<th>#</th>
						<th>File Name</th>
						<th>Size (mb)</th>
						<th>Download</th>
					</tr>
				</thead>
				<tbody <?php
						include 'Connection.php';
						$i = 1;
						$sql = "select * from files";
						$result = mysqli_query($con, $sql);
						while ($row = mysqli_fetch_assoc($result)) { ?> <tr class="text-center">
					<td><?php echo $i++; ?></td>
					<td><?php echo $row['name']; ?></td>
					<td><?php echo $row['size']; ?></td>
					<td><a class="btn btn-success" href="uploads/<?php echo $row['name']; ?>" target="_blank">Download</a></td>

					</tr>
				</tbody>
			<?php
						}
			?>

			</table>
		</div>
	</div>





	<!-- <span><marquee class="mt-5 text-danger"><h4><b>Please return Issued books in time</b></h4></marquee></span><br><br> -->

	<footer class="bg-light text-center text-lg-start my-0">
		<!-- Copyright -->
		<div class="text-center py-3 text-light bg-dark">
			© 2021 Copyright:
			<a class="text-light" href="https://www.istiaq66.codes/">Istiaq66.com</a>
			  <a href="../contact.php">Contact us</a>
		</div>
		<!-- Copyright -->
	</footer>





	<script>
		//Get the button
		var mybutton = document.getElementById("myBtn");

		// When the user scrolls down 20px from the top of the document, show the button
		window.onscroll = function() {
			scrollFunction()
		};

		function scrollFunction() {
			if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
				mybutton.style.display = "block";
			} else {
				mybutton.style.display = "none";
			}
		}

		// When the user clicks on the button, scroll to the top of the document
		function topFunction() {
			document.body.scrollTop = 0;
			document.documentElement.scrollTop = 0;
		}
	</script>





</body>

</html>