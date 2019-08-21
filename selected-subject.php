<?php
include "db.php";

$course_id = $_POST['subject-selected'];
$student_subject = "SELECT * FROM student WHERE course_id = $course_id ORDER BY rating DESC ";
$result_student_subject = mysqli_query($connect, $student_subject);
?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<style>
h1 {
    background-color: black;
    color:white;
}

body {
    font-family: Arial,
     Helvetica,
     sans-serif;
    background-color:cadetblue;
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
.checked {
    color: yellow;
}
</style>
<body>
<h1>This is the are the students who can teach the selected subject</h1>
<form method ="POST" action="tutor-student.php" >
<table name = 'student_table'>
<tr>
    <th>Student ID</th>
     <th>Student Name</th>

     <th>Rating</th>
</tr>
<?php
while ($row = mysqli_fetch_array($result_student_subject)) {
    ?>
<tr >
     <td width="20%"><?php echo $row['student_id']; ?></td>
     <td><a href="tutor-student.php?id=<?=$row['student_id']?>" ><?php echo $row["first_name"] . " " . $row["midlle_name"] . " " . $row["last_name"]; ?></td>

     <td>

<span class="fa fa-star <?php if ($row["rating"] >= 1) {?>checked"<?php }?>></span>
<span class="fa fa-star <?php if ($row["rating"] >= 2) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($row["rating"] >= 3) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($row["rating"] >= 4) {?>checked"<?php }?>"></span>
<span class="fa fa-star <?php if ($row["rating"] >= 5) {?>checked"<?php }?>"></span>


     </td>
</tr>
<?php
}
?>
</table>
</form>
<a href="user-select-subject.php">Back</a>
</body>
