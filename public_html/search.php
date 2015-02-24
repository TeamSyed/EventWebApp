<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include 'header.php';?>
        <div id="wrap">
            <div id="top">
                <h4>Your Search Produced following Results</h4>
            </div>
            
                <?php 
                //connect to database 
                $mysqli = new mysqli('localhost','root','','events');
                
                
                //query the database
                $resultSet = $mysqli->query("SELECT * from  event");
                
                
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
                        
                    }
                    echo"<div class='middle'>
                        <img src='uploads/download.jpg' /><h1>$title</h1><br />
                <h2>Description of the event. The description of the event will be shown here. This will include the features of the evnts.</h2><br /><br /><h4>Show more></h4>
                <h3>$location  &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp $date&nbsp&nbsp&nbsp $time  </h3>
                    </div>
                    
                    
                    
                    
                    ";
                };
                    
                ?>
                
            <div id="bottom">
                <img src="Graphics/back.png" /><img src="Graphics/next.png" />
            </div>
        </div>
        
       <?php include 'footer.php';?>
    </body>
   
</html>
