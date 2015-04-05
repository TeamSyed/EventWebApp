<?php
    include 'header.php';
    $getEvents = "SELECT img.image_url, ev.id as event_id, ev.address, ev.title, cat.name as cat_name, ev.city, ev.province, ev.postal_code, ev.date, ev.time  FROM $tbl_events as ev LEFT JOIN $tbl_categories as cat on ev.category_id = cat.id LEFT JOIN $tbl_images as img on ev.id = img.image_id";
    $getEvents = mysql_query($getEvents);
?>
        <table id="view" border: 0 class="viewEvents" align="center">
            <caption><h4>Upcoming Events</h4></caption>
            <thead>
                <?php if(isset($_GET['delsucc']) and $_GET['delsucc']=="true"){
                  echo "<tr><th colspan='7' style='background: green; color: #fff'>Event was Deleted Successfully</th></tr>";  
                }
                ?>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Address</th>
                    <th>Date/Time</th>
                    <th>Operations</th>
                    <th>View On Map</th>
                </tr>
            </thead>
            <tbody>
                <?php while($data = mysql_fetch_assoc($getEvents)){ //echo "<pre>"; print_r($data);?>
                <tr>
                    <td><img id="display" src=<?php echo ucwords($data['image_url']); ?>  alt="No image was Selected"/></td>
                    <td><a href="eventinfo.php?id=<?php echo $data['event_id']; ?>" title="View this Event"><h2><?php echo ucwords($data['title']); ?></h2></a></td>
                    <td><?php echo ucwords($data['cat_name']); ?></td>
                    <td style="text-align: left;padding: 1px 10px;"><?php echo ucwords($data['address'])."<br />".  ucwords($data['city'])." - ". strtoupper($data['postal_code'])."<br />".  strtoupper($data['province']); ?></td>
                    <td><?php echo $data['date']; ?> at <?php echo $data['time']; ?></td>
                    <td>
                        <a href="editevent.php?id=<?php echo $data['event_id']; ?>" title="Edit Event">Edit</a>
                        <a href="javascript:void(0);" onclick="delConfirm(<?php echo $data['event_id']; ?>);">Delete</a>
                    </td>
            <script type="text/javascript">
                function delConfirm(delId){
                    var conf = confirm("Are you sure ?\n This action cannot be undone");
                    if(conf) window.location.href = "DelConfirm.php?delid="+delId;
                }
            </script>
                    <td><a href="map.php?id=<?php echo $data['event_id']; ?>" title="View this Event"><h2>Map</h2></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

<?php include 'footer.php';?>
   