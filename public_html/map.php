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
<button type="button" name="dir" id="openDir" value="Advanced Search Results" class="btn btn-info">Get Directions</button>
</div>
<div id="loadAddress">
<form ><table id="adressTable">
   <tr><td>Start Point</td> <td><input type="text" name="startAddress"/></td></tr>
   <tr><td>Destination Point</td> <td><input type="text" name="destinationAddress"/></td></tr>
   <tr><td><button type="button" id="adressSearch" class="btn btn-success">Search</button></td></td><td><button type="button" id="cancelAddress" class="btn btn-success">Cancel</button></td></td></tr>
    
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
$address = urlencode(trim($location,$postalCode));
$loc = geocoder::getLocation($address);
echo "Lat: ".$loc["lat"];
echo "<br />";
echo "Long: ".$loc["lng"];
?>
<div id="long" value=".$loc['lat']">
<?php
echo "Lat: ".$loc["lat"];
?>
</div>
<div id="lat"><label>
<?php
echo "long: ".$loc["lng"];
?></label>
</div>

<?php include'footer.php'
?>