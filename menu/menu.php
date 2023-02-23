<!-- <?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant||Menu</title>
    <link rel="stylesheet" href="menu.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet"> -->
    <!-- <script src="https://kit.fontawesome.com/1f6f99be7a.js" crossorigin="anonymous"></script> -->
</head>

<body>
    <header class="header">
        <div class="navbar">
        <div class="navbar_items">
                    <a href="..\login\profile.php"><img src="..\login\profile.jpg" alt="Profile" title="Profile" class="profile_icone"></a>
                    <a href="..\contact_us\contact_us.php">CONTACT US</a>
                    <a href="..\menu\menu.php" class="menu">MENU</a>
                    <a href="..\about us\about.php">ABOUT US</a>
                    <a href="..\home\home-Copy.php" >HOME</a>
                </div>
        </div>
        
    </header>
    <h1 class="text-center">Select your type</h1>


    <div class="row d-flex justify-content-evenly m-5">
        <div class="col justify-content-center m-5">
        <a href="veg.php"><img src="veg.webp" alt="Veg Items" class="img rounded ms-5"></a>
        <h5 class="text-center"><a href="veg.php" class="text-center">Vegetarian</a></h5>
    </div>
    <div class="col justify-content-center m-5">
        <a href="non-veg.php"><img src="non-veg.png" alt="Non-veg Items" class="img rounded ms-5"></a>
        <h5 class="text-center"><a href="veg.php" class="text-center">Non-vegetarian</a></h5>
    </div>
    <div class="col justify-content-center m-5">
        <a href="chinese.php"><img src="chinese.jpg" alt="Chinese Items" class="img rounded ms-5"></a>
        <h5 class="text-center"><a href="veg.php" class="text-center">Chinese</a></h5>

    </div>
    </div>
</body>

</html>