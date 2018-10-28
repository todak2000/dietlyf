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
                $update= "UPDATE user SET height='$height'and weight='$weight' and bmi='$bmi' and bsl='$bsl' where email='$email'";
                // header("Location: profile.php");
                $result = mysqli_query($con,$update)or die(mysql_error());
                 //var_dump($update);
                if($result){
                    var_dump($update);
                    //header("Location: profile.php");

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
        <?php echo "<p class='jive'>Welcome".$row['firstName']."! <br>Please enter the following details</p>"; ?>
          
          <!-- echo "<td>" . $row['FirstName'] . "</td>"; -->
      </div>

      <form name="registration" action="" method="post">
        <div class="row">
            
            <div class="col-xs-12">Please Indicate your height:
            <input type="number" name="height" placeholder="" required class="form-control inp"/> (cm)
            </div>
            <div class="col-xs-12">Please Indicate your BMI:
            <input type="number" name="bmi" placeholder="" required class="form-control inp"/>
            </div>
            <div class="col-xs-12">Please Indicate your Blood Sugar Level:
            <input type="number" name="bsl" placeholder="" required class="form-control inp"/> (mg/dL)
            </div>
        </div>
          
        <div class="row" style="margin-top:10px; margin-bottom: 20px;">
            <div class="col-xs-12">Please Indicate your Weight:
                <select class="round" style=" margin:10px 0 5px 0; " name="weight">
                    <option>110cm</option>
                    <option>120cm</option>
                    <option>130cm</option>
                    <option>140cm</option>
                    <option>150cm</option>
                    <option>160cm</option>
                    <option>170cm</option>
                    <option>180cm</option>
                    <option>190cm</option>
                    <option>200cm</option>
                    
                </select>
                <span class="input-group-text" id="basic-addon2"><img style="width:20px; height:20px; margin-left:-25px; padding-top: 10px;" src="css/down.svg"></span>
            </div>
        </div>  
          
       <input type="submit" name="next" value="Next" class="form-control" class="button" /> 
        </form>
        
        
    </div>
    <?php } ?>
  </body>
</html>