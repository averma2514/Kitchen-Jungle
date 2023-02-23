<?php
    session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
        header("location: ..\login\login.php");
        exit;
    }
    include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
    $ph = $_SESSION['Phone'];
?>

<?php
include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';

$sql = "Select CustomerID from kj where Phone='$ph'";
$result = mysqli_query($conn, $sql);
while ($row = mysqli_fetch_row($result)) {
    $ID=$row[0];
}
include 'script.php';

echo "<script> grandTotal(); </script>";

// echo $grand2;


// if(isset($_POST['hidden_grand'])){
//     echo "set";
//     if($grand){
//         $a = $_POST['hidden_grand'];
//         echo $a;
//     }else{
//         echo "error";
//     }
// }



// session_start();
//     $data = isset($_POST['abc']);
//      if ($data)
//        {
//        $_SESSION['tabc'] = $_POST["abc"];//putting aray value in session
//        echo  $_SESSION['tabc'];
//        echo " is your array";
//         } 
//         else 
//         {
//         echo "no array supplied";
//        }

// $fn  = $_POST['fn'];
//    $str = $_POST['str'];
//    $file = fopen("script.php".$fn.".record","w");
//    echo fwrite($file,$str);
//    fclose($file);





// echo $grand;

echo "Order details<br>";
echo "Order_id = 1<br>";
echo "Customer_id = " . $ID."<br>";
?>


