<?php
include "../conn/conn.php";
session_start();
$students=$_POST['updated_students'];
$email=$_SESSION['email'];
$sid=$_POST['sid'];
$sql1="SELECT * FROM students WHERE inst_email = '{$email}' && email='{$students}'";
$result=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result)>0){
    echo "Already added";
}else{
$sql="UPDATE students SET email = '{$students}' WHERE id={$sid}";
if(mysqli_multi_query($conn,$sql)){
    echo 1;
} else
{
    echo "Can't Update";
}
}
?>