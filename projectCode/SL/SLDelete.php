<?php
session_start();
if(!isset($_SESSION['logged'])) 
  header("Location: "."../func/logOut.php");
?>

<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>

<p>Delete data for specialization</p>
<form method="post">
    <label for='slid'>Specialization ID:</label>
    <input type='text' id='slid' name='slid'>
    <input type="submit" value="deleteTheRecord">
    <br>
</form>

<?php
if(!empty($_POST['slid'])){
    $slid=$_POST['slid'];
    $slDelete->bind_param("i",$slid);
    $result = $slDelete->execute();
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
