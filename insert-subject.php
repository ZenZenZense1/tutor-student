<?php
include "db.php";
$subject_name = $_POST['subjectName'];
$subject_description = $_POST['subjectDescription'];
$course_id = $_POST['subject_course'];
$insertSubject = "insert into subject (subject_name,subject_description,course_id,rating_star)
values ('$subject_name','$subject_description','$course_id','$rating_star')";
$sqlSubject = mysqli_query($con, $insertSubject);

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
<h1>Subject has been added!</h1>
<a href="admin.php">Back</a>
</body>
