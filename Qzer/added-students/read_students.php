<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$sql="SELECT * FROM students WHERE inst_email='{$email}'";
$result=mysqli_query($conn,$sql);
$output="";
$i=0;
if(mysqli_num_rows($result)>0){
    $output='<div id="errorr"></div>
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">S.N</th>
      <th scope="col">Students</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result)){
      $i=$i+1;
 $output.="<tbody>
    <tr>
     
      <td scope='row'>$i</td>
      <td class='course_name'><a href='create_quiz.php?course={$row['email']}'>{$row['email']}</a></td>
      <td><i class='fa fa-edit' id='edit_btn' data-id={$row['id']}></i></td>
      <td><i class='fa fa-trash-alt' id='delete_btn' data-id={$row['id']}></i></td>
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