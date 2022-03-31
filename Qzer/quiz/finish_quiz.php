<?php
   include "../conn/conn.php";
   echo $_POST['q'];
   $sql="SELECT * FROM questions WHERE email='{$_SESSION['inst_email']}'";
   $result=mysqli_query($conn,$sql);
   
?>