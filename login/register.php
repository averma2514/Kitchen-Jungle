<?php
if(isset($_POST['name'])){
include 'connection.php';
$exist = false;
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST["cpassword"];

    $existsql= "select * From `kj` where Phone='$phone'";
    $result=mysqli_query($conn, $existsql);
    $num = mysqli_num_rows($result);
    if ($num == 0)
    {
        $sql="INSERT INTO `Kitchen jungle`.`kj` (`Name`, `Phone`, `Email`, `Password`, `Date`) VALUES ('$name', '$phone', '$email', '$password', current_timestamp());";
        $result=mysqli_query($conn,$sql);
        showError("register successfully");
        
    }
    else{
        showError("user already exist");
    }
    mysqli_close($conn);
}
?>