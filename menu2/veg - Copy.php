<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
    // include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
    $ph = $_SESSION['Phone'];
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shopping Cart</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/33e495fb35.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="chinese.css">
</head>
<body>
  <header class="header">
    <div class="navbar0">
      <div class="navbar_items">
        <a href="..\login\profile.php"><img src="..\login\profile.jpg" alt="Profile" title="Profile" class="profile_icone"></a>
        <a href="..\contact_us\contact_us.php">CONTACT US</a>
        <a href="..\menu\menu.php" class="menu">MENU</a>
        <a href="..\about us\about.php">ABOUT US</a>
        <a href="..\home\home-Copy.php" >HOME</a>
    </div>
  </div>
</header>
    <nav class="navbar navbar-dark bg-dark" style = 'height: 100px'>
        <div class="container-fluid">
          <h2  style = 'color: white'>Kitchen Jungle  Vegetarian Menu</h2>
          <i class="fas fa-cart-arrow-down"></i>
        </div>
      </nav>
      
      <div class = 'container'>
        <div class = 'row'>
          <?php
            include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
            $menulistqry="SELECT * from menu where Categories ='veg'";
            $menulistres=mysqli_query($conn,$menulistqry);
            while ($menudata=mysqli_fetch_assoc($menulistres)) {
            ?>
              <div class = 'col-md-4 col-lg-4'>
                <div class="card" style="width: 18rem;">
                 	<img src="<?=$menudata['Icon']?>" class="card-img-top" alt="...">         
                  <div class="card-body">
                    <h3 class="card-title"><?php echo $menudata['Name'];?></h4>
                    <h4 class="card-text"><?php echo $menudata['Price'];?></h4>
                    <a class="btn btn-primary">Add to Cart</a>
                  </div>
                </div>    
              </div>
            <?php
            }
            mysqli_close($conn);
          ?>
        </div>
      </div>

      <div class="uk-overflow-auto container" style = 'width: 70%'>
        <table class="uk-table uk-table-hover uk-table-middle uk-table-divider">
            <thead>
                <tr>
                  <th class="uk-table-shrink"></th>
                  <th class="uk-table-small sty"><h3>ITEM</h3></th>
                  <th class="uk-table-small"></th>
                  <th class="uk-width-small sty"><h3>PRICE</h3></th>
                  <th class="uk-table-shrink uk-text-small sty"><h3>QUANTITY</h3></th>
                  <th class="uk-table-shrink uk-text-small sty"><h3>TOTAL</h3></th>
                </tr>
            </thead>
            
            <tr>
              <td><img class="uk-preserve-width uk-border-circle"  width="40" alt=""></td>
              <td class="uk-table-link">
              <h3 class ="item-name" ><strong>Grand-Total</strong></h3>
              </td>
              <td class="uk-text-truncate"><h3></h3></td>
              <td class="uk-text-truncate"><h3></h3></td>
              <td class="uk-text-truncate grand-total"><h3 name="grandtotal" method="POST"><strong>₹0</strong></h3></td>
              <p id="gd" type="text" name="gd"></p>
          </tr>
        </table>
    </div>
    <script> 
    
    
    </script>
    <?php require_once 'script.php'; ?>
      <!-- <script src = 'script.js'></script> -->
     <a type="button" href="order.php" class="submit-btn"><center class="text">PLACE ORDER</center></a>
</body>
</html>

