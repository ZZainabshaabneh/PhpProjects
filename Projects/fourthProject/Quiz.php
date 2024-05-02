
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
<table>

<tr  ><td colspan="3">Q1:What's your name?</td></tr>
<tr>
<tr>
<td> <input type="radio" name="q1" value="Zainab"<?php if($_POST['q1']=="Zainab")echo "checked"?> >Zainab</td>
<td> <input type="radio" name="q1" value="Omar" <?php if($_POST['q1']=="Omer")echo "checked"?>>Omar</td>
<td> <input type="radio" name="q1" value="Mohammad" <?php if($_POST['q1']=="Mohammad")echo "checked"?>>Mohammad</td>
</tr>
<tr><td colspan="3">Q2:what's your family language?</td></tr>
<tr>
<td> <input type="radio" name="q2" value="Arabic" <?php if($_POST['q2']=="Arabic")echo "checked"?>>Arabic</td>
<td> <input type="radio" name="q2" value="English" <?php if($_POST['q2']=="English")echo "checked"?>>English</td>
<td> <input type="radio" name="q2" value="Franch" <?php if($_POST['q2']=="Franch")echo "checked"?>>Franch</td>
</tr>
<tr><td colspan="3">Q3:what's your degree?</td></tr>
<tr>
<td> <input type="radio" name="q3" value="Bs'c" <?php if($_POST['q3']=="Bs'c")echo "checked"?>>Bs'c</td>
<td> <input type="radio" name="q3" value="Dp" <?php if($_POST['q3']=="Dp")echo "checked"?>>Dp</td>
<td> <input type="radio" name="q3" value="Sc" <?php if($_POST['q3']=="Sc")echo "checked"?>>Sc</td>

</tr>
<tr><td colspan="3">Q4:What's your university?</td></tr>
<tr>
<td> <input type="radio" name="q4" value="Bzu" <?php if($_POST['q4']=="Bzu")echo "checked"?>>Bzu</td>
<td> <input type="radio" name="q4" value="AUO" <?php if($_POST['q4']=="AUO")echo "checked"?>>AUO</td>
<td> <input type="radio" name="q4" value="NNL" <?php if($_POST['q4']=="NNL")echo "checked"?>>NNL</td>
</tr>
<tr><td colspan="3">Q5:What's your spacilization?</td></tr>
<tr>
<td> <input type="radio" name="q5" value="CE" <?php if($_POST['q5']=="CE")echo "checked"?> >CE</td>
<td> <input type="radio" name="q5" value="CS" <?php if($_POST['q5']=="CS")echo "checked"?>>CS</td>
<td> <input type="radio" name="q5" value="EE" <?php if($_POST['q5']=="EE")echo "checked"?>>EE</td>

</tr>
</table>

<input type="submit" name="Done" value=" Press to get your mark">
<br><br>
<?php 
if(isset($_POST['Done'])){
    //$sum=0;
    echo '<script>var sume=0;</script>';
    if($_POST['q1']=="Zainab")echo '<script>sume+=2;</script>';
    if($_POST['q2']=="Arabic")echo '<script>sume+=2;</script>';
    if($_POST['q3']=="Bs'c")echo '<script>sume+=2;</script>';
    if($_POST['q4']=="Bzu")echo '<script>sume+=2;</script>';
    if($_POST['q5']=="CE")echo '<script>sume+=2;</script>';

    echo  '<script>alert(sume+"/10");</script>';
}



?>
</form>









</html>


<?php
