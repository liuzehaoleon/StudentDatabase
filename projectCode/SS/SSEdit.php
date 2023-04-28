<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Edit data for scholarship</p>
<form method="post">
    <label for='ssid'>Editing Scholarship information with Scholarship ID:</label>
    <input type='text' id='ssid' name='ssid'>
    <br>
    <label for='amount'>Amount:</label>
    <input type='text' id='amount' name='amount'>
    <label for='sm'>Semester:</label>
    <input type='text' id='sm' name='sm'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="editScholarship">
    <br>
</form>

<?php
if(!empty($_POST['ssid'])){//not run until user did enter any input and recall this PHP statement
    
    //find previous value of them
    $sql="SELECT * FROM scholarship WHERE scholarship_id=".$_POST["ssid"];
    $allRows = $conn->query($sql);

    $isValidSlid=$allRows->num_rows; //return 0 or 1
    
    if($isValidSlid==0)
        echo "There is no matched slid for edit";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found

        //update if there no input, use orginal value
        $am=empty($_POST['amount'])?$row[1]:$_POST['amount'];
        $sm=empty($_POST['sm'])?$row[2]:$_POST['sm'];
        $sid=empty($_POST['sid'])?$row[3]:$_POST['sid'];
        $ssid=$_POST['ssid'];

        $ssEdit->bind_param("isii",$am,$sm,$sid,$ssid);
        $result = $ssEdit->execute();
        if ($result === TRUE) {
            echo "Table are edited successfully";
        } else 
            echo "Error editing table: " . $conn->error;
        }
    }
?>

<?php
$conn->close();
?>

<a href="../index.php">goback</a><br/>
</body>
</html>
