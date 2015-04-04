<?php
include "connect.php";
function trimString($value)
{
    return trim($value);
}

$date = filter_input(INPUT_POST, 'date', FILTER_CALLBACK, array('options' => 'trimString'));

$result = mysql_query("SELECT * FROM events WHERE date='".$date."'"); // query

// no results
if (!$result) {
  echo 'not found'; 
} else {
  $date = $result[0]->date; 
  echo '$result';
  } 
?>