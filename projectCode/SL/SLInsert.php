<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Insert data for specialization</p>
<form method="post">
    <label for='slid'>Specialization ID:</label>
    <input type='text' id='slid' name='slid'>
    <label for='slname'>Specialization Name:</label>
    <input type='text' id='slname' name='slname'>
    <label for='lvl'>Level:</label>
    <input type='text' id='lvl' name='lvl'>
    <label for='cyear'>Complete Year:</label>
    <input type='text' id='cyear' name='cyear'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="insertTheRecord">
    <br>
</form>

<?php
if(!empty($_POST['slid'])||!empty($_POST['slname'])||!empty($_POST['lvl'])
||!empty($_POST['cyear'])||!empty($_POST['sid'])){
$slid=$_POST['slid'];
$sln=$_POST['slname'];
$lvl=$_POST['lvl'];
$cy=$_POST['cyear'];
$sid=$_POST['sid'];
$slInsert->bind_param("isssi",$slid,$sln,$lvl,$cy,$sid);
$result = $slInsert->execute();
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