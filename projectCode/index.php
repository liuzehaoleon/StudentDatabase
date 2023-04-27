<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group1 demo</title>
</head>
<body>
<?php require_once "func/_function.php";?> 

    <?php  //set global variable and session value
    session_start();
    if (isset($_POST['type'])){
        $_SESSION["isAdmin"]=$_POST['type']=="admin";
        $_SESSION["isStudent"]=$_POST['type']=="student";
        $_SESSION["isAdvisor"]=$_POST['type']=="advisor";
        $_SESSION["isProfessor"]=$_POST['type']=="professor";
        $_SESSION["isService"]=$_POST['type']=="service";
        $_SESSION["logged"]=true;
        if($_POST['type']=='')
            header("Location: " . "func/logOut.php");
    }
    $isAdmin=$_SESSION["isAdmin"];
    $isStudent=$_SESSION["isStudent"];
    $isAdvisor=$_SESSION["isAdvisor"];
    $isProfessor=$_SESSION["isProfessor"];
    $isService=$_SESSION["isService"];
    ?>

    <?php // filt login first
    if(isset($_POST['login'])){ 
        //we need to remeber user name but need to verfiy their password, not need keep remember their password
        // if(isset($_COOKIE["uname"])) { //上一个用户的信息
        //     setcookie("uname", "", time()-3);
        //     echo $_COOKIE["uname"];}
        // setcookie('uname',$_POST['uname'],time()+10); //6 minute to expire - 10 s to expire
        //initialize timer as we login
        $_SESSION["uname"]=filter($_POST["uname"]);
        $_POST["psw"]=filter($_POST["psw"]);
        // $_POST["psw"]=filter($_POST["psw"]);
    }
    if(!isset($_POST['timer']))
        $_SESSION["timer"]=time();
    timer($_SESSION["timer"]);
    ?>
    <h1>Student information management system</h1>
    <?php
    if(!isset($_SESSION["uname"])){
        header("Location: " . "func/logOut.php");
    }
    echo "Welcome, ".$_SESSION["uname"];
    echo "<br>";
    if (empty($_SESSION['pid'])){
    $_SESSION['pid'] = 1;
    }
    else{
    $_SESSION['pid'] ++;
    }
    echo "this is your ".$_SESSION['pid']." times visit this page";
    ?>

    <h3>Student</h3>
    <a href="student/studentRender.php">show student</a><br/>  
    
    <?php if($isAdvisor||$isAdmin):?>
    <a href="student/studentInsert.php">add student</a><br/>   
    <a href="student/studentDelete.php">delete student</a><br/> 
    <?php endif; ?>

    <?php if($isStudent||$isAdmin):?>
    <a href="student/studentEdit.php">edit student</a><br/>
    <?php endif; ?>

    <h3>Student Contact Information</h3>
    <a href="CI/CIRender.php">show CI</a><br/>
    
    <?php if($isStudent||$isAdmin):?>
    <a href="CI/CIInsert.php">add CI</a><br/> 
    <a href="CI/CIDelete.php">delete CI</a><br/>   
    <a href="CI/CIEdit.php">edit CI</a><br/>
    <?php endif; ?>
    
    <h3>Specification</h3>
    <a href="SL/SLRender.php">show specification</a><br/>

    <?php if($isAdvisor||$isAdmin):?>
    <a href="SL/SLInsert.php">add specification</a><br/>
    <a href="SL/SLDelete.php">delete specification</a><br/>
    <a href="SL/SLEdit.php">edit specification</a><br/>
    <?php endif; ?>

    <h3>Scholoarship</h3>
    <?php if($isStudent||$isService||$isAdmin):?>
    <a href="SS/SSRender.php">show scholoarship</a><br/>
    <?php endif; ?>

    <?php if($isService||$isAdmin):?>
    <a href="SS/SSInsert.php">add scholoarship</a><br/>
    <a href="SS/SSDelete.php">delete scholoarship</a><br/>   
    <a href="SS/SSEdit.php">edit scholoarship</a><br/>
    <?php endif; ?>

    <br>
    <br>
    <a href="logIn.php">log out</a><br/>

    <!-- <script>
        window.onbeforeunload = function () {
    return "Do you really want to close?";
    };
    </script> -->
    </body>
</html>