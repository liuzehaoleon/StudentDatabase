<?php
function timer($time){
    if(time() - $time > 5) { //subtract new timestamp from the old one
        echo"<script>alert('15 Minutes over!');</script>";
        header("Location: " . "login.php"); //redirect to index.php
        exit;
    }
}

function filter($input){
    $input = trim($input);//remove spaces
    $input = stripslashes($input);//Strip backslashes (\)
    $input = htmlspecialchars($input);//input html and js scripts are transcoded
    return $input;
}

function logout(){ //back to login page or timer called lead to log out page
    session_start();
    session_destroy();
    // session_unset();
    // session_write_close();
    // setcookie(session_name(),'',0,'/');
}
?>
