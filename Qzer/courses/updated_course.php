<?php
include "../conn/conn.php";
session_start();
$course=$_POST['updated_course'];
$pre_course=$_POST['pre_course'];
$email=$_SESSION['email'];
$course_id=$_POST['cid'];
$sql1="SELECT * FROM courses WHERE course_name = '{$course}' && course_id='{$email}'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){
    echo "Already added";
}else{
$sql="UPDATE courses SET course_name = '{$course}' WHERE course_id={$course_id};";
$sql.="UPDATE questions SET course_name = '{$course}' WHERE email='{$email}' && course_name='{$pre_course}'";
if(mysqli_multi_query($conn,$sql)){
    echo 1;
} else
{
    echo "Can't Update";
}
}
?>
