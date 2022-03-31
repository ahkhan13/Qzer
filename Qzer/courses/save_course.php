<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$course=$_POST['course'];
$sql1="SELECT * FROM courses WHERE course_name = '{$course}' && email='{$email}'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){
    echo "<span class='highlight'>{$course}</span> course already added. ";
}else{
$sql="INSERT INTO courses(course_name,email) VALUES('{$course}','{$email}')";
if(mysqli_query($conn,$sql)){
    echo 1;
} else
{
 echo "Can't saved record";
}
}
?>
