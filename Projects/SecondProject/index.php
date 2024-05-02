<!DOCTYPE>
<html>
<head>
<style>
button{
background-color:A8B0FF;
border:3px outset blue;
border-radius:8px;
width:50px;
height:50px;
}
input{
text-align:center;
background-color:C6CFBE;
border : 2px inset ;
width:270px;
height:70px;
box-shadow:4px 3px 2.5px gray;

}
.ans{
text-align:center;
color:black;
font-size:50;
border:1px solid 780FAF;  
background-color:A67DBC;
width:100%;
border-radius:8px;

}
.grid-container {
  display: grid;
   
  text-align:center;
  grid-template-columns: repeat(4,60px) 100px ;
  background-color: #2196F3;
  padding: 10px;
  width:300px;
}



h1{
text-align:center;
}
.for{text-align:center;}

</style>
</head>

<body>

<h1>Calculator</h1>
<form  class ="for"  method="post" action="index.php">
<input type="text" name="Number1" placeholder="Enter First Number" >
<br>
<br>
<input type="text" name="Number2" placeholder="Enter Second Number" >
<br>
<br>
<div class="grid-container ">
<button name="mul" >X</button>
&nbsp;

<button name="Sum" >+</button>
<br>
<br>
<button name="Sub" >-</button>
&nbsp;

<button name="mod" >%</button>
&nbsp;
<br>
<br>
&nbsp;
&nbsp;
&nbsp;
<button name="Div" >/</button>
<button name="equal" >=</button>
<button name="clear" >Clear</button>
<button name="d" >.</button>
</div>
&nbsp;



</form>
<?php 

if(isset($_POST['mul'])){
    $a=$_POST['Number1'];
    $s=$_POST['Number2'];
    $res=$a*$s;
    if($s!=null && !empty($a) ){
        echo "<di class='ans'>$res</div>";
    }
    else{
        echo "Enter the Values!";
    }
}
    if(isset($_POST['Sum'])){
        $a=$_POST['Number1'];
        $s=$_POST['Number2'];
        $res=$a+$s;
        if($s!=null && !empty($a) ){
            echo "<di class='ans'>$res</div>";
        }
    else{
        echo "Enter the Values!";
    }
    }
   
    if(isset($_POST['Sub'])){
        $a=$_POST['Number1'];
        $s=$_POST['Number2'];
        $res=$a-$s;
        if($s!=null && !empty($a) ){
            echo "<di class='ans'>$res</div>";
        }
        else{
            echo "Enter the Values!";
        }
    }
    if(isset($_POST['Div'])){
        $a=$_POST['Number1'];
        $s=$_POST['Number2'];
        $res=$a/$s;
        if($s!=null && !empty($a) ){
            echo "<di class='ans'>$res</div>";
        }
        else{
            echo "Enter the Values!";
        }
    }
    if(isset($_POST['mod'])){
        $a=$_POST['Number1'];
        $s=$_POST['Number2'];
        $res=$a%$s;
        if($s!=null && !empty($a) ){
            echo "<di class='ans'>$res</div>";
        }
        else{
            echo "Enter the Values!";
        }
    }

?>

</body>



</html>