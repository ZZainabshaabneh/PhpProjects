<?php
session_start();
$myname=$_SESSION['user'];
echo "welcome ".$myname;