<?php
include "../conn/conn.php";
session_start();
$email=$_SESSION['email'];
$course=$_POST['course'];
$status=0;
$sql="SELECT * FROM questions WHERE course_name = '{$course}' && email='{$email}' && status='{$status}'";
$result=mysqli_query($conn,$sql);
$output="";
$i=0;
if(mysqli_num_rows($result)>0){
    $output='<div id="errorr"></div>
    <table class="table table-striped table-dark">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Questions</th>
      <th scope="col">Answer</th>
      <th scope="col">Mark</th>
      <th scope="col">Edit</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>';
  while($row=mysqli_fetch_assoc($result)){
      $i=$i+1;
 $output.="<tbody>
    <tr>
      <td scope='row'>$i</td>
      
      <td>{$row['ques_name']}</a></td>
      <td>{$row['right_ans']}</a></td>
      <td>{$row['mark']}</a></td>
      <td><i class='fa fa-edit' id='edit_btn' data-id={$row['ques_id']}></i></td>
      <td><i class='fa fa-trash-alt' id='delete_btn' data-id={$row['ques_id']}></i></td>
    </tr> 
  </tbody>";
  }

    $output.='</table>';
    $output.='<button class="btn btn-success p-3" id="upload_quiz">Upload Quiz <i class="fas fa-upload"></i></button>';
    mysqli_close($conn);
echo $output;
}


else {
    echo "<div class='error'>No Question Available</div>";
}
?>