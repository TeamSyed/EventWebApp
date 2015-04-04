<?php
include "connect.php";

function trimString($value)
{
    return trim($value);
}

$address=filter_input(INPUT_POST,'address', FILTER_CALLBACK,array('options' => 'trimString'));

$result= mysql_query("SELECT * FROM units WHERE address='".$address."'"); // query

// no results
if (!$result) {
  echo 'not found'; 
} else {
  $address = $result[0]->address; 
  // check if its newer
  } 
  
?>