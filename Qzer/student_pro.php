<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
       .courses{
           background:#130f40;
           padding: 20px;
           
       }
       .courses span{
           color: snow;
           font-size: 21px;
           font-weight: 700;
           text-align: center;
       }
       .courses li{
           list-style: none;
           text-decoration: none;
           
       } 
       .courses a{
           font-size: 18px;
            color: #fff200;
           font-weight: 600;
           transition: all 0.4s ease;
           
       }
       .courses a:hover{
           color: #e67e22;
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
       .head{
           text-align:center;
           font-size:30px;
           font-weight:780;
           color:snow;
           text-decoration:underline;
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
      <li class='nav-item'>
        <a class='nav-link' id='nava' href=""><?php echo $_SESSION['email'];?></a>
      </li>
       <li>
       <a class='nav-link' id='nava' href='logout.php'>Logout</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' id='nava' href='contact.php'>Contact Us</a>
      </li>
       </ul>
    </div>
        </div>
</nav>
</div>
        
   
               
    <div class="container">
    <div class="head">Available Quiz</div>
         <div class="row my-4">
          <div class="col-md-12">
              
               
                <?php
                      include "conn/conn.php";
                      $inst_email=$_SESSION['inst_email'];
                      $status=1;
                      $sql="SELECT * FROM courses WHERE email='{$inst_email}' && status='{$status}'";
                      $result=mysqli_query($conn, $sql);
                      if(mysqli_num_rows($result)>0){
                          while($row=mysqli_fetch_assoc($result)){
                              $course=$row['course_name'];
             
                              echo "<div class='col-md-4'>
                   <a href='quiz/start_quiz.php?course=$course'>
                   <div id='card'>
                        <div id='card_data'>
                           <i class='fas fa-book'></i>
                           <span class='ml-auto'>$course</span>
                        </div>
                   </div>
                   </a>
               </div>";
                          }
                      }
             ?>
        </div>
                    </div>
        </div>      
    </body>
</html>