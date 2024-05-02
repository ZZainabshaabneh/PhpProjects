<?php
if (isset($_POST['ok'])) {
    $d = $_POST['date'];
    $uN = $_POST['username'];
    $pass = $_POST['pass'];
    $pass1 = $_POST['conf'];
    $chdate = false;
    $cuser = false;
    $cpass = false;
    if ((date("Y-m-d") - $d) > 18)
        $chdate = true;
    if (strlen($uN) > 5)
        $cuser = true;
     if($pass==$pass1)
         $cpass=true;
    if (! $chdate)
        echo "Under 18! ";
    else if (! $cuser)
        echo "name must be 5 letters or more! ";
    else if (! $cpass)
        echo "password and confirm missmatch! ";
        if ($cuser && $cpass && $chdate) {
            echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
            $connect=mysqli_connect("localhost","root","12345678","Login");
            $q="insert info users value (' $uN',' $pass','$d');";
            mysqli_query ($connect,$q);
            
            echo "<script> alert('welcome!');
 window.location.href='signin.php';
</script>";
        }
        
        
}
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="signup">
        <h1>Welcome SignUp Page</h1>
        <title>SignUp</title>
    </header>
    <form method="post" action=" ">
        <div class="rights">
            <h1>Create a new account</h1>
            <h3>It’s quick and easy.</h3>
        </div>
        <div class="login">
            <table>
                <tr>
                    <td colspan="2"><h1 style="color:white;">Create a new account</h1></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="text" name="username" placeholder="enter username" value="<?php echo isset($_COOKIE['username']) ? $_COOKIE['username'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="pass" placeholder="enter password" value="<?php echo isset($_COOKIE['pass']) ? $_COOKIE['pass'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="password" name="conf" placeholder="confirm password" value="<?php echo isset($_COOKIE['conf']) ? $_COOKIE['conf'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td>BirthDate:</td>
                    <td><input type="date" name="date" value="<?php echo isset($_COOKIE['date']) ? $_COOKIE['date'] : ''; ?>"></td>
                </tr>
                <tr>
                    <td><input type="radio" name="gender" value="female">Female</td>
                </tr>
                <tr>
                    <td><input type="radio" name="gender" value="male">Male</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="ok" value="Register"></td>
                </tr>
                <tr>
                    <td></td>
                </tr>
            </table>
            <a href="login.php">Already have an account? </a> 
        </div>
    </form>
</body>
</html>
