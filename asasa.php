<?php
           
            require ('auth/funkydb.php');
            
			
		    // If form submitted, insert values into the database.
		    if (isset($_POST['generate'])){
				function unique_link($length=10) {

                    $string = '';
                    // You can define your own characters here.
                    $characters = "23456789ABCDEFHJKLMNPRTVWXYZabcdefghijklmnopqrstuvwxyz";
                 
                    for ($p = 0; $p < $length; $p++) {
                        $string .= $characters[mt_rand(0, strlen($characters)-1)];
                    }
                 
                    return $string;
                 
                 }
                 
                $ref = unique_link(6);
                // echo $ref;
				
               
                $output = '';
                $query = "INSERT into `admin_link` (link) VALUES ('$ref')";
                $result = mysqli_query($con,$query);
            
                if($result){
                    $query00="SELECT * FROM admin_link ORDER BY time_created DESC LIMIT 1";
  
                    $result00 = mysqli_query($con,$query00) or die(mysqli_error());
                     $rows00 = mysqli_num_rows($result00);
                    if($rows00==1){

                        while ($row    = mysqli_fetch_array($result00))
                    
                        {
                            $uniquelink     = $row['link'];
                    
                            $full_url = "www.funkybrunch/".$uniquelink;
                            $output .= "
                            <div align='center' class='form' style='margin-top: 0;color:#ccc; width: 100vw; height:100vh; z-index:1000; padding:20% 30%; position:fixed; background-color: rgba(0,0,0,0.7);'>
                            <h3 style='color:#ccc;'><a href='linktrack.php?uid="
                            .$ref."'>".$full_url."</a></h3><br/><a style='color:#979b1b;' href='dashboard.php'>Dashboard</a></div>";
                            
                           
                        }
                        echo $output;
                    }
                }
                
            }
        ?>