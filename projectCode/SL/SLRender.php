<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Showing data in specialization table</p>
<form method="post">
    <label for='slid'>Enter student ID you want to search:</label>
    <input type='text' id='slid' name='slid'>
    <input type="submit" value="findTheStudent">
</form>

<?php
if(!empty($_POST['slid'])){//not run until user did enter any input and recall this PHP statement
    $slSearch->bind_param("i",$_POST["slid"]);
    
    // $allRows = mysqli_query($conn,$slSearch);//allRows fit the Update statement
    // $allRows = $conn->query($rowForUpdate); or can be write in this format
    $result=$slSearch->execute();
    $allRows=$slSearch->get_result();
    // $allRows = mysqli_query($conn,$slSearch);

    //$result -> num_rows; or can be write in this format
    $isValidSlid=mysqli_num_rows($allRows);

    if($isValidSlid==0)
        echo "There is no matched slid";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by it PK
        printf ("The specialization information is %10s %10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3],$row[4]);
    }
}
?>
<br><br>
<?php
$sql = "SELECT * FROM specialization";
printf ("All information in specialization table is followed: <br>");
echo("specialization_id, specialization_name, level, complete_year, student_id <br>");
if ($allRows = $conn -> query($sql)) {
  while ($row = $allRows -> fetch_row()) {
    printf ("%10s %10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3],$row[4]);
    echo "<br>"; //change to next line in frontEnd
  }
  $allRows -> free_result();
}
?><br/>

<?php
$conn->close();
?>
<a href="../index.php">goback</a><br/>