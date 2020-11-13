<?php

//login.php

include('master/Examination.php');

$exam = new Examination;

$exam->user_session_public();

include('header.php');

?>
  <div class="container">

      <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-6" style="margin-top:100px;">
          

            <span id="message">
            <?php
            if(isset($_GET['verified']))
            {
              echo '
              <div class="alert alert-success">
                Your email has been verified, now you can login
              </div>
              ';
            }
            ?>   
            </span>
            <div class="card border border-success">
              <div class="card-header" style="font-family:comic sans MS;color:blue;font-size:larger;"><center>Student Login</center></div>
              <div class="card-body">
                <form method="post" id="user_login_form">
                  <div class="form-group">
                    <label>Enter Email Address</label>
                      <input type="text" name="user_email_address" id="user_email_address" class="form-control" />
                    </div>
                  <div class="form-group">
                    <label>Enter Password</label>
                    <input type="password" name="user_password" id="user_password" class="form-control" />
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
.btn {
  border: 2px solid white;
  border-radius: 5px;
  padding: 6px 20px;
  font-size: 20px;
  cursor: pointer;
}

.success {
background-color: #2eb82e;
  border-color: #4CAF50;
  color: white;
}

.success:hover {
  background-color: white;
  color: green;
}

.blue {
 background-color: #0073e6;
  border-color:#0073e6;
  color: white;
}

.blue:hover {
  background-color: white;
  color: #0073e6;
}
  </style>
</body>
</html>

<script>

$(document).ready(function(){

  $('#user_login_form').parsley();

  $('#user_login_form').on('submit', function(event){
    event.preventDefault();

    $('#user_email_address').attr('required', 'required');

    $('#user_email_address').attr('data-parsley-type', 'email');

    $('#user_password').attr('required', 'required');

    if($('#user_login_form').parsley().validate())
    {
      $.ajax({
        url:"user_ajax_action.php",
        method:"POST",
        data:$(this).serialize(),
        dataType:"json",
        beforeSend:function()
        {
          $('#user_login').attr('disabled', 'disabled');
          $('#user_login').val('please wait...');
        },
        success:function(data)
        {
          if(data.success)
          {
            location.href='index.php';
          }
          else
          {
            $('#message').html('<div class="alert alert-danger">'+data.error+'</div>');
          }

          $('#user_login').attr('disabled', false);

          $('#user_login').val('Login');
        }
      })
    }

  });

});

</script>