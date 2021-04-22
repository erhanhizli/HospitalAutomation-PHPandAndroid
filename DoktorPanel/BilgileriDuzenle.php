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
 $_SESSION["D_ID"];   
      $D_ID= $_SESSION["D_ID"]  ;
$sql= "SELECT * FROM DoktorBilgiler WHERE DoktorID='$D_ID'";
$result = mysqli_query($conn,$sql);
$HastaBilgiler = mysqli_fetch_all($result,MYSQL_ASSOC);

mysqli_free_result($result);

if(isset($_POST['submit'])){
      
      if(empty($_POST['DoktorParola']) || empty($_POST['DoktorAd']) ) {
       echo '<script>alert("Lütfen bütün alanları doldurunuz.")</script>';
   } else {  

$DoktorParola = mysqli_real_escape_string($conn, $_POST['DoktorParola']);
$DoktorAd = mysqli_real_escape_string($conn, $_POST['DoktorAd']);


$sql = "UPDATE `DoktorBilgiler` SET `DoktorParola`='$DoktorParola',`DoktorAd`='$DoktorAd' WHERE DoktorID='$D_ID'";
if(mysqli_query($conn, $sql)){
    echo '<script>alert("Bilgiler basari ile düzenlendi.")</script>';
   
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}  

}

}


mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>

</head>
<body>

  <?php include('panelnav.php'); ?>







 <?php
   

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM DoktorBilgiler WHERE DoktorID='$D_ID' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>




   
       <div class="kayit">  

            
    
    <div class="giris-tablolar"> 
  <div align="center">
    <center>
        <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">BİLGİLERİ DÜZENLE </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Bilgileri Düzenle</p>
        <p><img src="personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
        <p>  <form method="POST">
  
  
  
  
    <div class="form-group">
<label class="kayitbilgileri">Parola</label>
 <input type="text" class="form-control" id="DoktorParola" name="DoktorParola" value="<?php echo $row["DoktorParola"]; ?>">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Ad</label>
    <input type="text" class="form-control" id="DoktorAd" name="DoktorAd" value="<?php echo $row["DoktorAd"]; ?>">
  </div>
  

  
  
  <input type="submit" name="submit" value="Bilgilerimi Güncelle" class="btn btn-primary"  >
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
.btn-primary {color: #fff;background-color: #00cb86;border-color: #206c52;border-radius: 14px; width: 170px;}
.form-control {background: #206c52;width: 62%;float: right; font-size: 17px;border:0px;    margin-right: 10px;    color: #fff;}


@media screen and (max-width: 992px) {
  
    .hasta-yazi{display:none;}
    
    .hasta-giris{ width: 95%;    margin-left: 10px;    margin-right: 10px;}
        .giris-tablolar{ margin-left: 0px;}
.kayitbilgileri { width: 38%; background: #206c52;}
.form-control {width: 50%; margin-bottom: 10px;    margin-right: 10px;}



}



    </style>
    
   

<div>


 <?php }

} else { echo "0 results"; }
$conn->close();
?>
  


</div>

</body>
</html>


