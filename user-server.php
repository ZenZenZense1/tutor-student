<?php
include "db.php";
session_start();
$student_id = $_POST['student_id'];
$password = $_POST['password'];

if ($student_id != null) {

    if ($password != null) {

        $password = md5($password);
        $query = "SELECT * FROM student WHERE student_id='" . $student_id . "' AND password='" . $password . "'";

        $result1 = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($result1)) {

            echo $row['first_name'];

        }

    }

}
?>
<style>
body{
background:cadetblue;
}
</style>
