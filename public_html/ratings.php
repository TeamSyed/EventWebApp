<?php
include_once('config.php');
 
if(isset($_POST['rate']))
{
    $rate=$_POST['rate'];
    $p_id=$_POST['pid'];
    $sql=false;
    if(!check_cookie($p_id)&&rate)
    {
    $sql=mysql_query("INSERT INTO rating (p_id,rate)VALUES($p_id,$rate)");
    }
    if($sql)
    {
        $one_day = 86400 + time();
        setcookie('p_'.$p_id,true, $one_day); //set cookie for one day
    }
}
 
//get rate for your product
function rate($p)
{
$sql=mysql_query("SELECT * FROM rating WHERE  p_id='$p'");  
$total = mysql_num_rows($sql);
if($total>0)
{
$rate_avg=0;
for($i=1;$i<=5;$i++)
{
$result=mysql_query("SELECT * FROM rating WHERE  p_id='$p' AND rate='$i'");  
 $num_rows = mysql_num_rows($result);
 $rate_avg = $rate_avg+$i*$num_rows;
}
$rate=$rate_avg/$total;
return $rate;
}
else
{
    return false;
}
}
 
//check cookie for your product
function check_cookie($p)
{
   if(isset($_COOKIE['p_'.$p]))
   {
    return true;
   }
   else
   {
    return false;
   }   
}
?>