<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dietlyf Diet Update </title>

    <!-- Sets initial viewport load and disables zooming  -->
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="shortcut icon" type="image/png" href="img/diet3.png"/>
    <!-- Makes your prototype chrome-less once bookmarked to your phone's home screen -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
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
  <body style=" font-family: 'KoHo', sans-serif; ">
  <?php
            // require('auth/auth.php');
            require('auth/db.php');
            require('auth/auth.php');

                $query = "SELECT * FROM `diet_update` WHERE email='$email' ORDER BY date DESC";
                $result = mysqli_query($con,$query) or die(mysql_error());
                $rows = mysqli_num_rows($result);

                $query1= "UPDATE  diet_update SET seen='0' where email='$email'";
                $result1 = mysqli_query($con,$query1) or die(mysql_error());
                

                
            ?>



      <header class="bar bar-nav">
      <h1 class="title">Diet Updates</h1>
      <span class="icon icon-bars"></span>
    </header>
<!-- end of header -->
                <div style="margin-top:15%; overflow-y:auto; height:80%; margin-left:5%; margin-right:5%;">
                
                        <?php 
                         while ($row    = mysqli_fetch_array($result))
                        
                         {
                             
                             $email     = $row['email'];
                             $message = $row['message'];
                                 $time = $row['date'];
                                 $time1 = explode(" ", $time);
                                 $time2 = $time1[0];
                                 $time3 = $time1[1];
                                
                                echo'
                                <button class="accordion">From Admin <footer class="blockquote-footer pull-right">'.$time2.'</footer></button>
                                <div class="panel">
                                  <p class="reduce">'.$row['message'].'<br><cite title="Source Title pull-right btn btn-info">'.$time3.'</cite></p>                    
                                </div>
                                
                             
                                ';
                         }     
                        ?>
  
                </div>

<!-- <a href="profile.php" ><button class="btn" style="margin: 0 42%; height:30px; width:16%;" align="center">Back</button></a> -->

<!-- BOTTOM NAVS -->
<nav class="bar bar-tab">
      <a class="tab-item remove" href="profile.php">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item active"  href="diet_update_history.php" style="padding-top:10px; text-decoration: transparent;">
      <span class="span" id="notification" style="background-color:red;width:28%; margin-left:36%; border-radius:50%; margin-top:10px;"></span> 
      <i class="fa fa-gift" id="diet"></i>
        <span class="span">Diet Update</span> 
      </a>
      <a class="tab-item" href="appointment.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item remove" href="chat.php"  style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-user-md"></i>
        <span class="span">Chat</span>
      </a>
      <a class="tab-item remove" href="login.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-power-off"></i>
        <span class="span">Log out</span>
      </a>
    </nav>
   

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
        
  <script>
    
    $(document).ready(function(){
      //$("#notification").css("display", "none");
        $(".remove").click(function() {
            // $("#notification").hide();
            $("#notification").css("display", "none");
        });
    
    });
      </script>


      <script>
            // FAQ SLIDE TOGGLE
            var acc = document.getElementsByClassName("accordion");
            var i;

            for (i = 0; i < acc.length; i++) {
            acc[i].addEventListener("click", function() {
                this.classList.toggle("active");
                var panel = this.nextElementSibling;
                if (panel.style.maxHeight){
                panel.style.maxHeight = null;
                } else {
                panel.style.maxHeight = panel.scrollHeight + "px";
                } 
            });
            }

        </script>

  </body>
</html>

 


