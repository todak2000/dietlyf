<?php
// require('auth/auth.php');
require('auth/db.php');
            
// ON CLICK PATIENTS BUTTTON

    if (isset($_POST['message_id'])){

        $output = '';
        $query = "SELECT * FROM `healthdetails` WHERE user_id='".$_POST['message_id']."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        while($rows = mysqli_fetch_array($result)){
            $email = $rows['email'];
        }
        $output .= '
        <form>
        <div class="form-group">
          <div style="text-align:left;"><label for="recipient-name" class="col-form-label">Recipient:</label></div>
          <input type="email" class="form-control" name="email" id="recipient-name" readonly value="'.$email.'">
        </div>
        <div class="form-group">
        <div style="text-align:left;"> <label for="message-text" class="col-form-label">Message:</label></div>
          <textarea class="form-control" name="message" id="message-text" style="height:200px;"></textarea>
        </div>
      </form>    
        ';
      
         echo $output;
        }
    
        if (isset($_POST['send_message'])){
                $email = stripslashes($_REQUEST['email']); // removes backslashes
				$email = mysqli_real_escape_string($con,$email); //escapes special characters in a string

				$message = stripslashes($_REQUEST['message']);
                $message = mysqli_real_escape_string($con,$message);
                
                $query = "INSERT into `diet_update` (email,message) VALUES ('$email','$message')";
				$result = mysqli_query($con,$query);
		        if($result){
        
                    echo "Message sent";


                }
           
        }

    
?>
