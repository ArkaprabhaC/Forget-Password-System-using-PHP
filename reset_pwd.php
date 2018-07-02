<?php include "includes/db_conn.php" ?>
<?php
   if(isset($_GET['email']) && isset($_GET['token']) && isset($_POST['password'])){
       $email=$_GET['email'];
       $token=$_GET['token'];

       //Token and token_expiry checking. If check successful, get the user from the DB
       $query_token_check = "SELECT * FROM users WHERE user_token = '$token' AND user_email = '$email' AND TIME(token_expire) > TIME(NOW()) AND user_token<>'' ";
       $result_token_check = mysqli_query($conn,$query_token_check);
       if(!$result_token_check){
           Die("Error. ".mysqli_error($conn));
       }
       if(mysqli_num_rows($result_token_check)>0){

           $pwd_to_be_updated = $_POST['password'];

           //Password update query
           $update_password_query = "UPDATE users SET user_password = '$pwd_to_be_updated' WHERE user_email = '$email'";
           $update_password_result = mysqli_query($conn,$update_password_query);

           if($update_password_result){
               //exit("password updated successfully!");
               header('Location: http://localhost/reset_password/reset_pwd.php?status=success');
           }else{
               //die("Error. ".mysqli_error($conn));
               header('Location: http://localhost/reset_password/reset_pwd.php?status=failure');
           }
       }else{
           exit("Some error occured");
       }
   }
?>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <link rel="icon" type="image/png" href="assets/img/favicon.ico">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

        <title>Reset Password</title>

        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />


        <!-- Bootstrap core CSS     -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">


        <!--     Fonts and icons     -->
        <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">

        <!-- my styles -->
        <link href="styles.css" rel="stylesheet">

    </head>
    <body>

        <?php
        if(!isset($_GET['status'])){
            include "includes/reset_form_markup.php";
        }else if(isset($_GET['status'])){
            include "includes/status_markup.php";
        }

        ?>


        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
        <script type="text/javascript">
        setInterval(function(){
            var pwd = document.querySelector(".pwd").value;
            var confirm_pwd = document.querySelector(".confirm_pwd").value;
            var subBtn = document.querySelector(".submit_btn");

            if(pwd == 0){
                subBtn.disabled = true;
            }else if (pwd == confirm_pwd){
                subBtn.disabled = false;
            } else {
                subBtn.disabled = true;
            }
        },100);
    </script>


    </body>
