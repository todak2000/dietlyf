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
            
            // ON CLICK PATIENTS BUTTTON
            // if (isset($_POST['patients'])){
                $query = "SELECT * FROM `user`";
                $result = mysqli_query($con,$query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                while ($row    = mysqli_fetch_array($result))
               
                {

                    echo "<div style='overflow-x:auto;'><table class='table table-sm table-dark table-responsive' style='margin-top:50px;overflow-x:auto;'>
                        <thead>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>email</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Phone No</th>
                            <th scope='col'>Age</th>
                            <th scope='col'>Gender</th>
                           
                            </tr>
                        </thead>
                        <tbody>";

                        while($row = mysqli_fetch_array($result))
                        {
                        echo "<tr>";
                        echo "<td>" . $row['id']. "</td>";
                        echo "<td>" . $row['firstName']. "</td>";
                        echo "<td>" .  $row['email'] . "</td>";
                        echo "<td>" . $row['userName'] . "</td>";
                        echo "<td>" . $row['phoneNo'] . "</td>";
                        echo "<td>" . $row['age']. "</td>";
                        echo "<td>" . $row['gender']. "</td>";
                        echo "<td><a href='admin.php' ><button class='btn btn-info' style=' height:30px; width:auto;'>health details</button></a></td>"; 
                        echo "</tr></tbody>";
                        }
                        echo "</table><br></div>";
                }
                // }
            ?>



      <header class="bar bar-nav">
      <h1 class="title">Patients Table</h1>
      <<span class="icon icon-bars"></span>
    </header>
<!-- end of header -->

<a href="admin.php" ><button class="btn" style="margin: 0 30%; height:30px; width:100px;" align="center">Back</button></a>
   
  <script src="js/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  </body>
</html>