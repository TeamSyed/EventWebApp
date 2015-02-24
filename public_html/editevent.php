<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Update Event</title>
    </head>
    <body>
        <?php include 'header.php';?>
        <div id="wrap">
            <form name="eventadd" method="post" enctype="multipart/form-data" >
       <table id="addevent">
           <tr>
               <td>Title </td><td class="title"><input id="title" type="text" name="title" value="" placeholder="Enter Title"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Address </td><td class="address"><input id="address" type="text" name="address" value="" placeholder="Street Number"/><input id="address1" type="text" name="address" value="" placeholder="Street Name Address"/><br /><div class="err"></div></td>
           </tr>

           <tr>
               <td>City </td><td class="city"><input id="city" type="text" name="city" value=""  placeholder="Enter City"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Postal Code </td><td class="postal_code"><input id="postal_code" type="text" name="postal_code" value="" placeholder="Enter Postal Code"/><br /><div class="err"></div></td>
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
               <td>Date </td><td class="date"><input type="date" name="date" id="date" value=""  placeholder="Enter Date of Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Time </td><td class="time"><input type="time" name="time" value="" id="time"  placeholder="Enter Time for Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td>Description </td><td class="description"><textarea id="description" name="description" rows="5" cols="40"  placeholder="Describe your event"></textarea> <br /><div class="err"></div></td>
           </tr>

           <tr>
               <td>Pictures </td><td class="image">   <input type="file" id="image" name="image" ><input type="submit" value="Upload Image" name="upload"> <br /><div class="err"></div>
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