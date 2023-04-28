<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Delete data for contact information</p>
<form method="post">
    <label for='ciid'>Contact Information ID:</label>
    <input type='text' id='ciid' name='ciid'>
    <input type="submit" value="deleteTheRecord">
    <br>
</form>

<?php
if(isset($_POST['ciid'])){
    $ciid=$_POST['ciid'];
    $ciDelete->bind_param("i",$ciid);
    $result = $ciDelete->execute();
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
