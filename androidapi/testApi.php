<?php
	ini_set('display_errors', 1); 
	ini_set('display_startup_errors', 1); 
	error_reporting(E_ALL);
	
	
	$url = "http://myyhospital.com/androidapi/MyyHospitalApi.php";
	
	
	//Yollayacağınız veri
	$data = array(
	'yuklemeKodu' => 'AWDx#^6+gwPFCYM&cam2TAKnabrh#RegAl',
	'islem' => 'ISLEM_SIFREMI_UNUTTUM',
	'g0'=>'18391864910',
	'g4'=>'ahmetburcoglu2@gmail.com',
	'g7'=>'5455916617'
	);
	
 
	
	$ch = curl_init( $url );
	$payload = json_encode( array( "Gonderilecek_Veriler"=> $data ) );
	curl_setopt( $ch, CURLOPT_POSTFIELDS, $payload );
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	curl_setopt( $ch, CURLOPT_POST, 1);
	$result = curl_exec($ch);
	curl_close($ch);
	


	echo $result; // Dönen veri
	
	
	
	
?>
