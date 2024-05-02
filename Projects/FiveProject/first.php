

<!DOCTYPE html>
<html>
<form method="post" action="first.php" enctype="multipart/form-data">

<input type="file"  name="myfile">
<input type="text" name="filename" placeholder="Enter name img">
<button name="submit">submit</button>

</form>
<?php

if(!file_exists('pics'))mkdir('pics');
if(isset($_POST['submit'])){
    $newfile=$_POST['filename'];
    $infofile=$_FILES['myfile'];
    $temp_file=$infofile['tmp_name'];
    $filename='pics\\'.$infofile['name'];
    $array=explode(".", $filename);//first side nameimag after dot the type of img
    $newfile=$newfile.".".$array[1];
    if(move_uploaded_file($temp_file, $newfile)){
        echo '<br>';
        echo "<img src='$filename'>";
        echo '<br>';
    }
    var_dump($infofile);//to know the feilds of files

}

?>



</html>



