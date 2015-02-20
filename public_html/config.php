<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DB_NAME","events");
    
    $tbl_events = "event";
    
    $connection = mysql_connect(HOSTNAME, USERNAME, PASSWORD);  // Connecting to Database
    if($connection){
        $query_create_db = "CREATE DATABASE IF NOT EXISTS ".DB_NAME;
        $db_create = mysql_query($query_create_db);
        if(!$db_create) echo mysql_error ();
        $select_db = mysql_select_db(DB_NAME, $connection);     // Selecting the database
        if(!$select_db) echo "Error while selecting Database:".DB_NAME." <br />";
    } else echo "Error while connecting to Database: ".mysql_error ()."<br />";
    
    // Creating events table
    $events_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_events.'` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `title` varchar(200) NOT NULL,
                        `location` text NOT NULL,
                        `type` varchar(100) NOT NULL,
                        `category` varchar(100) NOT NULL,
                        `date` varchar(50) NOT NULL,
                        `time` varchar(50) NOT NULL,
                        `description` text NOT NULL,
                        `pic` varchar(200) NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `deleted_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ';
    $events_create = mysql_query($events_query);
    if(!$events_create) echo "Error while creating ".$tbl_events.": ".  mysql_error();
