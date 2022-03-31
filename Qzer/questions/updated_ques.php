<?php
include "conn.php";
session_start();
$ques=$_POST['updated_ques'];
$opt1=$_POST['updated_opt1'];
$opt2=$_POST['updated_opt2'];
$opt3=$_POST['updated_opt3'];
$opt4=$_POST['updated_opt4'];
$mark=$_POST['updated_mark'];
$email=$_SESSION['email'];
$qid=$_POST['qid'];
$sql="UPDATE questions SET ques_name = '{$ques}', opt1='{$opt1}',  opt2='{$opt2}',  opt3='{$opt3}',  opt4='{$opt4}',  mark='{$mark}' WHERE ques_id={$qid}";
if(mysqli_query($conn,$sql)){
    echo 1;
} else
{
    echo "Can't Update";
}

?>