<?php
include "db.php";
session_start();
$student_rate = $_POST['student_rate'];
$id = $_SESSION['id_number'];
$id1 = $_SESSION['id_number1'];
$rate = $_POST['student_rate'];
$query = "SELECT * FROM student WHERE id_number='$id1'";

$result1 = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result1)) {
    $rating = $row['rating'];

}
$rated = ($rating + $rate) / 2;

$sql = "UPDATE student SET session=0 WHERE id_number=$id";
$sql1 = "UPDATE student SET rating=$rated WHERE id_number=$id1";

?>

<style>
h1 {
    background-color: black;
    color:white;
}
body {font-family: Arial, Helvetica, sans-serif;
    background-color:cadetblue;}
</style>
<body>
<h1><?php

if ($con->query($sql) === true) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
if ($con->query($sql1) === true) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
?></h1>
<a href="login.php">Finish</a>
</body>
