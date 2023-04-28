<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Edit data for contact information</p>
<form method="post">
    <label for='cid'>Editing student contact information with CI ID:</label>
    <input type='text' id='cid' name='cid'>
    <br>
    <label for='email'>Student Email:</label>
    <input type='text' id='email' name='email'>
    <label for='phone'>Phone Number:</label>
    <input type='text' id='phone' name='phone'>
    <label for='sid'>Student ID:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="editTheRecord">
    <br>
</form>

<?php

// ||isset($_POST['sname'])||isset($_POST['phone'])
// ||isset($_POST['sid'])||isset($_POST['ayear'])
if(!empty($_POST['cid'])){//not run until user did enter any input and recall this PHP statement
    
    //find previous value of them
    $rowForUpdate="SELECT * FROM contact_information WHERE CI_id=".$_POST["cid"];
    $allRows = mysqli_query($conn,$rowForUpdate);//allRows fit the Update statement
    // $allRows = $conn->query($rowForUpdate); or can be write in this format

    //$result -> num_rows; or can be write in this format
    $isValidcid=mysqli_num_rows($allRows); //return 0 if no row match cid
    //return 1 if cid is found since cid is unique primary key 

    if($isValidcid==0)
        echo "There is no matched cid for edit";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by it PK

        //update if there no input, use orginal value
        $em=empty($_POST['email'])?$row[1]:$_POST['email'];
        $ph=empty($_POST['phone'])?$row[2]:$_POST['phone'];
        $sid=empty($_POST['sid'])?$row[3]:$_POST['sid'];
        $cid=$_POST['cid'];

        $ciEdit->bind_param("ssii",$em,$ph,$sid,$cid);
        $result = $ciEdit->execute();
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