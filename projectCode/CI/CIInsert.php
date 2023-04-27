<?php
session_start();
if(!isset($_SESSION['logged'])) 
  header("Location: "."../func/logOut.php");
?>

<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>

<p>Insert data for contact information</p>
<form method="post">
    <label for='cid'>Contact Information ID:</label>
    <input type='text' id='cid' name='cid'>
    <label for='email'>Student Email:</label>
    <input type='text' id='email' name='email'>
    <label for='phone'>Phone Number:</label>
    <input type='text' id='phone' name='phone'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    
    <input type="submit" value="insertTheRecord">
    <br>
</form>

<?php
if(isset($_POST['cid'])||isset($_POST['email'])||isset($_POST['phone'])
    ||isset($_POST['sid'])){
    $cid=$_POST['cid'];
    $em=$_POST['email'];
    $ph=$_POST['phone'];
    $sid=$_POST['sid'];
    $ciInsert->bind_param("issi",$cid,$em,$ph,$sid);
    $result = $ciInsert->execute();
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
