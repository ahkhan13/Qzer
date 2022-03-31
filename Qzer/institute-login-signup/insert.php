<?php
include '../conn/conn.php';
 $inst_name=$_POST['inst_name'];
 $email=$_POST['email'];
 $pword=$_POST['pword'];
 $cpword=$_POST['cpword'];
if($inst_name!="" && $email!="" && $pword!="" && $cpword!=""){
$sql1="SELECT * FROM institutes WHERE inst_name='{$inst_name}'";
$result1=mysqli_query($conn,$sql1);
$sql2="SELECT * FROM institutes WHERE email='{$email}'";
$result2=mysqli_query($conn,$sql2);
if(mysqli_num_rows($result1)>0){
   echo "Institute Already Registered"; 
}else if(mysqli_num_rows($result2)>0){
   echo "Email Already Registered";  
}else if($pword===$cpword){
   $sql="INSERT INTO institutes(inst_name, email, password, cpassword) VALUES('{$inst_name}','{$email}','{$pword}','{$cpword}')";
    if(mysqli_query($conn,$sql)){
    echo "Hello $inst_name your record is saved Successfully";
} else
{
    echo "Can't saved record";
} 
    }else{
        echo "Password is not matching";
    }
}
else{
    echo "All fields are required";
}
?>