<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$sql="SELECT * FROM courses WHERE email='{$email}'";
$result=mysqli_query($conn,$sql);
$output="";
$i=0;
if(mysqli_num_rows($result)>0){
    $output='<div id="errorr"></div>
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">No. Of Ques</th>
      <th scope="col">Courses</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result)){
   $sql1="SELECT * FROM questions WHERE email='{$email}' && course_name='{$row['course_name']}'";
     $result1=mysqli_query($conn,$sql1);
     $num=mysqli_num_rows($result1);
      $i=$i+1;
 $output.="<tbody>
    <tr>
     
      <td scope='row'>$num</td>
      <td class='course_name'><a href='../questions/create_quiz.php?course={$row['course_name']}'>{$row['course_name']}</a></td>
      <td><i class='fa fa-edit' id='edit_btn' data-id={$row['course_id']}></i></td>
      <td><i class='fa fa-trash-alt' id='delete_btn' data-id={$row['course_id']} data-course={$row['course_name']}></i></td>
    </tr> 
  </tbody>";
  }
 
    $output.='</table>';
    mysqli_close($conn);
echo $output;
}


else {
    echo "<div class='error'>No Courses Available</div>";
}
?>