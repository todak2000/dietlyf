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
  <body style=" font-family: 'KoHo', sans-serif; overflow-x:auto; overflow-y:auto; position:relative;">
  <?php
            require('auth/db.php');

                $query = "SELECT * FROM `user`";
                $result = mysqli_query($con,$query) or die(mysql_error());
                $rows = mysqli_num_rows($result);
                while ($row    = mysqli_fetch_array($result))
               
                {

                    echo "<div style='overflow:auto;'><form method='POST' style='margin: 5% 15%; overflow:auto;'><table class='table table-sm table-dark table-responsive' style='margin-top:50px;overflow-x:auto;overflow:auto;'>
                        <thead>
                            <tr>
                            <th scope='col'>#</th>
                            <th scope='col'>Name</th>
                            <th scope='col'>email</th>
                            <th scope='col'>Username</th>
                            <th scope='col'>Phone No</th>
                            <th scope='col'>Age</th>
                            <th scope='col'>Gender</th>
                            <th scope='col'>Type of Diabetes</th>
                            <th scope='col'>Health details</th>
                           
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
                        echo "<td>" . $row['insulin']. "</td>";
                        echo "<td> <input type='button' name='view' value='view' id=" . $row['id']. " class='view_data btn btn-default btn-xs' style='width:100px; background-color:#ffc655; margin:2px;'><input type='button' name='message' value='Message' id=" . $row['id']. " class='message_data btn btn-info btn-xs' style='width:100px; background-color:green; margin:2px;'></td>";
                    
                        }
                       
                        echo "</tr></tbody>";
                        
                        echo "</table></form><br></div>";
                       
                   
                }

               
                // }
            ?>



      <header class="bar bar-nav">
      <h1 class="title">Patients Table</h1>
      <span class="icon icon-refresh" onclick="window.location.reload(true)"></span>
    </header>
<!-- end of header -->
<a href="admin.php" ><button class="btn" type="submit" style="margin: 0 45%; height:30px; width:10%;" align="center">Back</button></a>
<a href="admin.php" class="btn btn-success">Back</a>
<div align='center' class='forma' >
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body" id="patient_detail">
        
      </div>
</div>

<div align='center' class='formaa' >
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Personal Message to Patient</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="POST" action="mesg.php">
      <div class="modal-body" id="message_detail">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn close pull-left btn-secondary " data-dismiss="modal">Close</button>
        <button type="submit" id="send_message" name="send_message" class="btn btn-primary">Send message</button></form>
      </div>
</div>

  <script src="js/jquery.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> -->
  <script src="ratchet/js/ratchet.min.js"></script>
  <script src="js/profile.js"></script>
  <script>
    $(document).ready(function(){
        $('.forma').hide();
        $('.formaa').hide();
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
     
    //  MESSAGE PORTAL TO SPECIFIC PATIENT $('.view_data').click(function(){
          
            
            $('.message_data').click(function(){
                var message_id = $(this).attr("id");
                $.ajax({
                    url:"mesg.php",
                    method:"post",
                    data: {message_id: message_id},
                    success:function(data){
                        $('#message_detail').html(data);
                        $('.formaa').show();
                    }
                });
                });
                $('.close').click(function(){
            $('.formaa').hide();
                });
                $('#send_message').click(function(){
            $('.formaa').hide();
     });
     
    });
  </script>
  
  </body>
</html>