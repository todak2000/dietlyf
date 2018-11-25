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

                    echo "<div style='overflow-x:auto;'><form method='POST'><table class='table table-sm table-dark table-responsive' style='margin-top:50px;overflow-x:auto;'>
                        <thead>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>email</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Phone No</th>
                            <th scope='col'>Age</th>
                            <th scope='col'>Gender</th>
                            <th scope='col'>Health details</th>
                           
                            </tr>
                        </thead>
                        <tbody>";
                      
                            //echo "The number is: $x <br>";
                            
                        // } 
                        // for ($x = 0; $x <=1000; $x++) {
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
                        echo "<td> <input type='button' name='view' value='view' id=" . $row['id']. " class='view_data btn btn-default btn-xs'><input type='button' name='message' value='Message' id=" . $row['id']. " class='message_data btn btn-info btn-xs'></td>";
                        
                            // echo "The number is: $x <br>";
                           // echo "<td><a href='health_details.php'><button class='btn btn-info' style=' height:30px; width:auto;' name='health'>health details</button></a></td>"; 
                        }
                        // $x++;
                        echo "</tr></tbody>";
                        
                        echo "</table></form><br></div>";
                       
                   
                }

               
                // }
            ?>



      <header class="bar bar-nav">
      <h1 class="title">Patients Table</h1>
      <<span class="icon icon-bars"></span>
    </header>
<!-- end of header -->
<a href="admin.php" ><button class="btn" style="margin: 0 30%; height:30px; width:100px;" align="center">Back</button></a>

<div align='center' class='forma' >
    <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="patient_detail">
        
      </div>
      <!-- <div class="modal-footer">
       
        <button type="button" class="btn btn-primary pull-right"></button>
      </div> -->
</div>

<div align='center' class='formaa' >
    <div class="modal-header">
        <!-- <h5 class="modal-title" id="exampleModalLabel">Modal title</h5> -->
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="message_detail">
        
      </div>
      <!-- <div class="modal-footer">
       
        <button type="button" class="btn btn-primary pull-right"></button>
      </div> -->
</div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  <script>
    $(document).ready(function(){
        $('.forma').hide();
    // onclicking the view of each person, a modal pops up showing his/her details
        $('.view_data').click(function(){
          
            var patient_id = $(this).attr("id");

            $.ajax({
                url:"select.php",
                method:"post",
                data: {patient_id: patient_id},
                success:function(data){
                    $('#patient_detail').html(data);
                    $('.forma').show();
                }
            });
        });


        $('.close').click(function(){
      $('.forma').hide();
    });
    });
  </script>
  
  </body>
</html>