<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php include 'header.php';?>
        <div id="wrap">
            <form name="eventadd" action="upload.php" method="post" enctype="multipart/form-data">
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
               <td>TIme </td><td><input type="time" name="time" value="" /></td>
           </tr>
           <tr>
               <td>Description </td><td><textarea name="description" rows="5" cols="40"></textarea></td>
           </tr>

           <tr>
               <td>Pictures </td><td>   <input type="file" name="fileToUpload" id="fileToUpload"></td>
           </tr>
           <tr>
               <td> </td><td><button type="button" name="submit" value="Upload Image" class="btn btn-primary">Submit</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" class="btn btn-primary">Cancel</button></td>
           </tr>
       </table>
            </form>
            </div>
       <?php include 'footer.php';?>
    </body>
   
</html>