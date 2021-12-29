<?php

include 'Connection.php';

if (isset($_POST['save'])) { // if save button on the form is clicked
   

     // name of the uploaded file

    $filename = $_FILES['myfile']['name'];

    // destination of the file on the server
    $destination = '../uploads/' . $filename;

    // get the file extension
    $extension = pathinfo($filename, PATHINFO_EXTENSION);

    // the physical file on a temporary uploads directory on the server
    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    
    
    $number =$size/ (float) 1000000.00;
    $mb = round($number, 2);

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script type="text/javascript">';
        echo 'alert("You file extension must be .zip, .pdf or .docx");';
        echo 'window.location.href = "pdf_up.php";';
        echo '</script>';
    } else if ($mb > 20) { // file shouldn't be larger than 10Megabyte
        echo '<script type="text/javascript">';
        echo 'alert("File too large!");';
        echo 'window.location.href = "pdf_up.php";';
        echo '</script>';
    } else {
        // move the uploaded (temporary) file to the specified destination
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', '$mb', '$destination')";
            if (mysqli_query($con, $sql)) {
                echo '<script type="text/javascript">';
                echo 'alert("File uploaded successfully");';
                echo 'window.location.href = "pdf_up.php";';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to upload file!");';
            echo 'window.location.href = "pdf_up.php";';
            echo '</script>';
        }
    }
}
