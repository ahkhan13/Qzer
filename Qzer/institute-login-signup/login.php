<!DOCTYPE html>
<html lang="en">
<head>
         <?php include '../conn/link.php'; ?>
    <style>
           #error{
            color: red;
            background: white;
            padding: 0px;
            font-size: 14px;
            font-weight: 500;
             display: none;
        }      
        body{
           background #2d3436;
            
        }
        .head{
            text-align: center;
            font-size: 25px;
            font-weight: 800;
            color: purple;
            text-decoration: underline;
       }
        .container{
            margin-top: 60px;
        }
        .form-control{
            font-size:16px;
                
        }
           #getstarted{

                        background:#130f40;
            font-size: 16px;
            padding: 6px;
            transition: all 0.3s ease;
        }
        #getstarted:hover{
                        background:#2c2c54;
          
        }
        .already{
            margin-top: 14px;
            font-weight: 400;
          font-size: 16px;
        }
          .highlight{
            font-size: 23px;
             color: peru;
             font-weight: 700;
        }
    </style>
    </head>
    <body>
        <div class="container">
            <div class="head">Sign In</div>
            <div class="row">
              <div class="col-md-12 my-5">
                  <div class="col-md-6 my-5">
                        <img src="../images/img.jpg" width="300px" height="200px">
                  </div>
                  <div class="col-md-offset-1 col-md-5 my-5">
                       <form class="form" id="form_data">
                       <?php  
                          include '../conn/conn.php';
                          $sql="SELECT * FROM institutes";
                          $result=mysqli_query($conn, $sql);
                          if(mysqli_num_rows($result)>0){
                          ?>
                       <div class="form-group">
                       <select class="form-select form-control" aria-label="Default select example">
                           <?php 
                              while($row=mysqli_fetch_assoc($result)){
                           ?>
                               <option value="<?php echo $row['inst_name'];?>" id="inst_name"><?php echo $row['inst_name'];?></option>
                               
                        
                         <?php }?>
                         </select>
                        </div>
                          <?php }?>
                           <div class="form-group">
                          <input type="text" placeholder="Email" class="form-control" id="email">
                           
                           </div>
                           <div class="form-group">
                          <input type="password" placeholder="Password" class="form-control" id="pword">
                           
                           </div>
                           <div class="form-group" id="error">
                    
                           
                           </div>
                          
                           <input type="submit" class="btn btn-primary btn-block" value="Sign In" id="getstarted">
                           <div class="form-group my-4">
                            <span class="already">Not have a account? <a href="signup.php">Register</a></span>
                           </div>
                      </form>
                  </div>
                </div>
            </div>
        </div>
    </body>
</html>
<script type="text/javascript" src="js/jquery.js"></script>
     <script> 
$(document).ready(function(){
       $('#getstarted').click(function(e){
             e.preventDefault();
             var inst_name=$('#inst_name').val();
             var email=$('#email').val();
             var pword=$('#pword').val();
                 $.post(
                     "read.php",
                      {inst_name:inst_name, email:email, pword:pword},
                     function(data){
                        if(data==1){
                            window.location.replace("../index.php"); 
                        }else{
                     $('#error').fadeIn().html(data);
                     }
                     }
                 );
         });
    
    
});
</script>