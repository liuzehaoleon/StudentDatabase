<html>
<body>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Edit data for student</p>
<form method="post">
    
    <!-- <a href="student/studentEdit.php">edit student</a><br/> -->
    
    <!-- <?php if(!$_SESSION["isStudent"]):?> //so that student can only change their information-->
    <label for='sid'>Editing student information with student ID:</label>
    <input type='text' id='sid' name='sid'>
    <!-- <?php else: ?>
    <label for='sid'>Editing student information with student ID:</label>
    <input type='text' id='sid' name='sid' value='193074000' readonly>
    <?php endif; ?> -->
    <br>
    <label for='sname'>Student Name:</label>
    <input type='text' id='sname' name='sname'>
    <label for='country'>Home Country:</label>
    <input type='text' id='country' name='country'>
    <label for='bdate'>Birth Date:</label>
    <input type='text' id='bdate' name='bdate'>
    <label for='ayear'>Admission Year:</label>
    <input type='text' id='ayear' name='ayear'>
    <input type="submit" value="editTheRecord">
    <br>
</form>

<?php

// ||isset($_POST['sname'])||isset($_POST['country'])
// ||isset($_POST['bdate'])||isset($_POST['ayear'])
if(!empty($_POST['sid'])){//not run until user did enter any input and recall this PHP statement
    
    //find previous value of them
    $rowForUpdate="SELECT * FROM student WHERE student_id=".$_POST["sid"];
    $allRows = mysqli_query($conn,$rowForUpdate);//allRows fit the Update statement
    // $allRows = $conn->query($rowForUpdate); or can be write in this format

    //$result -> num_rows; or can be write in this format
    $isValidSid=mysqli_num_rows($allRows); //return 0 if no row match sid
    //return 1 if sid is found since sid is unique primary key 

    if($isValidSid==0)
        echo "There is no matched sid for edit";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by its PK

        //update if there no input, use orginal value
        $sn=empty($_POST['sname'])?$row[1]:$_POST['sname'];
        $hc=empty($_POST['country'])?$row[2]:$_POST['country'];
        $bd=empty($_POST['bdate'])?$row[3]:$_POST['bdate'];
        $ay=empty($_POST['ayear'])?$row[4]:$_POST['ayear'];
        $sid=$_POST['sid'];

        $sEdit->bind_param("sssii",$sn,$hc,$bd,$ay,$sid);
        $result = $sEdit->execute();
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