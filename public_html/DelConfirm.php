<?php
include_once './config.php';
if(isset($_GET['delid'])){
    $del = deleteEvent($_GET['delid']);
    if($del){
        header('location: viewevents.php?delsucc=true');
    }
}


?>