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
    <!-- Include the compiled Ratchet JS -->
    <script src="ratchet/js/ratchet.min.js"></script>
  </head>
  <body style=" font-family: 'KoHo', sans-serif;">
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
                // $Height = $row['height'];
                // $Weight = $row['weight'];
                // $Image = $row['image'];
            }
         // diet update messages QUERY
        //  $querya = "SELECT * FROM `diet_update` WHERE email = '$Email' AND seen = '1' order by id desc";
        //  $resulta = mysqli_query($con,$querya) or die(mysqli_error());
        //  if($resulta){
        //   $rowsa = mysqli_num_rows($resulta);
        // } 
            ?>
      <header class="bar bar-nav">
      <h1 class="title">Profile</h1>
      <span class="icon icon-refresh" onclick="window.location.reload(true)"></span>
    </header>
<!-- end of header -->
<!-- profile  -->
<form action="" method="post" enctype="multipart/form-data">
    <div class="col-xs-12 col-sm-12 bg">
      <!-- <div class="img-circle pics"> -->
        <!-- <img src="img/diet.svg"> -->
        <img  class="pics" style="height:35%; border-radius:50%; margin-left:35%;width:30%" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/195612/chat_avatar_01_green.jpg" alt="avatar" />
        <!-- <div style="width:80px; height:80px;"><?php echo $Image; ?> </div> -->
      <!-- </div> -->
      <h3 class="name"><?php echo $Firstname; ?> <?php echo $Lastname; ?> <br>
        @<?php echo $Username; ?> 
      </h3>
      
          <i class="fa fa-pencil-square-o" type="file"></i>
          <input type="file" id="my_file" style="display: none;" name="image"/>
      
    </div>
<!-- end of profile -->
<!-- profile details -->
  <div class="segmented-control">
    <a class="control-item active" href="#item1mobile">
      Basic Information
    </a>
    <a class="control-item" href="#item2mobile">
      Health Information
    </a>
  </div>
  <div class="card">
    <span id="item1mobile" class="control-content active">
        <!-- assigned dietrician
        Age
        BMI
        Height
        Weight-->
        <table class="table table-striped">
          
          <tbody>
            <tr>
              <th scope="row">Email</th>
              <td><?php echo $Email; ?></td>
            </tr>
            <tr>
              <th scope="row">Phone Number</th>
              <td><?php echo $Phone; ?></td>
            </tr>
            <tr>
              <th scope="row">Age</th>
              <td><?php echo $Age; ?></td>
            </tr>
            <tr>
              <th scope="row" >Gender</th>
              <td><?php echo $Gender; ?></td>
            </tr>
          </tbody>
        </table>
        <p style="font-size:10px; margin:auto; background-color:#232323; color:#ccc;" class="btn form-control">Please click on the Health Information tab to update</p>
        <!-- <input type="submit" name="edit" value="Next" class="form-control" class="button" />  -->
        <!-- <a class="btn  pull-right form-control" style=" background-color:#eee;" name="edit">Edit Details &nbsp;&nbsp;<em class="fa fa-pencil"></em></a> -->
    </span>
    <!-- HEALTH INFO SECTION -->
    <span id="item2mobile" class="control-content">
    <table class="table table-striped">
          
          <tbody>
            <!-- <tr>
              <th scope="row">Height</th>
              <td><?php echo $Height; ?></td>
            </tr>
            <tr>
              <th scope="row">Weight</th>
              <td><?php echo $Weight; ?></td>
            </tr> -->
            <tr>
              <th scope="row">Body Mass Index (BMI)</th>
              <td><?php echo $bmi; ?></td>
            </tr>
            <tr>
              <th scope="row">Blood Sugar Level (BSL)</th>
              <td><?php echo $bsl; ?></td>
            </tr>
          </tbody>
        </table>
        <a href="update.php"> <input type="submit" name="edit" value="Update Details" class="form-control" class="button" /></a>
        <a href="ieat.php"> <input type="submit" name="ieat" value="i-eat" class="form-control" class="button" style="margin-top:10%; background-color:green; color:#ccc;"/></a>
        <!-- <a class="btn btn-default pull-right form-control" style=" background-color:#eee;" name="update" href="#">Update Details &nbsp;&nbsp;<em class="fa fa-pencil"></em></a> -->
    </span>
  </div>
  </form>
<!-- BOTTOM NAVS -->
    <nav class="bar bar-tab">
      <a class="tab-item active" href="profile.php">
      <span class="span" style="color:transparent">1</span> 
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item" name="dieting"  href="diet_update_history.php" style="text-decoration: transparent;">
      <span class="span" id="notification" style="background-color:red;width:20px; margin-left:auto; margin-right:auto; border-radius:50%;"></span> 
      <i class="fa fa-gift" id="diet"></i>
        <span class="span">Diet Update</span> 
      </a>
      <a class="tab-item" href="appointment.php" style="text-decoration: transparent;">
      <span class="span" style="color:transparent">1</span> 
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item" href="chat.php"  style="text-decoration: transparent;">
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
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  <script>
    
    $(document).ready(function(){
        if ($('#notification').val() == "0"){
          // $("#notification").css("display", "none");
          $("#notification").css("background-color", "transparent");
          $("#notification").css("color", "transparent");
          $("#notification").css("margin-top", "0");
        } 
        // if($('#notification').val() >= 1){
        //   // $("#notification").css("display", "block");
        //   $("#notification").css("background-color", "red");
        //   $("#notification").css("color", "#fff");
        // }
       
         });
    

      </script>
      
  </body>
</html>
