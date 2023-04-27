<?php
session_start();
if(!isset($_SESSION['logged'])) 
  header("Location: "."../func/logOut.php");
?>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>

<p>Showing data in scholarship table</p>
<form method="post">
    <label for='ssid'>Enter scholarship ID you want to search:</label>
    <input type='text' id='ssid' name='ssid'>
    <input type="submit" value="findTheScholarship">
</form>

<?php
if(!empty($_POST['ssid'])){//not run until user did enter any input and recall this PHP statement
    $ssSearch->bind_param("i",$_POST["ssid"]);

    // $allRows = mysqli_query($conn,$ssSearch);//allRows fit the Update statement
    // $allRows = $conn->query($rowForUpdate); or can be write in this format
    $result=$ssSearch->execute();
    $allRows=$ssSearch->get_result();

    //$result -> num_rows; or can be write in this format
    $isValidSid=mysqli_num_rows($allRows); //return 0 if no row match sid
    //return 1 if sid is found since sid is unique primary key 

    if($isValidSid==0)
        echo "There is no matched ssid";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by it PK
        printf ("The scholarship information is %10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3]);
    }
}
?>
<br><br>
<?php
$sql = "SELECT * FROM scholarship";
printf ("All information in scholoarship table is followed: <br>");
echo("scholarship_id, scholarship_name, level, complete_year, student_id <br>");
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