# Reset-Password-System-using-PHP

This is a password reset system that i've made using PHP (no frameworks). 

Dependencies: PHPMailer (included)

# Installation and use:

Database Set up : 
 
Database will consist of 1 table with following columns:

-user_id(type: int, PK, Autoincrement)
-user_name(type: text)
-user_email(type: text)
-user_password(type: text)
-user_token(type: text)
-token_expire(type: datetime)
 


Configuring files-

After cloning the files, go to the "includes" folder and change the Database parameters in db_conn.php file

Next, open index.php and configure SMTP/POP3 mail server as specified by comments on each line

#Done!

And that is all there's to it! Put it in some of your projects and it's readay to be used. 
