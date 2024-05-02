<!DOCTYPE html>
<!-- The document type declaration, specifying this is an HTML5 document -->
<html>
<head>
<style>
td{
    border:1px solid grey; /* Styles table cells with a grey border */
}

</style>
</head>

<body>

<form method="post" action="index.php">
<!-- Creates a form that sends data to index.php via POST method -->

<?php
// PHP code begins

$questions=array("Q1: what's your name?","Q2: where do you live?","Q3: how old are you?","Q4: what's your last name?","Q5: what school\collage?");
// Initializes an array with quiz questions

$choices=array(
    array("rabee","ahmed","abdallah"), // Choices for Q1
    array("Nablus","Jerusalem","Ramallah"), // Choices for Q2
    array("20","25","30"), // Choices for Q3
    array("Jararaa","alShaikh","Arafat"), // Choices for Q4
    array("AAUP","BZU","QOU") // Choices for Q5
);
// Initializes a 2D array containing choices for each question

$answers=array("rabee","Ramallah","30","Jararaa","BZU");
// Correct answers for the questions

echo '<table>'; // Starts a table for the quiz

for($i=0;$i<5;$i++){
    echo '<tr><td colspan="3">'.$questions[$i].'</td></tr>'; 
    // Loops through questions, creating a row for each question
    
    echo '<tr>'; 
    // Starts a new row for choices
    
    for($j=0;$j<3;$j++){
        echo '<td><input type="radio" value="'.$choices[$i][$j].'" name="'.$i.'">'.$choices[$i][$j].'</td>';
        // Loops through choices for the current question and creates a radio button for each choice
    }
    
    echo '</tr>'; // Ends the row for choices
}

echo '</table>'; // Ends the table

// Checks if the form was submitted
if(isset($_POST['ok'])){
    
    echo'<script>var sum=0;</script>'; // Initializes a JavaScript variable 'sum' to calculate the score
    
    for($k=0;$k<5;$k++){
        // Loops through the submitted answers
        if($_POST[$k]==$answers[$k]) echo'<script>sum+=2;</script>'; 
        // Compares each submitted answer with the correct answer and updates 'sum' accordingly
    }
    
    echo'<script>alert(sum+"/10");</script>'; 
    // Uses JavaScript to display the final score in an alert dialog
}

?>

<input type="submit" value="ok" name="ok">
<!-- A submit button to send the form data -->

</form>

</body>
</html>
