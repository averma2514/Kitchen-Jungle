<?php
 include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
 if(isset($_POST["add_to_cart"]))  
 {  
      if(isset($_SESSION["shopping_cart"]))  
      {  
           $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");  
           if(!in_array($_GET["id"], $item_array_id))  
           {  
                $count = count($_SESSION["shopping_cart"]);  
                $item_array = array(  
                     'item_id'               =>     $_GET["id"],  
                     'item_name'               =>     $_POST["hidden_name"],  
                     'item_price'          =>     $_POST["hidden_price"],  
                     'item_quantity'          =>     $_POST["quantity"]  
                );  
                $_SESSION["shopping_cart"][$count] = $item_array;  
           }  
           else  
           {  
                echo '<script>alert("Item Already Added")</script>';  
               //  echo '<script>window.location="test.php"</script>';  
           }  
      }  
      else  
      {  
           $item_array = array(  
                'item_id'               =>     $_GET["id"],  
                'item_name'               =>     $_POST["hidden_name"],  
                'item_price'          =>     $_POST["hidden_price"],  
                'item_quantity'          =>     $_POST["quantity"]  
           );  
           $_SESSION["shopping_cart"][0] = $item_array;  
      }  
 }  
 if(isset($_GET["action"]))  
 {  
     if($_GET["action"] == "delete")  
      {  
           foreach($_SESSION["shopping_cart"] as $keys => $values)  
           {  
                if($values["item_id"] == $_GET["id"])  
                {  
                     unset($_SESSION["shopping_cart"][$keys]);  
                    //  echo '<script>alert("Item Removed")</script>';  
                    //  echo '<script>window.location="test.php"</script>';  
                }  
           }  
      }  
 }  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Shopping Cart</title>
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

          <meta charset="UTF-8">
          <meta http-equiv="X-UA-Compatible" content="IE=edge">
          <meta name="viewport" content="width=device-width, initial-scale=1.0">

          
          <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
          <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.6.19/dist/css/uikit.min.css" />
          <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
          <script src="https://kit.fontawesome.com/33e495fb35.js" crossorigin="anonymous"></script>
          <link rel="stylesheet" href="chinese.css">
      </head>  
      <body>  
           <br />  
<!-- 
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
                    <input type="text" name="quantity" class="form-control" value="1">
                  </div>
                </div>    
              </div>
            <?php
            }
            mysqli_close($conn);
          ?>
        </div>
      </div> -->




           <div class="container" style="width:700px;">  
                
                <?php  
                include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
                $query = "SELECT * from menu where Categories ='veg'";  
                $result = mysqli_query($conn, $query);  
                if(mysqli_num_rows($result) > 0)  
                {  
                     while($row = mysqli_fetch_array($result))  
                     {  
                ?>  
                <div class="col-md-4">  
                     <form method="post" action="test.php?action=add&id=<?php echo $row["Menuid"]; ?>"> 
                     <!-- <?php  $row["Menuid"]; ?>  -->
                     <input type="hidden" name="id" value="<?php echo $row["Menuid"]; ?>" />  
                          <div style="border:1px solid #333; background-color:#f1f1f1; border-radius:5px; padding:16px;" align="center">  
                               <img src="<?php echo $row["Icon"]; ?>" class="img-responsive" /><br />  
                               <h4 class="text-info"><?php echo $row["Name"]; ?></h4>  
                               <h4 class="text-danger">₹ <?php echo $row["Price"]; ?></h4>  
                               <input type="text" name="quantity" class="form-control" value="1" />  
                               <input type="hidden" name="hidden_name" value="<?php echo $row["Name"]; ?>" />  
                               <input type="hidden" name="hidden_price" value="<?php echo $row["Price"]; ?>" />  
                               <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart" />  
                          </div>  
                     </form>  
                </div>  
                <?php  
                     }  
                }  
                ?>  
                <div style="clear:both"></div>  
                <br />  
                <h3>Order Details</h3>  
                <div class="table-responsive">  
                     <table class="table table-bordered">  
                          <tr>  
                               <th width="40%">Item Name</th>  
                               <th width="10%">Quantity</th>  
                               <th width="20%">Price</th>  
                               <th width="15%">Total</th>  
                               <th width="5%">Action</th>  
                          </tr>  
                          <?php   
                          if(!empty($_SESSION["shopping_cart"]))  
                          {  
                               $total = 0;  
                               foreach($_SESSION["shopping_cart"] as $keys => $values)  
                               {  
                          ?>  
                          <tr>  
                               <td><?php echo $values["item_name"]; ?></td>  
                               <td><?php echo $values["item_quantity"]; ?></td>  
                               <td>₹ <?php echo $values["item_price"]; ?></td>  
                               <td>₹ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2); ?></td>  
                               <td><a href="test.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>  
                          </tr>  
                          <?php  
                                    $total = $total + ($values["item_quantity"] * $values["item_price"]);  
                               }  
                          ?>  
                          <tr>  
                               <td colspan="3" align="right">Total</td>  
                               <td align="right">₹ <?php echo number_format($total, 2); ?></td>  
                               <td></td>  
                          </tr>  
                          <?php  
                          }  
                          ?>  
                     </table>  
                </div>  
           </div>  
           <br />  
      </body>  
 </html>