<?php 
 include_once './header.php';
if(isset($_GET['id']))
{ 
    $id = mysql_real_escape_string($_GET['id']);

    $query = 'SELECT * FROM `events`.`event`  WHERE `id` = '.$id.' LIMIT 1';
    $result = mysql_query($query);
    $row = mysql_fetch_array($result);
}



    
    $getEvents = "SELECT * FROM $tbl_events as ev LEFT JOIN $tbl_categories as cat on ev.category_id = cat.id LEFT JOIN $tbl_images as img on ev.id = img.id";
    $getEvents = mysql_query($getEvents);
    $data = mysql_fetch_assoc($getEvents);
?>
<div id="directions">
<button type="button" name="dir" id="openDir"  class="btn btn-info">Get Directions</button>
</div>
<div id="loadAddress">
<form action="" method="post"><table id="adressTable">
   <tr><td>Start Point</td> <td><input type="text" name="startAddress"/></td></tr>
   <tr><td>Destination Point</td> <td><input type="text" name="destinationAddress" id="destinationAddress"  /></td></tr>
   <tr><td><input type="submit" name="submit" value="Submit"/></td></td><td><button type="button" id="cancelAddress" class="btn btn-success">Cancel</button></td></td></tr>
    
   </table> </form>
</div>
<div id="wrap">
<div id="gooogleMap" ></div>
</div>
<?php echo $row['address'], ' ',  $row['city'], ' ', $row['province'], ' ', $row['postal_code'] ?>
<?php
include "geocode.class.php";
$location =  $row['address'];
$city = $row['city'];
$postalCode = $row['postal_code'];
$startAddress = $_POST['destinationAddress'];
$address = urlencode(trim($location,$postalCode));
$loc = geocoder::getLocation($address);
echo "Lat: ".$loc["lat"];
echo "<br />";
echo "Long: ".$loc["lng"];

?>

<div id="long">
<?php
echo $loc["lat"];
?>
</div>
<div id="lat">
<?php
echo $loc["lng"];
?>
</div>
<?php
if(isset($_POST['submit']) && $_POST['submit']=='Submit'){
     $name=$_POST['destinationAddress'];
     echo $name;
     }
$address1 = urlencode(trim($name));
$loc1 = geocoder::getLocation($address1);
echo "Lat: ".$loc1["lat"];
echo "<br />";
echo "Long: ".$loc1["lng"];
        ?>
       <div id="endLat">
<?php
echo $loc1["lat"];
?>
</div>
<div id="endLong">
<?php
echo $loc1["lng"];
?>
</div>

<?php include'footer.php'
?>