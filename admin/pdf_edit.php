<?php

include 'Connection.php';


$id = $_POST['id'];
$name = $_POST['name'];


$update_query = "UPDATE files set name='$name' WHERE id = $id";

$result = mysqli_query($con, $update_query);

if ($result) {
    echo 'Data has been updated successfully';
} else {
    echo 'Update failed!';
}


header('Location:pdf_up.php');
