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

     $_SESSION["DRID"];
        
   $DRID= $_SESSION["DRID"]  ;
  
    if( empty($_POST['Bolum']) || empty($_POST['Tarih'])|| empty($_POST['Saat'])) {
       echo '<script>alert("Lütfen bütün alanları doldurunuz.")</script>';
   } else {    
   
$DoktorID = $_SESSION["DRID"]  ;
$Bolum = mysqli_real_escape_string($conn, $_POST['Bolum']);
$Tarih = mysqli_real_escape_string($conn, $_POST['Tarih']);
$Saat = mysqli_real_escape_string($conn, $_POST['Saat']);

$sql = "SELECT Tarih FROM Randevular WHERE DoktorID = '$Doktor' AND Tarih='$Tarih' AND Saat='$Saat'";

$result = mysqli_query($conn,$sql);

if(mysqli_num_rows($result)>0){

 echo '<script>alert("Aynı tarih ve saatte randevu var. Lütfen başka bir zamana deneyiniz.")</script>';
}else{
    $sql = "UPDATE `Randevular` SET `Bolum`='$Bolum',`Tarih`='$Tarih',`Saat`='$Saat' WHERE DoktorID='$DRID'";
if(mysqli_query($conn, $sql)){
    echo '<script>alert("Randevu Duzenlendi.")</script>';
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

</head>
<body>

  <?php include('panelnav.php'); ?>

<div>
  
<div>
  <?php
   $_SESSION["DRID"];
        
   $DRID= $_SESSION["DRID"]  ;
$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Randevular WHERE DoktorID='$DRID' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) { ?>

  
  <form method="POST">

  <div class="form-group">
    <label for="exampleInputEmail1">DoktorID</label>
    <?php    session_start(); 
         echo $_SESSION["DRID"]; 
         ?>
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1" >Bolum</label>
    <select class="form-control" id="Bolum" name="Bolum">
      <option value="Aile Hekimligi">Aile Hekimligi</option>
      <option value="İç Hastalıkları(Dahiliye)">İç Hastalıkları(Dahiliye)</option>
      <option value="Göz Hastalıkları">Göz Hastalıkları</option>
      <option value="Çocukuk Hastaliklari">Çocuk Hastalıkları</option>
      <option value="Beslenme ve Diyet">Beslenme Ve Diyet</option>
    </select>
  </div>
   
    <div class="form-group">
    <label for="exampleFormControlSelect1">Tarih</label>
    <input type="date" id="Tarih" name="Tarih">
  
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Saat</label>
    <select class="form-control" id="Saat" name="Saat">
      <option value="09:00">09:00</option>
      <option value="10:00">10:00</option>
      <option value="11:00">11:00</option>
      <option value="13:00">13:00</option>
      <option value="14:00">14:00</option>
      <option value="15:00">15:00</option>
      <option value="16:00">16:00</option>
      
     
    </select>
  </div>
  
  
<input type="submit" name="submit" value="Randevuyu Düzenle" class="btn btn-primary"  onclick="return confirm('Randevunuzu onaylıyor musunuz?');">
</form>
 <?php }

} else { echo "0 results"; }
$conn->close();
?>
  

</div>

</body>
</html>