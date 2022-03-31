<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
 <?php include '../conn/link.php';?>
   <style>
         body{
            background: #222f3e;
             background:#6F1E51;
        }
       #start_quiz{
        padding: 16px;
           font-size: 15px;
           font-weight: 600;
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
       <a class='nav-link' id='nava' href='../student_pro.php'>Home</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' id='nava' href=""><?php echo $_SESSION['email'];?></a>
      </li>
     <li>
       <a class='nav-link' id='nava' href=''><?php echo $_GET['course'];?></a>
      </li>
       </ul>
    </div>
        </div>
</nav>
</div>
        
    <div class="container">
           <div class="row">
            <div class="col-md-12">
                  <?php
                     $student=$_SESSION['email'];
                     $course=$_GET['course'];
                      echo  "<div class='head my-5'>
                         $course
                     </div>
                     <div class='inst_name my-5'>
                        $student 
                     </div>";
                  ?>
                
                <div class="col-md-12 text-center">
                <a href="show_quiz.php?course=<?php echo $course; ?>" id='start_quiz' class="btn btn-success">Start Quiz Now</a>
                </div>
               </div>
           </div>
        </div>
    </body>
</html>
