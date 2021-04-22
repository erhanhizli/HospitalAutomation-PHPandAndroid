

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
     
      
     
            
                    <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 14px; font-size: 66px; width: 170px; margin-left: 0px; color: white;"><p style="writing-mode: vertical-rl;	transform: rotate(180deg);margin-left: 55px;">HASTA YORUMLARI </p></div>

             </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Yorumları</p>
        <p>
              
              <form method="POST"  style="padding: 11px;">
   <div class="form-group">
     
      <label class="kayitbilgileri">Hasta TC</label>
    <label class="kayitbilgileri">Yorum</label>
    

     
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
$sql = "SELECT * FROM Yorumlar";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    ?>
    
    
           
     <form method="POST"  style="padding: 11px;">
   <div class="form-group" style="background: #206c52;margin-right: 10px; margin-left: 10px; border-radius: 15px;">
   <div class="randevular">   
   
   <label class="kayitbilgileri2"><?php echo  $row["HastaTC"]; ?></label>
    <label class="kayitbilgileri2"><?php echo  $row["Yorum"]; ?></label>
   
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

          </p>
    </div>
    
</center>
  </div>
</div>
  
   </div> 
   
    

</body>
</html>