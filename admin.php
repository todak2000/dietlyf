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
  <body style=" font-family: 'KoHo', sans-serif; ">
  <?php
            require('auth/auth.php');
            require('auth/db.php');
            //Checking is user existing in the database or not
            $query = "SELECT * FROM `user`";
            $result = mysqli_query($con,$query) or die(mysqli_error());
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
                $Image = $row['image'];
            }

            // APPOINTMENT QUERY
            $querya = "SELECT * FROM `appointment`";
            $resulta = mysqli_query($con,$querya) or die(mysqli_error());
            $rowsa = mysqli_num_rows($resulta);

            // ON CLICK PATIENTS BUTTTON
            if (isset($_POST['patients'])){
                header("Location: patient_table.php");// Redirect user to index.php
	
                }
            ?>
      <header class="bar bar-nav">
      <h1 class="title">Admin</h1>
      <<span class="icon icon-bars"></span>
    </header>
<!-- end of header -->
<!-- profile  -->
        <div class="flex-container">
            <div><a href="patient_table.php"><button name="patients"><i class="fa fa-users fal"></i><span class="span">Patients</span><span class="span numb"><?php echo $rows; ?></span></button></a></div>
            <div><button name="dietricians"><i class="fa fa-user-md fal"></i><span class="span">Dietricians</span><span class="span numb">10</span></button></div>
            <div><a href="appointment_table.php"><button name="appoint"> <i class="fa fa-calendar fal"></i> <span class="span">Appointments</span><span class="span numb"><?php echo $rowsa; ?></span></button></a></div>
            <div><button name="updates"><i class="fa fa-gift fal"></i><span class="span">Diet Updates</span><span class="span numb">23</span></button></div>
            <!-- <div>5</div>
            <div>6</div> -->
        </div>

   
  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script src="ratchet/js/ratchet.min.js"></script> -->
  <script src="js/profile.js"></script>
  </body>
</html>