
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
	
	$GLOBAL_TC="";
	$GLOBAL_BOLUM="";
	$GLOBAL_DOKTOR="";
	$GLOBAL_DOKTOR_ID="";
	$GLOBAL_TARIH="";
	$GLOBAL_SAAT="";
	
	
	if (isset($_GET["GET_BOLUM"])  && isset($_GET["GET_TC"])  && isset($_GET["GET_DOKTOR_ID"])  && isset($_GET["GET_DOKTOR"])  && isset($_GET["GET_SAAT"])  && isset($_GET["GET_TARIH"]) ){
	    
	 	 
	 
			$HastaTC =$_GET["GET_TC"];
			$Bolum = $_GET["GET_BOLUM"];
			$Doktor = $_GET["GET_DOKTOR_ID"];
			$DoktorAd = $_GET["GET_DOKTOR"];
			$Tarih = $_GET["GET_TARIH"];
			$Saat = $_GET["GET_SAAT"];
			
			$sql = "SELECT Tarih FROM Randevular WHERE DoktorID = '$Doktor' AND Tarih='$Tarih' AND Saat='$Saat'";
			
			$result = mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($result)>0){
				
				echo '<script>alert("Aynı tarih ve saatte randevu var. Lütfen başka bir zamana deneyiniz.")</script>';
				}
				else{
				$sql = "INSERT INTO `Randevular`(`HastaTC`, `Bolum`, `DoktorID`, `DoktorAd`, `Tarih`, `Saat`) VALUES ('$HastaTC', '$Bolum', '$Doktor', '$DoktorAd', '$Tarih', '$Saat')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Randevu Oluşturuldu.")</script>';
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
					}
		 
		}
	}
		else{
		    
		    //	echo '<script>alert("Lütfen bütün alanları doldurunuz."); window.url="http://myyhospital.com/HastaPanel/RandevuAl.php";</script>';
		    	
		}
		 


			/*
	if(isset($_POST['submit'])){
		
		session_start(); 
		$_SESSION["TC"];
		if( empty($_POST['Bolum']) || empty($_POST['Doktor']) || empty($_POST['Tarih'])|| empty($_POST['Saat'])) {
			echo '<script>alert("Lütfen bütün alanları doldurunuz.")</script>';
			} else {    
	
			$HastaTC = $_SESSION["TC"]  ;
			$GLOBAL_TC=$HastaTC;
			$Bolum = mysqli_real_escape_string($conn, $_POST['Bolum']);
			$Doktor = $_POST['Doktor'];
			$DoktorAd = mysqli_real_escape_string($conn, $_POST['DoktorAd']); // bu
			$Tarih = mysqli_real_escape_string($conn, $_POST['Tarih']);
			$Saat = mysqli_real_escape_string($conn, $_POST['Saat']);
			
			$sql = "SELECT Tarih FROM Randevular WHERE DoktorID = '$Doktor' AND Tarih='$Tarih' AND Saat='$Saat'";
			
			$result = mysqli_query($conn,$sql);
			
			if(mysqli_num_rows($result)>0){
				
				echo '<script>alert("Aynı tarih ve saatte randevu var. Lütfen başka bir zamana deneyiniz.")</script>';
				}else{
				$sql = "INSERT INTO `Randevular`(`HastaTC`, `Bolum`, `DoktorID`, `DoktorAd`, `Tarih`, `Saat`) VALUES ('$HastaTC', '$Bolum', '$Doktor', '$DoktorAd', '$Tarih', '$Saat')";
				if(mysqli_query($conn, $sql)){
					echo '<script>alert("Randevu Oluşturuldu.")</script>';
					} else{
					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
				}
			}
		}
	}
	
	*/
	
	mysqli_close($conn);
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
						<div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">RANDEVU AL </p></div>
						<div class="hasta-giris">
							<p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Randevu Al</p>
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
                                                       
                                                         
                                                        echo '<option value="'. $row["DoktorID"].'">'. $row["DoktorAd"].'</option>';
                                                       
                                                       
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
										<input class="kayitbilgileri2" type="date" id="Tarih" name="Tarih">
									</div>
									
								<div class="form-group">
								<label class="kayitbilgileri" for="exampleFormControlSelect1">Saat</label>
								<select class="form-control" id="Saat" name="Saat">
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
								
								
								<Button type="submit" name="submit" class="btn btn-primary"  onclick="return Randevual('Randevunuzu onaylıyor musunuz?')">Randevu Al</Button>
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
							     
                        							     
                                 function Randevual($girdi) {
                                     
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
                                            
                                        
                                            var url = "http://myyhospital.com/HastaPanel/RandevuAl.php?GET_BOLUM="+DEGER_BOLUM+"&GET_TC="+DEGER_TC+"&GET_DOKTOR="+DEGER_DOKTOR_AD+"&GET_DOKTOR_ID="+DEGER_DOKTOR_ID+"&GET_SAAT="+DEGER_SAAT_FUL+"&GET_TARIH="+DEGER_TARIH+" ";
                                            window.location=url;
                                            return false;
                                           
                                        }
                                    }
                        							     
                                $('#Bolum').on('change', function (e) {
                                    var optionSelected = $("option:selected", this);
                                    var valueSelected = this.value;
                                    
                                    var url = "http://myyhospital.com/HastaPanel/RandevuAl.php?GET_BOLUM="+valueSelected;
                                    $(location).attr('href',url);
                                    
                                    
                                });
                                
                                
							 </script>