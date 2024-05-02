<!DOCTYPE>
<html>
<head> 
<link rel="stylesheet" href="index.css">
</head>
<form method="post" action="index.php">
<div class="login">
<table>
<tr>
<td colspan="3"><input type="text" name="username" placeholder="enter username" value="<?php if(isset($_COOKIE['username']))echo $_COOKIE['username'];?>"></td>
</tr>
<tr>
<td>BirthDate:</td><td><input type="date" name="date"></td>
</tr>
<tr>
<td><input type="radio" name="gender" value="female">Female</td>
</tr>
<tr>
<td><input type="radio" name="gender" value="male">Male</td>
</tr>
<tr>
<td><input type="checkbox" name="rem" checked></td><td>Remember Me</td>
</tr>
<tr>
<td colspan="2"><input type="submit" name="ok"   value="Done"></td>
</tr>
</table>
</div>

</form>


</html>



<?php
if(isset($_POST['ok'])){
    session_start();
    $_SESSION['username']=$_POST['username'];
    $_SESSION['date']=$_POST['date'];
    $_SESSION['gender']=$_POST['gender'];
    if(isset($_POST['rem']) && !empty($_POST['rem'])){
        setcookie("username",$_POST['username'],time()+3000000);
    }
    else{
        setcookie("username","");
    }
    header("location:welcome.php");
}
