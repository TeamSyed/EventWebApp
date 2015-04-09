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
    $tbl_friends = "friends";
    
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
                        `province` varchar(50) NOT NULL,
                        `postal_code` varchar(100) NOT NULL,
                        `type` varchar(100) NOT NULL,
                        `date` varchar(50) NOT NULL,
                        `time` varchar(50) NOT NULL,
                        `description` text NOT NULL,
                        `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `updated_at` timestamp NOT NULL ,
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
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `image_url` text NOT NULL,
                        `image_name` text NOT NULL,
                        `image_type` text NOT NULL,
                        PRIMARY KEY (`id`)
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
   // $default_cats_insert = mysql_query($default_cats);
   // if(!$default_cats_insert) echo "Error while inserting into ".$tbl_categories.": ".  mysql_error();
    
     $friend_query = "CREATE TABLE IF NOT EXISTS `".$tbl_friends."` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `user_id` int(11) NOT NULL COMMENT 'user id',
 `friend_id` int(11) NOT NULL COMMENT 'user''s friend',
 `active` int(11) NOT NULL DEFAULT '0' COMMENT '1 - active; 0 - deleted',
 `approved` int(11) NOT NULL DEFAULT '0' COMMENT '1 - approved, 0 - not approved',
 `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
 PRIMARY KEY (`id`)
 ) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1";
 $friend_create = mysql_query($friend_query);
 if(!$friend_create) echo "Error while creating ".$tbl_friends.": ". mysql_error();
 

//     Query for advanced search
//     $adv_search = "SELECT * from ".$tbl_events." WHERE `title` LIKE '%$srch_title%' OR `category` LIKE '%$srch_category%' OR DATE_FORMAT(created_at, "%m/%d/%Y") BETWEEN DATE_FORMAT('$srch_frm_date', "%m/%d/%Y") AND DATE_FORMAT('$srch_to_date', "%m/%d/%Y") OR DATE_FORMAT(created_at, "%h:%i %p") BETWEEN DATE_FORMAT('$srch_frm_time', "%h:%i %p") AND DATE_FORMAT('$srch_to_time', "%h:%i %p")";    
   
//     Query to update the event data
//    $cur_date = date("Y-m-d h:i:s", time());
//    $query_update_event = "UPDATE TABLE `".$tbl_events."` set title='$title', category_id='$cat_id'"
//            . "address='$address', city='$city', postal_code='$postal_code', date='$date', time='$time', "
//            . "description='$description', updated_at='$cur_date' where id='$event_id'";
    
//    Query for retrieving event information
//    $retrieve_event = "SELECT * FROM event where id='$event_id'";   // Specific event
//    $retrieve_event = "SELECT * FROM event";   // All Events event
    
    function deleteEvent($id){
        $query = "DELETE FROM event WHERE id='$id'";
        $exe_query = mysql_query($query) or die("Error while deleting event: ".mysql_error());
        return $exe_query;
    }
    
    function getFriendlist($user_id){
        $result = array();
        $query = "SELECT * from friends where user_id = '$user_id'";
        $exe = mysql_query($query);
        while($row = mysql_fetch_assoc($exe)){
            array_push($result, $row);
        }
        return $result;
    }
    
    function getUserMail($user_id){
        $exe = mysql_query("SELECT * FROM users where user_id='$user_id'") or die(mysql_error());
        $getVal = mysql_fetch_object($exe);
        return $getVal->user_email;
    }
    
/*
    INSERT INTO `users` (`user_id`, `user_pass`, `user_email`, `user_join_date`, `level_id`, `title_id`) VALUES
(1, 'admin123', 'testuser01@gmail.com', '2015-04-08 18:33:27', 0, 0),
(2, 'admin123', 'testuser02@gmail.com', '2015-04-08 18:33:27', 0, 0),
(3, 'admin123', 'testuser03@gmail.com', '2015-04-08 18:33:27', 0, 0),
(4, 'admin123', 'testuser04@gmail.com', '2015-04-08 18:33:27', 0, 0),
(5, 'admin123', 'testuser05@gmail.com', '2015-04-08 18:33:27', 0, 0),
(6, 'admin123', 'testuser06@gmail.com', '2015-04-08 18:33:27', 0, 0);
 */
    
    /*
     INSERT INTO `friends` (`id`, `user_id`, `friend_id`, `active`, `approved`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 1, 1, '2015-04-08 18:35:41', '2015-04-08 18:35:41'),
(2, 1, 3, 1, 1, '2015-04-08 18:36:06', '2015-04-08 18:36:06'),
(3, 1, 4, 0, 0, '2015-04-08 18:36:06', '2015-04-08 18:36:06'),
(7, 1, 5, 1, 0, '2015-04-08 18:36:06', '2015-04-08 18:36:06'),
(8, 1, 6, 1, 1, '2015-04-08 18:36:06', '2015-04-08 18:36:06');
     */