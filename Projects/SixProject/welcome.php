<?php
session_start();
$name=$_SESSION['username'];
$gender=$_SESSION['gender'];
$bd=$_SESSION['date'];
if($gender=="male"){
    echo "<style>
body{
background-color:lightcyan;
}</style>";
}

echo "<h1>Welcome ".$name."</h1>";
date_default_timezone_set("Asia/Jerusalem");
$y=explode("-", $bd);
$date=date("Y-m-d");
$y2=explode("-",$date);
$age=$y2[0]-$y[0];
echo "your age is ".$age."years old!";
?>