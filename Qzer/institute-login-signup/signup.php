<!DOCTYPE html>
<html lang="en">
<head>
      <?php include '../conn/link.php'?>
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
    </style>
    </head>
    <body>
        <div class="container">
            <div class="head">Register</div>
            <div class="row">
              <div class="col-md-12 my-5">
                  <div class="col-md-6 my-5">
                        <img src="../images/img.jpg" width="300px" height="200px">
                  </div>
                  <div class="col-md-offset-1 col-md-5 my-5">
                       <form class="form" id="form_data">
                    
                         <div class="form-group">
                          <input type="text" placeholder="Institute Name" class="form-control" name="inst_name">
                           </div>
                           <div class="form-group">
                          <input type="text" placeholder="Email" class="form-control" name="email">
                           
                           </div>
                           <div class="form-group">
                          <input type="password" placeholder="Password" class="form-control" name="pword">
                           
                           </div>
                           <div class="form-group">
                          <input type="password" placeholder="Confirm Password" class="form-control" name="cpword">
                           
                           </div>
                           <div class="form-group" id="error">
                 
 
                           </div>
                           <input type="submit" class="btn btn-primary btn-block" value="Register" id="getstarted">
                           <div class="form-group my-4">
                            <span class="already">Already have a account? <a href="login.php">Login</a></span>
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
                 $.post(
                     "insert.php",
                      $('#form_data').serialize(),
                     function(data){
                    
                     $('#error').fadeIn().html(data);
                         
                     }
                 );
         });
    
    
});
</script>