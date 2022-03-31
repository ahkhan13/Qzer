<?php
include "../conn/conn.php";
$course_id=$_POST['cid'];
$sql="SELECT * FROM courses WHERE course_id='{$course_id}'";
$result=mysqli_query($conn,$sql);
$output="";
$i=0;
if(mysqli_num_rows($result)>0){
       while($row=mysqli_fetch_assoc($result)){
      $output="
            <div class='container'>
                <div class='row'>
                <div class='col-md-offset-3 col-md-6'>
                     <div class='pop_up'>
                         <div class='pop_up_btn'>X</div>
                         <form class='form'>
                             <div class='form-group'>
                                <input type='text' class='form-control' value='{$row['course_name']}' id='updated_course'>
                                <input type='text' class='form-control' value='{$row['course_name']}' id='pre_course' hidden>
                             </div>
                             <div id='error'></div>
                            <div class='form-group'>
                                <button class='btn btn-primary' id='add_ques' data-id= {$row['course_id']}>Update</button>
                             </div>
                         </form>
                      </div>
                    </div>
                </div>
            
               </div>
               ";
}
    echo $output;
}else{
    echo "error";
}

?>