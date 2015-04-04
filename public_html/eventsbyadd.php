<?php
function trimString($value)
{
    return trim($value);
}

$address = filter_input(INPUT_POST, 'address', FILTER_CALLBACK, array('options' => 'trimString'));

echo filter_input($address);
?>