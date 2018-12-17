<?php
// require('auth/auth.php');
require('auth/db.php');
            
// ON CLICK PATIENTS BUTTTON
// if (isset($_POST['patients'])){
   
if (isset($_POST['patient_id'])){
    $output = '';
    $query = "SELECT * FROM `ieat` WHERE user_id='".$_POST['patient_id']."'";
    $result = mysqli_query($con,$query) or die(mysqli_error());


    $output .= '
        <div class = "table-responsive">
            <table class="table table-bordered">
            <tr>
            <td>Email</td>
            <td>12am - 6am</td>
            <td>6am - 9am</td>
            <td>9am - 12pm</td>
            <td>12pm - 3pm</td>
            <td>3pm - 6pm</td>
            <td>6pm - 9pm</td>
            <td>9pm - 12am</td>
            <td>Average food Intake</td>
            </tr>';
    while($rows = mysqli_fetch_array($result)){
        $time = $rows['date'];
        $time1 = explode(" ", $time);
        $time2 = $time1[0];
        $output .= '
        
        <tr>
        <td>'.$rows['email'].'</td>
        <td>'.$time2.'</td>
        <td>'.$rows['12am6am'].'</td>
        <td>'.$rows['6am9am'].'</td>
        <td>'.$rows['9am12pm'].'</td>
        <td>'.$rows['12pm3pm'].'</td>
        <td>'.$rows['3pm6pm'].'</td>
        <td>'.$rows['6pm9pm'].'</td>
        <td>'.$rows['9pm12am'].'</td>
        <td>'.$rows['6pm9pm'].'</td>
        <td>'.$rows['9pm12am'].'</td>
        <td>'.$rows['average_intake'].'</td>
        </tr>
        ';
     }
     $output .= '</table></div>';
     echo $output;
    }

    if (isset($_POST['message_id'])){
        $output = '';
        // $query = "SELECT * FROM `healthdetails` WHERE user_id='".$_POST['patient_id']."'";
        // $result = mysqli_query($con,$query) or die(mysql_error());
        
        $output .= '
        <form>
        <div class="form-group">
          <label for="recipient-name" class="col-form-label">Recipient:</label>
          <input type="text" class="form-control" id="recipient-name">
        </div>
        <div class="form-group">
          <label for="message-text" class="col-form-label">Message:</label>
          <textarea class="form-control" id="message-text"></textarea>
        </div>
      </form>    
        ';
        // while($rows = mysqli_fetch_array($result)){
        //     $output .= '
            
        //     <tr>
        //     <td>'.$rows['email'].'</td>
        //     <td>'.$rows['height'].'</td>
        //     <td>'.$rows['weight'].'</td>
        //     <td>'.$rows['bsl'].'</td>
        //     <td>'.$rows['bmi'].'</td>
        //     <td>'.$rows['time'].'</td>
        //     </tr>
        //     ';
        //  }
        //  $output .= '</table></div>';
         echo $output;
        }
    

    
?>
