<!DOCTYPE html>

<html  xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />

    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/reset.css" type="text/css" rel="stylesheet" />
    <link href="css/main.css" type="text/css" rel="stylesheet" />
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/search.js"></script>
    <script src="js/validations.js"></script>
   
    
<?php 
    include_once('config.php');
?>


    <title>Rohit's WebSite</title>
</head>
<body >
   
        <div id="header">
            <div id="logo">
                <img src="Graphics/logo.png" />
            </div>
            <div id="banner">

                <img src="Graphics/banner.png" />

            </div>
            <div id="search">
                <input type="text" name="search" value="By Event Title, Decription, Address, City"  onfocus="if(this.value=='By Event Title, Decription, Location') {this.value='', this.style.color='#999'};" onblur="if(this.value=='') {this.value='By Event Title, Decription, Location', this.style.color='#555';}" />
                <button type="button" name="search" value="Search Results" class="btn btn-primary">Search</button><br />
                <button type="button" name="asearch" id="flip" value="Advanced Search Results" class="btn btn-info">Adavnced Search</button>
            </div>
            <div id="asearch">
                <form>
                <table id="advanced">
                    <tr>
               <td>Title </td><td><input type="text" name="title" value="" /></td>
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
               <td>Date </td><td>From <input type="date" name="sdate" value="" />To: <input type="date" name="edate" value="" /></td>
           </tr>
                    <tr>
               <td>TIme </td><td>From <input type="time" name="stime" value="" />To: <input type="time" name="etime" value="" /></td>
           </tr>

                    <tr>

               <td> </td><td><button type="button" name="submit" value="search Results" class="btn btn-success">Search</button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<button type="button" id="cancel" class="btn btn-success">Cancel</button></td>
           </tr>
                </table></form>
            </div>
            <div id="menu">
                    <ul>
                        <li id="home"><a href="#/home">Home</a></li>
                        <li id="event"><a href="newevent.php">Add an event</a></li>
                        <li id="Contact"><a href="#/about">About Us</a></li>
                        <li id="eventinfo"><a href="eventinfo.php">Event Information</a></li>
                        
                        
                    </ul>
            <div id="container">
                
                </div>
                
                    
                </div>
            </div>
            
       