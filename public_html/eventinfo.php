
<?php 
 include_once './header.php';
if(isset($_GET['id']))
{ 
    $id = mysql_real_escape_string($_GET['id']);

    $query = 'SELECT * FROM `events`.`event`  WHERE `id` = '.$id.' LIMIT 1';
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
}

    
$getEvents = "SELECT * FROM $tbl_events as ev LEFT JOIN $tbl_categories as cat on ev.category_id = cat.id LEFT JOIN $tbl_images as img on img.id = (SELECT picture_id from event_images where event_id = ev.id) where ev.id = '$id'";
    $getEvents = mysql_query($getEvents);
    $data = mysql_fetch_assoc($getEvents);
?>
<?php
include_once('ratings.php');
?>

<div style="height: 80%; margin: 10% auto 0 auto; width: 70%">
    <table style="float: left">
    <tr>
        <th colspan="2"><h1>Event Information</h1></th>
    </tr>
    <tr>
        <td style="vertical-align: top; width: 50%;">
            <table>
                <tr>
                    <td style="width:40%">Date &amp; Time</td>
                    <td style="width:60%"><?php echo $row['date'], ' ',  $row['time'] ?> </td>
                </tr>
                <tr>
                    <td>Title</td>
                    <td><?php echo $row['title'] ?></td>
                </tr>
                <tr>
                    <td>Venue</td>
                    <td><?php echo $row['address'], ' ',  $row['city'], ' ', $row['province'], ' ', $row['postal_code'] ?></td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td><?php echo $row['category_id'] ?></td>
                </tr>
                <tr>
                    <td>Type of Event</td>
                    <td><?php echo $row['type'] ?></td>
                </tr>
                <tr>
                    <td>Event Description</td>
                    <td><?php echo $row['description'] ?></td>
                </tr>
               
                 <tr>
                     <td colspan="2"><a href="viewevents.php" class="btn btn-primary btn-mini col-md-12">Back to Event List</a></td>
                </tr>
            </table>
        </td>
        <td><img id="displaye" src="<?php echo $data['image_url']; ?>"  alt="No Image Was Selected"/><br/>
        <div class='movie_choice'>
    Rate the Event
    <div id="r1" class="rate_widget">
        <div class="star_1 ratings_stars"></div>
        <div class="star_2 ratings_stars"></div>
        <div class="star_3 ratings_stars"></div>
        <div class="star_4 ratings_stars"></div>
        <div class="star_5 ratings_stars"></div>
        <div class="total_votes">vote data</div>
    </div>
</div>


</td>
    </tr>
</table>
</div>?>
   <?php include 'footer.php';?>
