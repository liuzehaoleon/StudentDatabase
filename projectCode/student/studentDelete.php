<?php
session_start();
if(!isset($_SESSION['logged'])) 
  header("Location: "."../func/logOut.php");
?>

<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>


<p>Delete data for student</p>
<form method="post">
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="deleteTheRecord">
    <br>
</form>

<?php
if(!empty($_POST['sid'])){
    $sid=$_POST['sid'];
    $sDelete->bind_param("i",$sid);
    $result = $sDelete->execute();
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
