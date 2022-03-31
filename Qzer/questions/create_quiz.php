
<?php
session_start();
include '../conn/conn.php';
if(!isset($_SESSION['institute'])){
header("Location: http://localhost/quiz/index.php");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
   <?php include '../conn/link.php';?>
    <style>
        .error{
            color: red;
            background: white;
            padding: 10px;
            font-size: 18px;
            font-weight: 600;
        }
        body{
            background: #222f3e;
             background:#6F1E51;
        }
.navbar_head{
        background:#130f40;
    }
    #nava{
        margin-left:10px;
        color:snow;
        font-weight:600;
        font-size:16px;
        transition:all 0.3s ease-in-out;

    }
    #nava:hover{
       color: #e67e22;
       transform: scale(1.2,1.2); 
    }
#brand_name{
    color:snow;
  font-family: Arial, Helvetica, sans-serif;
  font-weight: 660;
  font-size: 26px;
  letter-spacing: 1px;
  text-shadow: 3px 3px 1px darkcyan;
}
        .available_courses{
            background: purple;
            color: white;
            padding: 30px;
        }
        .head{
            font-size: 40px;
            font-weight: 700;
            text-align: center;
            
        }
        .available_courses li{
            list-style: none;
            margin-top: 10px;
        }
        .available_courses li a{
            list-style: none;
            font-size: 20px;
            font-weight: 400;
            color: snow;
            transition: all 0.5s ease;
            
        }
        .available_courses li a:hover{
            color: darkcyan;
            text-decoration: none;
        }
        .available_courses button{
            padding: 10px;
            font-size: 20px;
        }
        .table tr{
            color: snow;
            font-size: 17px;
        }
        .fa{
            color: #fff200;
            font-size: 20px;
            font-weight: 700;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .fa:hover{
            color: #e67e22;
            transform: scale(1.4, 1.4);
            
        }
        table a{
            color:snow;
            font-size:20px;
            font-weight: 500;
            transition: all 0.6s ease;
        }
            table a:hover{
            color:goldenrod;
            transform: scale(1.5, 1.5);
            text-decoration: none;
        }
        #add_ques{
            padding: 4px;
            font-size: 16px;
            background: purple;
            transition: all 0.3s ease;
        }
        #add_ques:hover{
         background:#192a56;

        }
        #update{
            padding: 3px;
            font-size: 16px;
            background: purple;
            transition: all 0.3s ease;
        }
        #update:hover{
         background:#192a56;

        }
         #save_ques{
            padding: 3px;
            font-size: 16px;
            background: purple;
            transition: all 0.3s ease;
        }
        #save_ques:hover{
         background:#192a56;

        }
        .form-control{
    
            font-size: 16px;
   }

        .head{
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: white;
            text-decoration: underline;
       }
        .label{
            font-size:11px;
            font-weight: 740;
            color: darkred;
            padding-bottom: 1px;
        }
          .pop_up_box{
            display: none;
            position: absolute;
            background: rgba(30,40,50,0.8);
            top:0px;
            width: 100%;
            height: 100vh;
        }
        .pop_up{
            background: white;
            position: relative;
            margin-top: 50px;
            padding: 50px;
            box-shadow: 1px 2px 3px rgba(0,0,0,0.2);
        }
        .pop_up_btn{
            position: relative;
             top:-65px;
             left:480px;
            font-size: 15px;
            background: red;
            color: aliceblue;
            display: inline-block;
            padding: 5px;
            border-radius: 50%;
            cursor: pointer;
        }
        #error{
            color: red;
            background:snow;
            font-size: 14px;
            font-weight: 500;
            display: none;
        }
        #errorr{
            color: red;
            background:snow;
            padding: 0px;
            font-size: 15px;
            font-weight: 500;
             display: none;
            padding: 4px;
        }
        .form_data{
            background:#130f40;
            padding: 30px;
             display: none;
        }  
        .disabled{
            cursor: not-allowed;
            opacity: 0.6;
        }
        .uploaded{
            font-size:16px;
            font-weight:700px;
        }
        .plus{
            font-weight:700;
            font-size:20px;
        }
        .uploaded_ques{
            border:30px solid #130f40;
            display:none;
        }
        .uploaded_ques a{
            padding:6px;
            background:#b2bec3;
            font-size:14px;
            color:black;
        }
        .uploaded_btn{

        }
        #uploaded_btn{
            padding: 4px;
            font-size: 16px;
            background: purple;
            transition: all 0.3s ease;
        }
        #uploaded_btn:hover{
         background:#192a56;

        }
    </style>
</head>
    
    <body>
   <div class="navbar_head">
  <nav class="navbar navbar-expand-lg navbar-light py-1" id="navbar_head">
      <div class="container">
  <a class="navbar-brand" href="" id="brand_name">Quiz</a>
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span  class="navbar-toggler-icon"></span>
  </button>
  <div  class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
           <li>
       <a class="nav-link" id="nava" href="../index.php">Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="nava" href="add_courses.php">Courses</a>
      </li>
     <li class="nav-item">
        <a class="nav-link" id="nava" href=""><?php echo $_SESSION['institute']?></a>
      </li>
    </ul>
    </div>
        </div>
</nav>
        </div>

<div class="container">
       <div class="head">as</div>
        <button class="btn btn-primary my-1 btn-block" id="uploaded_btn">Uploaded Questions</button>
          <div class="uploaded_ques">
            <div class="row">
                <div class="col-md-12">
                    <?php
                     include '../conn/conn.php';
                     $inst_email=$_SESSION['email'];
                     $course_name=$_GET['course'];
                     $status=1;
                     $sql= "SELECT * FROM questions WHERE status='{$status}' && course_name='{$course_name}'";
                     $result=mysqli_query($conn, $sql);
                     if(mysqli_num_rows($result)>0){
                        $row=mysqli_fetch_assoc($result);

                         
                     
                    ?> 
                    <div class="card">
                      <a href=""><?php echo $row['date']; ?></a>
                    </div>
                   
                    <?php } else{
                        echo "<div class='error'>No questions Available</div>";
                        }?>
                </div>
                </div>
            </div>
            <div class="row">
            <div class="col-md-12">
                <form class="form-inline">
        
          <button class="btn btn-primary my-3" id="add_ques">Add Questions <span class='plus'>+</span></button>
</form>          
                 <div class="form_data">
                  <form class="form" id="ques_form" autocomplete="off">
                  <div class="form-group">
                      <textarea class="form-control" placeholder="Question Name ... " id="ques_name" cols="3" rows="3"></textarea>
                  </div>
                    
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Option1" id="opt1">
                  </div>
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Option2" id="opt2">
                  </div>
                      
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Option3" id="opt3">
                  </div>
                   <div class="form-group">
                     <input type="text" class="form-control" placeholder="Option4" id="opt4">
                  </div>
                 <div class="form-group">
                     <input type="text" class="form-control" placeholder="Right Answer" id="right_ans">
                  </div>
                    <div class="form-group">
                     <input type="text" class="form-control" placeholder="Marks For this question" id="mark">
                  </div>
                      <button class="btn btn-primary btn-block my-2" id="save_ques">Save</button>   
                    
                </form>
                </div>
            
            <div id="show_ques"></div>
                
            </div>
            </div>  
        </div>
        <div class='pop_up_box'>
                
                </div>
    </body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
     <script> 
$(document).ready(function(){
    function GetURLParameter(sParam)
{
    var sPageURL = window.location.search.substring(1);
    var sURLVariables = sPageURL.split('&');
    for (var i = 0; i < sURLVariables.length; i++)
    {
        var sParameterName = sURLVariables[i].split('=');
        if (sParameterName[0] == sParam)
        {
            return decodeURIComponent(sParameterName[1]);
        }
    }
}
var course= GetURLParameter('course');
    $('.head').html(course);
        
     $('#add_ques').click(function(e){
             e.preventDefault();
             $('.form_data').fadeToggle();
             $('.error').toggle();
         
             
         });
        function load_ques(course){
              $.ajax({
                     url: "read_ques.php",
                     type:"POST",
                     data:{course:course},
                     success:function(data){
                     $('#show_ques').html(data);   
                     } 
                 });
         }
         load_ques(course);
         $('#save_ques').click(function(e){
             e.preventDefault();
             var ques=$('#ques_name').val();
             var opt1=$('#opt1').val();
             var opt2=$('#opt2').val();
             var opt3=$('#opt3').val();
             var opt4=$('#opt4').val();
             var mark=$('#mark').val();
             var right_ans=$('#right_ans').val();
        if(ques!=""&& opt1!="" && opt2!="" && opt3!="" && opt4!="" && mark!="" && right_ans!=""){
                 $.ajax({
                     url: "save_ques.php",
                     type:"POST",
                     data:{course:course,ques:ques,opt1:opt1,opt2:opt2,opt3:opt3,opt4:opt4,mark:mark, right_ans},
                     success:function(data){
                         load_ques(course);
                         $('#ques_form').trigger('reset');
                     }
                 })
             }
                else{
                 alert("all fields are required");
            }

             
         });
         $(document).on('click', '#edit_btn', function(){
            var qid = $(this).data('id');
            var course_name = $(this).data('course');
            $('.pop_up_box').fadeIn();
              $.ajax({
                     url: "update_ques.php",
                     type:"POST",
                     data:{qid:qid},
                     success:function(data){
                      $('.pop_up_box').html(data); 
                     }
                 });
                   
        });
         $(document).on('click', '.pop_up_btn', function(){
          $('.pop_up_box').fadeOut();   
         });
         
         $(document).on('click', '#update', function(e){
             e.preventDefault();
             var updated_ques=$('#updated_ques').val();
             var updated_opt1=$('#updated_opt1').val();
             var updated_opt2=$('#updated_opt2').val();
             var updated_opt3=$('#updated_opt3').val();
             var updated_opt4=$('#updated_opt4').val();
             var updated_mark=$('#updated_mark').val();
             var qid = $(this).data('id');
             var pre_course = $('#pre_course').val();
             if(updated_ques!="" && updated_opt1!="" && updated_opt2!="" && updated_opt3!="" && updated_opt4!="" && updated_mark!=""){ 
                 $.ajax({
                     url: "updated_ques.php",
                     type:"POST",
                     data:{updated_ques:updated_ques, qid:qid, updated_opt1:updated_opt1, updated_opt2:updated_opt2, updated_opt3:updated_opt3, updated_opt4:updated_opt4, updated_mark:updated_mark},
                     success:function(data){
                         if(data==1){
                      $('.pop_up_box').fadeOut(); 
                         load_ques(course); 
                         }else{
                            $('#error').fadeIn().html(data); 
                         }
                     }
                 });
              }else{
              $('#error').fadeIn().html("All fields are required."); 
                  }
         });
         
           $(document).on('click', '#delete_btn', function(){
            if(confirm('Are You really want to delete this course?')){
            var qid = $(this).data('id');
              $.ajax({
                     url: "delete_ques.php",
                     type:"POST",
                     data:{qid:qid},
                     success:function(data){
                         load_ques(course);
                         $('#errorr').fadeIn().html(data);
                     }
                 });
            }
        });
        
        $(document).on('click', '#upload_quiz', function(){
            if(confirm("Are you sure for uploading?")){
               $.ajax({
                url:"upload_quiz.php",
                method:"POST",
                data:{course:course},
                success:function(data){
                alert(data);
                $('#errorr').fadeIn().html(data);
                $('#upload_quiz').addClass("disabled").html("Uploaded");  
                }
            });
       }
        });
        $('#uploaded_btn').click(function(e){
             e.preventDefault();
             $('.uploaded_ques').fadeToggle();
         
             
         });

     });
</script>