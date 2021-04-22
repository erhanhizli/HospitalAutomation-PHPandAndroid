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


if(isset($_POST['submit'])){

     $_SESSION["HTC"];
        
   $HTC= $_SESSION["HTC"]  ;
  
    if( empty($_POST['Bolum']) || empty($_POST['Doktor']) || empty($_POST['Tarih'])|| empty($_POST['Saat'])) {
       echo '<script>alert("Lütfen bütün alanları doldurunuz.")</script>';
   } else {    
   
$HastaTC = $_SESSION["HTC"]  ;
$Bolum = mysqli_real_escape_string($conn, $_POST['Bolum']);
$Doktor = $_POST['Doktor'];
$DoktorAd = mysqli_real_escape_string($conn, $_POST['DoktorAd']);
$Tarih = mysqli_real_escape_string($conn, $_POST['Tarih']);
$Saat = mysqli_real_escape_string($conn, $_POST['Saat']);

$sql = "SELECT Tarih FROM Randevular WHERE DoktorID = '$Doktor' AND Tarih='$Tarih' AND Saat='$Saat'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

 echo '<script>alert("Aynı tarih ve saatte randevu var. Lütfen başka bir zamana deneyiniz.")</script>';
}else{
    $sql = "UPDATE `Randevular` SET `Bolum`='$Bolum',`DoktorID`='$Doktor',`DoktorAd`='$DoktorAd',`Tarih`='$Tarih',`Saat`='$Saat' WHERE HastaTC='$HTC'";
if(mysqli_query($conn, $sql)){
    echo '<script>alert("Randevu Oluşturuldu.")</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
}
}



mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head>
<style>
table {
border-collapse: collapse;
width: 100%;
color: #588c7e;
font-family: monospace;
font-size: 25px;
text-align: left;
}
th {
background-color: #00cb86;
color: white;
}
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>

  <?php include('panelnav.php'); ?>






    <div class="kayit">  

 <?php
   $_SESSION["HTC"];
        
   $HTC= $_SESSION["HTC"]  ;
$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Randevular WHERE HastaTC='$HTC' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>
            
    


    <div class="giris-tablolar"> 
  <div align="center">
    <center>
        <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">RANDEVU DUZENLE </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Randevu Düzenle</p>
        <p><img src="personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
        <p><form method="POST"  style="padding: 11px;">


   <div class="form-group">
    <label for="exampleInputEmail1">Hasta TC:</label>
    <?php    session_start(); 
         echo $_SESSION["HTC"]; 
         ?>
  </div>
  
    <input type="website" class="form-control" id="HastaTC" name="HastaTC">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Bolum:</label>
    <select class="form-control" id="Bolum" name="Bolum">
      <option value="Aile Hekimligi">Aile Hekimligi</option>
      <option value="İç Hastalıkları(Dahiliye)">İç Hastalıkları(Dahiliye)</option>
      <option value="Göz Hastalıkları">Göz Hastalıkları</option>
      <option value="Çocukuk Hastaliklari">Çocuk Hastalıkları</option>
      <option value="Beslenme ve Diyet">Beslenme Ve Diyet</option>
    </select>
  </div>
  <div class="form-group">
     <label class="kayitbilgileri">Doktor:</label>
    <select class="form-control" id="Doktor" name="Doktor">
      <option >---Aile Hekimliği--</option>
      <option value="951456753">Op.Dr.Rıfat Hızlı</option>
      <option value="516456753">Prof.Dr.Abrek Teber</option>
      <option value="423574568">Prof.Dr.Burak Müderrisoğlu</option>
      <option >---İç Hastalıkları(Dahiliye)--</option>
      <option value="423564567">Dr.Kutsi Türan</option>
      <option value="123456">Dr.Erhan Hızlı</option>
      <option value="474564567">Dr.Doğukan Karasu</option>
      <option value="102564951">Prof.Dr.Ege Terzi</option>
      <option value="741235786">Dr.Halil Akbaş</option>
      <option >---Göz Hastalıkları--</option>
      <option value="845315732">Prof.Dr.Simay Samancı</option>
      <option value="154245132">Prof.Yağmur Yılmaz</option>
      <option value="120457365">Dr.Ahmet Ziya</option>
      <option >---Çocuk Hastalıkları--</option>
      <option value="542135484">Prof.Dr.Mehmet Toprak</option>
      <option value="354159654">Dr.Mehmet Toprak</option>
      <option value="620416548">Dr.Aleyna Turgay</option>
      <option >---Beslenme ve Diyet--</option>
      <option value="542753484">Prof.Dr.İrem Yılmaz</option>
      <option value="354159654">Dr.Emir Hizli</option>
      <option value="620416548">Dr.Efe Egeli</option>
      
      
    </select>
    </div>
    
      <div class="form-group">
<label>Doktor</label>
 <input type="text" class="form-control" id="DoktorAd" name="DoktorAd" value="<?php echo $row["DoktorAd"]; ?>">
  </div>
      <div class="form-group">
    <label class="kayitbilgileri">Tarih</label>
    <input type="date" id="Tarih" name="Tarih">
  </div>
    
    
    <div class="form-group">
    <label class="kayitbilgileri">Saat</label>
    <select class="form-control" id="Saat" name="Saat">
      <option value="09:00">09:00</option>
      <option value="10:00">10:00</option>
      <option value="11:00">11:00</option>
      <option value="13:00">13:00</option>
      <option value="14:00">14:00</option>
      <option value="15:00">15:00</option>
      <option value="16:00">15:00</option>
      
     
    </select>
  </div></br>
    
    
  
<input type="submit" name="submit" value="Randevuyu Düzenle" class="btn btn-primary"  onclick="return confirm('Randevunuzu onaylıyor musunuz?');">
</form>
 <?php }

} else { echo "0 results"; }
$conn->close();
?>
         
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
   
</style> 

    <style> 
    
    
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
.btn-primary {color: #fff;background-color: #00cb86;border-color: #206c52;border-radius: 14px; width: 120px;}
.form-control {background: #206c52;width: 62%;float: right; font-size: 17px;border:0px;    margin-right: 10px;}


@media screen and (max-width: 992px) {
  
    .hasta-yazi{display:none;}
    
    .hasta-giris{ width: 95%;    margin-left: 10px;    margin-right: 10px;}
        .giris-tablolar{ margin-left: 0px;}
.kayitbilgileri { width: 38%; background: #206c52;}
.form-control {width: 50%; margin-bottom: 10px;    margin-right: 10px;}



}



    </style>
</body>
</html>