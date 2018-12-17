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
                
            }
            $fullname = $Firstname." ".$Lastname;
            $day = date("Y/m/d") ;
            date_default_timezone_set("Africa/Lagos");
            $time=  date("h:i:sa");
   

         if (isset($_POST['patient_chat'])){
        

          $message = stripslashes($_REQUEST['patient_message']);
          $message = mysqli_real_escape_string($con,$message);
                  
                  $query = "INSERT into `chat_history` (user_id,patient,email,patient_message,day,time) VALUES ('$id','$fullname','$Email','$message', '$day','$time')";
          $result = mysqli_query($con,$query)or die(mysqli_error());;
          var_dump($result);
         
          while($rows = mysqli_fetch_array($result)){
            $sender_message = $rows['patient_message'];
            
            
          }

           }   // var_dump($rowsa);
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
        
        <!-- <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css"></link>
         -->
    <!-- Include the compiled Ratchet JS -->
    <script src="ratchet/js/ratchet.min.js"></script>
    </style>
  </head>
  <body style=" font-family: 'KoHo', sans-serif;">
  <header class="bar bar-nav">
      <h1 class="title">DiabCare Chat</h1>
      <span class="icon icon-refresh" onclick="window.location.reload(true)"></span>
    </header>
  <div class="container clearfix">
   
    <div class="chat" style="width: 100%;float: left;height: 75vh;background: #F2F5F8;border-top-right-radius: 5px;border-bottom-right-radius: 5px;margin-top: 20px;color: #434651;">
      <div class="chat-header clearfix" style="padding: 10px;border-bottom: 2px solid #1C304E;">
        <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        
        <div class="chat-about">
          <div class="chat-with">Chat with Admin</div>
          <!-- <div class="chat-num-messages">already 1 902 messages</div> -->
        </div>
        <i class="fa fa-star" style="float: right;color: #D8DADF;font-size: 20px;margin-top: 12px;"></i>
      </div> <!-- end chat-header -->
      
      <div class="chat-history" style="    padding: 30px 30px 20px;border-bottom: 2px solid #1C304E;overflow-y: scroll;height: 40vh; background-color: #e5e3ea;">
        <ul>
          <!-- <li class="clearfix">
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
           -->
          <!-- <li>
            <div class="message-data">
              <span class="message-data-name"><i class="fa fa-circle online"></i> Vincent</span>
              <span class="message-data-time">10:31 AM, Today</span>
            </div>
            <i class="fa fa-circle online"></i>
            <i class="fa fa-circle online" style="color: #AED2A6"></i>
            <i class="fa fa-circle online" style="color:#DAE9DA"></i>
          </li> -->
          
        </ul>
        
      </div> <!-- end chat-history -->
      <!-- <form> -->
        <div class="chat-message clearfix">
          <textarea name="patient_message" id="message-to-send" placeholder ="Type your message" rows="3"></textarea>
                  
          <i class="fa fa-file-o"></i> &nbsp;&nbsp;&nbsp;
          <i class="fa fa-file-image-o"></i>
             <button type="submit" name="patient_chat" class="btn" style="background-color:green; width:60px; height:40px; border-radius:20px;"><i style="color:#fff;" class="fa fa-paper-plane"></i></button>

        </div> <!-- end chat-message -->
      <!-- </form> -->
    </div> <!-- end chat -->
    
  </div> <!-- end container -->
 
<script id="message-template" type="text/x-handlebars-template">
    
  <li class="clearfix">
    <div class="message-data align-right">
      <span class="message-data-time" >{{time}}, Today</span> &nbsp; &nbsp;
      <span class="message-data-name"> "<?php echo $Firstname ?> <?php echo $Lastname ?>"</span> <i class="fa fa-circle me"></i>
    </div>
    <div class="message other-message float-right">
      {{messageOutput}} 
      <!-- "<?php echo $sender_message; ?>" -->
    </div>
  </li>
</script>

<script id="message-response-template" type="text/x-handlebars-template">
  <li>
    <div class="message-data">
      <span class="message-data-name"><i class="fa fa-circle online"></i> Admin</span>
      <span class="message-data-time">{{time}}, Today</span>
    </div>
    <div class="message my-message">
      {{response}}
    </div>
  </li>
</script>
    <!-- BOTTOM NAVS -->
    <nav class="bar bar-tab">
      <a class="tab-item"  href= "profile.php">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item" name="dieting"   href="diet_update_history.php" style="text-decoration: transparent;">
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
