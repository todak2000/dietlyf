<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>DiabCare Registration </title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">

    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link rel="shortcut icon" type="image/png" href="img/diet3.png"/>
    <!-- Include the compiled Ratchet CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <link href="ratchet/css/ratchet.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link rel="stylesheet" href="css/index.css">
    <!-- Include the compiled Ratchet JS -->
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
  <body class="container" style="overflow-y: hidden;">
    <?php
			require('auth/db.php');
		    // If form submitted, insert values into the database.
		    if (isset($_REQUEST['username'])){
				$username = stripslashes($_REQUEST['username']); // removes backslashes
				$username = mysqli_real_escape_string($con,$username); //escapes special characters in a string

				$firstname = stripslashes($_REQUEST['firstname']);
				$firstname = mysqli_real_escape_string($con,$firstname);

				$lastname = stripslashes($_REQUEST['lastname']);
				$lastname = mysqli_real_escape_string($con,$lastname);

				$email = stripslashes($_REQUEST['email']);
				$email = mysqli_real_escape_string($con,$email);

				$phoneno = stripslashes($_REQUEST['phoneno']);
				$phoneno = mysqli_real_escape_string($con,$phoneno);

				$age = stripslashes($_REQUEST['age']);
				$age = mysqli_real_escape_string($con,$age);

				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($con,$password);

				$gender = stripslashes($_REQUEST['gender']);
				$gender = mysqli_real_escape_string($con,$gender);

		    //     $query = "INSERT into `user` (userName,firstName,lastName,phoneNo,email,password,age,gender) VALUES ('$username','$firstname', '$lastname','$phoneno','$email','".md5($password)."', '$age', '$gender')";
			// 	$result = mysqli_query($con,$query);
		    //     if($result){
		    //         echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>You are registered successfully.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";

		    //     }
		    // }else{

                // Check that data was sent to the mailer.
                if ( empty($username) OR empty($firstname) OR empty($lastname) OR empty($phoneno)  OR empty($age) OR empty($password) OR empty($gender) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    // echo "Error (400). Please fill every details for your registration";
                    echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Please fill every details for your registration.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";

                } else{

                    $query = "SELECT * FROM user WHERE userName='".$username."' or email='".$email."' ";
                    $result = mysqli_query($con,$query);
                    $rows = mysqli_num_rows($result);
            
                    if($rows>=1){
                        // echo" Error (400). Username or email already exists";
                        echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Username or email already exists.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";
                    } else{
                            $query = "INSERT into `user` (userName,firstName,lastName,phoneNo,email,password,age,gender) VALUES ('$username','$firstname', '$lastname','$phoneno','$email','".md5($password)."', '$age', '$gender')";
                            $result = mysqli_query($con,$query);
                            if($result){
                                // echo "Success (200). Registration Successful";
                                echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>You are registered successfully.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";


                            }      
        }
    } 
    
}else{
		?>

    <!-- Make sure all your bars are the first things in your <body> -->
      <header class="bar bar-nav">
        <button class="btn btn-link btn-nav pull-center">
          <img src="img/diet2.svg" ></button>
      </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="content">
      <div style="margin-bottom: 0px;"><h5 align="center">Hi, <br> Sign up with DiabCare</h5></div>
      <form name="registration" action="" method="post">
        <div class="row">
            <div class="col-xs-12"><input type="text" name="username" placeholder="User Name" required class="form-control inp"/></div>
            <div class="col-xs-12"><input type="email" name="email" placeholder="Email Address" required class="form-control inp"/></div>
          </div>
          
          <div class="row">
            <div class="col-xs-6 pd"><input type="text" name="firstname" placeholder="Firstname" required class="form-control inp"/></div>
            <div class="col-xs-6 pd"><input type="text" name="lastname" placeholder="Lastname" required class="form-control inp"/></div>
          </div>

          <div class="row">
            <div class="col-xs-6 pd"><input type="tel" name="phoneno" placeholder="Phone Number" required class="form-control inp"/></div>
            <div class="col-xs-6 pd"><input type="num" name="age" placeholder="Age" required class="form-control inp"/></div>
          </div>
          
          <div class="row">
            <div class="col-xs-12"><input type="password" name="password" placeholder="Password" required class="form-control inp"/></div>
            <div class="col-xs-12">
                <div class="row" style="margin-top:10px;">
                        <div class="col-xs-6"><input type="radio" name="gender" value="M"> Male</div>
                        <div class="col-xs-6"> <input type="radio" name="gender" value="F"> Female</div>
                </div>
            </div>
          </div>
          
          
       <input type="submit" name="submit" value="Register" class="form-control"/> 
        </form>
        <p>Already a Member, Please <a style='color:#979b1b;' href='login.php'>Login</a></p>
    </div>
    <?php } ?>
  </body>
</html>