<?php
    echo '<div class="container" style="width: 100%; height:100vh; overflow:hidden;">
      <div class="col-md-6 header-body text-center ml-auto mr-auto mt-5">
          <h3><i class="fa fa-lock fa-4x"></i></h3>
          <h2 class="text-center">Reset Password</h2>

          <form action="" method="post">
             <div class="form-group">
                 <input name="password" placeholder="Enter your new password" class="form-control pwd"  type="password">
                 <br/>
                 <input name="password-confirm" placeholder="Retype your new password" class="form-control confirm_pwd" type="password">

             </div>

             <div class="form-group">
                  <input name="submit" class="btn btn-lg btn-primary btn-block submit_btn" value="Reset Password" type="submit">
             </div>

          </form>

      </div>
  </div>';
?>
