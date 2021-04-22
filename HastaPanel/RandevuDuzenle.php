<?php
session_start();
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
	


	  $RANDBILGI=$_POST["randevubilgileri"];
	 
	 if (isset($RANDBILGI)){
	     

      $G_BOLUM=explode("♥",$RANDBILGI)[0];
	  $G_DOKTOR_ID=explode("♥",$RANDBILGI)[1];
	  $G_DOKTOR=explode("♥",$RANDBILGI)[2];
	  $G_SAAT=explode("♥",$RANDBILGI)[4];
	  $G_TARIH=explode("♥",$RANDBILGI)[3];
 

	  $_GET["GET_BOLUM"]=$G_BOLUM;
	 }
	 
	 
	 $GUNCELLEME_VAR_MI=$_GET["GET_GUNCELLEME"];
	 
	 if(isset($GUNCELLEME_VAR_MI)){
	     
	  $RANDBILGI = $_GET["GET_ESKI"]; 
	  echo '<script>alert("'.$RANDBILGI.'")</script>';
	    
      $G_BOLUM=$_GET["GET_BOLUM"];
	  $G_DOKTOR_ID=$_GET["GET_DOKTOR_ID"];
	  $G_DOKTOR=$_GET["GET_DOKTOR"];
	  $G_SAAT=$_GET["GET_SAAT"];
	  $G_TARIH=$_GET["GET_TARIH"];
	  $G_TC=$_GET["GET_TC"];
	  
	 /* $sql = "UPDATE MyGuests SET lastname='Doe' WHERE id=2";
        
        if ($conn->query($sql) === TRUE) {
          echo "Record updated successfully";
        } 
        else {
          echo "Error updating record: " . $conn->error;
        }
        
        	 */    
	 }
	  
 	 
	  
	 
?>

<!DOCTYPE html>
<html>
	<head>
		
	</head>
	<body>
		
		<?php include('panelnav.php'); ?>
		
		
		
		
		
		<div class="kayit">  
			
			
			
			<div class="giris-tablolar"> 
				<div align="center">
					<center>
						<div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">RANDEVU DÜZENLE </p></div>
						<div class="hasta-giris">
							<p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Randevu Düzenle</p>
							<p><img src="../images/personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
							<p>
								
								<form method="POST">
									<div class="form-group">
										<label class="kayitbilgileri" for="exampleInputEmail1">Hasta TC:</label>
										<label class="kayitbilgileri2" id="kayitbilgileri2" for="exampleInputEmail1">
											
											<?php    session_start(); 
												echo $_SESSION["TC"]; 
											?>
										</label>
									</div>
									<div class="form-group">
										<label class="kayitbilgileri" for="exampleFormControlSelect1">Bölüm:</label>
										<select  class="form-control" id="Bolum" name="Bolum">
										    
										    
										    
										    <?php
												
												if(isset($_GET["GET_BOLUM"])){
													$SECILEN_BOLUM = $_GET["GET_BOLUM"];
													
													
													$sqlBolumler="SELECT * FROM bolumler";
													$result = $conn->query($sqlBolumler);
													
                                                    if ($result->num_rows > 0) {
														
														
														while($row = $result->fetch_assoc()) {
															
															if($SECILEN_BOLUM==$row["bolum"]){
																
																echo '<option value="'. $row["bolum"].'" selected>'. $row["bolum"].'</a></option>';
																$GLOBAL_BOLUM=$row["bolum"];
																
															}
															else{
																echo '<option value="'. $row["bolum"].'">'. $row["bolum"].'</a></option>';
															}
															
															
															
														}
														
														
													}  
													
                                                    
													
													
													
													
													
												}
												else{
													
													$ilk=0;
													$bolum_olay="";
													
													$sqlBolumler="SELECT * FROM bolumler";
													$result = $conn->query($sqlBolumler);
													
                                                    if ($result->num_rows > 0) {
														
														
														while($row = $result->fetch_assoc()) {
															
															
															if ($ilk==0){
																echo '<option value="'. $row["bolum"].'" selected>'. $row["bolum"].'</a></option>';
																$bolum_olay=$row["bolum"];
															}
															else{
																echo '<option value="'. $row["bolum"].'" >'. $row["bolum"].'</a></option>';
															}
															$ilk=1;
															
														}
														
														
													}  
													
                                                    
													
													
													
												}
												
												
										    	
                                            	
											?>
											
											
										    
										    
											
											
										</select>
									</div>
									<div class="form-group">
										<label class="kayitbilgileri" for="exampleFormControlSelect1">Doktor</label>
										<select  class="form-control" id="Doktor" name="Doktor">
											
											
											<?php
												
												$GET_BOLUM=$_GET["GET_BOLUM"];
												
												if (isset($GET_BOLUM)){
													
													
													
													$sqlBolumler1="SELECT * FROM DoktorBilgiler WHERE DoktorBolum='".$GET_BOLUM."'";
													
													$result1 = $conn->query($sqlBolumler1);
													
                                                    if ($result1->num_rows > 0) {
														
														
														while($row = $result1->fetch_assoc()) {
															
															
															if($G_DOKTOR_ID==$row["DoktorID"]){
															echo '<option value="'. $row["DoktorID"].'" selected>'. $row["DoktorAd"].'</option>';
															}
															else{
															    echo '<option value="'. $row["DoktorID"].'" >'. $row["DoktorAd"].'</option>';
															}
															
														}
													}  
													
												}
												else{
													
													
													
													$sqlBolumler1="SELECT * FROM DoktorBilgiler WHERE DoktorBolum='".$bolum_olay."'";
													
													$result1 = $conn->query($sqlBolumler1);
													
                                                    if ($result1->num_rows > 0) {
														
														
														while($row = $result1->fetch_assoc()) {
															
															
															echo '<option value="'. $row["DoktorID"].'♥'.$row["DoktorAd"].'">'. $row["DoktorAd"].'</option>';
															
															
														}
													}  
													
												}
												
											?>
											
											
											
                                            
											
										</select>
									</div>
									
									
									<div class="form-group">
										<label class="kayitbilgileri" for="exampleFormControlSelect1">Tarih</label>
										<input class="kayitbilgileri2" type="date" id="Tarih" name="Tarih" <?php echo "value='".$G_TARIH."'"; ?>>
									</div>
									
									<div class="form-group">
										<label class="kayitbilgileri" for="exampleFormControlSelect1">Saat</label>
										<select class="form-control" id="Saat" name="Saat"  >
											<?php
												
												$say=0;
												while ($say<25){
			
													if (strlen($say)<2){
											 
													  	echo '<option value="0'.$say.':00">0'.$say.':00</option>';
													        
													 
													}
													else{
														echo '<option value="'.$say.':00">'.$say.':00</option>';
													}
													
													
													$say=$say+=1;
												}
												
												
											?>
											
											
											
										</select>
									</div>
									
									
									<Button type="submit" name="submit" class="btn btn-primary"  onclick="return Randevuduzenle('Düzenlemeyi onaylıyor musunuz?')">Randevuyu Düzenle</Button>
									
								</form>
								
							</p>
							
						</div>
						
					</center>
				</div>
			</div>
			
			
			
			
		</div> 
		
		
		<style> 
			input[type="text"]::placeholder { /* Firefox, Chrome, Opera */ 
			color: #fff; 
			} 
			input[type="password"]::placeholder { /* Firefox, Chrome, Opera */ 
			color: #fff; 
			}
			
			
			
			.hastabuton {    border: 0px;
			background: #00cb86;
			border-radius: 10px;
			padding: 30px;
			font-size: 17px;
			color: #fff;
			
			margin-right:5px;
			margin-top:5px;
			
			}
			.hastabuton a {color:#fff; font-size: 20px;}
			.hastabuton:hover {background: #55bcc1;;}
			
			.kayitbilgileri {
			width: 150px;
			background: #206c52;
			border-radius: 6px;
			padding: 6px;
			color: white;
			margin-bottom: -5px;}
			
			.kayitbilgileri2 {
			width: 250px;
			background: #206c52;
			border-radius: 6px;
			padding: 6px;
			color: white;
			margin-bottom: -5px;}
			
			
			.kayit  {    width: 100%;
			margin-right: auto;
			margin-left: auto;
			background-image: url(../images/bg.jpg);
			height: 883px;
			background-size: cover;
			background-attachment: fixed;
			}
			.giris-tablolar{margin-right: auto;margin-left: 22%;    margin-top: 35px;}
			.hasta-giris{    margin-top: 35px;width: 50%; float: left;min-width: 200px;background: #48b68f;margin-right: 20px;border-radius: 9px;}
			.doktor-giris{width: 25%; float: left;min-width: 200px;background: #48b68f;margin-right: 20px;}
			.personel-giris{width: 25%; float: left;min-width: 200px;background: #48b68f;margin-right: 20px;}
			
			.btn {    border: 4px solid #206c52;}
			.btn:hover {background:#48b68f;border-color: #206c52;}
			.btn:active {
			background-color: #206c52!important;
			box-shadow: 0 5px #fff;
			transform: translateY(4px);
			}
			.btn btn-primary :hover{color: #48b68f;}
			.btn-primary {color: #fff;background-color: #00cb86;border-color: #206c52;border-radius: 14px; width: 170px;}
			.form-control {background: #206c52;width: 62%;float: right; font-size: 17px;border:0px;    margin-right: 10px;}
			
			.form-control {
			
			color: #01cb86!important;
			
			}
			
			@media screen and (max-width: 992px) {
			
			.hasta-yazi{display:none;}
			
			.hasta-giris{ width: 95%;    margin-left: 10px;    margin-right: 10px;}
			.giris-tablolar{ margin-left: 0px;}
			.kayitbilgileri { width: 38%; background: #206c52;}
			.kayitbilgileri2 {width: 200px;}
			.form-control {width: 50%; margin-bottom: 10px;    margin-right: 10px;}
			
			
			
			}
			
			
			
		</style>
		
		
		
		
		
		
		
		
		
		
		
		
	</div>
	
</body>
</html>																									





<script>
	
	
	function Randevuduzenle($girdi) {
		
		if(confirm($girdi)){
			
			
			
			var e = document.getElementById("Bolum");
			var DEGER_BOLUM = e.options[e.selectedIndex].value;
			
			var e2=document.getElementById("Doktor");
			var DEGER_DOKTOR_FUL = e2.options[e2.selectedIndex].value;
			var DEGER_DOKTOR_ID = DEGER_DOKTOR_FUL.split("♥")[0];
			var DEGER_DOKTOR_AD = DEGER_DOKTOR_FUL.split("♥")[1];
			
			var e3=document.getElementById("kayitbilgileri2");
			var DEGER_TC = e3.innerText;
			
			var e4=document.getElementById("Saat");
			var DEGER_SAAT_FUL= e4.options[e4.selectedIndex].value;
			
			
			var e5=document.getElementById("Tarih");
			var DEGER_TARIH = e5.value;
			

 
		 	var url = "http://myyhospital.com/HastaPanel/RandevuDuzenle.php?GET_GUNCELLEME=EVET&GET_ESKI="+<?php echo $RANDBILGI; ?>+"&GET_BOLUM="+DEGER_BOLUM+"&GET_TC="+DEGER_TC+"&GET_DOKTOR="+DEGER_DOKTOR_AD+"&GET_DOKTOR_ID="+DEGER_DOKTOR_ID+"&GET_SAAT="+DEGER_SAAT_FUL+"&GET_TARIH="+DEGER_TARIH+" ";
	        alert(url);	
			window.location=url;
			return false;
			
		}
	}
	
	$('#Bolum').on('change', function (e) {
		var optionSelected = $("option:selected", this);
		var valueSelected = this.value;
		
		var url = "http://myyhospital.com/HastaPanel/RandevuDuzenle.php?GET_BOLUM="+valueSelected;
		$(location).attr('href',url);
		
		
	});
	
	
	</script>	