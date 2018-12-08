<?php
            require('auth/auth.php');
            require('auth/db.php');
            //Checking is user existing in the database or not
            $query = "SELECT * FROM `user` WHERE email='$email'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            while ($row    = mysqli_fetch_array($result))
           
            {
                $id = $row['id'];
                $Firstname     = $row['firstName'];
                $Lastname = $row['lastName'];
                $Username = $row['userName'];
                $Email = $row['email'];
                $Phone = $row['phoneNo'];
                $Age = $row['age'];
                $Gender = $row['gender'];
                $bmi = $row['bmi'];
                $bsl = $row['bsl'];
                $Height = $row['height'];
                $Weight = $row['weight'];
                $Image = $row['image'];
            }
         // diet update messages QUERY
         $querya = "SELECT * FROM `diet_update` WHERE email = '$Email' AND seen = '1' order by id desc";
         $resulta = mysqli_query($con,$querya) or die(mysqli_error());
         $rowsa = mysqli_num_rows($resulta);
            // var_dump($rowsa);
            ?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Dietlyf Registration </title>

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
        <link rel="stylesheet" href="css/chat.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
        
    <!-- Include the compiled Ratchet JS -->
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
  <body style=" font-family: 'KoHo', sans-serif;">
  <header class="bar bar-nav">
      <h1 class="title">DiabCare Chat</h1>
      <span class="icon icon-bars"></span>
    </header>
  <div class="container clearfix">
   
    <div class="chat">
      <div class="chat-header clearfix">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        
        <div class="chat-about">
          <div class="chat-with">Chat with Vincent Porter</div>
          <div class="chat-num-messages">already 1 902 messages</div>
        </div>
        <i class="fa fa-star"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history">
        <ul>
          <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" >10:10 AM, Today</span> &nbsp; &nbsp;
              <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
              
            </div>
            <div class="message other-message float-right">
              Hi Vincent, how are you? How is the project coming along?
            </div>
          </li>
          
          <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:12 AM, Today</span>
            </div>
            <div class="message my-message">
              Are we meeting today? Project has been already finished and I have results to show you.
            </div>
          </li>
          
          <li class="clearfix">
            <div class="message-data align-right">
              <span class="message-data-time" >10:14 AM, Today</span> &nbsp; &nbsp;
              <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
              
            </div>
            <div class="message other-message float-right">
              Well I am not sure. The rest of the team is not here yet. Maybe in an hour or so? Have you faced any problems at the last phase of the project?
            </div>
          </li>
          
          <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:20 AM, Today</span>
            </div>
            <div class="message my-message">
              Actually everything was fine. I'm very excited to show this to our team.
            </div>
          </li>
          
          <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:31 AM, Today</span>
            </div>
            <i class="fa fa-circle online"></i>
            <i class="fa fa-circle online" style="color: #AED2A6"></i>
            <i class="fa fa-circle online" style="color:#DAE9DA"></i>
          </li>
          
        </ul>
        
      </div> <!-- end chat-history -->
      
      <div class="chat-message clearfix">
        <textarea name="message-to-send" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                
        <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
        <i class="fa fa-file-image-o"></i>
        
        <button class="btn" style="background-color:green; width:60px; height:40px; border-radius:20px;"><i style="color:#fff;" class="fa fa-paper-plane"></i></button>

      </div> <!-- end chat-message -->
      
    </div> <!-- end chat -->
    
  </div> <!-- end container -->

<script id="message-template" type="text/x-handlebars-template">
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name" >Olia</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}}
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
    <!-- BOTTOM NAVS -->
    <nav class="bar bar-tab">
      <a class="tab-item  href="profile.php"">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item" name="dieting"  href="diet_update_history.php" style="text-decoration: transparent;">
      <span class="span" id="notification" style="background-color:transparent;width:20px; height:20px; margin-left:auto; margin-right:auto;color:transparent; border-radius:50%;"><?php echo $rowsa; ?></span> 
      <i class="fa fa-gift" id="diet"></i>
        <span class="span">Diet Update</span> 
      </a>
      <a class="tab-item" href="appointment.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item active" href="chat.php"  style="text-decoration: transparent;">
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
   
  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/list.js/1.1.1/list.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/handlebars.js/3.0.0/handlebars.min.js"></script>
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
     <script src="js/chat.js"></script>  

     
  </body>
</html>
