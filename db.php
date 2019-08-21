<?php

$servername = "localhost";
$username = "root";
$password = "password";
$db = "tutorial_sub";

// Create connection
$con = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
$connect = mysqli_connect("localhost", $username, $password, $db);

$query = "SELECT * FROM course ORDER BY course_id ";
$queryStudent = "SELECT * FROM student";
$querySubject = "SELECT * FROM subject";

$resultStudent = mysqli_query($connect, $queryStudent);
$resultStudent1 = mysqli_query($connect, $queryStudent);
$result = mysqli_query($connect, $query);
$resultSubject = mysqli_query($connect, $querySubject);

$sqlcourse = "SELECT * FROM course ";
$sqlsubject = "SELECT * FROM subject ";
$resultcourse = mysqli_query($con, $sqlcourse);

$courseName = array();
$courseID = array();

while ($row = mysqli_fetch_array($resultcourse)) {

    array_push($courseID, $row['course_id']);
    array_push($courseName, $row['course_name']);

}

while ($row2 = mysqli_fetch_array($resultcourse)) {

    echo $row[1];
}
$courseID_to_json = json_encode(array($courseID));
$courseName_to_json = json_encode(array($courseName));
