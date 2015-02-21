<?php
error_reporting(E_ALL ^ E_DEPRECATED);
    define("HOSTNAME","localhost");
    define("USERNAME","root");
    define("PASSWORD","");
    define("DB_NAME","events");
    
    $tbl_events = "event";
    $tbl_categories = "category";
    $tbl_event_images = "event_images";
    $tbl_images = "images";
    $tbl_levels = "levels";
    $tbl_titles = "titles";
    $tbl_users = "users";
    
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
                        `category_id` int(11) NOT NULL,
                        `address` text NOT NULL,
                        `city` varchar(50) NOT NULL,
                        `postal_code` varchar(100) NOT NULL,
                        `type` varchar(100) NOT NULL,
                        `date` varchar(50) NOT NULL,
                        `time` varchar(50) NOT NULL,
                        `description` text NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $events_create = mysql_query($events_query);
    if(!$events_create) echo "Error while creating ".$tbl_events.": ".  mysql_error();
    
     // Creating categories table
    $categories_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_categories.'` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `name` varchar(100) NOT NULL,
                        `description` text NOT NULL,
                        PRIMARY KEY (`id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $categories_create = mysql_query($categories_query);
    if(!$categories_create) echo "Error while creating ".$tbl_categories.": ".  mysql_error();

     // Creating event images table
    $event_images_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_event_images.'` (
                        `event_id` int(11) NOT NULL,
                        `picture_id` int(11) NOT NULL
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1';
    $event_images_create = mysql_query($event_images_query);
    if(!$event_images_create) echo "Error while creating ".$tbl_event_images.": ".  mysql_error();
   
    // Creating images table
    $images_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_images.'` (
                        `image_id` int(11) NOT NULL AUTO_INCREMENT,
                        `image_url` text NOT NULL,
                        PRIMARY KEY (`image_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $images_create = mysql_query($images_query);
    if(!$images_create) echo "Error while creating ".$tbl_images.": ".  mysql_error();
    
    // Creating levels table
    $levels_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_levels.'` (
                        `level_id` int(11) NOT NULL AUTO_INCREMENT,
                        `level_name` varchar(200) NOT NULL,
                        PRIMARY KEY (`level_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $levels_create = mysql_query($levels_query);
    if(!$levels_create) echo "Error while creating ".$tbl_levels.": ".  mysql_error();
   
    // Creating titles table
    $titles_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_titles.'` (
                        `title_id` int(11) NOT NULL AUTO_INCREMENT,
                        `title_name` varchar(200) NOT NULL,
                        PRIMARY KEY (`title_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $titles_create = mysql_query($titles_query);
    if(!$titles_create) echo "Error while creating ".$tbl_titles.": ".  mysql_error();
    
    // Creating users table
    $users_query = 'CREATE TABLE IF NOT EXISTS `'.$tbl_users.'` (
                        `user_id` int(11) NOT NULL AUTO_INCREMENT,
                        `user_pass` varchar(200) NOT NULL,
                        `user_email` varchar(200) NOT NULL,
                        `user_join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `level_id` int(11) NOT NULL,
                        `title_id` int(11) NOT NULL,
                        PRIMARY KEY (`user_id`)
                      ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1';
    $users_create = mysql_query($users_query);
    if(!$users_create) echo "Error while creating ".$tbl_users.": ".  mysql_error();
    
    // Inserting Default Categories
    $default_cats = "INSERT INTO `".$tbl_categories."` (`name`, `description`) VALUES
                    ('Cuisine', ''),
                    ('Job Fair', ''),
                    ('Job Interview', ''),
                    ('Traffic Accident', ''),
                    ('Concert', ''),
                    ('Meeting', ''),
                    ('Party', '');";
    $default_cats_insert = mysql_query($default_cats);
    if(!$default_cats_insert) echo "Error while inserting into ".$tbl_categories.": ".  mysql_error();

    // Query for advanced search
    $adv_search = "SELECT title, description, address, city from ".$tbl_events." WHERE `title` LIKE '%$keyword%' AND `address` LIKE '%$keyword%' AND `city` LIKE '%$keyword%' AND `description` LIKE '%$keyword%'";