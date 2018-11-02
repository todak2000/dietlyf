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
  <body class="container">
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
        <button class="btn btn-link btn-nav pull-center">
          <img src="img/diet2.svg" ></button>
      </header>

    <div class="content">
    <p class='jive' style="font-size:13px;"><?php echo $Name; ?> !<br>Book an Appointment With your Dietrician Now!</p>
    
          <!-- echo "<td>" . $row['FirstName'] . "</td>"; -->
      </div>

      <form name="registration" action="" method="post">
        <div class="row">
            <div class="row">
                <div class="col-xs-3 pd inp" style="padding-top:10px;margin-bottom:5px;">Recipient:</div>
                <div class="col-xs-9 pd"><p class="form-control inp">@Dr. Adekitan</p></div>
            </div>
            <div class="row">
            <div class="col-xs-3 pd inp" style="padding-top:10px; margin-bottom:5px;">Date:</div>
            <div class="col-xs-9 pd"><input type="date" name="date" placeholder="" required class="form-control inp" style="margin-bottom:5px;"/></div>
            <div class="col-xs-3 pd inp" style="padding-top:10px;margin-bottom:5px;">Time slot:</div>
            <div class="col-xs-9 pd">
                <select class="round form-control"  name="time" style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent; color:#fff;" placeholder="Duration">
                    <option style=" color:#232323; background-color:#d9edf7;">10 mins</option>
                    <option style=" color:#232323; background-color:#d9edf7;">20 mins</option>
                    <option style=" color:#232323; background-color:#d9edf7;">1 hour</option>
                    <option style=" color:#232323; background-color:#d9edf7;">2 hours</option>
                    <option style=" color:#232323; background-color:#d9edf7;">5 hours</option>
                    <option style=" color:#232323; background-color:#d9edf7;">10 hours</option>
                    <option style=" color:#232323; background-color:#d9edf7;">unlimited</option>
                    
                </select>
                </div>
            </div>
            <div class="form-group" style="margin-top:15px;">
                <label for="message-text" class="col-form-label">Message:</label>
                <textarea class="form-control" id="message-text" style="height:150px;" name="message" placeholder="Enter your additional information here..."></textarea>
          </div>
          <div  style="text-align:center; width: 280px; margin: auto;">
          <input type="submit" name="book" value="Confirm" class="btn " style="background-color:rgba(0,0, 0, 0.3); height: 30px; width:70px; margin: 5px;font-size: 13px; color:#ccc;"/> 
          <!-- <a class="tab-item" href="" name="book" class="btn" style="background-color:rgba(0,0, 0, 0.3); height: 30px; width:100px; padding: 5px; font-size: 13px;color:#ccc;  border-radius:5px; float:left;"><i class="fa fa-check"></i>  confirm</a> -->
          <a class="tab-item" href="profile.php"  class="btn pull-right" style="background-color:rgba(0,0, 0, 0.3); height: 30px; width:100px; padding: 5px; font-size: 13px;color:#ccc; float:right;  border-radius:5px;"><i class="fa fa-times"></i>  Cancel</a> </div>
        </form> 
         
        </div>  
          
       
        </form>
        
        
    </div>
    <?php } ?>
  </body>
</html>


