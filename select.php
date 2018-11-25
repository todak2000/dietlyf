<?php
// require('auth/auth.php');
require('auth/db.php');
            
// ON CLICK PATIENTS BUTTTON
// if (isset($_POST['patients'])){
   
if (isset($_POST['patient_id'])){
    $output = '';
    $query = "SELECT * FROM `healthdetails` WHERE user_id='".$_POST['patient_id']."'";
    $result = mysqli_query($con,$query) or die(mysql_error());
    
    $output .= '
        <div class = "table-responsive">
            <table class="table table-bordered">
            <tr>
            <td>Email</td>
            <td>Height</td>
            <td>Weight</td>
            <td>BSL</td>
            <td>BMI</td>
            </tr>';
    while($rows = mysqli_fetch_array($result)){
        $output .= '
        
        <tr>
        <td>'.$rows['email'].'</td>
        <td>'.$rows['height'].'</td>
        <td>'.$rows['weight'].'</td>
        <td>'.$rows['bsl'].'</td>
        <td>'.$rows['bmi'].'</td>
        </tr>
        ';
     }
     $output .= '</table></div>';
     echo $output;
    }

    
?>