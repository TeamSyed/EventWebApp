
<!DOCTYPE html>

<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

    <link href="../css/bootstrap.min.css" rel="stylesheet" />
    <link href="../css/datepicker.css" rel="stylesheet" />
    <link href="../css/timepicker.css" rel="stylesheet" />
    <link href="../css/reset.css" type="text/css" rel="stylesheet" />
    <link href="../css/main.css" type="text/css" rel="stylesheet" />
    <script src="../js/jquery-1.11.1.min.js"></script>
    <script src="../js/bootstrap.js"></script>
    <script src="../js/bootstrap-datepicker.js"></script>
    <script src="js/bootstrap-timepicker.min.js"></script>
    <script src="../js/search.js"></script>
    <script src="../js/validations.js"></script>
    <script src="../js/rating.js"></script>
    <script
src="http://maps.googleapis.com/maps/api/js">
</script>
    <script src="js/map.js"></script>
   
    <!-- STYLE EDITOR -->
    <link href="../styleeditor/prettify.css" rel="stylesheet"/>
    <link href="../styleeditor/bootstrap-combined.no-icons.min.css" rel="stylesheet"/>
    <link href="../styleeditor/bootstrap-responsive.min.css" rel="stylesheet"/>
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" rel="stylesheet"/>
    
    <script src="styleeditor/jquery.hotkeys.js"></script>
    
    <script src="../styleeditor/prettify.js"></script>
    <link href="../styleeditor/index.css" rel="stylesheet"/>
    <script src="../styleeditor/bootstrap-wysiwyg.js"></script>


    <title>Rohit's WebSite</title>
</head>
<body >
   
        <div id="header">
            <div id="logo">
                <img src="../Graphics/logo.png" />
            </div>
            <div id="banner">

                <img src="../Graphics/banner.png" />

            </div>
           <form action="search.php" method="post"> 
           <div id="search">
                <input type="text" name="search" placeholder="By Event Title, Decription, Address, City"   />
                <input id="searchbtn" type="submit"  value="Search" name="basicSearch" class="btn btn-primary"/><br />
                <button type="button" name="asearch" id="flip" value="Advanced Search Results" class="btn btn-info">Advanced Search</button>
            </div></form>
            <div id="asearch">
                <form action="asearch.php" method="post">
                <table id="advanced">
                    <tr>
               <td>Title </td><td><input type="text" name="title" value="" /></td>
           </tr>
           
                    
               <td>Date </td><td>From <input type="date" name="sdate" class="dateWidget" value="" id="date"/>To: <input id="date" class="dateWidget" type="date" name="edate" value="" /></td>
           </tr>
                    <tr>
               <td>TIme </td><td>From <input type="time" name="stime" value="" class="timeWidget" id="time" />To: <input class="timeWidget" id="time" type="time" name="etime" value="" /></td>
           </tr>

                    <tr>

               <td> </td><td><input  type="submit"  value="Search" name="Search" class="btn btn-success"/>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" id="cancel" class="btn btn-success">Cancel</button></td>
           </tr>
                </table></form>
            </div>
            <div id="menu">
                    <ul>
                        <li id="home"><a href="../viewevents.php">Home</a></li>
                        <li id="event"><a href="../newevent.php">Add an event</a></li>
                        <li id="Contact"><a href="../#/about">About Us</a></li>
                        <li id="friend"><a href="index.php">Friends</a></li>
                        <li id="businessevent"><a href="../businessevent.php"> Business Event</a></li>
                        
                        
                    </ul>
            <div id="container">
                
                </div>
                
                    
                </div>
            </div>
            
       