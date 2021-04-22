<?php
	
	try {
		$db = new PDO("mysql:host=localhost;dbname=myyhospital_1", "myyhospital_user", "qgR-@1xk8RGm");
		if (!$db){
			die("Veritabanına bağlanırken biraz problem yaşıyoruz PDO Hatası! ");
		}
	}
	catch ( PDOException $e ){
		print $e->getMessage();
	}
	
?>