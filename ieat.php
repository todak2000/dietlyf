<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dietlyf ieat </title>

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
  <body class="container" style="overflow-y: auto; background-color:#428bca4d;">
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
				$one = stripslashes($_REQUEST['one']); // removes backslashes
				$one = mysqli_real_escape_string($con,$one); //escapes special characters in a string

				$two = stripslashes($_REQUEST['two']);
				$two = mysqli_real_escape_string($con,$two);

				$three = stripslashes($_REQUEST['three']);
				$three = mysqli_real_escape_string($con,$three);

				$four = stripslashes($_REQUEST['four']);
                $four = mysqli_real_escape_string($con,$four);
                
                $five = stripslashes($_REQUEST['five']); // removes backslashes
				$five = mysqli_real_escape_string($con,$five); //escapes special characters in a string

				$six = stripslashes($_REQUEST['six']);
				$six = mysqli_real_escape_string($con,$six);

				$seven = stripslashes($_REQUEST['seven']);
				$seven = mysqli_real_escape_string($con,$seven);

                 $average = ($one + $two + $three + $four + $five + $six + $seven)/7;
                 if ($average >= 1510){
                     $alarm = 1;
                 }else{
                     $alarm = 0;
                 }
             

                $query = "INSERT into `ieat` (email,user_id,12am6am,6am9am,9am12pm,12pm3pm,3pm6pm,6pm9pm,9pm12am,average_intake, alarm) VALUES ('$Email','$id','$one','$two', '$three','$four','$five','$six', '$seven', '$average','$alarm')";
                         $result = mysqli_query($con,$query) or die(mysqli_error());

		        if($result){
                    // echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>Your Details Updated successfully.</h3><br/>Back <a style='color:#979b1b;' href='profile.php'>Home</a></div>";
                    header("Location: profile.php");// Redirect user to index.php

		        }
		    }else{
		?>

    <!-- Make sure all your bars are the first things in your <body> -->
    <header class="bar bar-nav">
      <h1 class="title">I-eat</h1>
      <span class="icon icon-refresh" onclick="window.location.reload(true)"></span>
    </header>

    <!-- Wrap all non-bar HTML in the .content div (this is actually what scrolls) -->
    <div class="contenta" style=" margin:15% 5%; height:80%;">
    <p class='jive' style="text-align:center; font-size:18px;"><?php echo $firstName; ?> !<br>Food Intake Update</p>
      <form name="registration" action="" method="post">
        <div class="row">
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-5" style="text-align:left; padding-top:10px;">12am - 6am</div>
                <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc;color:#000;" type="number" name="one" placeholder="" required class="form-control iip"/></div>
                <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">6am - 9am</div>
                    <div class="col-xs-4"><input style="  margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="two" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>

            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">9am - 12pm</div>
                    <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="three" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">12pm - 3pm</div>
                    <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="four" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">3pm - 6pm</div>
                    <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="five" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">6pm - 9pm</div>
                    <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="six" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-5" style="text-align:left; padding-top:10px;">9pm - 12am</div>
                    <div class="col-xs-4"><input style=" margin-bottom:0; height:25px;border-left:0; border-right: 0; border-top: 0; margin-top: 5px; background-color: #ccc; color:#000;" type="number" name="seven" placeholder="" required class="form-control iip"/></div>
                    <div class="col-xs-3" style="text-align:left; padding-top:10px;">Cal</div>
              </div>
            </div>
        </div>
          
       
       <input type="submit" name="submit" value="Save" class="form-control btn-info" style="margin-top:10%;"/> 
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
      <span class="span" id="notification" style="background-color:transparent;width:20px; height:20px; margin-left:auto; margin-right:auto; border-radius:50%;"></span> 
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