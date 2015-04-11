<?php
include_once '../config.php';
if(isset($_GET['delid'])){
    $delfrnd = deleteFriend($_GET['delid']);
    if($delfrnd) header('location:index.php?s='.  base64_encode("success"));
}
