<?php
    include 'header.php';
    $getEvents = "SELECT * FROM $tbl_events as ev LEFT JOIN $tbl_categories as cat on ev.category_id = cat.id LEFT JOIN $tbl_images as img on ev.id = img.id";
    $getEvents = mysql_query($getEvents);
?>
        <table id="view" border: 0 class="viewEvents" align="center">
            <caption><h4>Upcoming Events</h4></caption>
            <thead>
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
                <?php while($data = mysql_fetch_assoc($getEvents)){?>
                <tr>
                    <td><img id="display" src=<?php echo ucwords($data['image_url']); ?>  alt="No image was Selected"/></td>
                    <td><a href="eventinfo.php?id=<?php echo $data['id']; ?>" title="View this Event"><h2><?php echo ucwords($data['title']); ?></h2></a></td>
                    <td><?php echo ucwords($data['name']); ?></td>
                    <td style="text-align: left;padding: 1px 10px;"><?php echo ucwords($data['address'])."<br />".  ucwords($data['city'])." - ". strtoupper($data['postal_code'])."<br />".  strtoupper($data['province']); ?></td>
                    <td><?php echo $data['date']; ?> at <?php echo $data['time']; ?></td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                    <td>><a href="map.php?id=<?php echo $data['id']; ?>" title="View this Event"><h2>map</h2></a></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

<?php include 'footer.php';?>
   