 
<?php
if(isset($_POST['signin'])){
    $user=$_POST['username'];
    $pass=$_POST['pass'];
    $chuser=false;
   // $chpass=false;
    $x=0;
    $users=array(array("zainab","984"),array("Ali","234"),array("Khaled","654"));
    for($i=0;$i<3;$i++){
        if($user==$users[$i][0]){
            $chuser=true;
            $x=$i;
            break;
        }
        
    }
    
    if($chuser){
        if($pass==$users[$x][1]){
            if(isset($_POST['username'])&& !empty($_POST['remember'])){
                setcookie('username',$user,time()+300000000);
                setcookie('pass',$pass,time()+30000000);
            }
            else{
                setcookie("username","");
                setcookie("pass","");
            }
            session_start();
            $_SESSION['username']=$user;
            header("location:welcome.php");
        }
        else{
            echo "<script>alert('Wrong Password !')</script>";
        }
    }
    else{
        echo "<script>alert('Username Doesn't exist !')</script>";
    }
    
}

?>