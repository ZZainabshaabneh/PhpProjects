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
$username=$_POST['user'];
$password=$_POST['pass'];
$remember=$_POST['remember'];
//////////////////////////////////////
$connect=mysqli_connect("localhost","root","12345678","profile2");
$q="select * from users where name='$username';";
$x=mysqli_query($connect,$q);
while($a=mysqli_fetch_assoc($x)){
    $user=$a['name'];
    $pass=$a['pass'];
}
///////////////////////////////////////

if(isset($_POST['login'])){
   if($username !=$user) echo "username does not exist!";
   else if($pass !=$password) echo "wrong password!";
   else{
       
       if(!empty($remember)){
         setcookie("user",$username,time()+51000000000);
         setcookie("pass",$password,time()+51000000000);
       }
       else{
          setcookie("user","");
          setcookie("pass","");
       }
       
       
       session_start();
       $_SESSION['user']=$username;
       header("location:profile.php");
       
   }
    
}




?>
</div>
</form>
</body>

</html>