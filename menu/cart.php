<?php
session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
    include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
   


if (isset($_POST['remove'])){
    foreach ($_SESSION['cart'] as $keys => $value){
        if($value["name"] == $_POST["remove_name"])  
        {  
            print_r($keys);
            unset($_SESSION["cart"][$keys]);  
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            echo '<script>alert("Item Removed")</script>';  
            echo '<script>window.location="cart.php"</script>';  
        }
    }
}

if (isset($_POST['mod_quantity'])){
    foreach ($_SESSION['cart'] as $keys => $value){
        if($value["name"] == $_POST["item_name"])  
        {  
            $_SESSION['cart'][$keys]['quantity']=$_POST['mod_quantity'];
            echo '<script>window.location="cart.php"</script>';  
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">

    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</head>
<body class="bg-light">

<?php
    require_once ('php/header.php');
?>

<div class="container">
    <div class="row ">
        <span class="col-lg-7 text-center border rounded bg-secondary my-5">
            <h1>My Cart</h1>
        </span>
        <div class="col-lg-7">
            <table class="table">
                <thead class="text-center">
                    <tr>
                    <th scope="col">serial No.</th>
                    <th scope="col">Item Name</th>
                    <th scope="col">Item Price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Total</th>
                    <th scope="col"></th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php
                            if (isset($_SESSION['cart'])){
                                foreach($_SESSION['cart'] as $keys => $value){
                                    $sr=$keys+1;
                                    echo "
                                        <tr>
                                            <td>$sr</td>
                                            <td>$value[name]</td>
                                            <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                                            <td>
                                            <form action='cart.php' method='POST'>
                                                <input class='text-center iquantity' name='mod_quantity' onchange='this.form.submit();' type='number' value='$value[quantity]' min='1' max='10'>
                                                <input type='hidden' name='item_name' value='$value[name]'></td>
                                            </form>
                                            <td class='itotal'></td>
                                            <td>
                                                <form action='cart.php' method='POST'>
                                                    <button name='remove' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                                                    <input type='hidden' name='remove_name' value='$value[name]'>
                                                </form>
                                            </td>
                                        </tr>
                                    ";
                                    }
                                } 
                    ?>
                </tbody>
            </table>
        </div>
        <div class="col-lg-4 ms-4 details h-25">
            <div class="col bg-white">
                <div class="pt-4">
                        <h6>PRICE DETAILS</h6>
                        <hr>
                        <div class="row price-details">
                            <div class="col-6">
                                <h6>Amount Payable<p>(*including all taxes)</p></h6>
                            </div>
                            <div class="col-6">
                                <h6 id="gtotal" name="gtotal" value="0"></h6>
                            </div>
                        </div>
                </div>
            </div>
                <?php 
                    if(isset($_SESSION['cart'])){
                        $count = count($_SESSION['cart']);
                    // echo $count;
                    if($count>0){
                        ?>
                        <form action="..\payment\payment.php" method="POST">
                            <!-- <input type="hidden" name="gt" id="gt" value=""> -->
                            <button name="pay"  class="btn btn-primary submit_button">PROCEED TO PAY</button>
                        </form>
                        <?php
                    }
                    }
                ?>
            </div>
        </div>
    </div>
</div>
<script>
    var gt=0;
    var iprice = document.getElementsByClassName('iprice');
    var iquantity = document.getElementsByClassName('iquantity');
    var itotal = document.getElementsByClassName('itotal');
    var gtotal = document.getElementById('gtotal');
    
    console.log(iprice.value)
    console.log(iquantity)
    console.log(itotal)

    function subTotal(){
        for(i=0;i<iprice.length;i++){
            itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);
            gt=gt+(iprice[i].value)*(iquantity[i].value);
        }
        gtotal.innerText='₹ '+gt;
        // document.getElementById('gt').value = gt;

    }

    subTotal();

</script>

</body>
</html>
