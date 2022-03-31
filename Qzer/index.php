<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>quiz</title>
    <link rel="stylesheet" href="js/bootstrap.min.css" />
    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="js/font-awesome.css">
    <!-- Custom stlylesheet -->
    <link rel="stylesheet" href="js/style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
   <style>
         body{
            background: #222f3e;
             background:#6F1E51;
        }
       #card{
         background:#130f40;
           color: white;
           padding: 40px;
           transition: all 0.2s ease;
           padding-bottom: 80px;
           border-bottom: 6px solid #6F1E51;
       }
       #card_data{
           font-size: 25px;
           text-decoration: none;
       }
       .col-md-4 a:hover{
           text-decoration: none;
       }
       #card:hover{
           border-bottom: 6px solid yellow;
       }
       .fas{
           font-size: 45px;
           margin-right: 10px;
       }
       .count{
        
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

        <?php if(isset($_SESSION['institute'])){
    echo "
      <li class='nav-item'>
        <a class='nav-link' id='nava'>{$_SESSION['institute']}</a>
      </li>
       <li>
       <a class='nav-link' id='nava' href='logout.php'>Logout</a>
      </li>
";
     }else{
        echo " <li>
       <a class='nav-link' id='nava' href='institute-login-signup/login.php'>Login</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' id='nava' href='contact.php'>Contact Us</a>
      </li>
      
      ";
}
?>

    </ul>
    </div>
        </div>
</nav>
</div>
        
    <div class="container">
         <div class="row">
          <div class="col-md-12">
                <div class="col-md-offset-4 col-md-8">
                
                </div>
              <?php if(isset($_SESSION['institute'])){
                     include "conn/conn.php";
                      $inst_name = $_SESSION['institute'];
                      $email = $_SESSION['email'];
                  $sql1="SELECT * FROM courses WHERE email='{$email}'";
                   $result1=mysqli_query($conn,$sql1);
                   $count1=mysqli_num_rows($result1);
                    $sql2="SELECT * FROM students WHERE inst_email='{$email}'";
                   $result2=mysqli_query($conn,$sql2);
                   $count2=mysqli_num_rows($result2);
               echo  "<div class='container my-5'>
              <div class='row'>
               <div class='col-md-4'>
                   <a href='courses/add_courses.php'>
                   <div id='card'>
                        <div id='card_data'>
                           <i class='fas fa-book'></i>
                           <span class='ml-auto'>Courses</span>
                           <span class='mx-5'> $count1</span>
                        </div>
                   </div>
                   </a>
               </div>
               <div class='col-md-4'>
                   <a href='added-students/students.php'>
                   <div id='card'>
                        <div id='card_data'>
                          <i class='fas fa-graduation-cap'></i>
                           <span class='ml-auto'>Students</span>
                           <span class='mx-5'> $count2</span>
                        </div>
                   </div>
                   </a>
               </div>
               <div class='col-md-4'>
                   <a href=''>
                   <div id='card'>
                        <div id='card_data'>
                          <i class='fas fa-graduation-cap'></i>
                           <span class='ml-auto'>Results</span>
                        </div>
                   </div>
                   </a>
               </div>
                  <div class='col-md-4 my-5'>
                   <a href=''>
                   <div id='card'>
                        <div id='card_data'>
                          <i class='fas fa-graduation-cap'></i>
                           <span class='ml-auto'>Results</span>
                        </div>
                   </div>
                   </a>
               </div>
               </div>
               </div>
         ";
             }else{
            echo '<div class="col-md-offset-3  col-md-6 " id="front_link">
               <a href="institute-login-signup/signup.php" class="btn btn-primary btn-block my-5" id="getstarted">Start Your Online Exam Portal</a>
               <a href="student-login/stu_login.php" class="btn btn-primary btn-block my-5" id="getstarted">Login As a Student</a>
               
              </div>';
                }
              ?>
              
             </div>
        </div>
        </div>
    </body>
</html>
