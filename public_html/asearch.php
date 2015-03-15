
        <?php error_reporting(0); include 'header.php';?>
        <div id="wrap">
            <div id="top">
                <h4>Your Search Produced following Results</h4>
                <table id="thead">
                    <tr>
                        <td>Title</td><td>Location</td><td>Time</td><td>Date</td>
                        </tr>
                </table>
            </div>
            
                <?php 
                
                
                //connect to database 
                $mysqli = new mysqli('localhost','root','',DB_NAME);
                /*============================================*/
                $per_page=5;
                $tot_rec=$mysqli->query("select COUNT(*) from $tbl_events");
                list($tot_rec1)=$tot_rec->fetch_row();
                $tot_pages=ceil($tot_rec1/$per_page);

                $pg= (isset($_REQUEST['pg']) && $_REQUEST['pg'])? $_REQUEST['pg']:1;
                $curPg = ($pg>=1) ? $pg : 0;
                $start=($pg-1)*$per_page;
                /*============================================*/
                
                if (isset($_POST['advancedSearch'])) {
                    // Filter
                    $keyword = trim ($_POST['advancedSearch']);
                }
                
                //query the database
                $resultSet = $mysqli->query("SELECT * FROM event WHERE title LIKE '%$keyword%' AND  
date between 'sdate' AND 'edate' AND time between 'stime' AND 'etime'ORDER BY title ASC limit $start,$per_page");
                
                
                //count the returned rows
                if($resultSet->num_rows !=0){
                    //turn the results into Array
                    while($rows = $resultSet->fetch_assoc())
                    {
                        $title = $rows['title'];
                        $location = $rows['address'];
                        $type = $rows['type'];
                        $category = $rows['category_id'];
                        if($category){
                            $qry_cat = "SELECT * from $tbl_categories where id = $category";
                            $exe_cat = $mysqli->query($qry_cat);
                            $cat_name = $exe_cat->fetch_assoc();
                            $cat_name = $cat_name['name'];
                        }
                        $date = $rows['date'];
                        $time = $rows['time'];
                        
                        //$pic = $rows['pic'];
                        
                        
                        echo"<table id='tdata'>
                        
                        <tr>
                        <td>$title</td><td>$location</td><td>$time</td><td>$date</td>
                        </tr>
                        </table>";
                        
                    }
                }
                    
                else{
    echo "0 results";}

                ;
                    
                ?>
                
            <div id="bottom">
                <a href="?pg=<?php echo ($curPg-1); ?>"><img src="Graphics/back.png" width="50px" height="50px" style="float: left;"/></a>
                <ul class="paging-list"> <?php for($i=1;$i<=$tot_pages;$i++){ echo "<li><a href=?pg=".$i."> ".$i."</a></li>"; } ?></ul>
                <a href="?pg=<?php echo ($curPg+1); ?>"><img src="Graphics/next.png" width="50px" height="50px" style="float: left;"/></a>
            </div>
        </div>
        
       <?php include 'footer.php';?>
    
