<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dietlyf Admin </title>

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
    <link href="https://fonts.googleapis.com/css?family=KoHo" rel="stylesheet">
        <link rel="stylesheet" href="css/profile.css">
        <link rel="stylesheet" href="css/admin.css">
    <!-- Include the compiled Ratchet JS -->
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
  <body style=" font-family: 'KoHo', sans-serif; overflow-x:auto;">
  <?php
            // require('auth/auth.php');
            require('auth/db.php');
            if(isset($_POST['health'])) {
                $query = "SELECT * FROM healthdetails INNER JOIN user ON user.email = healthdetails.email";  
                // $query = "SELECT email FROM `user` WHERE id=3";
                $result = mysqli_query($con,$query) or die(mysqli_error());
				 $rows = mysqli_num_rows($result);
				//  echo($result);
		        //  exit();
        
                while ($row    = mysqli_fetch_array($result))
               
                {

                    echo "
                    <header class='bar bar-nav'>
                    <h1 class='title'>Health details</h1>
                    <span class='icon icon-bars'></span>
                  </header>
                    <div style='overflow-x:auto;'><form method='POST'><table class='table table-sm table-dark table-responsive' style='margin-top:50px;overflow-x:auto;'>
                        <thead>
                            <tr>
                            <th scope='col'>Email</th>
                            <th scope='col'>Height</th>
                            <th scope='col'>Weight</th>
                            <th scope='col'>BSL</th>
                            <th scope='col'>BMI</th>
                            <th scope='col'>Date</th>
                           
                            </tr>
                        </thead>
                        <tbody>";
                        while($row = mysqli_fetch_array($result))
                        {
                           
                        echo "<tr>";
                        echo "<td>" . $row['email']. "</td>";
                        echo "<td>" . $row['height']. "</td>";
                        echo "<td>" .  $row['weight'] . "</td>";
                        echo "<td>" . $row['bsl'] . "</td>";
                        echo "<td>" . $row['bmi'] . "</td>";
                        echo "<td>" . $row['time'] . "</td>";
                        }
                        echo "</tr></tbody>";
                        
                        echo "</table></form><br></div>";
                        echo "
                        <a href='patient_table.php' ><button class='btn' style='margin: 0 30%; height:30px; width:100px;' align='center'>Back</button></a>
                        ";
                   
                }
                
            ?>



      <header class="bar bar-nav">
      <h1 class="title">Health details</h1>
      <span class="icon icon-bars"></span>
    </header>
<!-- end of header -->
<div class="container" style="width:500px;">  
                <h3 align="">health details</h3><br />                 
                <div class="table-responsive">  
                     <table class="table table-striped">  
                          <tr>  
                               <th>Email</th>  
                               <th>Height</th> 
                               <th>Weight</th>  
                               <th>BSL</th>  
                               <th>BMI</th>  
                               <th>Date</th>  
                                
                          </tr>  
                          <?php  
                          
                               while($row = mysqli_fetch_array($result))  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $row["email"];?></td>  
                               <td><?php echo $row['height'] ; ?></td> 
                               <td><?php echo $row["weight"];?></td>  
                               <td><?php echo $row['bsl'] ; ?></td> 
                               <td><?php echo $row["bmi"];?></td>  
                               <td><?php echo $row["time"];?></td>  
                          </tr>  
                          <?php  
                               }  
                            }
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  

<!-- <a href="admin.php" ><button class="btn" style="margin: 0 30%; height:30px; width:100px;" align="center">Back</button></a>
    -->
  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  </body>
</html>