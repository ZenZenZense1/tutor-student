<?php
session_start();

include "db.php";

$searchCourseId = $_GET["course_id"];
$id_number = $_SESSION['varname'];

?>

<!DOCTYPE html>
<html>
<head>
<Title>User</Title>
<meta name="viewport" content="width=device-width, initial-scale=1">


<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
.checked {
    color: yellow;
}
table{
    border: 1px solid black;
    border-collapse: collapse;
    background-color:white;
}
td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}
.wrapper {
	margin-left: auto;
	margin-right: auto;
	margin-top: 30px;
	margin-bottom: 30px;
	width: 500px;
	min-width: 500px;
	min-height: 550px;
	height: auto;
	border-color: yellow;
	background-color: cyan;
	border:20px solid;
}
	#add_form{
		width:350px;
		position:relative;
		top:50px;
		margin: auto;
		padding: auto;
	}
.navbar {
    overflow: hidden;
    background-color: #333;
    font-family: Arial, Helvetica, sans-serif;
}
.Abackground{
    color:indigo;
    background: solid;
    background-color: cadetblue;
}
.navbar a {
    float: left;
    font-size: 16px;
    color: white;
    text-align: center;
    padding: 14px 16px;
    text-decoration: none;
}

.dropdown {
    float: left;
    overflow: hidden;
}

.dropdown .dropbtn {
    font-size: 16px;
    border: none;
    outline: none;
    color: white;
    padding: 14px 16px;
    background-color: inherit;
    font-family: inherit;
    margin: 0;
}

.navbar a:hover, .dropdown:hover .dropbtn {
    background-color: red;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
}

.dropdown-content a {
    float: none;
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
    text-align: left;
}

.dropdown-content a:hover {
    background-color: #ddd;
}

.dropdown:hover .dropdown-content {
    display: block;
}
body {font-family: Arial;}

/* Style the tab */
.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
    background-color: yellow;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {`
    background-color: yellow;
}

/* Create an active/current tablink class */
.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border-top: none;
}
body {font-family: Arial, Helvetica, sans-serif;
    background-color:cadetblue;}


input[type=text], input[type=password],select {
    width: 100%;
    padding: 6px 10px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button {
    background-color: teal;
    color: indigo;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    width: 100%;
}

button:hover {
    opacity: 0.8;
}

.cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
}

.imgcontainer {
    text-align: center;
    margin: 24px 0 12px 0;
}

img.avatar {
    width: 40%;
    border-radius: 50%;
}

.container {
    padding: 16px;
}

span.psw {
    float: right;
    padding-top: 16px;
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
<script src="js/jquery.min.js"></script>
</head>
<body>
<div class="Abackground">
<div class="navbar">
<div class="container">

<div class="dropdown">
    <button class="dropbtn">Students
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="tablinks" onclick="openTab(event, 'studentListTab')">Student List</a>

    </div>
    </div>

  <div class="dropdown">
    <button class="dropbtn">Course
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="tablinks" onclick="openTab(event, 'courseListTab')">Course List</a>
    </div>
    </div>

    <div class="dropdown">
    <button class="dropbtn">Subject
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="tablinks" onclick="openTab(event, 'subjectListTab')">Subject List</a>
      <?php
if ($_SESSION['session_id'] == null || $_SESSION['session_id'] == 0) {
    ?>
      <a class="tablinks" onclick="openTab(event, 'studentTutorial')">Student Tutorial</a>
<?php }else{?>
    <a class="tablinks" onclick="openTab(event, 'tutorProfile')">Rate Tutorial</a>
<?php }?>
    </div>
  </div>

    <div class="dropdown">
    <a class="tablinks" onclick="openTab(event, 'studentProfile')"> <?php echo $_SESSION['student_name'] ; ?></a>
  </div>


</div>
</div>



<div id="studentListTab" class="tabcontent">
<div id="student_table">
          <table >
                               <tr>
                                   <th>Student ID</th>
                                    <th>Student Name</th>
                                    <th>email</th>
                                    <th>Course</th>
                               </tr>
                               <?php
while ($row = mysqli_fetch_array($resultStudent)) {
    ?>
                               <tr>
                                    <td width="20%"><?php echo $row['student_id']; ?></td>
                                    <td><?php echo $row["first_name"] . " " . $row["midlle_name"] . " " . $row["last_name"]; ?></td>
                                    <td><?php echo $row["email"]; ?></td>
                                    <td><?php
$id = $row["course_id"];
    $student_course = "SELECT * FROM course WHERE course_id = $id";
    $result_student_course = mysqli_query($connect, $student_course);
    while ($row = mysqli_fetch_array($result_student_course)) {
        echo $row['course_name'];
    }
    ?></td>
                               </tr>
                               <?php
}
?>
                          </table>
                        </div>
                    </div>


<div id="courseListTab" class="tabcontent">
<div id="course_table">
          <table >
                               <tr>
                                   <th>Course ID</th>
                                    <th>Course Name</th>
                               </tr>
                               <?php
while ($row = mysqli_fetch_array($result)) {
    ?>
                               <tr>
                                    <td width="20%"><?php echo $row['course_id']; ?></td>
                                    <td><?php echo $row["course_name"]; ?></td>

                               </tr>
                               <?php
}
?>
                          </table>
                        </div>
</div>


<div id="subjectListTab" class="tabcontent">
<div id="subject_tablqe">
          <table >
                               <tr>
                                   <th>ID</th>
                                    <th>Name</th>
                                    <th>Description</th>
                                    <th>Course</th>
                               </tr>
                               <?php
while ($row = mysqli_fetch_array($resultSubject)) {
    ?>
                               <tr>
                                    <td width="20%"><?php echo $row['subject_id']; ?></td>
                                    <td><?php echo $row["subject_name"]; ?></td>
                                    <td><?php echo $row["subject_description"]; ?></td>
                                    <td><?php

    $id = $row["course_id"];
    $subject_course = "SELECT * FROM course WHERE course_id = $id";
    $result_subject_course = mysqli_query($connect, $subject_course);
    while ($row = mysqli_fetch_array($result_subject_course)) {
        echo $row['course_name'];
    }
    ?></td>
                               </tr>
                               <?php
}
?>
                          </table>
                        </div>
</div>

<div id="studentProfile" class="tabcontent">
<div id="subject_tablqe">
          <table >
          <th colspan='2'>Profile
    </th>
    <tr>
    <td>Rating</td>
    <td>
<span class="fa fa-star <?php if ($_SESSION["rating"] >= 1) {?>checked"<?php }?>></span>
<span class="fa fa-star <?php if ($_SESSION["rating"] >= 2) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating"] >= 3) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating"] >= 4) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating"] >= 5) {?>checked"<?php }?>"></span>
</td>
</tr>

<tr>
    <td>Student ID</td>
    <td><?php echo $_SESSION['student_id'] ?></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><?php echo $_SESSION['email'] ?></td>
    </tr>
    <tr>
    <td>Course</td>
    <td><?php
$id = $_SESSION['course_id'];
$student_course = "SELECT * FROM course WHERE course_id = $id";
$result_student_course = mysqli_query($connect, $student_course);
while ($row = mysqli_fetch_array($result_student_course)) {
    echo $row['course_name'];
}
?></td>
<tr>
    <th colspan='2'>TUTORIAL
    </th>
   
    <tr>
    <td>Tutor Student ID</td>
    <td><?php echo $_SESSION['session_id'] ?></td>
    </tr>

                          </table>
                        </div>
</div>

<div id="tutorProfile" class="tabcontent">
<div id="tutor_table">
<form action="rate-student.php" method="post">
          <table >
          <th colspan='2'>Profile
    </th>
    <tr>
    <td>Rating</td>
    <td>
<span class="fa fa-star <?php if ($_SESSION["rating1"] >= 1) {?>checked"<?php }?>></span>
<span class="fa fa-star <?php if ($_SESSION["rating1"] >= 2) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating1"] >= 3) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating1"] >= 4) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($_SESSION["rating1"] >= 5) {?>checked"<?php }?>"></span>
</td>
</tr>

<tr>
    <td>Student ID</td>
    <td><?php echo $_SESSION['student_id1'] ?></td>
    </tr>
    <tr>
    <td>Email</td>
    <td><?php echo $_SESSION['email1'] ?></td>
    </tr>
    <tr>
    <td>Course</td>
    <td><?php
$id = $_SESSION['course_id1'];
$student_course = "SELECT * FROM course WHERE course_id = $id";
$result_student_course = mysqli_query($connect, $student_course);
while ($row = mysqli_fetch_array($result_student_course)) {
    echo $row['course_name'];
}
?></td>
<tr>
    <th colspan='2'>TUTORIAL
    </th>
    <tr><td>
    Rating: 
    </td>
    <td><select name="student_rate">
             <option value=5>5</option>
             <option value=4>4</option>
             <option value=3>3</option>
             <option value=2>2</option>
             <option value=1>1</option>
                             </select>
    </tr></td>
    <tr>
    <td colspan="2">
    <button type="submit" class="btn btn-primary" onclick="submitStudent">Rate Student</button>
    </td>
    </tr>

                          </table>
                          </form>
                        </div>
</div>

<form method ="POST" action="selected-subject.php" >
<div id="studentTutorial" class="tabcontent">
<table>
<th>
Subject: <select name="subject-selected">
               <?php
$resultsubject = mysqli_query($con, $sqlsubject);
while ($row = mysqli_fetch_array($resultsubject)) {?>
				    <option value="<?php echo $row['course_id'] ?>  "><?php echo $row['subject_name']; ?></option>
               <?php }?>
                             </select>

	                        	<button type="submit" name="course">Select Subject</button>
                                </th>
                                </table>
                    </form>
</div>
<script>

var course_id = <?php echo json_encode($courseID); ?>;
var course_name = <?php echo json_encode($courseName); ?>;


function openTab(evt, tabName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(tabName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
</body>
</html>
