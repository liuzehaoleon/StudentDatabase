<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Insert data for scholoarship</p>
<form method="post">
    <label for='ssid'>Scholoarship ID:</label>
    <input type='text' id='ssid' name='ssid'>
    <label for='amount'>Amount:</label>
    <input type='text' id='amount' name='amount'>
    <label for='sm'>Semester:</label>
    <input type='text' id='sm' name='sm'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="insertNewScholarship">
    <br>
</form>

<?php
if(!empty($_POST['ssid'])|!empty($_POST['amount'])||!empty($_POST['sm'])||!empty($_POST['sid'])){
    $ssid=$_POST['ssid'];
    $am=$_POST['amount'];
    $sm=$_POST['sm'];
    $sid=$_POST['sid'];
    $ssInsert->bind_param("iisi",$ssid,$am,$sm,$sid);
    $result = $ssInsert->execute();
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