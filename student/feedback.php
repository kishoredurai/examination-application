<?php

//login.php

include('../master/Examination.php');
$exam = new Examination;

$exam->user_session_private();

include('../include/user_header.php');

?>


<link href="../style/button.css" rel="stylesheet" type="text/css">
  <div class="container">

      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6" style="margin-top:50px;">
          
            <div class="card border border-success">
            <div class="card-header">Sign In
                        </div>
              <!-- <div class="card-header" style="font-family:comic sans MS;color:blue;font-size:larger;"><center>Student Login</center></div> -->
              <div class="card-body">
                <form method="post" id="user_login_form">
                  <div class="form-group">
                    <label style="top:5px;">Email Address : </label>
                    <div style="margin-bottom: 25px;top:5px" class="input-group" >
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input class="form-control" id="user_email_address" type="email" name="user_email_address" placeholder="username or email" required> 
                                                                      
                                    </div>                           
                      <!-- <input type="text" name="user_email_address" id="user_email_address" class="form-control" /> -->
                    </div>
                  <div class="form-group">
                    <label>Enter Password : </label>
                    <div style="margin-bottom: 15px" class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input required id="user_password" type="password" class="form-control" name="user_password" placeholder="password">
                                    </div>
                                    
                    <!-- <input type="password" name="user_password" id="user_password" class="form-control" /> -->
                  </div>
                  <div class="input-group">
                                      <div class="checkbox">
                                        <label>
                                          <input id="remember_me" type="checkbox" name="_remember_me" checked value="1"> Remember me
                                        </label>
                                      </div>
                                    </div>
                  <div class="form-group" align="center">
                    <br>
                    <input type="hidden" name="page" value="login" />
                    <input type="hidden" name="action" value="login" />
                    <input type="submit" name="user_login" id="user_login" class="btn success" value=" Login " />&nbsp;
                    <a class="btn blue" href="register.php">Register</a>
                  </div>
                </form>
               
                  
                
              </div>
            </div>
        </div>
        <div class="col-md-3">

        </div>
      </div>
  </div>
<style>

  </style>
</body>
</html>

