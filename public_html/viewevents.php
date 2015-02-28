<?php
    include 'header.php';
    $getEvents = "SELECT * FROM $tbl_events as ev LEFT JOIN $tbl_categories as cat on ev.category_id = cat.id";
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
                <?php while($data = mysql_fetch_assoc($getEvents)){?>
                <tr>
                    <td><img src="uploads/download.jpg" width="50" height="50" alt="EventName"/></td>
                    <td><a href="#" title="View this Event"><?php echo ucwords($data['title']); ?></a></td>
                    <td><?php echo ucwords($data['name']); ?></td>
                    <td style="text-align: left;padding: 1px 10px;"><?php echo ucwords($data['address'])."<br />".  ucwords($data['city'])." - ". strtoupper($data['postal_code'])."<br />".  strtoupper($data['province']); ?></td>
                    <td><?php echo $data['date']; ?> at <?php echo $data['time']; ?></td>
                    <td>
                        <a href="#">Edit</a>
                        <a href="#">Delete</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>

<?php include 'footer.php';?>
   