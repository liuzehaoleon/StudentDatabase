<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Insert data for student</p>
<form method="post">
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <label for='sname'>Student Name:</label>
    <input type='text' id='sname' name='sname'>
    <label for='country'>Home Country:</label>
    <input type='text' id='country' name='country'>
    <label for='bdate'>Birth Date:</label>
    <input type='text' id='bdate' name='bdate'>
    <label for='ayear'>Admission Year:</label>
    <input type='text' id='ayear' name='ayear'>
    <input type="submit" value="insertTheRecord">
    <br>
</form>

<?php

if(!empty($_POST['sid'])||!empty($_POST['sname'])||!empty($_POST['country'])
    ||!empty($_POST['bdate'])||!empty($_POST['ayear'])){
    $sid=$_POST['sid'];
    $sn=$_POST['sname'];
    $hc=$_POST['country'];
    $bd=$_POST['bdate'];
    $ay=$_POST['ayear'];
    $sInsert->bind_param("isssi",$sid,$sn,$hc,$bd,$ay);
    $result = $sInsert->execute();
    if ($result === TRUE) {
        echo "Table are inserted successfully";
    } else {
        echo "Error inserting table: " . $conn->error;
    }
}
?>

<?php
$conn->close();
?>

<a href="../index.php">goback</a><br/>
</body>
</html>
