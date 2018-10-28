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
             // session_start();
            // $_SESSION['email'] = $email;
            // $_SESSION['username'] = $username;
            // $_SESSION['firstname'] = $firstname;
            // $_SESSION['lastname'] = $lastname;
            // $_SESSION['email'] = $email;
            
            
            
		    // If form submitted, insert values into the database.
		    if (isset($_POST['next'])){
				
				$height = stripslashes($_REQUEST['height']); // removes backslashes
				$height = mysqli_real_escape_string($con,$height); //escapes special characters in a string
				$bmi = stripslashes($_REQUEST['bmi']);
                $bmi = mysqli_real_escape_string($con,$bmi);
                $bsl = stripslashes($_REQUEST['bsl']);
                $bsl = mysqli_real_escape_string($con,$bsl);
                $weight = stripslashes($_REQUEST['weight']);
                $weight = mysqli_real_escape_string($con,$weight);
                

            //     $sql    = "SELECT * FROM usermaster WHERE User_name=''";
            // $result = mysqli_query($sql) or die(mysqli_error());
            // while ($row    = mysqli_fetch_array($result))
            // {

            //     $Name     = $row['firstNaame'];
            //     $Username = $row['lastName'];
               
            // }
			//Checking is user existing in the database or not
            $query = "SELECT * FROM `user` WHERE email='$email'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            // while ($row    = mysqli_fetch_array($result))
           
            // {

            //     $Name     = $row['firstName'];
            //     $Username = $row['lastName'];
               
            // }
            
            if($rows==1){
                $_SESSION['email'] = $email;
                
                //$update= "UPDATE user SET height='$height'and weight='$weight' and bmi='$bmi' and bsl='$bsl' where email='$email'";
                // header("Location: profile.php");
                $update1= "UPDATE user SET height='$height' where email='$email'";
                $result1 = mysqli_query($con,$update1)or die(mysqli_error());
                $update2= "UPDATE user SET weight='$weight' where email='$email'";
                $result2 = mysqli_query($con,$update2)or die(mysqli_error());
                $update3= "UPDATE user SET bmi='$bmi' where email='$email'";
                $result3 = mysqli_query($con,$update3)or die(mysqli_error());
                $update4= "UPDATE user SET bsl='$bsl' where email='$email'";
                $result4 = mysqli_query($con,$update4)or die(mysqli_error());
                 //var_dump($update);
                if($result4){
                    
                    echo "OK";
                }
            }
            else{
                    echo "<div align='center' class='form col-xs-12' style='margin-top: 0;color:#ccc; top: 30%;'><h3 style='color:#ccc;'> <span style='font-size:80px; color:#FFC655'>&#9786;</span><?php echo $Name; ?>! <br>Your details was NOT saved successfully. Please try again!</h3><br/>Click here to <a style='color:#979b1b;' href='login.php'>Login</a></div>";
    
                                    }
        }else{
                ?>
  <header class="bar bar-nav">
        <button class="btn btn-link btn-nav pull-center">
          <img src="img/diet2.svg" ></button>
      </header>

    <div class="content">
    <p class='jive'>Welcome! <br>Please enter the following details</p>
          
          <!-- echo "<td>" . $row['FirstName'] . "</td>"; -->
      </div>

      <form name="registration" action="" method="post">
        <div class="row">
            
            <div class="col-xs-12">
              <div class="row">
                <div class="col-xs-7" style="text-align:left; padding-top:10px;">height (cm):</div>
                <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent;color:#fff;" type="number" name="height" placeholder="" required class="form-control iip"/></div>
              </div>
            </div>
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Body Mass Index:</div>
                    <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent; color:#fff;" type="number" name="bmi" placeholder="" required class="form-control iip"/></div>
              </div>
            </div>

            <div class="col-xs-12">
             <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Blood Sugar Level (mg/dL):</div>
                    <div class="col-xs-5"><input style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent; color:#fff;" type="number" name="bsl" placeholder="" required class="form-control iip"/> </div>
              </div>
            </div>
        </div>
          
        <div class="row" style="margin-top:10px; margin-bottom: 20px;">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-7" style="text-align:left; padding-top:10px;">Weight (kg):</div>
                    <div class="col-xs-5">
                    <select class="round form-control"  name="weight" style="border-left:0; border-right: 0; border-top: o; margin-top: 5px; background-color: transparent; color:#fff;">
                    <option>110</option>
                    <option>120</option>
                    <option>130</option>
                    <option>140</option>
                    <option>150</option>
                    <option>160</option>
                    <option>170</option>
                    <option>180</option>
                    <option>190</option>
                    <option>200</option>
                    
                </select>
                <!-- <span class="input-group-text" id="basic-addon2"><img style="width:20px; height:20px; margin-left:-25px; padding-top: 10px;" src="css/down.svg"></span> -->
                     </div>
              </div>
            </div>
        </div>  
          
       <input type="submit" name="next" value="Next" class="form-control" class="button" /> 
        </form>
        
        
    </div>
    <?php } ?>
  </body>
</html>