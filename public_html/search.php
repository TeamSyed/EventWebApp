
        <?php include 'header.php';?>
        <div id="wrap">
            <div id="top">
                <h4>Your Search Produced following Results</h4>
                <table id="thead">
                    <tr>
                        <td>Title</td><td>Location</td><td>Category</td><td>Time</td><td>Date</td>
                        </tr>
                </table>
            </div>
            
                <?php 
                //connect to database 
                $mysqli = new mysqli('localhost','root','','events');
                
                
                
                //query the database
                $resultSet = $mysqli->query("SELECT * from  event ");
                
                
                //count the returned rows
                if($resultSet->num_rows !=0){
                    //turn the results into Array
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $title = $rows['title'];
                        $location = $rows['location'];
                        $type = $rows['type'];
                        $category = $rows['category'];
                        $date = $rows['date'];
                        $time = $rows['time'];
                        
                        $pic = $rows['pic'];
                        
                        
                        echo"<table id='tdata'>
                        
                        <tr>
                        <td>$title</td><td>$location</td><td>$category</td><td>$time</td><td>$date</td>
                        </tr>
                        </table>";
                        
                    }
                }
                    else {
    echo "0 results";
}
                ;
                    
                ?>
                
            <div id="bottom">
                <img src="Graphics/back.png" /><img src="Graphics/next.png" />
            </div>
        </div>
        
       <?php include 'footer.php';?>
    
