<html>
<head>
</head>
<body>

<?php
//Database initialization
require_once("db_handler.php");

$conn = iniCon();
$db = selectDB($conn);

$query = "select * from events
 where eventid not in (select top (
        (select count(*) from events) - 5
    ) eventid
    from events";
$result2 = mysql_query($query, $conn);

?>

<div id="recent">
<b id="caption2">Recent Events</b>
<br/><br/>
    <form name="upServForm" action="<?php echo $PHP_SELF; ?>" method="post" >
        