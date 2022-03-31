<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$course_id=$_POST['cid'];
$course=$_POST['course_name'];
$sql="DELETE FROM courses WHERE course_id={$course_id};";
$sql.="DELETE FROM questions WHERE email='{$email}' && course_name='{$course}'";
if(mysqli_multi_query($conn,$sql)){
    echo "<span id='highlight'>$course</span> has been deleted successfully.";
} else
{
    echo "Can't delete course name <span id='highlight'>$course</span>";
}

?>