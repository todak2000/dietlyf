<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>DiabCare Login </title>
 
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
  <body class="container" style="padding:0" >
  

    <div class="contenta" style=" background: -webkit-linear-gradient( #1C304E, #365899, #1C304E);  padding:5% 5% 0% 5%; height:100%;">
    <img src="img/diet2.svg"></button>

          <p class="jive" style="text-align:center; font-size:18px;">Log in</p>
     

      <form name="registration" action="" method="post">
        <div class="row">
            
            <div class="col-xs-12"><input type="email" name="email" placeholder="Email Address" required class="form-control inp"/></div>
          </div>
          
          <div class="row" style="margin-top:10px; margin-bottom: 20px;">
            <div class="col-xs-12"><input type="password" name="password" placeholder="Password" required class="form-control inp"/></div>
          </div>  
          
       <input type="submit" name="submit" value="Log in" class="form-control" class="button" /> 
        </form>
        <div class="row" style="margin-top:20px; font-size:10px;">
            <div class="col-xs-6">
              <!-- <p class="forget"><a href="#"> Forget Password</a></p> -->
              <p>Forgot your password <br><a style='color:#979b1b;' href='reset.php'>Reset Password</a></p>
            </div>
            <div class="col-xs-6">
              <!-- <p class="forget"><a href="index.php"> Sign up</a></p> -->
              <p>Not registered for DiabCare yet? <br><a style='color:#979b1b;' href='index.php'>Sign up</a></p>
              
            </div>
            <p align="center">Admin <br><a style='color:#979b1b;' href='admin.php'>login</a></p>
        </div>
        
    </div>
    <?php
			require('auth/db.php');
			session_start();
		    // If form submitted, insert values into the database.
		    if (isset($_POST['email'])){
				
				$email = stripslashes($_REQUEST['email']); // removes backslashes
				$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);
				
			//Checking is user existing in the database or not
		        $query = "SELECT * FROM user WHERE email='".$email."' and password='".md5($password)."' ";
				
				$result = mysqli_query($con,$query) or die(mysqli_error());
				$rows = mysqli_num_rows($result);
				if($rows==1){
                   
          $_SESSION['email'] = $email;
          while($row = mysqli_fetch_array($result)){
            if ($row['bmi'] == 0){
              header("Location: info.php");// Redirect user to index.php
            }
            else{
              header("Location: profile.php");// Redirect user to index.php
            }
          }

        // header("Location: profile.php");// Redirect user to index.php
              }else{
                      echo "<div align='center' class='formaa col-xs-12' style='margin-top: 0;color:#ccc; background-color:#23232390; border-radius:10px; top:-150px;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Username/password is incorrect.</h3><br/><a style='color:#979b1b;' id='close' href='login.php'>Close</a></div>";

                      }
      }
		       
                ?>
    <script>
    
    $(document).ready(function(){
        $("#close").click(function() {
            $(".formaa").css("display", "none");
        });
    
    });
      </script>
  </body>
</html>