<html>
<head>
<link rel="stylesheet" href="signin.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
<form method="post" action="profile.php">
<header>
<?php 
error_reporting(0);
session_start();
$myname=$_SESSION['user'];
echo "<h2>welcome ".$myname."</h2>";

$con=mysqli_connect("localhost","root","","profile2");
$q="select bd from users where name='$myname';";
$x=mysqli_query($con,$q);

while($temp=mysqli_fetch_assoc($x)){
    $bd=$temp['bd'];
}


$today=date("Y-m-d");
$todayarray=explode("-",$today);

$bdarray=explode("-",$bd);
$old=$todayarray[0]-$bdarray[0];

if($todayarray[1]-$bdarray[1]==0 && $todayarray[2]-$bdarray[2]==0)
    echo "you are ".$old." years old<br>Happy Birthday!";

    
    if(isset($_POST['logout'])){
       session_start();
       session_destroy();
       header("location:signin.php");
    }
?>
<button class="out" name="logout"><i class="fa fa-sign-out" aria-hidden="true"></i></button>

</header>



<footer></footer>
</form>
</body>
</html>