<!DOCTYPE html>
<html>
<head>
<title>log in to your account</title>
<link rel="stylesheet" href="signin.css">
</head>

<header>
<h1>Welcome</h1>
</header>
<body>
<form method="post" action="signin.php">
<div class="leftside">
<h2>hello there,</h2>
<p>login to your account, share your photos and see what's happening out there. enjoy this experience!</p>
</div>
<!-- ///////////////////////////////////////////////////////////////// -->
<div class="rightside">
<table>
<tr><td colspan="2"><input type="text" name="user" placeholder="enter username" value="<?php echo $_COOKIE['user'];?>"></td></tr>
<tr><td colspan="2"><input type="password" name="pass" placeholder="enter password" value="<?php echo $_COOKIE['pass'];?>"></td></tr>
<tr><td style="width:15%;"><input type="checkbox" name="remember" checked></td ><td style="width:80%;font-size:12px;">remember my login data</td></tr>
<tr><td colspan="2"><input type="submit" name="login" value="login"></td></tr>
</table>
<span style="width:95%;font-size:12px;">if you don't have an account, please <a href="signup.php">sign up</a></span>

<?php 
/*
$userdata=array(array("name"=>"rabee","password"=>"123","bd"=>"20-07-1990"),
    array("name"=>"haneen","password"=>"456","bd"=>"20-07-1990"),
    array("name"=>"zainab","password"=>"789","bd"=>"20-07-1990")
); 
*/

$connect=mysqli_connect("localhost","root","12345678","profile2");
$q="select * from users;";
$x=mysqli_query($connect,$q);


$userdata=array(array());

while($array=mysqli_fetch_assoc($x)){
    $userdata[]=$array;
}

if(isset($_POST['login'])){
   $username=$_POST['user'];
   $password=$_POST['pass'];
   $usercheck=false;
   $passcheck=false;
   foreach($userdata as $data){
     if($username==$data['name'])$usercheck=true;
     if($usercheck){
        if($password==$data["pass"]) $passcheck=true;
        break;
     }
   }
   echo "<h2 style='color:red;'>";
   if($usercheck && $passcheck){
       if(isset($_POST['remember']) && $_POST['remember']!=null){
           setcookie("user",$username,time()+500000);
           setcookie("pass",$password,time()+500000);
       }
       else{
           setcookie("user","");
           setcookie("pass","");
       }
       session_start();
       $_SESSION['user']=$username;
       header("location:profile.php");
   }
   else if(!$usercheck && $username!='') {
       echo "username does not exist! ";
       echo "you can ";
       echo '<a href="signup.php">sign up</a>';
   }
   else if($usercheck && !$passcheck) echo "wrong password!";
   echo "</h2>";
}

?>
</div>
</form>
</body>

</html>
