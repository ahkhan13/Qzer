<?php
 session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<?php include '../conn/link.php'; ?>
    </head>
    <style>
        body{
            background: #222f3e;

        }
 .questions{
     background: purple;
     padding: 40px;
     border-bottom: 20px solid #e1b12c;
     border-left: 30px solid #e1b12c;
     border-right: 30px solid #e1b12c;
     border-top: 30px solid #e1b12c;
        }
.ques{
    color: snow;
    font-size: 20px;
    font-weight: 550;
    background:#3d3d3d;
    padding: 25px;
 }
    .options{
        margin-top: 50px;
        }              
                
 .options li {
        list-style: none;
        padding-bottom: 5px;
        }
        .options span{
            font-size: 17px;
            color: darkturquoise;
            font-weight: 400;
            margin-left: 7px;
        }
        .paper{
            margin-top: 120px;
            padding-bottom: 40px;
        }
        .sn{
            font-size: 25px;
            color: beige;
            margin-right: 10px;
        }
        #start_quiz{
           padding: 16px;
           font-size: 15px;
           font-weight: 600;
           color: snow;
            background: #ff5e57;
          border: none;
            transition: all 0.3s ease;
       }
        #start_quiz:hover{
              background:#ff3f34;
           
        }
        input[type=radio]{
           width: 18px;
           height:18px;
        }

    </style>

    
    <body>
   <div class="navbar_head fixed-top">
  <nav class="navbar navbar-expand-lg navbar-light" id="navbar_head">
      <div class="container">
  <a class="navbar-brand" href="" id="brand_name">Quiz</a>
          
  <button  class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span  class="navbar-toggler-icon"></span>
  </button>
  <div  class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav ml-auto">
    
      <li>
       <a class="nav-link" id="nava" href=""><span id="time"></span></a>
      </li>
     
    </ul>
    </div>
</div>
</nav>
</div>
 
        <div class="paper">
        <div class="container">
            <div class="col-md-offset-1 col-md-10">
                <form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
                <?php 
                   include "../conn/conn.php";
                    if(isset($_GET['course'])){
                      $course=$_GET['course'];  
                    }
                   $status=1;
                   $i=0;
                   $sql="SELECT * FROM questions WHERE course_name='{$course}' && email='{$_SESSION['inst_email']}' && status='{$status}'";
                   $result=mysqli_query($conn,$sql);
                   if(mysqli_num_rows($result)>0){
                       
                   while($row=mysqli_fetch_assoc($result)){
                       $i=$i+1;
                   
                ?>
                <div class="questions">
                <div class="ques">
                    <?php echo "<span class='sn'>{$i}.</span>" ?>
                    <?php echo  $row['ques_name'];?>
                </div>
                <div class="options">
                    <ul>
                        <li> <input type="radio" name="q[<?php echo $row['ques_id']; ?>]" id="q1" value="<?php echo $row['opt1']; ?>"> <span><?php echo $row['opt1']; ?></span></li>
                        <li> <input type="radio" name="q[<?php echo $row['ques_id'];  ?>]" id="q1" value="<?php echo $row['opt2']; ?>"> <span><?php echo $row['opt2']; ?></span></li>
                        <li> <input type="radio" name="q[<?php echo $row['ques_id'];  ?>]" id="q1" value="<?php echo $row['opt3']; ?>"> <span><?php echo $row['opt3']; ?></span></li>
                        <li> <input type="radio" name="q[<?php echo $row['ques_id'];  ?>]" id="q1" value="<?php echo $row['opt4']; ?>"> <span><?php echo $row['opt4']; ?></span></li>
                        <li> <input type="text" name="course" id="q1" value="<?php echo $course; ?>" hidden></li>
                    </ul>
                 
                    
                    </div>
                </div>
                <?php }} ?>
                <input type="submit" class="btn btn-success my-5 text-center px-5" id="start_quiz" value="Submit" name="submit">
                    </form>
            </div>  
        </div>
        
        </div>
    </body>
</html>
<?php
   include "../conn/conn.php";
   if(isset($_POST['submit'])){
    if(!empty($_POST['q'])){
       $q=$_POST['q'];
    $course=$_POST['course'];
    $count=count($_POST['q']);
    $mark=0;
    $i=1;
    $status=1;
    $sql="SELECT * FROM questions WHERE email='{$_SESSION['inst_email']}' && course_name = '{$course}' && status='{$status}'";
    $result=mysqli_query($conn,$sql);  
    if(mysqli_num_rows($result)>0){
        while($row=mysqli_fetch_array($result)){
            $id=$row['ques_id'];
            if($row['right_ans']==$q[$id]){
               $mark=$mark+$row['mark'];
            }else{
               $mark=$mark-$row['mark']/4;
            }

        }
        echo "Total Marks : " . $mark;
    }
    
    }else{
        echo "Total Mark : 0";
    }
    
   } 
?>
<script>
       
       
        var curdate=new Date();
        
        var hour=curdate.getHours();
        var min=curdate.getMinutes();
        var sec=curdate.getSeconds();
        var time=document.getElementById('time');
        time.innerHTML=hour;
        
</script>