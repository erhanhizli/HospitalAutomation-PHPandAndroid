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




if(isset($_POST['randevular'])){

$DoktorID = mysqli_real_escape_string($conn, $_POST['DoktorID']);

$_SESSION['DRID']=$_POST['DoktorID'];
$sql = "SELECT * FROM Randevular WHERE DoktorID='$DoktorID'";
 
$result = mysqli_query($conn,$sql);
$Randevular = mysqli_fetch_all($result,MYSQL_ASSOC);
 
mysqli_free_result($result);
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
    <link rel="stylesheet" type="text/css" href="/css/stil.css">
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

            
    
    <div class="giris-tablolar"> 
  <div align="center">
    <center>
      
        <div class="hasta-giris" style="float: left; padding: 1px; margin-top: 83px; width: 152px; margin-left: -220px; color: white;"><p>
                    <p><img src="../images/personel.png" style=" width: 150px; " alt="Hasta Giriş"></p>
     
      
        <form method="POST">
  <div class="form-group">
   <label class="kayitbilgileri2" style="width: 95%;background: #206c52;">Doktor ID</label>
<input type="text" style="width: 94%; margin-right: 3px; margin-bottom: 10px;color: #000;" class="kayitbilgileri2" id="DoktorID" name="DoktorID">
</div>
 <input type="submit" name="randevular" value="Doktor Randevularını Göster" class="btn btn-primary"  >
</form>
            
                    <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 14px; font-size: 66px; width: 170px; margin-left: 0px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;">DOKTOR RANDEVULAR </p></div>

             </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Doktor Randevuları</p>
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
   
$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Randevular WHERE DoktorID='$DoktorID' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    ?>
    
    
            <form method="POST"  style="padding: 11px;">
   <div class="form-group" style="background: #206c52;margin-right: 10px; margin-left: 10px; border-radius: 15px;">
   <div class="randevular">   
   
   <label class="kayitbilgileri2"><?php echo  $row["Bolum"]; ?></label>
    <label class="kayitbilgileri2"><?php echo  $row["DoktorID"]; ?></label>
    <label class="kayitbilgileri2"><?php echo  $row["DoktorAd"]; ?></label>
    <label class="kayitbilgileri2"><?php echo  $row["Tarih"]; ?></label>
    <label class="kayitbilgileri2"><?php echo  $row["Saat"]; ?></label>
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
 

 <input class="btn btn-primary" type="submit" value="Randevuyu düzenle" 
    onclick="window.location='RandevuDuzenle.php';" /> 
 
         
          </p>
    </div>
    
</center>
  </div>
</div>
  
   </div> 
    

</body>
</html>