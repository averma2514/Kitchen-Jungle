<?php
$apiKey = "rzp_test_dW2rzBkcZNQrWD";
?>

<script src="https://code.jquery.com/jquery-3.5.0.js" integrity="sha256-r/AaFHrszJtwpe+tHyNi/XCfMxYpbsRg2Uqn0x3s2zc=" crossorigin="anonymous"></script>
</script>
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
    $sql_name = "SELECT Name from `kj` where Phone = $ph";
    $temp = mysqli_query($conn, $sql_name);
    while ($row0 = mysqli_fetch_row($temp)) {
        $customer_name = $row0[0];
    }
    
    $sql_email = "SELECT Email from `kj` where Phone = $ph";
    $temp = mysqli_query($conn, $sql_email);
    while ($row0 = mysqli_fetch_row($temp)) {
        $customer_email = $row0[0];
    }

    $gt=0;

    foreach($_SESSION['cart'] as $key=>$values){
        $gt = $gt+$values['Price']*$values['quantity'];
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
                }else{
                    echo '<script>
                    alert("Somethings wrong");
                    </script>';
                }
            }
            ?>
            <form action="success.php" method="POST" >
            <script
                src="https://checkout.razorpay.com/v1/checkout.js"
                data-key="<?php echo $apiKey; ?>" // Enter the Test API Key ID generated from Dashboard → Settings → API Keys
                data-amount="<?php echo $gt*100; ?>" // Amount is in currency subunits. Hence, 29935 refers to 29935 paise or ₹299.35.
                data-currency="INR"// You can accept international payments by changing the currency code. Contact our Support Team to enable International for your account
                data-order_id=""// Replace with the order_id generated by you in the backend.
                data-buttontext="Pay with Razorpay"
                data-name="kitchen Jungle"
                data-description=""
                data-image="..\about us\kitchen.jpg"
                data-prefill.name="<?php echo $customer_name; ?>"
                data-prefill.email="<?php echo $customer_email; ?>"
                data-prefill.phone="<?php echo $ph; ?>"
                data-theme.color="#F37254"
            >  
            </script>
            <input type="hidden" name="order_id" value="<?php echo $Order_ID ?>">
            <style>.razorpay-payment-button{display:none;}</style>
            <script type="text/javascript">
             $(document).ready(function(){
                $('.razorpay-payment-button').click();
            });
            </script>
            </form>
            <?php
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
