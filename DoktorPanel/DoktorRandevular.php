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
session_start();    
      $_SESSION["D_ID"];
   $DoktorID= $_SESSION["D_ID"]  ;



$sql = "SELECT * FROM Randevular WHERE DoktorID='$DoktorID'";
 
$result = mysqli_query($conn,$sql);
$Randevular = mysqli_fetch_all($result,MYSQL_ASSOC);

mysqli_free_result($result);
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

            
    
    <div class="giris-tablolar"> 
  <div align="center">
    <center>
      
        <div class="hasta-giris" style="float: left; padding: 1px; margin-top: 83px; width: 152px; margin-left: -220px; color: white;"><p>
                    <p><img src="../images/personel.png" style=" width: 150px; " alt="Hasta Giriş"></p>

                <label class="kayitbilgileri2" style="width: 95%;background: #206c52;">Doktor ID</label>
                
       <?php
   $_SESSION["D_ID"];
        
   $D_ID= $_SESSION["D_ID"]  ;
$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM HastaBilgiler WHERE HastaTC='$D_ID' ";
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
            
                    <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 14px; font-size: 66px; width: 140px; margin-left: 0px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">DOKTOR RANDEVULAR     </p></div>

             </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Doktor Randevuları</p>
        <p>
              
              <form method="POST"  style="padding: 11px;">
   <div class="form-group">
      <label class="kayitbilgileri">Bölüm</label>
   
    <label class="kayitbilgileri">Tarih</label>
    <label class="kayitbilgileri">Saat</label>

     
  </div>
 
  
 </form>
 
              
                    <table>
<tr>
 
</tr>
<?php
   $_SESSION["D_ID"];
        
   $TC= $_SESSION["D_ID"]  ;
$conn = mysqli_connect("localhost", "myyhospital_user", "qgR-@1xk8RGm", "myyhospital_1");
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT * FROM Randevular WHERE DoktorID='$D_ID' ";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
while($row = $result->fetch_assoc()) {
    ?>
    
    
            <form method="POST"  style="padding: 11px;">
   <div class="form-group" style="background: #206c52;margin-right: 10px; margin-left: 10px; border-radius: 15px;">
   <div class="randevular">   <label class="kayitbilgileri2"><?php echo  $row["Bolum"]; ?></label>
  
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
    
    .randevular:hover    {  
        background-color:#029966db;
border-radius:10px;
   
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
width: 18%;
background: #01cb86;
    border-radius: 6px;
    padding: 6px;
    color: white;
    margin-bottom: -5px;}
 
 .kayitbilgileri2 {
width: 18%;
     border-radius: 6px;
    padding: 6px;
    color: white; }
 
    
    .kayit  {    width: 100%;
    margin-right: auto;
    margin-left: auto;
    background-image: url(../images/bg.jpg);
     background-size: cover;
         background-attachment: fixed;
    }
    .giris-tablolar{margin-right: auto;margin-left: 22%;    margin-top: 35px;}
    .hasta-giris{    margin-top: 35px;width: 90%; float: left;min-width: 200px;background: #48b68f;margin-right: 20px;border-radius: 9px;}
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
    
   
 

</body>
</html>