<?php 
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
//  echo "hlo";

if(isset($_POST['pay'])){
    $ph = $_SESSION['Phone'];
    $sql_number = "SELECT CustomerID from `kj` where Phone = $ph";
    $temp = mysqli_query($conn, $sql_number);
    while ($row0 = mysqli_fetch_row($temp)) {
        $customerid = $row0[0];
    }
    
        $gt = 0;
    foreach($_SESSION['cart'] as $key=>$values){
        $gt = $values['Price']*$values['quantity'];
    }

    $query1 = "INSERT INTO `order`(`CustomerID`,`Amount`, `Date`, `Payment_status`) VALUES ('$customerid','$gt',current_timestamp(),0)";
    if(mysqli_query($conn,$query1)){
        $Order_ID = mysqli_insert_id($conn);
        // echo $Order_ID;
        $query2 = "INSERT INTO `sub_order`(`OrderID`,`Item_name`, `Price`, `Quantity`) VALUES (?,?,?,?)";
        $stmt = mysqli_prepare($conn,$query2);
        if($stmt){
            mysqli_stmt_bind_param($stmt,"isii",$Order_ID,$Item_name,$price,$quantity);
            foreach($_SESSION['cart'] as $key =>$values){
                $Item_name = $values['name'];
                $price = $values['Price'];
                $quantity = $values['quantity'];
                if(mysqli_stmt_execute($stmt)){
                    echo "<script>
                    alert('Order placed successfully');
                    </script>";
                    // header('location: index.php');
                }else{
                    echo '<script>
                    alert("Somethings wrong");
                    </script>';
                }

            }
            unset($_SESSION['cart']);
            // header('location: ..\payment\payment.php');
        }else{
            echo '<script>
            alert("Somethings wrong");
            </script>';
        }
    }else{
        echo '<script>
        alert("Somethings wrong");
        </script>';
    }
}

?>