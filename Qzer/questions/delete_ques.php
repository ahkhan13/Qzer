<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$qid=$_POST['qid'];
$sql="DELETE FROM questions WHERE ques_id={$qid}";
if(mysqli_query($conn,$sql)){
    echo "Question has been deleted successfully.";
} else
{
    echo "Can't delete question";
}

?>