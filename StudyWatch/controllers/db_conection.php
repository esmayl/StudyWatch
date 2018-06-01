<?php
$connection = mysqli_connect('localhost', 'root', '','studywatch');
if (!$connection){
    die("Database Connection Failed" . mysqli_error($connection));
}
?>
