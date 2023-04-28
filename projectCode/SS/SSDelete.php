<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Delete data for scholarship</p>
<form method="post">
    <label for='ssid'>Scholarship ID:</label>
    <input type='text' id='ssid' name='ssid'>
    <input type="submit" value="deleteTheRecord">
    <br>
</form>

<?php
if(!empty($_POST['ssid'])){
    $ssid=$_POST['ssid'];
    $ssDelete->bind_param("i",$ssid);
    $result = $ssDelete->execute();
    if ($result === TRUE) {
        echo "Table are deleted successfully";
    } else {
        echo "Error deleting table: " . $conn->error;
    }
}
?>

<?php
$conn->close();
?>

<a href="../index.php">goback</a><br/>
</body>
</html>
