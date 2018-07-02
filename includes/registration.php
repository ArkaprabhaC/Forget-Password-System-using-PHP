/* This page is for user registration */
/* I have made this page so that it saves the hassle of going to DB and manually entering the values */


<?php  include "db_conn.php"; ?>
<?php include "pwdEncryption.php" ?>

<?php

   if(isset($_POST['submit'])){
       $admin_name = mysqli_real_escape_string($conn, $_POST['user_name']);
       $admin_email =  mysqli_real_escape_string($conn , $_POST['user_email']);
       $admin_pwd = mysqli_real_escape_string($conn , $_POST['user_pwd']);

       $encrypt_pwd = crypt($admin_pwd, $hashF_and_salt);

       //Insert query
       $query = "INSERT INTO users(user_name,user_email,user_password)";
       $query .= " VALUES('$admin_name','$admin_email','$admin_pwd')";
       $result = mysqli_query($conn,$query);
       if(!$query){
           die("Error. ".mysqli_error($conn));
       }
   }


?>

 
    <!-- Page Content -->
    <div class="container">
    
<section id="login">
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-xs-offset-3">
                <div class="form-wrap">
                <h1>Register</h1>
                    <form role="form" action="registration.php" method="post" id="login-form" autocomplete="off">
                        <div class="form-group">
                            <label for="username" class="sr-only">username</label>
                            <input type="text" name="user_name" id="username" class="form-control" placeholder="Enter Desired Username">
                        </div>
                         <div class="form-group">
                            <label for="email" class="sr-only">Email</label>
                            <input type="email" name="user_email" id="email" class="form-control" placeholder="somebody@example.com">
                        </div>
                         <div class="form-group">
                            <label for="password" class="sr-only">Password</label>
                            <input type="password" name="user_pwd" id="key" class="form-control" placeholder="Password">
                        </div>
                
                        <input type="submit" name="submit" id="btn-login" class="btn btn-custom btn-lg btn-block" value="Register">
                    </form>
                 
                </div>
            </div> <!-- /.col-xs-12 -->
        </div> <!-- /.row -->
    </div> <!-- /.container -->
</section>


        <hr>


