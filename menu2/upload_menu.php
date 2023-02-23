<!DOCTYPE html>
<html lang='eng'>
<head>
	<title>Image Upload</title>
	<link rel="stylesheet" type="text/css"	href="style.css" />
</head>

<body>
	<div id="content">
		<form method="POST" action="" enctype="multipart/form-data">
			<input type="file" name="uploadfile"  required>
			<input type="text" name="name"  maxlength="20" class="input-field" placeholder="Name" required>
			<input type="text" name="price" maxlength="10" class="input-field" placeholder="Price" required>
			<input type="text" name="Categories" maxlength="10" class="input-field" placeholder="Categories" required>
			<button type="submit" name="upload"> UPLOAD	</button>
		</form>
	</div>
</body>
</html>

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
		echo "done";
	
	mysqli_close($conn);
}
?>