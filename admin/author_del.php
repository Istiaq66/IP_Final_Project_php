<?php

$author = $_REQUEST['bn'];
include 'Connection.php';
$delete_query="DELETE FROM author WHERE auhtor_id = '$author'";
if(mysqli_query($con,$delete_query))
{
    echo 'Data has been deleted successfully';
}else
{
    echo 'Failed!';
}

 
header('Location:manage_auhtor.php');