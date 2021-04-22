<?php
	
    $donut = array("basariDurumu" => true, "mesaj" => "hatacik");
	
    $VeriPaketi   = $_POST["Gonderilecek_Veriler"];
    $json_verisi  = json_decode($VeriPaketi , true);
	
	if(trim($VeriPaketi=="")){
		$VeriPaketi =file_get_contents('php://input');
		$json_verisi  = json_decode($VeriPaketi , true);
		
		$GELEN_IZIN_KODU	= $json_verisi["Gonderilecek_Veriler"]["yuklemeKodu"];
		$GELEN_ISLEM		= $json_verisi["Gonderilecek_Veriler"]["islem"]; 
		
		
		$HASTA_TC			= $json_verisi["Gonderilecek_Veriler"]["g0"]; 
		$HASTA_SIFRE		= $json_verisi["Gonderilecek_Veriler"]["g1"]; 
		$HASTA_AD			= $json_verisi["Gonderilecek_Veriler"]["g2"]; 
		$HASTA_SOYAD		= $json_verisi["Gonderilecek_Veriler"]["g3"]; 
		$HASTA_EMAIL		= $json_verisi["Gonderilecek_Veriler"]["g4"]; 
		$HASTA_YAS			= $json_verisi["Gonderilecek_Veriler"]["g5"]; 
		$HASTA_KAN			= $json_verisi["Gonderilecek_Veriler"]["g6"]; 
		$HASTA_TEL			= $json_verisi["Gonderilecek_Veriler"]["g7"]; 
		$HASTA_ADRES		= $json_verisi["Gonderilecek_Veriler"]["g8"]; 
		
		$HASTA_DOKTOR		= $json_verisi["Gonderilecek_Veriler"]["r0"]; 
		$HASTA_TARIH		= $json_verisi["Gonderilecek_Veriler"]["r1"]; 
		$HASTA_SAAT			= $json_verisi["Gonderilecek_Veriler"]["r2"]; 
		$HASTA_BOLUM		= $json_verisi["Gonderilecek_Veriler"]["r3"];
		$HASTA_DOKTOR_ID	= $json_verisi["Gonderilecek_Veriler"]["r4"];
		
		$E_HASTA_DOKTOR		= $json_verisi["Gonderilecek_Veriler"]["e0"]; 
		$E_HASTA_TARIH		= $json_verisi["Gonderilecek_Veriler"]["e1"]; 
		$E_HASTA_SAAT		= $json_verisi["Gonderilecek_Veriler"]["e2"]; 
		$E_HASTA_BOLUM		= $json_verisi["Gonderilecek_Veriler"]["e3"];
		
		$OLAY_ID_SONUC		= $json_verisi["Gonderilecek_Veriler"]["o1"]; 
		$OLAY_ID_RAPOR		= $json_verisi["Gonderilecek_Veriler"]["o2"]; 
		$OLAY_ID_RECETE		= $json_verisi["Gonderilecek_Veriler"]["o3"];
		
		$HASTA_YORUM		= $json_verisi["Gonderilecek_Veriler"]["y0"];
		
	}
	else{
		$GELEN_IZIN_KODU	= $json_verisi["yuklemeKodu"];
		$GELEN_ISLEM		= $json_verisi["islem"]; 
		
		
		$HASTA_TC			= $json_verisi["g0"]; 
		$HASTA_SIFRE		= $json_verisi["g1"]; 
		$HASTA_AD			= $json_verisi["g2"]; 
		$HASTA_SOYAD		= $json_verisi["g3"]; 
		$HASTA_EMAIL		= $json_verisi["g4"]; 
		$HASTA_YAS			= $json_verisi["g5"]; 
		$HASTA_KAN			= $json_verisi["g6"]; 
		$HASTA_TEL			= $json_verisi["g7"]; 
		$HASTA_ADRES		= $json_verisi["g8"]; 
		
		$HASTA_DOKTOR		= $json_verisi["r0"]; 
		$HASTA_TARIH		= $json_verisi["r1"]; 
		$HASTA_SAAT			= $json_verisi["r2"]; 
		$HASTA_BOLUM		= $json_verisi["r3"];
		$HASTA_DOKTOR_ID	= $json_verisi["r4"];
		
		$E_HASTA_DOKTOR		= $json_verisi["e0"]; 
		$E_HASTA_TARIH		= $json_verisi["e1"]; 
		$E_HASTA_SAAT		= $json_verisi["e2"]; 
		$E_HASTA_BOLUM		= $json_verisi["e3"];
		
		$OLAY_ID_SONUC		= $json_verisi["o1"]; 
		$OLAY_ID_RAPOR		= $json_verisi["o2"]; 
		$OLAY_ID_RECETE		= $json_verisi["o3"];
		
		$HASTA_YORUM		= $json_verisi["y0"];
	}
	
	
	
	
	if ($GELEN_IZIN_KODU=="AWDx#^6+gwPFCYM&cam2TAKnabrh#RegVer"){
		
		
		include("veritabani/ayarlar.php");
		try {
			
			
			
			if  ($GELEN_ISLEM=="ISLEM_OTURUMAC"){
				
				$stmt = $db->prepare('SELECT * FROM HastaBilgiler WHERE HastaTC=:gelen_tc AND HastaParola=:gelen_sifre');
				$stmt->bindParam(':gelen_tc'	,  	$HASTA_TC		,  PDO::PARAM_INT);
				$stmt->bindParam(':gelen_sifre'	, 	$HASTA_SIFRE	,  PDO::PARAM_STR);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if($row)
				{
					$donut = array("basariDurumu" => false,"mesaj" => "#oturumacmabasarili#");
					
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#oturumacmabasarisiz#");
				}
				
				
			}
			else if ($GELEN_ISLEM=="ISLEM_KAYITOL"){
				
				$stmt = $db->prepare('SELECT * FROM HastaBilgiler WHERE HastaTC=:gelen_tc');
				$stmt->bindParam(':gelen_tc'	,  	$HASTA_TC		,  PDO::PARAM_INT);
				$stmt->execute();
				$row = $stmt->fetch(PDO::FETCH_ASSOC);
				
				if($row)
				{
					$donut = array("basariDurumu" => false,"mesaj" => "#kayitzatenvar#");
					//Kayıt var
				}
				else{
					$sql = "INSERT INTO HastaBilgiler (HastaTC,HastaParola,HastaAd,HastaSoyad,HastaEmail,HastaYas,HastaKan,HastaTel,HastaAdres) VALUES (?,?,?,?,?,?,?,?,?)";
					if($db->prepare($sql)->execute([$HASTA_TC,$HASTA_SIFRE,$HASTA_AD,$HASTA_SOYAD,$HASTA_EMAIL,$HASTA_YAS,$HASTA_KAN,$HASTA_TEL,$HASTA_ADRES]))
					{
						$donut = array("basariDurumu" => false,"mesaj" => "#kayitolmabasarili#");
					}
					else{
						$donut = array("basariDurumu" => false,"mesaj" => "#kayitolmabasarisiz#");	
					}
				}	
				
			}
			
			
			else if($GELEN_ISLEM=="ISLEM_GUNCELLE"){
				
				$sql = "UPDATE HastaBilgiler SET  HastaParola=?,HastaAd=?,HastaSoyad=?,HastaEmail=?,HastaYas=?,HastaKan=?,HastaTel=?,HastaAdres=? WHERE HastaTC=?";
				$stmt= $db->prepare($sql);
				$stmt->execute([$HASTA_SIFRE,$HASTA_AD,$HASTA_SOYAD,$HASTA_EMAIL,$HASTA_YAS,$HASTA_KAN,$HASTA_TEL,$HASTA_ADRES,$HASTA_TC,]);
				if($stmt){
					$donut = array("basariDurumu" => false,"mesaj" => "#guncellemebasarili#");	
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#guncellemehatasi#");	
				}
				
				
			}
			
			else if ($GELEN_ISLEM=="ISLEM_RANDEVUAL"){
				/*
					$stmt = $db->prepare('SELECT * FROM Randevular WHERE HastaTC=:gelen_tc AND Bolum=:gelen_bolum');
					$stmt->bindParam(':gelen_tc'	,  	$HASTA_TC			,  PDO::PARAM_INT);
					$stmt->bindParam(':gelen_bolum'	,  	$HASTA_BOLUM		,  PDO::PARAM_STR);
					$stmt->execute();
					$row = $stmt->fetch(PDO::FETCH_ASSOC);
					
					if($row)
					{
					$donut = array("basariDurumu" => false,"mesaj" => "#randevuzatenvar#");
					//Kayıt var
					
				else{*/
				
				
				/*
					$HASTA_TARIH_YIL=explode("-",$HASTA_TARIH)[2];
					$HASTA_TARIH_AY=explode("-",$HASTA_TARIH)[1];
					$HASTA_TARIH_GUN=explode("-",$HASTA_TARIH)[0];
					$HASTA_TARIH=$HASTA_TARIH_YIL."-".$HASTA_TARIH_AY."-".$HASTA_TARIH_GUN;
				*/
				$sql = "INSERT INTO Randevular (HastaTC,Bolum,DoktorID,DoktorAd,Tarih,Saat) VALUES (?,?,?,?,?,?)";
				if($db->prepare($sql)->execute([$HASTA_TC,$HASTA_BOLUM,$HASTA_DOKTOR_ID,$HASTA_DOKTOR,$HASTA_TARIH,$HASTA_SAAT]))
				{
					$donut = array("basariDurumu" => false,"mesaj" => "#randevualbasarili#");
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#randevualbasarisiz#");	
				}
				//}	
				
			}
			
			else if($GELEN_ISLEM=="ISLEM_RANDEVUGUNCELLE"){
				
				
				$sql = "UPDATE Randevular SET HastaTC=?,Bolum=?,DoktorID=?,DoktorAd=?,Tarih=?,Saat=? WHERE HastaTC=? AND Bolum=? AND DoktorAd=? AND Tarih=? AND Saat=?";
				$stmt= $db->prepare($sql);
				$stmt->execute([$HASTA_TC,$HASTA_BOLUM,$HASTA_DOKTOR_ID,$HASTA_DOKTOR,$HASTA_TARIH,$HASTA_SAAT,$HASTA_TC,$E_HASTA_BOLUM,$E_HASTA_DOKTOR,$E_HASTA_TARIH,$E_HASTA_SAAT]);
				if($stmt){
					$donut = array("basariDurumu" => false,"mesaj" => "#randvuguncellemebasarili#");	
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#randvuguncellemebasarisiz#");	
				}	
				
			}
			
			else if($GELEN_ISLEM=="ISLEM_RANDEVUSIL"){
				
				
				$sql = "DELETE FROM Randevular WHERE HastaTC=? AND Bolum=? AND DoktorAd=? AND Tarih=? AND Saat=?";
				$stmt= $db->prepare($sql);
				$stmt->execute([$HASTA_TC,$HASTA_BOLUM,$HASTA_DOKTOR,$HASTA_TARIH,$HASTA_SAAT]);
				if($stmt){
					$donut = array("basariDurumu" => false,"mesaj" => "#randevusilmebasarili#");	
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#randevusilmebasarisiz#");	
				}	
				
			}
			
			else if ($GELEN_ISLEM=="ISLEM_YORUMYAP"){
				
				$sql = "INSERT INTO Yorumlar (HastaTC,Yorum) VALUES (?,?)";
				if($db->prepare($sql)->execute([$HASTA_TC,$HASTA_YORUM]))
				{
					$donut = array("basariDurumu" => false,"mesaj" => "#yorumyapbasarili#");
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => "#yorumyapbasarisiz#");	
				}	
				
				
			}
			
		}
		catch(PDOException $e)
		{
			echo "HATA = " . $sql . "<br>" . $e->getMessage();
		}
		$db = null;
		
		
		
		
		
	}
	
	else if ($GELEN_IZIN_KODU=="AWDx#^6+gwPFCYM&cam2TAKnabrh#RegAl"){
		include("veritabani/ayarlar.php");
		
		
		if ($GELEN_ISLEM=="ISLEM_VERILERIAL"){
			$query = $db->prepare('SELECT * FROM HastaBilgiler WHERE HastaTC=? AND HastaParola=?');
			$query->execute(array($HASTA_TC,$HASTA_SIFRE));
			
			$C = $query->fetch(PDO::FETCH_ASSOC);
			if(!empty($C)) {
				
				$vv1=$C['HastaTC'];
				$vv2=$C['HastaParola'];
				$vv3=$C['HastaAd'];
				$vv4=$C['HastaSoyad'];
				$vv5=$C['HastaEmail'];
				$vv6=$C['HastaYas'];
				$vv7=$C['HastaKan'];
				$vv8=$C['HastaTel'];
				$vv9=$C['HastaAdres'];
				
				$donut = array("basariDurumu" => false,"mesaj" => 	"#VerileriAlBasarili#"."♥".$vv1."♥".$vv2."♥".$vv3."♥".$vv4."♥".$vv5."♥".$vv6."♥".$vv7."♥".$vv8."♥".$vv9 );	
				
			}
			else{
				$donut = array("basariDurumu" => false,"mesaj" => 	"#VerileriAlBasarisiz#");	
			}
		}
		else if ($GELEN_ISLEM=="ISLEM_BOLUMDOKTORAL"){
			
			$Bolumler="";
			$Doktorlar="";
			$DoktorBolum="";
			$query = $db->prepare('SELECT * FROM bolumler');
			$query->execute();
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					$Bolumler=$Bolumler.$olay["bolum"]."♥";
				}		
				$query = $db->prepare('SELECT * FROM DoktorBilgiler');
				$query->execute();
				$C = $query->fetchAll();
				if(!empty($C)) {
					foreach($C as $olay){
						$Doktorlar =$Doktorlar.$olay["DoktorID"]."♣".$olay["DoktorAd"]."♥";
						$DoktorBolum=$DoktorBolum.$olay["DoktorBolum"]."♥";
					}
				}
				else{
					$donut = array("basariDurumu" => false,"mesaj" => 	"#IslemBolumDoktorAlBasarisiz#");	
				}
				$Bolumler=mb_substr($Bolumler,0,-1);
				$Doktorlar=mb_substr($Doktorlar,0,-1);
				$DoktorBolum=mb_substr($DoktorBolum,0,-1);
				$SonVeri = $Bolumler . "↓" . $Doktorlar ."↓" . $DoktorBolum;
				$donut = array("basariDurumu" => false,"mesaj" => 	"#IslemBolumDoktorAlBasarili#↓".$SonVeri);	
			}
			else{
				$donut = array("basariDurumu" => false,"mesaj" => 	"#IslemBolumDoktorAlBasarisiz#");	
			}
			
		}
		else if ($GELEN_ISLEM=="ISLEM_RANDEVUBILGISIAL"){
			
			$Bolumler="";
			$DoktorIDler="";
			$Doktorlar="";
			$Tarihler="";
			$Saatler="";
			
			$ANAVERI="";
			
			
			$query = $db->prepare('SELECT * FROM Randevular');
			$query->execute();
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					if($olay["HastaTC"]==$HASTA_TC){
						
						$Bolumler=$Bolumler.$olay["Bolum"]."♥";
						$DoktorIDler=$DoktorIDler.$olay["DoktorID"]."♥";
						$Doktorlar=$Doktorlar.$olay["DoktorAd"]."♥";
						$Tarihler=$Tarihler.$olay["Tarih"]."♥";
						$Saatler=$Saatler.$olay["Saat"]."♥";
						
						
					}
				}		
				$Bolumler=mb_substr($Bolumler,0,-1);
				$DoktorIDler=mb_substr($DoktorIDler,0,-1);
				$Doktorlar=mb_substr($Doktorlar,0,-1);
				$Tarihler=mb_substr($Tarihler,0,-1);
				$Saatler=mb_substr($Saatler,0,-1);
				
				$ANAVERI=$Bolumler."↓".$DoktorIDler."↓".$Doktorlar."↓".$Tarihler."↓".$Saatler;
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemRandevuBilgisiAlBasarili#↓".$ANAVERI);
			}
			
			
			else{$donut = array("basariDurumu" => false,"mesaj" => "#IslemRandevuBilgisiAlBasarisiz#");
				
				
			}
			
			
			
			
		}
		else if ($GELEN_ISLEM=="ISLEM_RANDEVUSAATLERINIAL"){
			
			
			$Saatler="";
			
			$ANAVERI="";
			
	 
			$query = $db->prepare('SELECT * FROM Randevular WHERE Tarih=?');
			$query->execute(array(date('Y-m-d')));
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					if($olay["HastaTC"]==$HASTA_TC){
						
						
						$Saatler=$Saatler.$olay["Saat"]."♥";
						
						
					}
				}		
				
				$Saatler=mb_substr($Saatler,0,-1);
				
				$ANAVERI=$Saatler;
				$donut = array("basariDurumu" => false,"mesaj" => "#RandevuSaatAlBasarili#↓".$ANAVERI);
			}
			
			
			else{$donut = array("basariDurumu" => false,"mesaj" => "#RandevuSaatAlBasarisiz#");
				
				
			}
			
			
			
			
		}
		
		
		else if ($GELEN_ISLEM=="ISLEM_SONUCBILGISIAL"){
			$SonucIDler="";
			$query = $db->prepare('SELECT * FROM HastaSonuclar WHERE HastaTC=?');
			$query->execute(array($HASTA_TC));
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					if($olay["HastaTC"]==$HASTA_TC){
						$SonucIDler=$SonucIDler.$olay["SonucID"]."♥";
					}
				}		
				
				$SonucIDler=mb_substr($SonucIDler,0,-1);
				
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemSonucBilgisiAlBasarili#↓".$SonucIDler);
			}
			
			
			else{
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemSonucBilgisiAlBasarisiz#");
				
				
			}
			
		}
		else if ($GELEN_ISLEM=="ISLEM_RAPORBILGISIAL"){
			$SonucIDler="";
			$query = $db->prepare('SELECT * FROM HastaRaporlar WHERE HastaTC=?');
			$query->execute(array($HASTA_TC));
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					if($olay["HastaTC"]==$HASTA_TC){
						$SonucIDler=$SonucIDler.$olay["RaporID"]."♥";
					}
				}		
				
				$SonucIDler=mb_substr($SonucIDler,0,-1);
				
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemRaporBilgisiAlBasarili#↓".$SonucIDler);
			}
			
			
			else{
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemRaporBilgisiAlBasarisiz#");
				
				
			}
			
		}
		else if ($GELEN_ISLEM=="ISLEM_ILACBILGISIAL"){
			$SonucIDler="";
			$query = $db->prepare('SELECT * FROM HastaIlaclar WHERE HastaTC=?');
			$query->execute(array($HASTA_TC));
			$C = $query->fetchAll();
			if(!empty($C)) {
				foreach($C as $olay){
					if($olay["HastaTC"]==$HASTA_TC){
						$SonucIDler=$SonucIDler.$olay["IlacID"]."♥";
					}
				}		
				
				$SonucIDler=mb_substr($SonucIDler,0,-1);
				
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemIlacBilgisiAlBasarili#↓".$SonucIDler);
			}
			
			
			else{
				$donut = array("basariDurumu" => false,"mesaj" => "#IslemIlacBilgisiAlBasarisiz#");
				
				
			}
			
		}
		
		else if ($GELEN_ISLEM=="ISLEM_RESIMAL"){
			
			$ID_KIM="hata";
			$TABLOADI="";
			$IDADI="";
			
			if (!($OLAY_ID_RAPOR=="#yok#")){
				$ID_KIM=$OLAY_ID_RAPOR;
				$TABLOADI="HastaRaporlar";
				$IDADI="RaporID";
				
			}
			else if(!($OLAY_ID_RECETE=="#yok#")){
				$ID_KIM=$OLAY_ID_RECETE;
				$TABLOADI="HastaIlaclar";
				$IDADI="IlacID";
				
			}
			else if(!($OLAY_ID_SONUC=="#yok#")){
				$ID_KIM=$OLAY_ID_SONUC;
				$TABLOADI="HastaSonuclar";
				$IDADI="SonucID";
				
			}
			$Resim="";
			$query = $db->prepare('SELECT * FROM '.$TABLOADI.' WHERE HastaTC=? AND '.$IDADI.'=?');
			$query->execute(array($HASTA_TC,$ID_KIM));
			
			$C = $query->fetch(PDO::FETCH_ASSOC);
			if(!empty($C)) {
				
				$Resim=$C["ResimURL"];
				
				$donut = array("basariDurumu" => false,"mesaj" => "#ResimAlBasarili#↓".$Resim);
				
			}
			else{
				$donut = array("basariDurumu" => false,"mesaj" => "#ResimAlBasarisiz#↓");
			}
			
			
			
			
			
			
			
			
		}
		
		else if ($GELEN_ISLEM=="ISLEM_SIFREMI_UNUTTUM"){
			$query = $db->prepare('SELECT * FROM HastaBilgiler WHERE HastaTC=? AND HastaEmail=? AND HastaTel=?');
			$query->execute(array($HASTA_TC,$HASTA_EMAIL,$HASTA_TEL));
			$C = $query->fetch(PDO::FETCH_ASSOC);
			if(!empty($C)) {
				
				
				
				$Icerik ='
				<!DOCTYPE html>
				<html lang="en">
				<head>
				<title>Bootstrap Example</title>
				<meta charset="utf-8">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
				<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
				</head>
				<body>
				
				<div class="container">
				<div class="jumbotron">
				<h1><center><img src="http://www.108softwaretr.com/and/icon.png"/></center></h1>  <hr>    
				<p><center>Merhaba '.$C["HastaAd"]. ' ' . $C["HastaSoyad"]. '</center><br>
				
				<center>Şifreniz: <b>'.$C["HastaParola"].'</b></p></center>
				</div>
				
				</div>
				
				</body>
				</html>
				
				';
				
				
				
				
				try{
					require("class.phpmailer.php");
					$mail = new PHPMailer();
					$mail->IsSMTP();
					$mail->SMTPDebug = 1; // Hata ayıklama değişkeni: 1 = hata ve mesaj gösterir, 2 = sadece mesaj gösterir
					$mail->SMTPAuth = true; //SMTP doğrulama olmalı ve bu değer değişmemeli
					$mail->SMTPSecure = ''; // Normal bağlantı için boş bırakın veya tls yazın, güvenli bağlantı kullanmak için ssl yazın
					$mail->Host = "mail.myyhospital.com"; // Mail sunucusunun adresi (IP de olabilir)
					$mail->Port = 587; // Normal bağlantı için 587, güvenli bağlantı için 465 yazın
					$mail->IsHTML(true);
					$mail->SetLanguage("tr", "phpmailer/language");
					$mail->CharSet  ="utf-8";
					$mail->Username = "info@myyhospital.com"; // Gönderici adresiniz (e-posta adresiniz)
					$mail->Password = "gG5Zxl#S}uzW"; // Mail adresimizin sifresi
					$mail->SetFrom("info@myyhospital.com", "MyyHospital"); // Mail atıldığında gorulecek isim ve email
					$mail->AddAddress($C["HastaEmail"]); // Mailin gönderileceği alıcı adres
					$mail->Subject = "MyyHospital Şifremi Unuttum!"; // Email konu başlığı
					$mail->Body = $Icerik; // Mailin içeriği
					if(!$mail->Send()){
						$donut = array("basariDurumu" => false,"mesaj" => "#SifremiUnuttumBasarisiz#");
					} 
					else {
						$donut = array("basariDurumu" => false,"mesaj" => "#SifremiUnuttumBasarili#");
					}	
					
				}
				catch(Exception $e)
				{
					$donut = array("basariDurumu" => false,"mesaj" => "#SifremiUnuttumBasarisiz#");
				}
				
			}
			else{
				$donut = array("basariDurumu" => false,"mesaj" => "#SifremiUnuttumBasarisiz#");
			}
			
			
		}
		
	}
	else{
		$donut = array("basariDurumu" => false,"mesaj" => "#GecersizErisimKodu#");
	}
	echo json_encode($donut);
?>																																				