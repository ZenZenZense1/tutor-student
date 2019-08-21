<?php
session_start();
include "db.php";
$id = $_GET['id'];
$id1 = $_SESSION['id_number'];

$sql = "UPDATE student SET session='" . $id . "' WHERE id_number=$id1";

$query = "SELECT * FROM student WHERE student_id='" . $id . "'";

$result1 = mysqli_query($con, $query);
while ($row = mysqli_fetch_array($result1)) {
    $email = $row['email'];
}

?>

<style>
body{
    background:cadetblue;
}
</style>
<body>
<br/>
<br/>
<h1><?php

if ($con->query($sql) === true) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . $con->error;
}
?></h1>
<h2>
<a href=https://mail.google.com/mail/u/0/#inbox?compose=new target="_blank"><?php echo $email . 'asdasd' ?>
</h2>
<br/>
<a href="login.php">Finish</a>

</body>
