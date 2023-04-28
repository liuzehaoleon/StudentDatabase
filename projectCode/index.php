<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group1 demo</title>
</head>
<body>
<?php require_once "func/_function.php";?> 
<?php require_once "func/connect.php";?>

    <?php  //set global variable and session value
    session_start();
    //auto logOut Failed
    
    // if (isset($_SESSION['last_activity']) && time() - $_SESSION['last_activity'] > 3) {
    //     // last request was more than 15 minutes ago
    //     session_unset(); // unset $_SESSION variable for the run-time
    //     session_destroy(); // destroy session data in storage
    //     header("Location: " . "logIn.php"); // redirect to login page
    //   }
    //   $_SESSION['last_activity'] = time(); // update last activity time stamp

    if (isset($_POST['type'])){ //a kind of means user come from login pages
        //session remember this since user go back to index page each row need this
        $_SESSION["isAdmin"]=$_POST['type']=="admin";
        $_SESSION["isStudent"]=$_POST['type']=="student";
        $_SESSION["isAdvisor"]=$_POST['type']=="advisor";
        $_SESSION["isProfessor"]=$_POST['type']=="professor";
        $_SESSION["isService"]=$_POST['type']=="service";
        $_SESSION["logged"]=true;
        if($_POST['type']==''||$_POST["uname"]=='') //no identity enter will no be accepted
            header("Location: " . "func/logOut.php");
    }
    ?>

    <!-- 2. Sanitize user input: filter login input -->
    <?php 
    if(isset($_POST['login'])){
        //remember user account/name into session, not the password
        $_SESSION["uname"]=filter($_POST["uname"]); 
        $_POST["psw"]=filter($_POST["psw"]);
    }
    ?>

    <!-- 1. Use parameterized queries or prepared statements -->
    <?php //compare password and identity by PK account name
    if(isset($_POST['uname'])==1){ //that means user come from login page
        $check=$conn->prepare("SELECT * FROM users WHERE user_account=?"); // for demo we take out prepare statement
        $check->bind_param("s",$_POST["uname"]);
        $result=$check->execute();
        $allRows=$check->get_result();

        $isValidAccount=mysqli_num_rows($allRows);
        if(!$isValidAccount)
            header("Location: " . "func/logOut.php");
        else
        $row = mysqli_fetch_row($allRows);
        // echo $row[0],$row[1];
        if ($row[1]!= $_POST['type'] || $row[2]!=$_POST["psw"])
            header("Location: " . "func/logOut.php");
    }
    ?>

    <h1>Student information management system</h1>

    <?php 
    if (!$_SESSION['logged'])
        header("Location: " . "func/logIn.php");
    ?>

    <?php    
    echo "Welcome, ".$_SESSION["uname"];
    echo "<br>";

    //calculate number of times user visits
    if (empty($_SESSION['pid']))
        $_SESSION['pid'] = 1;
    else
        $_SESSION['pid'] ++;
    echo "this is your ".$_SESSION['pid']." times visit this page";
    ?>

    <!-- 3. Use least privilege access: different identity have differece access -->
    <h3>Student</h3>
    <a href="student/studentRender.php">show student</a><br/>  
    
    <?php if($_SESSION["isAdvisor"]||$_SESSION["isAdmin"]||$_SESSION["isProfessor"]):?>
    <a href="student/studentInsert.php">add student</a><br/>   
    <a href="student/studentDelete.php">delete student</a><br/> 
    <?php endif; ?>

    <?php if($_SESSION["isStudent"]||$_SESSION["isAdmin"]):?>
    <a href="student/studentEdit.php">edit student</a><br/>
    <?php endif; ?>

    <h3>Student Contact Information</h3>
    <a href="CI/CIRender.php">show CI</a><br/>
    
    <?php if($_SESSION["isStudent"]||$_SESSION["isAdmin"]):?>
    <a href="CI/CIInsert.php">add CI</a><br/> 
    <a href="CI/CIDelete.php">delete CI</a><br/>   
    <a href="CI/CIEdit.php">edit CI</a><br/>
    <?php endif; ?>
    
    <h3>Specification</h3>
    <a href="SL/SLRender.php">show specification</a><br/>

    <?php if($_SESSION["isAdvisor"]||$_SESSION["isAdmin"]):?>
    <a href="SL/SLInsert.php">add specification</a><br/>
    <a href="SL/SLDelete.php">delete specification</a><br/>
    <a href="SL/SLEdit.php">edit specification</a><br/>
    <?php endif; ?>

    <h3>Scholoarship</h3>
    <?php if($_SESSION["isStudent"]||$_SESSION["isService"]||$_SESSION["isAdmin"]):?>
    <a href="SS/SSRender.php">show scholoarship</a><br/>
    <?php endif; ?>

    <?php if($_SESSION["isService"]||$_SESSION["isAdmin"]):?>
    <a href="SS/SSInsert.php">add scholoarship</a><br/>
    <a href="SS/SSDelete.php">delete scholoarship</a><br/>   
    <a href="SS/SSEdit.php">edit scholoarship</a><br/>
    <?php endif; ?>

    <br>
    <br>
    <a href="logIn.php">log out</a><br/>

    <!-- 4. Limit error messages: each action doesnot raise error
    & cannot login without certificated identity (no session id): can not direct go to page without session[logged]
    & user logout cleared all session imformation -->
    </body>
</html>