<?php

include 'Connection.php';

$author_id = $_POST['author_id'];
$author_name=$_POST['author_name'];



$update_query="UPDATE author set auhtor_id='$auhtor_id',author_name='$author_name' WHERE auhtor_id = $auhtor_id";

$result=mysqli_query($con,$update_query);

if($result)
{
    echo 'Data has been updated successfully';
}else{
    echo 'Update failed!';
}

    
    header('Location:manage_author.php');
    ?>