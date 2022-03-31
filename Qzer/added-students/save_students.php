<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$stu_email=$_POST['email'];
$inst_name=$_SESSION['institute'];
$stu_password=$_POST['password'];
$sql1="SELECT * FROM students WHERE email = '{$stu_email}' && inst_email='{$email}'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){
    echo "<span class='highlight'>{$stu_email}</span> already added. ";
}else{
$sql="INSERT INTO students(email,password,inst_email, inst_name) VALUES('{$stu_email}','{$stu_password}', '{$email}', '{$inst_name}')";
if(mysqli_query($conn,$sql)){
    echo 1;
} else
{
 echo "Can't saved record";
}
}
?>