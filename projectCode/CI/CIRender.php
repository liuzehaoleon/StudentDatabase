<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>
<?php require_once "../func/checkState.php";?>

<p>Showing data in contact information table</p>
<form method="post">
    <label for='ciid'>Enter CI ID you want to search:</label>
    <input type='text' id=ciid name='ciid'>
    <input type="submit" value="findTheCI">
</form>

<?php
if(!empty($_POST['ciid'])){
    $ciSearch->bind_param("i",$_POST["ciid"]);
    
    $result=$ciSearch->execute();
    $allRows=$ciSearch->get_result();

    $isValidCiid=mysqli_num_rows($allRows); 

    if($isValidCiid==0)
        echo "There is no matched ciid";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by it PK
        printf ("The specialization information is %10s %10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3],$row[4]);
    }
}
?>
<br><br>
<?php
$sql = "SELECT * FROM contact_information";
printf ("All information in contact information table is followed: <br>");
echo("CI_id, email, phone, student_id <br>");
if ($allRows = $conn -> query($sql)) {
  while ($row = $allRows -> fetch_row()) {
    printf ("%10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3]);
    echo "<br>"; //change to next line in frontEnd
  }
  $allRows -> free_result();
}
?><br/>

<?php
$conn->close();
?>
<a href="../index.php">goback</a><br/>