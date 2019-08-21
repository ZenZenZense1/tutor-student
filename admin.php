<?php
include "db.php";

$searchCourseId = $_GET["course_id"];

?>

<!DOCTYPE html>
<html>
<head>
<Title>Admin</Title>
<meta name="viewport" content="width=device-width, initial-scale=1">



<style>
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
      <a hclass="tablinks" onclick="openTab(event, 'addStudent')">Add Students</a>
      <a class="tablinks" onclick="openTab(event, 'studentListTab')">Student List</a>

    </div>
    </div>

  <div class="dropdown">
    <button class="dropbtn">Course
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
      <a class="tablinks" onclick="openTab(event, 'addCourse')">Add Course</a>
      <a class="tablinks" onclick="openTab(event, 'courseListTab')">Course List</a>
    </div>
    </div>

    <div class="dropdown">
    <button class="dropbtn">Subject
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
    <a class="tablinks" onclick="openTab(event, 'addSubject')">Add Subject</a>
      <a class="tablinks" onclick="openTab(event, 'subjectListTab')">Subject List</a>
      <a class="tablinks" onclick="openTab(event, 'studentTutorial')">Student Tutorial</a>
    </div>
  </div>

</div>
</div>


<div id="addCourse" class="tabcontent">
<div class="container">
<div class="wrapper">
	<div id="add_form" class="well">
		<h2><center><span class="glyphicon glyphicon-user"></span>Add Course</center></h2>
		<hr>
        <form action="insert-course.php" method="post">
         Course Name: <input type="text" name="courseName" class="form-control" required>

		<div style="height:5px;"></div>
		<button type="submit" class="btn btn-primary" onclick="submitCourse">Add Course</button>
		</form>
					</span>
				</div>
            </div>
        </div>
    </div>



<div id="addStudent" class="tabcontent">
    <div class="container">
      <div class="wrapper">
	    <div id="add_form" class="well">
		<h2><center><span class="glyphicon glyphicon-user"></span>Add Student</center></h2>
		<hr>
        <form action="insert-student.php" method="post">
                First Name: <input type="text" name="firstName" class="form-control" required>
                Last Name: <input type="text" name="lastName" class="form-control" required>
        Course: <select name="student_course">
               <?php
$resultcourse = mysqli_query($con, $sqlcourse);
while ($row = mysqli_fetch_array($resultcourse)) {?>
				    <option value=<?php echo $row['course_id'] ?>><?php echo $row['course_name']; ?></option>
               <?php }?>
                             </select>

		Email: <input type="text" name="email" class="form-control" required>

		ID Number: <input type="text" name="studentID" class="form-control" required>

        Rating: <select name="student_rate">
             <option value=5>5</option>
             <option value=4>4</option>
             <option value=3>3</option>
             <option value=2>2</option>
             <option value=1>1</option>
                             </select>
		<button type="submit" class="btn btn-primary" onclick="submitStudent">Add Student</button>
		</form>
					</span>
				</div>
            </div>
	    </div>
    </div>


<div id="addSubject" class="tabcontent">
    <div class="container">
      <div class="wrapper">
	    <div id="add_form" class="well">
	    	<h2><center><span class="glyphicon glyphicon-user"></span>Add Subject</center></h2>
		        <hr>
                  <form method="POST" action="insert-subject.php">
                       Subject Name: <input type="text" id="subjectName" name="subjectName" class="form-control" required>
	            	<div style="height: 10px;"></div>
                        Description: <input type="text" id="subjectDescription" name="subjectDescription" class="form-control" required>
		         <div style="height: 10px;"></div>

                Course: <select name="subject_course">
               <?php
$resultcourse = mysqli_query($con, $sqlcourse);
while ($row = mysqli_fetch_array($resultcourse)) {?>
				    <option value=<?php echo $row['course_id'] ?>  ><?php echo $row['course_name']; ?></option>
               <?php }?>
                             </select>
                          <div style="height: 10px;"></div>
	                    	<div style="height: 10px;"></div>
	                        	<button type="submit" class="btn btn-primary">Add Subject</button>
		                 </form>
					</span>
		        </div>
            </div>
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
