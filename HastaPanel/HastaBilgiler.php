
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
    
mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
<style>
table {
border-collapse: collapse;
    width: 95%;
    color: #588c7e;
    font-size: 19px;
    text-align: left;
    margin: 19px;   
    margin-right: auto;
    margin-left: auto;
    
}
td  {padding:5px; }
th {
background-color: #498f77;
border-radius: 10px;
color: white; padding: 5px; }
tr:nth-child(even) {background-color: #f2f2f2}
</style>
</head>
<body>

	<?php include('panelnav.php'); ?>


    <div class="kayit">  

            
    
    <div class="giris-tablolar"> 
  <div align="center">
    <center>
        <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;">HASTA BİLGİLERİ </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Bilgileri</p>
        <p><img src="../images/personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
        <p>
                 <table>
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









 






<form method="POST"  style="padding: 11px;">
   <div class="form-group">
    <label class="kayitbilgileri">Hasta TC:</label>
       <label class="kayitbilgileri2"><?php echo  $row["HastaTC"]; ?></label>

     
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Parola:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaParola"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Ad:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaAd"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Soyad:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaSoyad"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Email:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaEmail"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Yaş:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaYas"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Kan Grubu:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaKan"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Tel:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaTel"]; ?></label>
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Adres:</label>
    <label class="kayitbilgileri2"><?php echo  $row["HastaAdres"]; ?></label>
  </div>

  
  
 </form>


 <input class="btn btn-primary" type="submit" value="Bilgilerini Düzenle" 
    onclick="window.location='BilgileriDuzenle.php';" /> 
















<?php
    
}
echo "</table>";
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
    background: #206c528c;
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


@media screen and (max-width: 992px) {
  
    .hasta-yazi{display:none;}
    
    .hasta-giris{ width: 95%;    margin-left: 10px;    margin-right: 10px;}
        .giris-tablolar{ margin-left: 0px;}
.kayitbilgileri { width: 38%; background: #206c52;}
.kayitbilgileri2 {width: 200px;}
.form-control {width: 50%; margin-bottom: 10px;    margin-right: 10px;}



}



    </style>
    
    
    
    
    
     
     
     

<div class="guncelle">
 
 </div>
<style>
    .guncelle {text-align: center;}
    .guncellebuton {height: 50px;background-color: #212529;color: #fff;    border-radius: 15px;    border: 0px;}
    .guncellebuton:hover {background-color:#00cb86; border: 0px;}
.guncellebuton:visited {background-color:#00cb86; border: 0px;}
</style>

</div> 







</body>
</html>