<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <title>DietLyf info </title>
    <link rel="shortcut icon" type="image/png" href="img/diet3.png"/>
    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

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
  <body style="width: 100%;height: 100vh;">
    
    
  <?php
            require('auth/auth.php');
            require('auth/db.php');

            //Checking is user existing in the database or not
            $query = "SELECT * FROM `user` WHERE email='$email'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            while ($row    = mysqli_fetch_array($result))
           
            {

                $Name     = $row['firstName'];
                $Username = $row['userName'];
                $Username = $row['userName'];
                $Email = $row['email'];
                $Phone = $row['phoneNo'];
                $Age = $row['age'];
                $Gender = $row['gender'];
                $bmi = $row['bmi'];
                $bsl = $row['bsl'];
                $Height = $row['height'];
                $Weight = $row['weight'];
               
               
            }
            
		    // If form submitted, insert values into the database.
		    if (isset($_POST['book'])){
				
				$date = stripslashes($_REQUEST['date']); // removes backslashes
				$date = mysqli_real_escape_string($con,$date); //escapes special characters in a string
				$time = stripslashes($_REQUEST['time']);
                $time = mysqli_real_escape_string($con,$time);
                $message = stripslashes($_REQUEST['message']);
                $message = mysqli_real_escape_string($con,$message);
           
                

            //     $sql    = "SELECT * FROM usermaster WHERE User_name=''";
            // $result = mysqli_query($sql) or die(mysqli_error());
            // while ($row    = mysqli_fetch_array($result))
            // {

            //     $Name     = $row['firstNaame'];
            //     $Username = $row['lastName'];
               
            // }
			
            
            if($rows==1){
                $_SESSION['email'] = $email;
                
                //$update= "UPDATE user SET height='$height'and weight='$weight' and bmi='$bmi' and bsl='$bsl' where email='$email'";
                // header("Location: profile.php");
                $query = "INSERT into `appointment` (date,time,message,patient) VALUES ('$date','$time', '$message','$email')";
                $result = mysqli_query($con,$query);
                if($result){
                    
                    //echo "Success (200). Registration Successful";
                    header("Location: profile.php");// Redirect user to index.php
                   // echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><br>You are registered successfully.</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";



                }
            }
            else{
                    echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span>Sorry! <br>Your details was NOT saved successfully. Please try again!</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";
    
                                    }
        }else{
                ?>
    <header class="bar bar-nav">
      <h1 class="title">Book an Appointment!</h1>
      <span class="icon icon-bars"></span>
    </header>
    <!-- <button class="btn btn-link btn-nav pull-center">
          <img src="img/diet2.svg" >
    </button> -->
    <div class="" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" style="margin-top:15%;">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
        <form name="registration" action="" method="post">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel" style="color:#232323;">Book an Appointment With your Dietrician Now!</h5>
          </div>
          <div class="modal-body">
            
            <!-- Recipient -->
              <div class="form-group">
                <label for="recipient-name" class="col-form-label pull-left">Recipient:</label>
                <input type="text" class="form-control" id="recipient-name" value="@Admin">
              </div>
              <!-- date -->
              <div class="form-group">
                <label for="date" class="col-form-label pull-left">Date:</label>
                <input type="date"  name="date" class="form-control" id="recipient-name" value="@Admin">
              </div>
              <!-- Time of appointment -->
              <div class="form-group">
                <label for="date" class="col-form-label pull-left">Time:</label>
                <select class="round form-control"  name="time" style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent; color:#232323;" placeholder="Duration">
                        <option style=" color:#232323; background-color:#d9edf7;">10 mins</option>
                        <option style=" color:#232323; background-color:#d9edf7;">20 mins</option>
                        <option style=" color:#232323; background-color:#d9edf7;">1 hour</option>
                        <option style=" color:#232323; background-color:#d9edf7;">2 hours</option>
                        <option style=" color:#232323; background-color:#d9edf7;">5 hours</option>
                        <option style=" color:#232323; background-color:#d9edf7;">10 hours</option>
                        <option style=" color:#232323; background-color:#d9edf7;">unlimited</option>
                        
                </select>
              </div>
              <div class="form-group">
                <label for="message-text" class="col-form-label pull-left">Message:</label>
                <textarea class="form-control" id="message-text" name="message" placeholder="Enter your additional information here..."></textarea>
              </div>
          
          </div>
          <div class="modal-footer">
            <a href="profile.php"><button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button></a>
            <button type="submit"  name="book" class="btn btn-primary">Confirm</button>
          </div> 
        </form>
        </div>
      </div>
    </div>
<!-- BOTTOM NAVS -->
<nav class="bar bar-tab">
      <a class="tab-item " href="profile.php">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item"  href="diet_update_history.php" style="text-decoration: transparent;">
      <span class="span" id="notification" style="padding-top:10px;background-color:transparent;width:20px; margin-left:auto; margin-right:auto; border-radius:50%; margin-top:10px;"></span> 
      <i class="fa fa-gift" id="diet"></i>
        <span class="span">Diet Update</span> 
      </a>
      <a class="tab-item active" href="appointment.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item" href="chat.php"  style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-user-md"></i>
        <span class="span">Chat</span>
      </a>
      <a class="tab-item" href="login.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-power-off"></i>
        <span class="span">Log out</span>
      </a>
    </nav>
    <?php } ?>
    
  </body>
</html>



