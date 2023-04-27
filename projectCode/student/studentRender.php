<?php
session_start();
if(!isset($_SESSION['logged'])) 
  header("Location: "."../func/logOut.php");
?>

<?php require_once "../func/connect.php";?>
<?php require_once "../func/preState.php";?>

<p>Showing data in student table</p>
<form method="post">
    <label for='sid'>Enter student ID you want to search:</label>
    <input type='text' id='sid' name='sid'>
    <input type="submit" value="findTheStudent">
</form>

<?php
if(!empty($_POST['sid'])){//not run until user did enter any input and recall this PHP statement
      
    $sSearch->bind_param("i",$_POST["sid"]);
    // $allRows = mysqli_query($conn,$sSearch);//allRows fit the Update statement
    // $allRows = $conn->query($rowForUpdate); or can be write in this format
    $result=$sSearch->execute();
    $allRows=$sSearch->get_result();

    //$result -> num_rows; or can be write in this format
    $isValidSid=mysqli_num_rows($allRows); //return 0 if no row match sid
    //return 1 if sid is found since sid is unique primary key 

    if($isValidSid==0)
        echo "There is no matched sid";
    else{
        $row = mysqli_fetch_row($allRows);//since only one row is found by it PK
        printf ("The student information is %10s %10s %10s %10s %10s", $row[0], $row[1],$row[2],$row[3],$row[4]);
    }
}
?>
<br><br>
<?php
$sql = "SELECT * FROM Student";
printf ("All information in Student table is followed: <br>");
echo("student_id, student_name, home_country, birth_date, admission_year <br>");

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