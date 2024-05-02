<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SignIn</title>
    <link rel="stylesheet" href="style.css">
</head>
<header>
<h1>Welcome Our Page</h1>
</header>
<body>
    <div class="LeftSide">
        <h2>Hello There</h2>
        <p>Welcome to Our Funny Page!</p>
    </div>
    <div class="RightSide">
        <form method="POST">
            <table>
             <tr><td colspan="2"><h1 style="color:white;">Log Into Our Page</h1></td></tr>
            
            
                <tr>
                    <td colspan="2"><input type="text" name="username" placeholder="enter username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="pass" placeholder="enter password" value="<?php echo isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ''; ?>"></td>
                </tr>
                <tr >
                    <td ><input type="checkbox" name="remember" checked></td>
                    <td >Remember me</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="sub" value="Login"></td>
                </tr>
            </table>
            <p>Sign up for Our Page <a href="signup.php">SignUp</a></p>
        </form>
        


<?php
$userdata = array(
    array("name" => "zainab", "password" => "1234"),
    array("name" => "rabee", "password" => "9870"),
    array("name" => "Abd", "password" => "8379"),
    array("name" => "Ahmad", "password" => "1234")
);
if (isset($_POST['sub'])) {
    $user = $_POST['username'];
    $pass = $_POST['pass'];
    $usercheck = false;
    $passcheck = false;
    foreach ($userdata as $users) {
        if ($user == $users['name']) {
            $usercheck = true;
            if ($usercheck) {
                if ($pass == $users['password']) $passcheck = true;
            } else echo "user doesn't exist!";
        }
    }
    if ($passcheck && $usercheck && $user != '') {
        if (isset($_POST['remember']) && $_POST['remember'] != null) {
            setcookie("username", $user, time() + 40000);
            setcookie("pass", $pass, time() + 40000);
            echo "Welcome ".$user;
            header("location:welcome.php");
        } else {
            setcookie("username", "" );
            setcookie("pass", "" );
        }
        //echo "Welcome";
        //echo '<a href="signup.php">'.SignUp.'</a>';
    } else if (!$passcheck && $usercheck) {
        echo "wrong password! try again";
    }
}

?>
</div>
    
</body>

</html>