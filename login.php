
<?php session_start();?>

<!DOCTYPE html>
<?php
include "db.php";

$student_id = $_POST['student_id'];
$password = $_POST['password'];
$admin = $_POST['admin'];
$admin_pass = $_POST['admin_pass'];
$retrieve_account = array();

if ($admin != null) {

    if ($admin_pass != null) {

        if ($admin == 'admin' && $admin_pass == 'password') {
            header("Location: admin.php");
        } else {
            ?>
    <script>
    alert("Wrong Student ID or Password!");
    </script>

    <?php
}

    }
}
if ($student_id != null) {

    if ($password != null) {

        $password = md5($password);
        $query = "SELECT * FROM student WHERE student_id='" . $student_id . "' AND password='" . $password . "'";
        // $update = "UPDATE `student` SET `session` = '2015-0571-02' WHERE `student`.`id_number` = 7;"
        $result1 = mysqli_query($con, $query);

        while ($row = mysqli_fetch_array($result1)) {

            array_push($retrieve_account, $row['id_number']);
            $_SESSION['id_number'] = $row['id_number'];
            $_SESSION['student_name'] = $row['first_name'] . " " . $row['last_name'];
            $_SESSION['session_id'] = $row['session'];
            $_SESSION['rating'] = $row['rating'];
            $_SESSION['schedule'] = $row['schedule'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['course_id'] = $row['course_id'];
            $_SESSION['student_id'] = $row['student_id'];

        }
        if ($retrieve_account != null) {

            header("Location: user-select-subject.php");
        } else {
            ?>
            <script>
            alert("Wrong Student ID or Password!");
            </script>

            <?php
}

        if ($_SESSION['session_id'] != null || $_SESSION['session_id'] != 0) {

            $_SESSION['check'] = $_SESSION['session_id'];
            $id = $_SESSION['session_id'];
            $query = "SELECT * FROM student WHERE student_id='" . $id . "'";
            $result1 = mysqli_query($con, $query);

            while ($row = mysqli_fetch_array($result1)) {

                array_push($retrieve_account, $row['id_number']);
                $_SESSION['id_number1'] = $row['id_number'];
                $_SESSION['student_name1'] = $row['first_name'] . " " . $row['last_name'];
                $_SESSION['session_id1'] = $row['session'];
                $_SESSION['rating1'] = $row['rating'];
                $_SESSION['schedule1'] = $row['schedule'];
                $_SESSION['email1'] = $row['email'];
                $_SESSION['course_id1'] = $row['course_id'];
                $_SESSION['student_id1'] = $row['student_id'];
            }
        }

    }

}

?>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<Title>Login</Title>
<style>
body {font-family: Arial, Helvetica, sans-serif;
    background-color:cadetblue;}

/* Full-width input fields */
input[type=text], input[type=password] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

/* Set a style for all buttons */
button {
    background-color: blue;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

/* Extra styles for the cancel button */
.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

/* Center the image and position the close button */
.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
    position: relative;
}



.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    padding-top: 60px;
}

/* Modal Content/Box */
.modal-content {
    background-color: #fefefe;
    margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
    border: 1px solid #888;
    width: 80%; /* Could be more or less, depending on screen size */
}

/* The Close Button (x) */
.close {
    position: absolute;
    right: 25px;
    top: 0;
    color: #000;
    font-size: 35px;
    font-weight: bold;
}

.close:hover,
.close:focus {
    color: red;
    cursor: pointer;
}

/* Add Zoom Animation */
.animate {
    -webkit-animation: animatezoom 0.6s;
    animation: animatezoom 0.6s
}

@-webkit-keyframes animatezoom {
    from {-webkit-transform: scale(0)}
    to {-webkit-transform: scale(1)}
}

@keyframes animatezoom {
    from {transform: scale(0)}
    to {transform: scale(1)}
}

/* Change styles for span and cancel button on extra small screens */
@media screen and (max-width: 300px) {
    span.psw {
       display: block;
       float: none;
    }
    .cancelbtn {
       width: 100%;
    }
}
</style>
</head>
<body>

<h2>Tutorial from Students by Christian Jade</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;">User Login</button>
<button onclick="document.getElementById('id02').style.display='block'" style="width:auto;">Admin Login</button>
<div id="id01" class="modal">

  <form class="modal-content animate" method='post' action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>

    </div>

    <div class="container">
      <label for="uname"><b>Student ID</b></label>
      <input type="text" placeholder="Enter Username" name="student_id" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required>

      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<div id="id02" class="modal">

  <form class="modal-content animate" method='post' action="login.php">
    <div class="imgcontainer">
      <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>

    </div>

    <div class="container">
      <label for="uname"><b>Admin</b></label>
      <input type="text" placeholder="Enter Username" name="admin" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="admin_pass" required>

      <button type="submit">Login</button>
    </div>

    <div class="container" style="background-color:#f1f1f1">
      <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
      <span class="psw">Forgot <a href="#">password?</a></span>
    </div>
  </form>
</div>
<br/>
<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}
</script>

</body>
</html>
