<?php

require('functions.php');

session_start();
include 'Connection.php';
$book_name = "";
$author = "";
$category = "";
$book_no = "";
$price = "";
$query = "select books.book_name,books.book_no,books.cat_name,books.book_price,books.book_author from books";

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_prof.php">View Profile</a>
                        <a class="dropdown-item" href="edit_pro.php"> Edit Profile</a>
                        <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
                    <div class="dropdown-menu">
                        <a href="add_book.php" class="dropdown-item">Add New Book</a>
                        <a href="manage_book.php" class="dropdown-item">Manage Books</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                    <a href="add_cat.php" class="dropdown-item">Add New Category</a>
						<a href="manage_cat.php" class="dropdown-item">Manage Category</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                    <div class="dropdown-menu">
                        <a href="add_author.php" class="dropdown-item">Add New Author</a>
                        <a href="manage_author.php" href="" class="dropdown-item">Manage Authors</a>
                    </div>
                </li>
                <li class="nav-item">
                <a href="issue_book.php" class="nav-link">Issue Book</a>
                </li>
                <li class="nav-item">
                    <a href="pdf_up.php" class="nav-link">PDF Books</a>
                </li>
                <li class="nav-item">
                    <a href="journal_up.php" class="nav-link">Journals</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="py-3">
        <marquee>Welcome to library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </div>



    <div class="container-fluid manage_books">
        <div class="container">
            <h3 class="text-center text-light pb-4">Available Books</h3>
            <table class="table table-bordered table-hover table-secondary">
                <thead class="bg-dark text-light">
                    <tr class="text-center">
                        <th>Name:</th>
                        <th>Author:</th>
                        <th>Category:</th>
                        <th>Price:</th>
                        <th>Book No:</th>
                    </tr>
                </thead>
                <?php
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $book_name = $row['book_name'];
                    $author = $row['book_author'];
                    $cat = $row['cat_name'];
                    $price = $row['book_price'];
                    $book_no = $row['book_no'];
                ?>
                    <tr class=" text-center" >
                        <td><?php echo $book_name; ?></td>
                        <td><?php echo $author; ?></td>
                        <td><?php echo $cat; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $book_no; ?></td>
                    </tr>
                <?php
                }
                ?>

            </table>
        </div>
    </div>


    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2021 Copyright:
            <a class="text-light" href="https://www.istiaq66.codes">Istiaq66.com</a>
            <a href="../contact.php">Contact us</a>
        </div>
        <!-- Copyright -->
    </footer>


</body>

</html>