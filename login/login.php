<?php
include 'login1.php';
include 'register.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login page</title>
    <link rel="stylesheet" href="longin.css">
    <script src="login&register.js"></script>
    <script src="formValidation.js"></script>
</head>
<body>
    
    <div class="container">
        <div class="form-box">
             <div class="button-box">
                 <div id="btn"></div>
                <button type="button" class="toggle-btn" onclick="login()">Log In</button>
                <button type="button" class="toggle-btn" onclick="register()">Register</button>
             </div>
        
        <?php
        function showError($message){
            echo "<script>
            alert('$message');
        </script>";
        }
        ?>
            <form  id="login" method="POST" class="input-group">
                <input type="text" name="phone_login" maxlength="10" id="phone_login" class="input-field" placeholder="Phone Number" required>
                <input type="password" name="password_login" maxlength="20" id="password_login" class="input-field" placeholder="Enter Password" required>
                <input type="checkbox" class="check-box"><span>Remember Password</span>  
                <button type="submit" class="submit-btn">Log in</button>
            </form>
            <form  onsubmit="return formValidation(this)" method="POST" id="register" class="input-group">
                <input type="text" name="name" id="name" maxlength="20" class="input-field" placeholder="name" required>
                <input type="text" name="phone" id="phone" maxlength="10" class="input-field" placeholder="Contact Number" required>
                <input type="text" name="email" id="email" maxlength="50" class="input-field" placeholder="Email Id" required>
                <input type="password" name="password" id="password" maxlength="20" class="input-field" placeholder="Enter password" required>
                <input type="password" name="cpassword" id="cpassword" maxlength="20" class="input-field" placeholder="conform Enter password" required>
                <button type="submit" class="submit-btn">Register</button>
            </form>

    </div>
    </div>
</body>
</html>

<script>
    var x= document.getElementById("login");
    var y= document.getElementById("register");
    var z= document.getElementById("btn");

function register(){
    x.style.left="-400px";
    y.style.left="50px";
    z.style.left="110px";
}

function login(){
    x.style.left="50px";
    y.style.left="450px";
    z.style.left="0px";
}
</script>
