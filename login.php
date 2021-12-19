<?php



		 session_start();

     
         if(isset($_SESSION['id']))
         { 
            header('location:company.php');
         }
	       		include('dbconn.php');
            if(isset($_POST['commit']))
        {	
            $username=$_POST['username'];
            $password=$_POST['password'];
            setCookie('username',$username,time()+ (10 * 365 * 24 * 60 * 60));

            //var_dump($username);
            $qry="SELECT * FROM `admin` WHERE `username`='$username' AND `password`='$password'";
        
            $result=mysqli_query($conn,$qry);
            $data=mysqli_fetch_assoc($result);
            $row=mysqli_num_rows($result);

            if($row<1)
            {
                ?>
                <script>
                alert("Username and password does not exist!!!");                
                window.open('login.php','_self');
                </script>
                <?php
            }

            else
            {
                $id=$data['id'];
                //session_start();
                $_SESSION['id']=$id;
                $username=$data['username'];

              
                header('location:company.php');
            }

            
        }


?>


<!DOCTYPE html>
<html>
 <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<head>
	<style>
		body {
  font: 13px/20px "Lucida Grande", Tahoma, Verdana, sans-serif;
  color: #404040;
  background: #4B4276 !important;
}
		
	</style>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>login</title>
	<link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
	<div class="login">
  <h1>Login to Web App</h1>
  <form method="post" action="login.php">

    <p><input type="text" name="username" value="" class="form-control" placeholder="Enter Username"></p>

    <p><input type="password" name="password" value="" class="form-control" placeholder="Enter Password"></p>
   <!--    <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label> -->
  <!--   <p align="center">
    <button type="submit" class="btn btn-primary" name="commit" value="submit">submit</button></p> -->
    <!-- <p class="submit"><input type="submit" name="commit" value="submit"></p> -->
         <label>
        <input type="checkbox" name="remember_me" id="remember_me">
        Remember me on this computer
      </label>
    <p class="submit" align="center"><input type="submit" name="commit" value="submit"></p>
  </form>
</div>

<div class="login-help">
  <p>Forgot your password? <a href="#">Click here to reset it</a>.</p>
</div>
	
</body>
</html>
