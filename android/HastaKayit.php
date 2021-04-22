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


        $HastaTC = $_GET['HastaTC'];
    	$HastaParola = $_GET['HastaParola'];
      	$HastaAd = $_GET['HastaAd'];
      	$HastaSoyad = $_GET['HastaSoyad'];
    	$HastaEmail = $_GET['HastaEmail'];
      	$HastaYas = $_GET['HastaYas'];
      	$HastaKan = $_GET['HastaKan'];
    	$HastaTel = $_GET['HastaTel'];
      	$HastaAdres = $_GET['HastaAdres'];

		if($HastaTC == '' || $HastaParola == '' || $HastaAd == '')
		{
	
		echo 'please fill all values';

		}
		else{

		$sql = "SELECT * FROM HastaBilgiler WHERE HastaTC='$HastaTC'";

	        $check = mysqli_fetch_array(mysqli_query($conn,$sql));

		if(isset($check)){

		echo 'Hasta zaten kayıtlı';

		}else{
		$sql = "INSERT INTO `HastaBilgiler`(`HastaTC`, `HastaParola`, `HastaAd`, `HastaSoyad`, `HastaEmail`, `HastaYas`, `HastaKan`, `HastaTel`, `HastaAdres`) VALUES ('$HastaTC', '$HastaParola', '$HastaAd', '$HastaSoyad', '$HastaEmail', '$HastaYas', '$HastaKan', '$HastaTel', '$HastaAdres')";

		if(mysqli_query($conn,$sql)){

			echo 'successfully registered';
	
	}
		else{
				
			echo 'oops! Please try again!';
		
		}
}
			
	        mysqli_close($conn);

		}

