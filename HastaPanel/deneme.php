

<!DOCTYPE html>
<html>
<head><meta http-equiv="Content-Type" content="text/html; charset=euc-jp">
   <title></title>
</head>
<body>

</body>
</html>
<!DOCTYPE html>
   <html>
   <head>

   </head>
   
   <body>
      <?php include('panelnav.php'); ?>
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

mysqli_close($conn);
      
      
      
         if(isset($_POST['update'])) {
            
            $HastaParola = $_POST['HastaParola'];
            $HastaAd = $_POST['HastaAd'];
            $HastaSoyad = $_POST['HastaSoyad'];
            $HastaEmail = $_POST['HastaEmail'];
            $HastaYas = $_POST['HastaYas'];
            $HastaKan = $_POST['HastaKan'];
            $HastaTel = $_POST['HastaTel'];
            $HastaAdres = $_POST['HastaAdres'];
            
            
            $sql = "UPDATE `HastaBilgiler` SET `HastaTC`='$HastaTC',`HastaParola`='$HastaParola',`HastaAd`='$HastaAd',`HastaSoyad`='$HastaSoyad',`HastaEmail`='$HastaEmail',`HastaYas`='$HastaYas ',`HastaKan`='$HastaKan',`HastaTel`='$HastaTel',`HastaAdres`='$HastaAdres' WHERE HastaTC='$TC'" ;
            mysql_select_db('HastaBilgiler');
            $retval = mysql_query( $sql, $conn );
            
            if(! $retval ) {
               die('Could not update data: ' . mysql_error());
            }
            echo "Bilgiler Basari ile guncellendi\n";
            
            mysql_close($conn);
         }else {
            ?>
               <form method = "post" action = "<?php $_PHP_SELF ?>">
                  <table width = "400" border =" 0" cellspacing = "1" 
                     cellpadding = "2">
                  
                    
                     <tr>
                        <td width = "100">Parola</td>
                        <td><input name = "HastaParola" type = "text" 
                           id = "HastaParola"></td>
                     </tr>
                     <tr>
                        <td width = "100">Ad</td>
                        <td><input name = "HastaAd" type = "text" 
                           id = "HastaAd"></td>
                     </tr>
                     <tr>
                        <td width = "100">Soyad</td>
                        <td><input name = "HastaSoyad" type = "text" 
                           id = "HastaSoyad"></td>
                     </tr>
                     <tr>
                        <td width = "100">Email</td>
                        <td><input name = "HastaEmail" type = "text" 
                           id = "HastaEmail"></td>
                     </tr>
                     <tr>
                        <td width = "100">Yas</td>
                        <td><input name = "HastaYas" type = "text" 
                           id = "HastaYas"></td>
                     </tr>
                     <tr>
                        <td width = "100">Kan Grubu</td>
                        <td><input name = "HastaKan" type = "text" 
                           id = "HastaKan"></td>
                     </tr>
                     <tr>
                        <td width = "100">Telefon</td>
                        <td><input name = "HastaTel" type = "text" 
                           id = "HastaTel"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100">Adres</td>
                        <td><input name = "HastaAdres" type = "text" 
                           id = "HastaAdres"></td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td> </td>
                     </tr>
                  
                     <tr>
                        <td width = "100"> </td>
                        <td>
                           <input name = "update" type = "submit" 
                              id = "update" value = "Düzenle">
                        </td>
                     </tr>
                  
                  </table>
               </form>
            <?php
         }
      ?>
      
   </body>
</html>