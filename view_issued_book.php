<?php

session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

$con = mysqli_connect("localhost", "root", "");
$db = mysqli_select_db($con, "final");
$book_name = "";
$author = "";
$book_no = "";
$issue_date   = "";
$due_date = "";
$query = "select book_name,book_author,book_no,issue_date,due_date from issued_books where student_id = $_SESSION[id]";

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
            <h3 class="text-center text-light pb-4">Issued Books</h3>
            <table class="table table-bordered table-striped table-hover table-secondary">
                <thead class="bg-dark text-light">
                    <tr>
                        <th>Book Name:</th>
                        <th>Book Author:</th>
                        <th>Book Number:</th>
                        <th>Issue Date:</th>
                        <th>Due Date:</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_run = mysqli_query($con, $query);
                    while ($row = mysqli_fetch_assoc($query_run)) {
                        $book_name = $row['book_name'];
                        $author = $row['book_author'];
                        $book_no = $row['book_no'];
                        $issue_date  = $row['issue_date'];
                        $due_date = $row['due_date'];

                    ?>
                        <tr>
                            <td><?php echo $book_name; ?></td>
                            <td><?php echo $author; ?></td>
                            <td><?php echo $book_no; ?></td>
                            <td><?php echo $issue_date	; ?></td>
                            <td><?php echo $due_date; ?></td>

                        </tr>
                </tbody>
            <?php
                    }
            ?>
            </table>

        </div>
    </div>


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