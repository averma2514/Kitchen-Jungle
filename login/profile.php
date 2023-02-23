<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
    include 'connection.php';
    $ph = $_SESSION['Phone'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Profile</title>
	<link rel="stylesheet" href="profile.css">
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan+2:wght@400;700&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
<header class="header">
    <div class="navbar">
      <div class="navbar_items">
        <a href="..\login\profile.php"><img src="..\login\profile.jpg" alt="Profile" title="Profile" class="profile_icone"></a>
        <a href="..\contact_us\contact_us.php">CONTACT US</a>
        <a href="..\menu\menu.php" >MENU</a>
        <a href="..\about us\about.php">ABOUT US</a>
        <a href="..\home\home-Copy.php" >HOME</a>
    </div>
    </div>
</header>
<div class="wrapper">
    <div class="left">
        <!-- <img src="" alt="user" width="100"> -->
        <h4>User Name</h4><?php 
        $sql = "Select Name from kj where Phone='$ph'";
        $result = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_row($result)) {
            printf("%s \n", $row[0]);
        }
        ?>
    </div>
    <div class="right">
        <div class="info">
            <h3>Information</h3>
            <div class="info_data">
                 <div class="data">
                    <h4>Email</h4>
                        <p><?php 
                            $sql = "Select Email from kj where Phone='$ph'";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_row($result)) {
                                printf("%s \n", $row[0]);
                            }
                        ?></p>
                 </div>
                 <div class="data">
                   <h4>Phone</h4>
                    <p><?php echo $_SESSION['Phone']?></p>
              </div>
            </div>
        </div>
        <div>
            <a href="logout.php">Log out</a>
        <div>

      
      <!-- <div class="projects">
            <h3>Projects</h3>
            <div class="projects_data">
                 <div class="data">
                    <h4>Recent</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                 </div>
                 <div class="data">
                   <h4>Most Viewed</h4>
                    <p>dolor sit amet.</p>
              </div>
            </div>
        </div>
      
        <div class="social_media">
            <ul>
              <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li><a href="#"><i class="fab fa-instagram"></i></a></li>
          </ul>
      </div> -->
    </div>
</div>

</body>
</html>
