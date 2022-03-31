<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$course=$_POST['course'];
$active=1;
$date= date("F j, Y, g:i a"); 
$sql="UPDATE questions SET status='{$active}', date='{$date}' WHERE course_name = '{$course}' && email='{$email}' && status=0;";
$sql.="UPDATE courses SET status='{$active}' WHERE course_name = '{$course}' && email='{$email}';";
if(mysqli_multi_query($conn,$sql)){
    echo "Uploaded successfully";   
}else{
    echo "Error";
}


?>