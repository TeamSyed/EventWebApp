<?php
    include_once './header.php';
    if(isset($_POST['submit'])){
        extract($_POST);
        $address = implode(", ",$address);
        $query = "INSERT INTO `events`.`event` (`title`, `category_id`, `address`, `city`, `province`, `postal_code`, `type`, `date`, `time`, `description`) VALUES ('$title', '$cat', '$address', '$city', '$province', '$postal_code', '$type', '$date', '$time', '$description');";
        $exe_query = mysql_query($query);
        if($exe_query) {$message = "Event was created !"; $color = "greenyellow";}
        else {$message = "Error while inserting event :".mysql_error(); $color = "#ff3333";}
    }
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>

        
        
        <div id="wrap">
            <form name="eventadd" method="post" enctype="multipart/form-data" onsubmit="return validateEventAdd();"> 
        <br />
        
       <table id="addevent">
           <?php if(isset($message)){  ?>
           <tr><th colspan="2" style="background: <?php echo $color; ?>;"><?php echo $message; ?></th></tr
           <?php } ?>
           <tr>
               <td>Title </td><td class="title"><input id="title" type="text" name="title" value="" placeholder="Enter Title"maxlength="200"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Address </td><td class="address">
                   <div class="street"><input id="street" type="text" name="address[]" value="" placeholder="Enter Street Number"/><div class="err"></div></div>
                   <div class="streetName"><input id="streetName" type="text" name="address[]" value="" placeholder="Enter Street Name" onblur="$(this).val($(this).val().capitalize());"/><br /><div class="err"></div>
                   <select name="address[]">
                      <option>Road</option>
                      <option>Boulevard</option>
                      <option>Avenue</option>
                      <option>Street</option>
                   </select>
                   </div>
               </td>
           </tr>
           <tr>
               <td>City </td><td class="city"><input id="city" type="text" name="city" value=""  placeholder="Enter City" maxlength="50" onblur="$(this).val($(this).val().capitalize());"/><br /><div class="err"></div></td>
           </tr>
            <tr>
               <td>Province </td><td class="province"><select name="province" id="province">
                      <option value="">--Select Province--</option>
                      <option value="ON">Ontario</option>
                      <option value="QT">Quebec</option>
                      <option value="NS">Nova Scotia</option>
                      <option value="NB">New Brunswick</option>
                      <option value="MB">Manitoba</option>
                      <option value="BC">British Columbia</option>
                      <option value="PE">Prince Edward Island</option>
                      <option value="SK">Saskatchewan</option>
                      <option value="AB">Alberta</option>
                      <option value="NL">Newfoundland and Labrador</option>
                    </select>  <br /><div class="err"></div>      </td>
           </tr>
           <tr>
               <td>Postal Code </td><td class="postal_code"><input id="postal_code" type="text" name="postal_code" value="" placeholder="Enter Postal Code" onkeyup="$(this).val($(this).val().toUpperCase());"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Event Type </td><td><input type="radio" name="type" value="Public" checked="checked"/> Public&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="type" value="Private" /> Private</td>
           </tr>
           <tr>
               <td>Category </td><td class="category"><select name="cat" id="category">
                      <option value="">--Select Category--</option>
                      <option value="1">Cuisine</option>
                      <option value="2">Job Fair</option>
                      <option value="3">Job Interview</option>
                      <option value="4">Traffic Accident</option>
                      <option value="5">Concert</option>
                      <option value="6">Meeting</option>
                      <option value="7">Party</option>
                    </select>  <br /><div class="err"></div>      </td>
           </tr>
           <tr>
               <td>Date </td><td class="date"><input  class="dateWidget" type="text" name="date" id="date" value="03/01/2015" placeholder="Enter Date of Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Time </td><td class="time"><input  class="timeWidget" type="text" name="time" value="" id="time"  placeholder="Enter Time for Event"/><br /></td>
           </tr>
           <tr>
               <td>Description </td><td class="description"><textarea id="description" name="description" rows="5" cols="40"  placeholder="Describe your event"></textarea> <br /><div class="err"></div></td>
           </tr>

           <tr>
               <td>Pictures </td><td class="image">   <input type="file" id="image" name="image" > <br /><div class="err"></div>
                  
                    <?php
                    
if (isset($_POST['submit'])){
    $allowed_types =array('jpg','png');
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $filepath  = "uploads/".$image_name;
    $error = null; 
    $allowed = array("image/jpeg", "image/gif");
    // Get the file extension
    $extension = pathinfo($image_name, PATHINFO_EXTENSION);

    // Search the array for the allowed file type

    if (in_array($extension, $allowed_types, false) != true) {

        echo"<script>alert('only JPEG and GIF formats alowed.')</script>";
        exit();
    }
    
    if ($image_name == ''){
        echo"<script>alert('please select an image.') </script>";
        exit();
    } 
    
    $sql = "INSERT INTO images (image_name,image_url,image_type) VALUES ('$image_name','$filepath','$image_type')";
	$result = mysql_query($sql);
}

?></td>
           </tr>
           <tr>
               <td> </td><td><button type="submit" name="submit" value="" class="btn btn-primary">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary">Cancel</button></td>
           </tr>
       </table>
            </form>

            </div>
  
        <?php include 'footer.php';?>
        <div id="img" >    
                  </div>
    </body>
   
</html>