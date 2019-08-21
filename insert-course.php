<?php
include "db.php";

$course_name = $_POST['courseName'];
$insertCourse = "insert into course (course_name)
values ('$course_name')";
$sqlCourse = mysqli_query($con, $insertCourse);
?>
<style>
body {font-family: Arial, Helvetica, sans-serif;
    background-color:cadetblue;}
    h1 {
    background-color: black;
    color:white;
}
</style>
<body>
<h1>Course has been added!</h1>
<a href="admin.php">Back</a>
</body>
