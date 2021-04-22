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


$sql = "SELECT * FROM HastaIlaclar WHERE HastaTC='$HastaTC'";
 
$result = mysqli_query($conn,$sql);
$HastaIlaclar = mysqli_fetch_all($result,MYSQL_ASSOC);

mysqli_free_result($result);
}


mysqli_close($conn);
?>


<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=big5">
<link rel="stylesheet" type="text/css" href="/css/stil.css">
 

</head>
<body>

  <?php include('panelnav.php'); ?>

 



	
<div class="kayit">  

            
    
<div class="giris-tablolar"> 
<div align="center">
<center>
  <form method="POST"  style="padding: 11px;">
    <div class="hasta-giris" style="float: left; padding: 1px; margin-top: 83px; width: 152px; margin-left: -220px; color: white;"><p>
                <p><img src="../images/personel.png" style=" width: 150px; " alt="Hasta Giriş"></p>

            <label class="kayitbilgileri2" style="width: 95%;background: #206c52;">Hasta TC</label>
            <input type="text" class="form-control" id="HastaTC" name="HastaTC">
            <input type="submit" name="submit" value="Reçeteleri Göster" class="btn btn-primary"  >
            
            </form>
            
   <?php

$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM HastaBilgiler WHERE HastaTC='$HastaTC' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
?>





<?php

}
echo "</table>";
} else { echo "0 results"; }
$conn->close();
?>
        
                <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 14px; font-size: 66px; width: 190px; margin-left: 0px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;"> REÇETELER </p></div>

         </p></div>
<div class="hasta-giris">
    <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Reçeteleri</p>
    <p>
          
      

          
                <table>
<tr>

</tr>




 
<div class="form-group" style="">
  

  <?php foreach($HastaIlaclar as $Ilaclar){ ?>
    <button class="accordion"> <p>Reçete ID:  <?php echo htmlspecialchars($Ilaclar['IlacID']); ?> | Hasta TC:  <?php echo htmlspecialchars($Sonuclar['HastaTC']); ?>
</button>
<div class="panel">
 <img src="data:image/jpeg;base64,<?php echo base64_encode($Ilaclar['IlacResim']) ?>" width="100%" style="border: 1px solid white; border-radius: 10px" />
 </div>

 </div>
 
 </div>
  
 

<?php } ?>



 


 
</div>

</div>
</div>

</div>  
 
 <div style="padding:10px;"> </div> 

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script>




</body>
</html>