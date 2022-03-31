<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$sid=$_POST['sid'];
$sql="DELETE FROM students WHERE id={$sid}";
if(mysqli_multi_query($conn,$sql)){
    echo "Record has been deleted successfully.";
} else
{
    echo "Can't delete";
}

?>