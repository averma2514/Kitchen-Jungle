<?php
$login = false;
if(isset($_POST['phone_login'])){
    include 'connection.php';
    $phone_login = $_POST["phone_login"];
    $password = $_POST["password_login"]; 

    $sql = "Select * from kj where Phone='$phone_login' and Password='$password'";
    $result = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($result);

    if ($num == 1){
                $login = true;
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['Phone'] = $phone_login;               
                header("location: ..\home\home-Copy.php");
            }       
    else{
        showError("Wrong Phone number or password");
    }
    mysqli_close($conn);
} 
?>