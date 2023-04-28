<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Edit data for specialization</p>
<form method="post">
    <label for='slid'>Editing specificaition information with specification ID:</label>
    <input type='text' id='slid' name='slid'>
    <br>
    <label for='slname'>Specialization Name:</label>
    <input type='text' id='slname' name='slname'>
    <label for='lvl'>Level:</label>
    <input type='text' id='lvl' name='lvl'>
    <label for='cyear'>Complete Year:</label>
    <input type='text' id='cyear' name='cyear'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="editTheRecord">
    <br>
</form>

<?php
if(!empty($_POST['slid'])){//not run until user did enter any input and recall this PHP statement
    
    //find previous value of them
    $sql="SELECT * FROM specialization WHERE specialization_id=".$_POST["slid"];
    $allRows = $conn->query($sql);

    $isValidSlid=$allRows->num_rows; //return 0 or 1
    
    if($isValidSlid==0)
        echo "There is no matched slid for edit";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found

        //update if there no input, use orginal value
        $sn=empty($_POST['slname'])?$row[1]:$_POST['slname'];
        $lvl=empty($_POST['lvl'])?$row[2]:$_POST['lvl'];
        $cy=empty($_POST['cyear'])?$row[3]:$_POST['cyear'];
        $sid=empty($_POST['sid'])?$row[4]:$_POST['sid'];
        $slid=$_POST['slid'];

        $slEdit->bind_param("sssii",$sn,$lvl,$cy,$sid,$slid);
        $result = $slEdit->execute();
        if ($result === TRUE) {
            echo "Table are edited successfully";
        } else {
            echo "Error editing table: " . $conn->error;
        }
    }
}    
?>

<?php
$conn->close();
?>

<a href="../index.php">goback</a><br/>
</body>
</html>
