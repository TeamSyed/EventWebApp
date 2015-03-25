<?php include 'header.php'?>;
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
<?php include'footer.php'?>