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
    <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  </head>
  <body style="overflow-y: hidden; font-family: 'KoHo', sans-serif;">
  <?php
            require('auth/auth.php');
            require('auth/db.php');
            //Checking is user existing in the database or not
            $query = "SELECT * FROM `user` WHERE email='$email'";
            $result = mysqli_query($con,$query) or die(mysql_error());
            $rows = mysqli_num_rows($result);
            while ($row    = mysqli_fetch_array($result))
           
            {

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
            ?>
      <header class="bar bar-nav">
      <h1 class="title">Profile</h1>
      <<span class="icon icon-bars"></span>
    </header>
<!-- end of header -->
<!-- profile  -->
    <div class="col-xs-12 col-sm-12 bg">
      <div class="img-circle pics">
        <img src="img/diet.svg">
      </div>
      <h3 class="name"><?php echo $Firstname; ?> <?php echo $Lastname; ?> <br>
        @<?php echo $Username; ?> 
      </h3>
      <i class="fa fa-pencil-square-o" type="file"></i>
          <input type="file" id="my_file" style="display: none;" />
          
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
              <th scope="row">Gender</th>
              <td><?php echo $Gender; ?></td>
            </tr>
          </tbody>
        </table>
        <a class="btn  pull-right form-control" style=" background-color:#eee;">Edit Details &nbsp;&nbsp;<em class="fa fa-pencil"></em></a>
    </span>
    <!-- HEALTH INFO SECTION -->
    <span id="item2mobile" class="control-content">
    <table class="table table-striped">
          
          <tbody>
            <tr>
              <th scope="row">Height</th>
              <td><?php echo $Height; ?></td>
            </tr>
            <tr>
              <th scope="row">Weight</th>
              <td><?php echo $Weight; ?></td>
            </tr>
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
        <a class="btn btn-default pull-right form-control" style=" background-color:#eee;">Update Details &nbsp;&nbsp;<em class="fa fa-pencil"></em></a>
    </span>
  </div>
<!-- BOTTOM NAVS -->
    <nav class="bar bar-tab">
      <a class="tab-item active" href="profile.php">
        <i class="fa fa-user-o"></i>
        <span class="span">Profile</span>
      </a>
      <a class="tab-item" href="#" style="text-decoration: transparent;">
      <i class="fa fa-gift"></i>
        <span class="span">Diet Update</span>
      </a>
      <a class="tab-item" href="#" style="text-decoration: transparent;">
      <i class="fa fa-calendar"></i>
        <span class="span">Apointment</span>
      </a>
      <a class="tab-item" href="#" style="text-decoration: transparent;">
      <i class="fa fa-user-md"></i>
        <span class="span">Chat</span>
      </a>
      <a class="tab-item" href="login.php" style="text-decoration: transparent;">
      <i class="fa fa-power-off"></i>
        <span class="span">Log out</span>
      </a>
    </nav>


  <script src="js/jquery.js"></script>
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  </body>
</html>