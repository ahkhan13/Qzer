
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
            padding: 3px;
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
            
            padding: 0px;
            font-size: 15px;
            font-weight: 500;
             display: none;
            padding: 4px;
        }
        .form_data{
            background:#130f40;
            padding: 40px;
             display: none;
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
        <a class="nav-link" id="nava" href="../courses/add_courses.php">Courses</a>
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
       <div class="head">Students</div>
            <div class="row">
            <div class="col-md-12">
                <form class="form-inline">
        
          <button class="btn btn-primary my-4" id="add_ques">Add Students</button>
</form>    
                 <div class="form_data">
                  <form class="form" id="ques_form" autocomplete="off">
              
                    
                  <div class="form-group">
                      <input type="text" class="form-control" placeholder="Email/Roll no" id="student_email">
                  </div>
                    
                    <div class="form-group">
                     <input type="password" class="form-control" placeholder="Dob as password" id="student_password">
                  </div>
                  <div class="form-group" id='errorr'>
                      
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
    function load_students(){
              $.ajax({
                     url: "read_students.php",
                     type:"POST",
                     success:function(data){
                     $('#show_ques').html(data);
                     }
                     
                 });
         }
        load_students();
     $('#add_ques').click(function(e){
             e.preventDefault();
             $('.form_data').fadeToggle();
             $('.error').toggle();
             
         });
        
         $('#save_ques').click(function(e){
             e.preventDefault();
             var stu_email=$('#student_email').val();
             var stu_password=$('#student_password').val();
             if(stu_email!=""&& stu_password!=""){
                 $.ajax({
                     url: "save_students.php",
                     type:"POST",
                     data:{email:stu_email,password:stu_password},
                     success:function(data){
                         if(data==1){
                         $('#ques_form').trigger('reset');
                        load_students();
                         }
                         else{
                           $('#errorr').fadeIn().html(data);   
                         }
                     }
                 });
             }
                else{
                 $('#errorr').fadeIn().html("All fields are required.");
            }

             
         });
         $(document).on('click', '#edit_btn', function(){
            var sid = $(this).data('id');
            $('.pop_up_box').fadeIn();
            
              $.ajax({
                     url: "update_students.php",
                     type:"POST",
                     data:{sid:sid},
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
              var sid = $(this).data('id');
             var updated_students = $('#updated_students').val();
             if(updated_students!=""){ 
                 $.ajax({
                     url: "updated_students.php",
                     type:"POST",
                     data:{sid:sid, updated_students:updated_students},
                     success:function(data){
                         if(data==1){
                      $('.pop_up_box').fadeOut(); 
                         load_students(); 
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
            var sid = $(this).data('id');
              $.ajax({
                     url: "delete_students.php",
                     type:"POST",
                     data:{sid:sid},
                     success:function(data){
                         load_students();
                         $('#errorr').fadeIn().html(data);
                     }
                 });
            }
        });
    
     });
</script>
