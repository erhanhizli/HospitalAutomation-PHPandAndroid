
<?php
$servername = "localhost";
$database = "myyhospital_1";
$username = "myyhospital_user";
$password = "qgR-@1xk8RGm";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

	<?php include('panelnav.php'); ?>
	
        <h1>Doktor PANEL</h1>
    
    
    
</body>
</html>