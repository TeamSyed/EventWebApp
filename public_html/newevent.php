<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include 'header.php';?>
        <div id="wrap">
            <form name="eventadd"  method="post" enctype="multipart/form-data">
       <table id="addevent">
           <tr>
               <td>Title </td><td><input type="text" name="title" value="" /></td>
           </tr>
           <tr>
               <td>Location </td><td><input type="text" name="location" value="" /></td>
           </tr>
           <tr>
               <td>Event Type </td><td><input type="radio" name="type" value="Public" /> Public&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="type" value="Private" /> Private</td>
           </tr>
           <tr>
               <td>Category </td><td><select name="cat" id="">
                      <option value="cat1">category 1</option>
                      <option value="cat2">category 2</option>
                      <option value="cat3">category 3</option>
                      <option value="cat4">category 4</option>
                    </select>        </td>
           </tr>
           <tr>
               <td>Date </td><td><input type="text" name="date" value="" /></td>
           </tr>
           <tr>
               <td>Time </td><td><input type="time" name="time" value="" /></td>
           </tr>
           <tr>
               <td>Description </td><td><textarea name="description" rows="5" cols="40"></textarea></td>
           </tr>

           <tr>
               <td>Pictures </td><td>   <input type="file" name="image" id="image"><input type="submit" value="Upload Image" name="upload"> 
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
               <td> </td><td><button type="button" name="submit" value="Upload Image" class="btn btn-primary">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary">Cancel</button></td>
           </tr>
       </table>
            </form>

            </div>
  
        <?php include 'footer.php';?>
        <div id="img" >    
                  </div>
    </body>
   
</html>