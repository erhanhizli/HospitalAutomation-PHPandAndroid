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
	
	
	session_start(); 
	
    
	$_SESSION["TC"];
	
	$TC= $_SESSION["TC"]  ;
	$sql= "SELECT * FROM Randevular WHERE HastaTC='$TC'";
	$result = mysqli_query($conn,$sql);
	$Randevular = mysqli_fetch_all($result,MYSQL_ASSOC);
	
	mysqli_free_result($result);
	
	
	
	$query="SELECT * FROM Randevular WHERE HastaTC='$TC'";
	$res=mysql_query($query);
	
	
	mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
	<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
		<link rel="stylesheet" type="text/css" href="/css/stil.css">
		
		
	</head>
	<body>
		
		<?php include('panelnav.php'); ?>
		
		
		
		
		
		<div class="kayit">  
			
			
			
			<div class="giris-tablolar"> 
				<div align="center">
					<center>
						
						<div class="hasta-giris" style="float: left; padding: 1px; margin-top: 83px; width: 152px; margin-left: -220px; color: white;"><p>
							<p><img src="../images/personel.png" style=" width: 150px; " alt="Hasta Giriş"></p>
							
							<label class="kayitbilgileri2" style="width: 95%;background: #206c52;">Hasta TC</label>
							
							<?php
								$_SESSION["TC"];
								
								$TC= $_SESSION["TC"]  ;
								$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
								// Check connection
								if ($conn->connect_error) {
									die("Connection failed: " . $conn->connect_error);
								}
								$sql = "SELECT * FROM HastaBilgiler WHERE HastaTC='$TC' ";
								$result = $conn->query($sql);
								if ($result->num_rows > 0) {
									// output data of each row
									while($row = $result->fetch_assoc()) {
									?>
									
									
									
									
									<label class="kayitbilgileri" style="width: 95%;"><?php echo  $row["HastaTC"]; ?></label>
									<?php
										
									}
									echo "</table>";
								} else { echo "0 results"; }
								$conn->close();
							?>
							
							<div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 14px; font-size: 66px; width: 170px; margin-left: 0px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;">HASTA RANDEVU </p></div>
							
						</p></div>
						<div class="hasta-giris">
							<p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Randevuları</p>
							<p>
								
								<form method="POST"  style="padding: 11px;">
									<div class="form-group">
										<label class="kayitbilgileri">Bölüm</label>
										<label class="kayitbilgileri">Doktor ID</label>
										<label class="kayitbilgileri">Doktor Adı</label>
										<label class="kayitbilgileri">Tarih</label>
										<label class="kayitbilgileri">Saat</label>
										
										
									</div>
									
									
								</form>
								
								
								<table>
									<tr>
										
									</tr>
									<?php
										$_SESSION["TC"];
										
										$TC= $_SESSION["TC"]  ;
										$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
										// Check connection
										if ($conn->connect_error) {
											die("Connection failed: " . $conn->connect_error);
										}
										$sql = "SELECT * FROM Randevular WHERE HastaTC='$TC' ";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											// output data of each row
											while($row = $result->fetch_assoc()) {
											?>
											
											
											<form method="POST" action="RandevuDuzenle.php" style="padding: 11px;">
												<div class="form-group" style="background: #206c52;margin-right: 10px; margin-left: 10px; border-radius: 15px;">
													<div class="randevular">   
														<label class="kayitbilgileri2"><?php echo  $row["Bolum"]; ?></label>
														<label class="kayitbilgileri2"><?php echo  $row["DoktorID"]; ?></label>
														<label class="kayitbilgileri2"><?php echo  $row["DoktorAd"]; ?></label>
														<label class="kayitbilgileri2"><?php echo  $row["Tarih"]; ?></label>
														<label class="kayitbilgileri2"><?php echo  $row["Saat"]; ?></label>
														<input style="background-color:#00000000; color:white;" class="kayitbilgileri2" type="submit" value="Düzenle" name="duzenle" />
														<input type="hidden" name="randevubilgileri" value='<?php echo $row["Bolum"]."♥".$row["DoktorID"]."♥".$row["DoktorAd"]."♥".$row["Tarih"]."♥".$row["Saat"]; ?>' />
														
													</div>
													
												</div>
												
												
											</form>
											
											<?php 
												
											}
											echo "</table>";
										} else { echo "0 results"; }
										$conn->close();
									?>
									
									
								</table>
								
								
								<input class="btn btn-primary" type="submit" value="Randevunu düzenle" 
								onclick="window.location='RandevuDuzenle.php';" /> 
								
								
							</p>
						</div>
						
					</center>
				</div>
			</div>
			
		</div> 
		
		
	</body>
</html>																																											