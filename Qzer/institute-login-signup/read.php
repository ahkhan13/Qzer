<?php
include '../conn/conn.php';
$inst_name=$_POST['inst_name'];
$email=$_POST['email'];
$pword=$_POST['pword'];
if($inst_name!="" && $email!="" && $pword!=""){
$sql1="SELECT * FROM institutes WHERE inst_name='{$inst_name}'";
$result1=mysqli_query($conn,$sql1);
if(mysqli_num_rows($result1)>0){
    while($row=mysqli_fetch_assoc($result1)){
        $email=$row['email'];
        session_start();
       $_SESSION['institute']=$row['inst_name'];
       $_SESSION['email']=$row['email'];
        $password=$row['password'];
        if($email===$email &&  $password===$pword){
             echo 1;  
        }else{
          echo "Email or password are not matching";  
        }
    }
 }else{
 echo "Institute is not matching";
 }
}
else{
    echo "All fields are required";
}
?>