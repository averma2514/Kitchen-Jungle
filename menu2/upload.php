<?php
// 	$tempname = $_FILES["uploadfile"]["tmp_name"];	
// 	echo $tempname;
// If upload button is clicked ...
if(isset($_POST['name'])) 
{
    include 'C:\xampp\htdocs\Kitchen_Jungle\coding\login\connection.php';
    // echo "<pre>";
	// print_r($_FILES['uploadfile']);
	// echo "</pre>";
	$filename = $_FILES["uploadfile"]["name"];
	$tempname = $_FILES["uploadfile"]["tmp_name"];	
	$name=$_POST['name'];
    $price=$_POST['price'];
	$Cate=$_POST['Categories'];
    
		$sql = "INSERT INTO menu (`Name`, `Price`, `Icon`, `Categories`) VALUES ('$name', '$price', '$filename','$Cate');";
		// Execute query
		$result=mysqli_query($conn,$sql);
	
	mysqli_close($conn);
}
?>