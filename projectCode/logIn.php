<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Group1 demo</title>
</head>
<body>
<?php require_once "func/_function.php";?> 
    <h1>Student information management system</h1>
    <h3>Log in page</h3>
    <!-- <h3> userType: admin, student, advisor, professor, service -->
    
    <?php //destroy the orginal session to improve security
    logout();
    ?>

    <form  method="post" action="index.php">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <label for="type">Indentity:</label>
            <select name="type">
                <!-- <optgroup label='human'> -->
                <option value=''></option>
                <option value='admin'>Adminstrator</option>
                <option value='student'>Student</option>
                <option value="advisor">Advisor</option>
                <option value="professor">Professor</option>
                <option value="service">Service</option>
                <!-- </optgroup> -->
            </select>
            <br>
            <!-- javascript:alert("hacked") -->
            <label for="uname"><b>Username:</b></label>
            <input id="uname" type="text" placeholder="Enter Username" name="uname" value="" required>

            <label for="psw"><b>Password:</b></label>
            <input type="password" placeholder="Enter Password" id="psw" name="psw" value="what do you want?" required>

            <p id="demo" value="what's up"></p>
            
            <input type="submit" name="login" button="LogIN">
            <label>
            <input type="checkbox" checked="checked" name="remember"> Remember me
            </label>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" class="cancelbtn">Cancel</button>
            <a href="#">Forgot password?</a>
        </div>

    </form>
    </body>
</html>