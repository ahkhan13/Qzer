<?php
include "../conn/conn.php";
$ques_id=$_POST['qid'];
$sql="SELECT * FROM questions WHERE ques_id='{$ques_id}'";
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
                               <lable class='label'>Question</lable>
                                <textarea class='form-control' id='updated_ques' value='{$row['ques_name']}'>{$row['ques_name']}</textarea>
                             </div>
                              <div class='form-group'>
                                 <lable class='label'>Right Answer / Option 1</lable>
                                <input type='text' class='form-control' value='{$row['opt1']}' id='updated_opt1'>
                                
                             </div>
                              <div class='form-group'>
                                    <lable class='label'>Option 2</lable>
                                <input type='text' class='form-control' value='{$row['opt2']}' id='updated_opt2'>
                                
                             </div>
                              <div class='form-group'>
                                  <lable class='label'>Option 3</lable>
                                <input type='text' class='form-control' value='{$row['opt3']}' id='updated_opt3'>
                             </div>
                             <div class='form-group'>
                                 <lable class='label'>Option 4</lable>
                                <input type='text' class='form-control' value='{$row['opt4']}' id='updated_opt4'>
                             </div>
                             <div class='form-group'>
                                 <lable class='label'>Mark</lable>
                                <input type='text' class='form-control' value='{$row['mark']}' id='updated_mark'>
                             </div>
                              <div class='form-group'>
                             <div id='error'></div>
                                 </div>
                            <div class='form-group'>
                                <button class='btn btn-primary' id='update' data-id= {$row['ques_id']}>Update</button>
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