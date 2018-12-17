<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dietlyf Update </title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="img/diet3.png"/>
    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Include the compiled Ratchet CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="ratchet/css/ratchet.min.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <!-- <link rel="stylesheet" href="css/index.css"> -->
        <link rel="stylesheet" href="css/reg.css">
        <link rel="stylesheet" type="text/css" href="css/login.css">
    <!-- Include the compiled Ratchet JS -->
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
  <body class="container" style="overflow-y: hidden; background-color:#428bca4d;">
    <?php
			require('auth/auth.php');
            require('auth/db.php');
            //Checking is user existing in the database or not
            $query = "SELECT * FROM `user` WHERE email='$email'";
            $result = mysqli_query($con,$query) or die(mysqli_error());
            $rows = mysqli_num_rows($result);
            while ($row    = mysqli_fetch_array($result))
           
            {

                $firstName     = $row['firstName'];
                // $Username = $row['userName'];
                $Username = $row['userName'];
                $Email = $row['email'];
                $id = $row['id'];
                // $Phone = $row['phoneNo'];
                // $Age = $row['age'];
                // $Gender = $row['gender'];
                // $bmi = $row['bmi'];
                // $bsl = $row['bsl'];
                // $Height = $row['height'];
                // $Weight = $row['weight'];
               
               
            }
		   // If form submitted, insert values into the database.
		    if (isset($_REQUEST['submit'])){
				$height = stripslashes($_REQUEST['height']); // removes backslashes
				$height = mysqli_real_escape_string($con,$height); //escapes special characters in a string

				$weight = stripslashes($_REQUEST['weight']);
				$weight = mysqli_real_escape_string($con,$weight);

				$bsl = stripslashes($_REQUEST['bsl']);
				$bsl = mysqli_real_escape_string($con,$bsl);

				$bmi = stripslashes($_REQUEST['bmi']);
				$bmi = mysqli_real_escape_string($con,$bmi);

				 

		        $query = "INSERT into `healthdetails` (height,weight,bsl,bmi,email, user_id) VALUES ('$height','$weight', '$bsl','$bmi','$Email','$id')";
				$result = mysqli_query($con,$query);
		        if($result){
		            echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Your Details Updated successfully.</h3><br/>Back <a style='color:#979b1b;' href='profile.php'>Home</a></div>";

		        }
		    }else{
		?>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">Update Info</h1>
      <span class="icon icon-refresh" onclick="window.location.reload(true)"></span>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="contenta" style=" margin:15% 5%; height:80%;">
    <p class='jive' style="text-align:center; font-size:18px;"><?php echo $firstName; ?> !<br>Please Update your details</p>
      <form name="registration" action="" method="post">
        <div class="row">
        <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-7" style="text-align:left; padding-top:10px;">height (cm):</div>
                <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc;color:#000;" type="number" name="height" placeholder="" required class="form-control iip"/></div>
              </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Body Mass Index:</div>
                    <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="bmi" placeholder="" required class="form-control iip"/></div>
              </div>
            </div>

            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Blood Sugar Level (mg/dL):</div>
                    <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="bsl" placeholder="" required class="form-control iip"/> </div>
              </div>
            </div>
        </div>
          
        <div class="row" style="margin-top:10px; margin-bottom: 20px;">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Weight (kg):</div>
                    <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="weight" placeholder="" required class="form-control iip"/> </div>

              </div>
            </div>
        </div>  
        
          
       <input type="submit" name="submit" value="Add latest Details" class="form-control btn-info"/> 
        </form>
        <!-- <p> <a style='color:#979b1b;' href='profile.php'>Update details</a></p> -->
    </div>
    <!-- BOTTOM NAVS -->
    <nav class="bar bar-tab">
      <a class="tab-item active" href="profile.php">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item" name="dieting"  href="diet_update_history.php" style="text-decoration: transparent;">
      <span class="span" id="notification" style="background-color:red;width:20px; height:20px; margin-left:auto; margin-right:auto; border-radius:50%;"></span> 
      <i class="fa fa-gift" id="diet"></i>
        <span class="span">Diet Update</span> 
      </a>
      <a class="tab-item" href="appointment.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item" href="chat.php"  style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-user-md"></i>
        <span class="span">Chat</span>
      </a>
      <a class="tab-item" id="dsa" href="login.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-power-off"></i>
        <span class="span">Log out</span>
      </a>
    </nav>
    <?php } ?>
  </body>
</html>