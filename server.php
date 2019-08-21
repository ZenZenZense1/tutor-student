<?php
include "db.php";
if(isset($_POST['login'])){
    $student_id = mysql_real_escape_string($_POST['username']);
    $password = mysql_real_escape_string($_POST['password']);
}
if(empty($student_id)){
    array_push($errors,"Password is required");
}
if(empty($password)){
    array_push($errors,"Password is required");
}
if(count($errors)==0){
    $password = md5$password;
    $query = "SELECT * FROM student WHERE student_id='$student_id' AND password='$password'";
    $result = mysql_query($db,$query);
    if(mysqli_num_rows($result)){
        
    }
}
?>