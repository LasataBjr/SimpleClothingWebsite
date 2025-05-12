<?php

    session_start();
    error_reporting(E_ALL);
    require_once("useful_func.php");
    $a = new useful_func();
    $error = "";
    if(isset($_POST['login']))
    {
        global $con;
        $username = $_POST['username'];
        $password = $_POST['password'];


        //sql injection prevention
        $uname= mysqli_real_escape_string($con,$username);
        $password = mysqli_real_escape_string($con,$password);
        $password = md5($password);

        $table = 'user_tb';
        $id = 'SN';
        $id_name = 1;
        $result = $a->fetch_rowdata($table,$id,$id_name);
        $x = $result['Password'];
        
           /*echo"<pre>";
           print_r($result);*/
                //verify the password
        
            if($result)
            {
                     if($password == $result['Password'])
                        {
                            //setting session
                            $_SESSION['Username'] = $result['Username'];
                            $_SESSION['Password'] = $result['Password'];

                            //redirecting to Displaysession.php
                            header("Location:dashboard.php");
                            exit();
                        }
                        else
                        {
                            // echo "Credential Doesn't Match";
                            $error = "Incorrect password! Try Again ";
                        }
            }
            else
            {
                // echo "Error not found";
                $error = "User not found";
            }

    }
?> 





<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="Assets/CSS/login.css">
    <title>Login test</title>
   
</head>
<body>
    <form action="" method="POST">
    <div class="center">
        <h1>Login</h1>
        <div class="from">
            <input type="text" name="username" class="textfiled" placeholder="Username">
            <input type="password" name="password" class="textfiled" placeholder="Password">
            <div class="errormsg"><span><?php echo $error ?></span></div>
            <!-- <div class="forget"><a href="#" class="link" onclick="massage()" >Forget password</a></div> -->

            <input type="submit" name="login" value="Login" class="btn">

            <!-- <div class="signup">New Member ? <a href="#" class="link">SignUp Here</a></div> -->
        </div>
    </div>
    </form>
    <script>
        function massage(){
            alert("password yad gara");
        }
    </script>    

</body>
</html>

