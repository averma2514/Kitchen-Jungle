<?php
session_start();

include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
if(isset($_POST['order_id'])){
    $order_id = $_POST['order_id'];
    echo "order placed successfully ";

    $sql="UPDATE `order` SET `Payment_status`= 1 WHERE OrderID=$order_id";
    mysqli_query($conn,$sql);
    unset ($_SESSION['cart']);
}

?>