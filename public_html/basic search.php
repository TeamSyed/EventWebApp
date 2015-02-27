<?php

include 'header.php';

?>
<div id ="wrap">
    <div id="top">
                <h4>Search Results</h4>
        <table id="thread">
            <tr><td>Title</td><td>Location</td><td>Category</td><td>Time</td><td>Date</td></tr>
            
        </table>
    </div>

    <?php
    //connect to database
     $mysqli = new mysqli('localhost','root','','events');

     if(!isset($_POST['search'])) {
     header("Location:index.php");
     }
     //creating a query
     $search_sql="SELECT  * FROM event WHERE  title  LIKE '%".$_POST['search']."%'
     OR date LIKE '%".$_POST['search']."%'
     OR address LIKE '%".$_POST['search']."%'
     OR city LIKE '%".$_POST['search']."%'
     OR description LIKE '%".$_POST['search']."%'
     OR category LIKE '%".$_POST['search']."%'
     OR location LIKE '%".$_POST['search']."%'
     OR time LIKE '%".$_POST['search']."%';
     
     $search_query=mysql_query($search_sql);
     //this is where the results of the query are put 
     if(mysql_nums_rows($search_query)!=0){
     $search_rs=mysql_fetch_assoc($search_query); 
     //to organize the results in a record set
     echo $search_rs['title'];
     }
     else {
     echo "No results matched your search";
     }
     ?>
         <div id="bottom">
                <img src="Graphics/back.png" /><img src="Graphics/next.png" />
            </div>
        
       <?php include 'footer.php';?>
     
     </div>