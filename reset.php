<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>DiabCare reset </title>
 
    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="shortcut icon" type="image/png" href="img/diet3.png"/>
    <!-- Include the compiled Ratchet CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="ratchet/css/ratchet.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/reg.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Include the compiled Ratchet JS -->
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
	<body class="container">
    <?php
    require('auth/db.php');
    session_start();
    // If form submitted, insert values into the database.
    if (isset($_POST['email'])){
        
        $email = stripslashes($_REQUEST['email']); // removes backslashes
        $email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
        $Npassword = stripslashes($_REQUEST['password']);
        $Npassword = mysqli_real_escape_string($con,$Npassword);
        
    //Checking is user existing in the database or not
        $query = "SELECT * FROM `user` WHERE email='$email'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if($rows==1){
            $_SESSION['email'] = $email;
            $update= "UPDATE user SET password='$Npassword' where email='$email'";
            echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Passowrd Changed Successfully.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";

                }else{
                echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Email is incorrect.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";

                                }
    }else{
    ?>
		<header class="bar bar-nav">
        <button class="btn btn-link btn-nav pull-center">
          <img src="img/diet2.svg" ></button>
      </header>

    <div class="content">

          <p class="jive">Reset Password</p>
      </div>

      <form name="registration" action="" method="post">
        <div class="row">
            
            <div class="col-xs-12"><input type="email" name="email" placeholder="Email" required class="form-control" /></div>
          </div>
          
          <div class="row" style="margin-top:10px; margin-bottom: 20px;">
            <div class="col-xs-12"><input type="password" name="password" placeholder="Password" required class="form-control inp"/></div>
          </div>  
          
       <input type="submit" name="submit" value="Submit" class="form-control" class="button" /> 
        </form>
        <div class="row" style="margin-top:20px; font-size:10px;">
            <div class="col-xs-6">
              <!-- <p class="forget"><a href="#"> Forget Password</a></p> -->
              <p>Already a member <br><a style='color:#979b1b;' href='login.php'>Login Here</a></p>
            </div>
            <div class="col-xs-6">
              <!-- <p class="forget"><a href="index.php"> Sign up</a></p> -->
              <p>Not registered foer DiabCare yet? <br><a style='color:#979b1b;' href='index.php'>Sign up</a></p>
            </div>
        </div>
        
    </div>
    <?php } ?>
  </body>
</html>
