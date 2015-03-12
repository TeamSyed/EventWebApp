<?php
    include 'header.php';
    /*============================================*/
    $per_page=5;
    $tot_rec=mysql_query("select * from $tbl_events");
    $tot_rec1=  mysql_num_rows($tot_rec);
    $tot_pages=ceil($tot_rec1/$per_page);

    $pg= (isset($_REQUEST['pg']) && $_REQUEST['pg'])? $_REQUEST['pg']:1;
    $curPg = ($pg>=1) ? $pg : 0;
    $start=($pg-1)*$per_page;
    /*============================================*/
    $getEvents = "SELECT * FROM $tbl_events limit $start,$per_page";
    $getEvents = mysql_query($getEvents);
?>
        <table border="1" class="viewEvents" align="center">
            <caption><h4>View Events</h4></caption>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Date/Time</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysql_fetch_assoc($getEvents)){
                    $getCats = "SELECT name from $tbl_categories where id = '".$data['category_id']."'";
                    $getCats = mysql_query($getCats);
                    $getCats = mysql_fetch_assoc($getCats);
                    ?>
                <tr>
                    <td><img src="uploads/download.jpg" width="50" height="50" alt="EventName"/></td>
                    <td><a href="eventinfo.php?id=<?php echo $data['id']; ?>" title="View this Event"><?php echo ucwords($data['title']); ?></a></td>
                    <td><?php echo ucwords($getCats['name']); ?></td>
                    <td style="text-align: left;padding: 1px 10px;"><?php echo ucwords($data['address'])."<br />".  ucwords($data['city'])." - ". strtoupper($data['postal_code'])."<br />".  strtoupper($data['province']); ?></td>
                    <td><?php echo $data['date']; ?> at <?php echo $data['time']; ?></td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <?php } ?>
                <tr>
                    <td colspan="6"> 
                        <a href="?pg=<?php echo ($curPg-1); ?>"><img src="Graphics/back.png" width="50px" height="50px" style="float: left;"/></a>
                <ul class="paging-list"> <?php for($i=1;$i<=$tot_pages;$i++){ echo "<li><a href=?pg=".$i."> ".$i."</a></li>"; } ?></ul>
                <a href="?pg=<?php echo ($curPg+1); ?>"><img src="Graphics/next.png" width="50px" height="50px" style="float: left;"/></a>
                    </td>
                </tr>
            </tbody>
        </table>

<?php include 'footer.php';?>
   