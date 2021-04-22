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




 if(isset($_POST['submit'])){     

     
      $HastaTC = mysqli_real_escape_string($conn, $_POST['HastaTC']);
     
     $RaporResim = addslashes(file_get_contents($_FILES["RaporResim"]["tmp_name"]));

$sql = "INSERT INTO `HastaRaporlar`(`RaporID`, `HastaTC`, `RaporResim`) VALUES ('','$HastaTC','$RaporResim')";
if(mysqli_query($conn, $sql)){
    echo '<script>alert("Hasta raporu başarıyla eklendi.")</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}

}
    
    
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/css/stil.css">

</head>
<body>

  <?php include('panelnav.php'); ?>

   
 


<div class="kayit">  

            
    
<div class="giris-tablolar"> 
<div align="center">
<center>
<div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;">RAPOR EKLE </p></div>
<div class="hasta-giris" style="width: 511px;">
    <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Rapor Ekle</p>
    <p><img src="personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
    <p> 
 
 <style>
 .form-control {
    
    width: 96%;
    
}

 </style>

<form method="POST"  style="padding: 11px;" enctype="multipart/form-data">
 <div class="form-group">
    <label>Hasta TC:</label>
    <input type="text" class="form-control" id="HastaTC" name="HastaTC">
  </div>
  <div class="form-group">
     <input style="width: 50%; padding: 14px;" type="file" class="form-control-file" name="RaporResim" id="RaporResim" placeholder="Fotoğraf" required>
  </div>
<input type="submit" name="submit" value="Yükle" class="btn btn-primary"  onclick="return confirm('Rapor yüklemek istediğinize emin misiniz?');">
</form>


      </p>

    
</div>

</center>
</div>
</div>




</div> 








 
</body>
</html>