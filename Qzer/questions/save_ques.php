<?php
include "../conn/conn.php";
session_start();
 $email=$_SESSION['email'];
 $course=$_POST['course'];
$ques=$_POST['ques'];
$opt1=$_POST['opt1'];
$opt2=$_POST['opt2'];
$opt3=$_POST['opt3'];
$opt4=$_POST['opt4'];
$mark=$_POST['mark'];
$right_ans=$_POST['right_ans'];
$date= date("F j, Y, g:i a");    
$sql="INSERT INTO questions(course_name,email,ques_name,opt1,opt2,opt3,opt4,mark,right_ans,date) VALUES('{$course}','{$email}','{$ques}','{$opt1}','{$opt2}','{$opt3}','{$opt4}','{$mark}','{$right_ans}','{$date}')";
if(mysqli_query($conn,$sql)){
    echo 1;
} else
{
    echo "Can't saved record";
}

?>