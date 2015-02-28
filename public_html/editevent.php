<?php
    include_once './header.php';
    $editId = (isset($_REQUEST['id']))? $_REQUEST['id'] : 10;
    $query_load = "SELECT * FROM $tbl_events where id = '$editId'";
    
    $exe_load = mysql_query($query_load);
    $edit_data = mysql_fetch_assoc($exe_load);
    $edit_data['address'] = explode(", ", $edit_data['address']);
    
    $$edit_data['address'][2] = "selected";
    $avenue = (!isset($Road) && !isset($Boulevard)) ? "selected" : "";
    $$edit_data['province'] = "selected";
    $$edit_data['type'] = "checked";
   
    $qry_cate = "SELECT * FROM $tbl_categories WHERE id =".$edit_data['category_id'];
    $qry_cate = mysql_query($qry_cate);
    $qry_cate = mysql_fetch_assoc($qry_cate);
    $$qry_cate['name'] = "selected";
    $category_name = explode(" ", $qry_cate['name']);
    if(count($category_name)>1) $$category_name[1] = "selected";
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <br />
        <div id="wrap">
            <form name="eventadd" method="post" enctype="multipart/form-data">
       <table id="addevent">
           <?php if(isset($message)){  ?>
           <tr><th colspan="2" style="background: <?php echo $color; ?>;"><?php echo $message; ?></th></tr
           <?php } ?>
           <tr>
               <td>Title </td><td class="title"><input id="title" type="text" name="title" value="<?php echo $edit_data['title']; ?>" placeholder="Enter Title"maxlength="200"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Address </td><td class="address">
                   <div class="street"><input id="street" type="text" name="address[]" value="<?php echo $edit_data['address'][0]; ?>" placeholder="Enter Street Number"/><br /><div class="err"></div></div>
                   <div class="streetName"><input id="streetName" type="text" name="address[]" value="<?php echo $edit_data['address'][1]; ?>" placeholder="Enter Street Name" onblur="$(this).val($(this).val().capitalize());"/><br /><div class="err"></div>
                   <select name="address[]">
                      <option <?php echo (isset($Road)) ? $Road: ""; ?>>Road</option>
                      <option <?php echo (isset($Boulevard)) ? $Boulevard: ""; ?>>Boulevard</option>
                      <option <?php echo (isset($avenue)) ? $avenue: ""; ?>>Avenue Street</option>
                   </select>
                   <br /><div class="err"></div>
               </td>
           </tr>
           <tr>
               <td>City </td><td class="city"><input id="city" type="text" name="city" value="<?php echo $edit_data['city']; ?>"  placeholder="Enter City" maxlength="50" onblur="$(this).val($(this).val().capitalize());"/><br /><div class="err"></div></td>
           </tr>
            <tr>
               <td>Province </td><td class="province"><select name="province" id="province">
                      <option value="">--Select Province--</option>
                      <option value="ON" <?php echo (isset($ON)) ? $ON: ""; ?>>Ontario</option>
                      <option value="QT" <?php echo (isset($QT)) ? $QT: ""; ?>>Quebec</option>
                      <option value="NS" <?php echo (isset($NS)) ? $NS: ""; ?>>Nova Scotia</option>
                      <option value="NB" <?php echo (isset($NB)) ? $NB: ""; ?>>New Brunswick</option>
                      <option value="MB" <?php echo (isset($MB)) ? $MB: ""; ?>>Manitoba</option>
                      <option value="BC" <?php echo (isset($BC)) ? $BC: ""; ?>>British Columbia</option>
                      <option value="PE" <?php echo (isset($PE)) ? $PE: ""; ?>>Prince Edward Island</option>
                      <option value="SK" <?php echo (isset($SK)) ? $SK: ""; ?>>Saskatchewan</option>
                      <option value="AB" <?php echo (isset($AB)) ? $AB: ""; ?>>Alberta</option>
                      <option value="NL" <?php echo (isset($NL)) ? $NL: ""; ?>>Newfoundland and Labrador</option>
                    </select>  <br /><div class="err"></div>      </td>
           </tr>
           <tr>
               <td>Postal Code </td><td class="postal_code"><input id="postal_code" type="text" name="postal_code" value="<?php echo $edit_data['postal_code']; ?>" placeholder="Enter Postal Code" onkeyup="$(this).val($(this).val().toUpperCase());"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Event Type </td><td><input type="radio" name="type" value="Public" <?php echo (isset($Public)) ? $Public: ""; ?>/> Public&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="type" value="Private" <?php echo (isset($Private)) ? $Private: ""; ?>/> Private</td>
           </tr>
           <tr>
               <td>Category </td><td class="category"><select name="cat" id="category">
                      <option value="">--Select Category--</option>
                      <option value="1" <?php echo (isset($Cuisine)) ? $Cuisine: ""; ?>>Cuisine</option>
                      <option value="2" <?php echo (isset($Fair)) ? $Fair: ""; ?>>Job Fair</option>
                      <option value="3" <?php echo (isset($Interview)) ? $Interview: ""; ?>>Job Interview</option>
                      <option value="4" <?php echo (isset($Accident)) ? $Accident: ""; ?>>Traffic Accident</option>
                      <option value="5" <?php echo (isset($Concert)) ? $Concert: ""; ?>>Concert</option>
                      <option value="6" <?php echo (isset($Meeting)) ? $Meeting: ""; ?>>Meeting</option>
                      <option value="7" <?php echo (isset($Party)) ? $Party: ""; ?>>Party</option>
                    </select>  <br /><div class="err"></div>      </td>
           </tr>
           <tr>
               <td>Date </td><td class="date"><input  class="dateWidget" type="date" name="date" id="date" value="<?php echo $edit_data['date']; ?>" placeholder="Enter Date of Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Time </td><td class="time"><input  class="timeWidget" type="time" name="time" value="<?php echo $edit_data['time']; ?>" id="time"  placeholder="Enter Time for Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Description </td><td class="description"><textarea id="description" name="description" rows="5" cols="40"  placeholder="Describe your event"><?php echo $edit_data['description']; ?></textarea> <br /><div class="err"></div></td>
           </tr>

           <tr>
               <td>Pictures </td><td class="image">   <input type="file" id="image" name="image" id="image"><input type="submit" value="Upload Image" name="upload"> <br /><div class="err"></div>
                    <?php
                    
if (isset($_POST['upload'])){
    $allowed_types =array('jpg','png');
    $image_name = $_FILES['image']['name'];
    $image_type = $_FILES['image']['type'];
    $image_size = $_FILES['image']['size'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
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
    else
        move_uploaded_file($image_tmp_name,"uploads/$image_name");
    echo " <img src='uploads/$image_name'/>"
    ;
}
?></td>
           </tr>
           <tr>
               <td> </td><td><button type="submit" name="submit" value="Upload Image" class="btn btn-primary">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary">Cancel</button></td>
           </tr>
       </table>
            </form>

            </div>
  
        <?php include 'footer.php';?>
        <div id="img" >    
                  </div>
    </body>
   
</html>