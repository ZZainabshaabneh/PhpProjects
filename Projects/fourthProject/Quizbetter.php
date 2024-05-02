
<!DOCTYPE html>
<html>
<head>
<style>
td{
border:1px solid lightgrey;

}
</style>


</head>
<!-- the value of php in input command -->
<form method="post" action="Quiz.php">
<?php 

$qes=array("Q1:What's your name?","Q2:what's your family language?","Q3:what's your degree?","Q4:What's your university?","Q5:What's your spacilization?");
$choices=array(
    array("Zainab","Omar","Mohammad"),
    array("Arabic","English","Franch"),
    array("Bs'c","Dp","Sc"),
    array("Bzu","AUO","NNL"),
    array("CE","CS","EE")
    
);
$answers=array("Zainab","Arabic","Bs'c","Bzu","CE");
?>


<table>
<?php 
for($i=0;$i<5;$i++){
   echo '<tr ><td colspan="3"> $qes[i] </td></tr>';
   
echo '<td> <input type="radio" name=$i value=" $choices[0][0]; if($_POST[$i]== $choices[0][0]) echo "checked">Zainab</td>';

}
?>

<tr  ><td colspan="3"><?php echo $qes[0];?></td></tr>
<tr>
<tr>
<td> <input type="radio" name="q1" value="<?php echo $choices[0][0]; ?>"<?php if($_POST['q1']== $choices[0][0])echo "checked"?> >Zainab</td>
<td> <input type="radio" name="q1" value="<?php echo $choices[0][1]; ?>" <?php if($_POST['q1']== $choices[0][1]) echo "checked"?>>Omar</td>
<td> <input type="radio" name="q1" value="<?php echo $choices[0][2]; ?>" <?php if($_POST['q1']==$choices[0][2])echo "checked"?>>Mohammad</td>
</tr>

</table>

<input type="submit" name="Done" value=" Press to get your mark">
<br><br>
<?php 

if(isset($_POST['Done'])){
    //$sum=0;
    echo '<script>var sume=0;</script>';
    for($i=0;$i<5;$i++){
        if($_POST[$i]==$answers[$i])echo '<script>sume+=2;</script>';
        
    }
   
    echo  '<script>alert(sume+"/10");</script>';
}



?>
</form>









</html>


<?php
