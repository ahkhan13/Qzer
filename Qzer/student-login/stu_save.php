<?php
include '../conn/conn.php';
$inst_name=$_POST['inst_name'];
$email=$_POST['email'];
$pword=$_POST['password'];
$sql1="SELECT * FROM students WHERE inst_email='{$inst_name}' && email = '{$email}'";
$result1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>0){
    while($row=mysqli_fetch_assoc($result1)){
        $email=$row['email'];
        session_start();
       $_SESSION['email']=$row['email'];
       $_SESSION['inst_email']=$row['inst_email'];
        $password=$row['password'];
        if($email===$email &&  $password===$pword){
             echo 1;  
        }else{
          echo "Email or password are not matching";  
        }
    }
 }else{
 echo "<span class='highlight'>$email</span> is not registered Yet";
 }

?>