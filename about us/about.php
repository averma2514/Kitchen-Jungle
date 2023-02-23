<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>About Us Section</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="navbar">
        <div class="navbar_items">
            <a href="..\login\profile.php"><img src="..\login\profile.jpg" alt="Profile" title="Profile" class="profile_icone"></a>
            <a href="..\contact_us\contact_us.php">CONTACT US</a>
            <a href="..\menu\menu.php">MENU</a>
            <a href="..\about us\about.php" class="about">ABOUT US</a>
            <a href="..\home\home-Copy.php">HOME</a>
        </div>
    </div>
    <div class="section">
        <div class="container">
            <div class="content-section">
                <div class="title">
                    <h1>About Us</h1>
                </div>
                <div class="content">
                    <h3>
                        The stylish contemporary interiors,comfortable and relaxed seating and ideal lighting, blend
                        seamlessly with an exceptional committed service to create a perfect Indian dining experience.
                        The interiors highlight unique features,the most prominent of which is the ‘wow’ kitchen,With
                        highly-trained staff providing engaging table service and personalized attention, thefriendly
                        and efficient ambience is ideal for all occasions like a family gathering, a businessmeet, or
                        just an intimate dinner for two.The setting is contemporary, casual and inviting,allowing guests to enjoy the
                        experience and create their own special moments.</p>
                        <div class="button">
                            <a href="">Explore Menu</a>
                        </div>
                </div>
                <div class="social">
                    <a href="https://www.facebook.com/"><i class="fab fa-facebook-f"></i></a>
                    <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
                    <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="image-section">
                <img src="kitchen.jpg">
            </div>
        </div>
    </div>


</body>

</html>