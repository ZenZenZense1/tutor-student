<?php
include "db.php";
$first_name = $_POST['firstName'];
$last_name = $_POST['lastName'];
$course_id = $_POST['student_course'];
$email = $_POST['email'];
$student_id = $_POST['studentID'];
$student_rate = $_POST['student_rate'];
$password = md5('1234');
$insertStudent = "insert into student (first_name,last_name,course_id,email,student_id,rating,password)
values ('$first_name','$last_name','$course_id','$email','$student_id','$student_rate','$password')";
$sqlStudent = mysqli_query($con, $insertStudent);
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
<h1>Student has been added!</h1>
<a href="admin.php">Back</a>
</body>
