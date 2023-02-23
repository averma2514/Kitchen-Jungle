<?php
session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: ..\login\login.php");
    exit;
}


require_once ('C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php');
// require_once ('./php/component.php');

if (isset($_POST['add'])){
    if(isset($_SESSION['cart'])){
        $item_array_id = array_column($_SESSION['cart'], "product_id");
        if(in_array($_POST['product_id'], $item_array_id)){
            echo "<script>alert('Product is already added in the cart..!')</script>";
            echo "<script>window.location = 'non-veg.php'</script>";
        }else{
            $count = count($_SESSION['cart']);
            $item_array = array(
                'product_id' => $_POST['product_id'],
                'icon' => $_POST['icon'],
                'name' => $_POST['productname'],
                'Price' => $_POST['productprice'],
                'quantity' => 1
            );
            $_SESSION['cart'][$count] = $item_array;
        }
    }else{

        $item_array = array(
                'product_id' => $_POST['product_id'],
                'icon' => $_POST['icon'],
                'name' => $_POST['productname'],
                'Price' => $_POST['productprice'],
                'quantity' => 1
        );
        // Create new session variable
        $_SESSION['cart'][0] = $item_array;
        // print_r($_SESSION['cart']);
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
    <title>Shopping Cart</title>

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.8.2/css/all.css" />

    <!-- Bootstrap CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css">
    
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</head>
<body>


<?php require_once ("php/header.php"); ?>
<div class="container">
        <div class="row text-center py-5">
            <?php
            
                $sql = "SELECT * from menu where Categories ='non-veg'";
                $result = mysqli_query($conn, $sql);
            
                while ($row = mysqli_fetch_assoc($result)){
                    // component($row['Name'], $row['Price'], $row['Icon'], $row['Menuid']);
                    echo "
                    <div class='col-md-3 col-sm-6 my-3 my-md-3'>
                        <form action='non-veg.php' method='post'>
                            <div class='card shadow'>
                                <div>
                                    <img src='non-veg_img\\$row[Icon]' alt='Image1' name='icon' class='card-img-top img'>
                                    <input type='hidden' name='icon' value='$row[Icon]'>
                                </div>
                                <div class='card-body'>
                                    <h5 class='card-title' >$row[Name]</h5>
                                    <input type='hidden' name='productname' value='$row[Name]'>
                                    <h6>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='fas fa-star'></i>
                                        <i class='far fa-star'></i>
                                    </h6>
                                    <p class='card-text'>
                                        
                                    </p>
                                    <h5>
                                        <span class='price' >₹ $row[Price]</span>
                                        <input type='hidden' name='productprice' value='$row[Price]'>
                                    </h5>
                                    <button type='submit' class='btn btn-warning my-3' name='add'>Add to Cart <i class='fas fa-shopping-cart'></i></button>
                                    <input type='hidden' name='product_id' value='$row[Menuid]'>
                                </div>
                            </div>
                        </form>
                    </div>
                    ";
                }
            ?>
        </div>
</div>
</body>
</html>
