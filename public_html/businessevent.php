        <?php include 'header.php';?>
        <div id="wrap">
            <form name="eventadd" method="post" enctype="multipart/form-data" onsubmit="return validateEventAdd();">
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
               <td>Time </td><td class="time"><input  class="timeWidget" type="text" name="time" value="" id="time"  placeholder="Enter Time for Event"/><br /><div class="err"></div></td>
           </tr>
           <tr>
               <td colspan="2">Description</td>
           </tr>
           <tr>
               <td class="description" colspan="2">
	<div id="alerts"></div>
    <div class="btn-toolbar" data-role="editor-toolbar" data-target="#editor">
      <div class="btn-group">
        <a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="icon-font"></i><b class="caret"></b></a>
          <ul class="dropdown-menu">
          </ul>
        </div>
      <div class="btn-group">
        <a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="icon-bold"></i></a>
        <a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="icon-italic"></i></a>
        <a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="icon-strikethrough"></i></a>
        <a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="icon-underline"></i></a>
      </div>
      <div class="btn-group">
        <a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="icon-align-left"></i></a>
        <a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="icon-align-center"></i></a>
        <a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="icon-align-right"></i></a>
        <a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="icon-align-justify"></i></a>
      </div>
      <div class="btn-group">
		  <a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="icon-link"></i></a>
		    <div class="dropdown-menu input-append">
			    <input class="span2" placeholder="URL" type="text" data-edit="createLink"/>
			    <button class="btn" type="button">Add</button>
        </div>
        <a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="icon-cut"></i></a>

      </div>
         <div class="btn-group">
            <a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="icon-picture"></i></a>
            <input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
        </div>
      <div class="btn-group">
        <a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="icon-undo"></i></a>
        <a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="icon-repeat"></i></a>
      </div>
      <input type="text" data-edit="inserttext" id="voiceBtn" x-webkit-speech="">
    </div>

    <div id="editor"></div>
    <br /><div class="err"></div></td>
           </tr>

           <tr>
                <td>Pictures </td><td class="image">   <input type="file" id="image" name="image" > <br /><div class="err"></div>
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

if (empty($_FILES['image']['name'])) {
    // No file was selected for upload,
        echo"<script>alert('No image was uploaded.')</script>";
}
    elseif (in_array($extension, $allowed_types, false) != true) {
        echo"<script>alert('only JPEG and GIF formats alowed.')</script>";
        
        exit();
    }
 
    
    else	
    move_uploaded_file($image_tmp_name,"uploads/$image_name"); 
    
    $sql = "INSERT INTO images (image_name,image_url,image_type) VALUES ('$image_name','$filepath','$image_type')";
	$result = mysql_query($sql);
        $image_id = getLastInsertId("images");
        $event_id = getLastInsertId("event");
        $sql_image = "INSERT INTO event_images(event_id, picture_id) values('$event_id', '$image_id')";
	$result_image = mysql_query($sql_image);
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
   //reference on Mindup editor. 
<script>
  $(function(){
    function initToolbarBootstrapBindings() {
      var fonts = ['Serif', 'Sans', 'Arial', 'Arial Black', 'Courier', 
            'Courier New', 'Comic Sans MS', 'Helvetica', 'Impact', 'Lucida Grande', 'Lucida Sans', 'Tahoma', 'Times',
            'Times New Roman', 'Verdana'],
            fontTarget = $('[title=Font]').siblings('.dropdown-menu');
      $.each(fonts, function (idx, fontName) {
          fontTarget.append($('<li><a data-edit="fontName ' + fontName +'" style="font-family:\''+ fontName +'\'">'+fontName + '</a></li>'));
      });
      $('a[title]').tooltip({container:'body'});
    	$('.dropdown-menu input').click(function() {return false;})
		    .change(function () {$(this).parent('.dropdown-menu').siblings('.dropdown-toggle').dropdown('toggle');})
        .keydown('esc', function () {this.value='';$(this).change();});

      $('[data-role=magic-overlay]').each(function () { 
        var overlay = $(this), target = $(overlay.data('target')); 
        overlay.css('opacity', 0).css('position', 'absolute').offset(target.offset()).width(target.outerWidth()).height(target.outerHeight());
      });
      if ("onwebkitspeechchange"  in document.createElement("input")) {
        var editorOffset = $('#editor').offset();
        $('#voiceBtn').css('position','absolute').offset({top: editorOffset.top, left: editorOffset.left+$('#editor').innerWidth()-35});
      } else {
        $('#voiceBtn').hide();
      }
	};
	function showErrorAlert (reason, detail) {
		var msg='';
		if (reason==='unsupported-file-type') { msg = "Unsupported format " +detail; }
		else {
			console.log("error uploading file", reason, detail);
		}
		$('<div class="alert"> <button type="button" class="close" data-dismiss="alert">&times;</button>'+ 
		 '<strong>File upload error</strong> '+msg+' </div>').prependTo('#alerts');
	};
    initToolbarBootstrapBindings();  
	$('#editor').wysiwyg({ fileUploadError: showErrorAlert} );
    window.prettyPrint && prettyPrint();
  });
</script>


<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-37452180-6', 'github.io');
  ga('send', 'pageview');
</script>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "http://connect.facebook.net/en_GB/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
 </script>

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="http://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>

</html>
