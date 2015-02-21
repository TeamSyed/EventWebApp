<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
       
        <style type="text/css">
            .auto-style1 {
                height: 322px;
            }
        </style>
       
    </head>
    <body>
        <?php include 'header.php';?>
        <div id="wrap">
           
       <table id="eventinfo">
           <tr>
               <td>Title </td><td class="auto-style3"><input type="text" name="title" value="" /></td>
           </tr>
           <tr>
               <td>Location </td><td class="auto-style3">Address Line
               <input id="AddressLine" name="AddressLine" type="text" /><br />
               City&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input id="city" name="city" type="text" /><br />
               Province&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
               <input id="province" name="province" type="text" /><br />
               Postal Code&nbsp;&nbsp;&nbsp;
               <input id="postal" name="postal" type="text" /></td>
           </tr>
           <tr>
               <td>Event Type </td><td class="auto-style3"><input type="radio" name="type" value="Public" /> Public&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<input type="radio" name="type" value="Private" /> Private</td>
           </tr>
           <tr>
               <td>Category </td><td class="auto-style3"><select name="cat" id="">
                      <option value="cat1">category 1</option>
                      <option value="cat2">category 2</option>
                      <option value="cat3">category 3</option>
                      <option value="cat4">category 4</option>
                    </select>        </td>
           </tr>
           <tr>
               <td>Date </td><td class="auto-style3"><input type="text" name="date" value="" id="date" /></td>
           </tr>
           <tr>
               <td>Time </td><td class="auto-style3"><input type="time" name="time" value="" /></td>
           </tr>
           <tr>
               <td>Description </td><td class="auto-style3"><textarea name="description" rows="5" cols="40"></textarea></td>
           </tr>

           <tr>
               <td class="auto-style1">Pictures </td>
               <td class="auto-style1">
                   <img alt="" src="" /><img alt="" src="" /></td>
           </tr>
           <tr>
               <td> Event&nbsp; Rating</td><td class="auto-style3">
               <input id="rating" name="rating" type="text" /></td>
           </tr>
           <tr>
               <td> User Comment</td><td class="auto-style3">
               <input id="usercomment" type="text" /></td>
           </tr>
       </table>
         

            </div>
  
        
        </body>
   <?php include 'footer.php';?>
</html>