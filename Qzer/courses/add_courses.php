
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
      <?php include '../conn/link.php'; ?>
    <style>
       
        .course_name a{
            color: #2ecc71;
           color: #fff200;
            font-size: 20px;
            font-weight: 700;
            transition: all 0.3s ease;
        }
         .course_name a:hover{
            color: #e67e22;
        }
        .error{
            color: red;
            background: white;
            padding: 10px;
            font-size: 18px;
            font-weight: 600;
        }
        .head{
            text-align: center;
            font-size: 28px;
            font-weight: 800;
            color: white;
            text-decoration: underline;
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
        #updated_course{
            font-size: 16px;
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
            font-size:16px;
            font-weight: 500;
            transition: all 0.6s ease;
        }
            table a:hover{
            color:goldenrod;
        
        }
         #add_ques{
            padding: 3px;
            font-size: 17px;
            background: purple;
            transition: all 0.3s ease;
        }
        #add_ques:hover{
         background:#192a56;

        }
         #add_course{
            padding: 2px;
            font-size: 15px;
            transition: all 0.3s ease;
             color: green;
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
            margin-top: 180px;
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
            margin-bottom: 5px;
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
        .highlight{
            font-size: 23px;
             color: peru;
             font-weight: 700;
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
       <li>
       <a class="nav-link" id="nava" href=""><?php echo $_SESSION['institute']?></a>
      </li>
    </ul>
    </div>
        </div>
</nav>
        </div>
        <div class="container">
            <div class="row">
                
            <div class="col-md-12">
                <div class="head my-1">Courses</div>
                <form class="form-inline">
        
            <div class="form-group my-3">
           <input type="text" class="form-control" placeholder="Course name ..." id="add_course">
           </div>
           <button class="btn btn-primary ml-2" id="add_ques">Add Course</button>
</form>
              
   <div id="show_course">
                
                </div>
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
         function load_course(){
              $.ajax({
                     url: "read_course.php",
                     type:"POST",
                     success:function(data){
                     $('#show_course').html(data);
                        $('#add_course').val('');
                     }
                     
                 });
         }
         load_course();
         $('#add_ques').click(function(e){
             e.preventDefault();
             var course=$('#add_course').val();
             if(course!=''){
                 $.ajax({
                     url: "save_course.php",
                     type:"POST",
                     data:{course:course},
                     success:function(data){
                         if(data==1){
                             load_course();
                         }else{
                             $('#errorr').fadeIn().html(data); 
                         }
                        
                         
                     }
                     
                 });
             }else{
              
             }
         });
        $(document).on('click', '#edit_btn', function(){
            var cid = $(this).data('id');
            var course_name = $(this).data('course');
            
            $('.pop_up_box').fadeIn();
              $.ajax({
                     url: "update_course.php",
                     type:"POST",
                     data:{cid:cid, course:course_name},
                     success:function(data){
                      $('.pop_up_box').html(data); 
                     }
                 });
                   
        });
         $(document).on('click', '.pop_up_btn', function(){
          $('.pop_up_box').fadeOut();   
         });
         
         $(document).on('click', '#add_ques', function(e){
             e.preventDefault();
             var updated_course=$('#updated_course').val(); 
             var cid = $(this).data('id');
             var pre_course = $('#pre_course').val();
             if(updated_course!=""){
                 $.ajax({
                     url: "updated_course.php",
                     type:"POST",
                     data:{updated_course:updated_course, cid:cid, pre_course:pre_course},
                     success:function(data){
                        if(data==1){
                           $('.pop_up_box').fadeOut(); 
                         load_course(); 
                         }else{
                            $('#error').fadeIn().html(data); 
                         }
                     }
                 });
             }else{
                 $('#error').fadeIn().html("All fields are required");  
             }
         });
         
           $(document).on('click', '#delete_btn', function(){
            if(confirm('Are You really want to delete this course?')){
            var cid = $(this).data('id');
            var course_name = $(this).data('course');
              $.ajax({
                     url: "delete_course.php",
                     type:"POST",
                     data:{cid:cid, course_name:course_name},
                     success:function(data){
                          load_course();
                     }
                 });
            }
        });
        
     });
</script>