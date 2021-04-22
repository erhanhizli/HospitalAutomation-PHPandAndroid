<?php

$servername = "localhost";
$database = "myyhospital_1";
$username = "myyhospital_user";
$password = "qgR-@1xk8RGm";
 $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }


if(isset($_POST["email"]) && (!empty($_POST["email"]))){
$email = $_POST["email"];
$email = filter_var($email, FILTER_SANITIZE_EMAIL);
$email = filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$email) {
   $error .="<p>Geçersiz Email adresi. Lütfen geçerli bir mail adresi giriniz.</p>";
   }else{
   $sel_query = "SELECT * FROM `HastaBilgiler` WHERE HastaEmail='".$email."'";
   $results = mysqli_query($conn,$sel_query);
   $row = mysqli_num_rows($results);
   if ($row==""){
   $error .= "<p>Bu email adresi kayıtlı değil!</p>";
   }
  }
   if($error!=""){
   echo "<div class='error'>".$error."</div>
   <br /><a href='HastaGiris.php'>Go Back</a>";
   }else{
   $expFormat = mktime(
   date("H"), date("i"), date("s"), date("m") ,date("d")+1, date("Y")
   );
   $expDate = date("Y-m-d H:i:s",$expFormat);
   $key = md5(2418*2+$email);
   $addKey = substr(md5(uniqid(rand(),1)),3,10);
   $key = $key . $addKey;
// Insert Temp Table
mysqli_query($conn,
"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`)
VALUES ('".$email."', '".$key."', '".$expDate."');");
 
$output='<p>Sevgili Kullanıcımız,</p>';
$output.='<p>Parolanızı sıfırlamak için lütfen aşağıdaki linke tıklayınız.</p>';
$output.='<p>-------------------------------------------------------------</p>';
$output.='<p><a href="www.myyhospital.com/ParolamiSifirla.php'.$key.'&email='.$email.'&action=reset" target="_blank">
https://www.allphptricks.com/forgot-password/reset-password.php
?key='.$key.'&email='.$email.'&action=reset</a></p>'; 


 
$output.='<p>Teşekkürler,</p>';
$output.='<p>Myy Hospital</p>';
$body = $output; 
$subject = "Parola sıfırlama/Myy Hospital";
 
$email_to = $email;
$fromserver = "info@myyhospital.com"; 
require("PHPMailer/PHPMailerAutoload.php");
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->Host = "mail.yourwebsite.com"; // Enter your host here
$mail->SMTPAuth = true;
$mail->Username = "info@myyhospital.com"; // Enter your email here
$mail->Password = "123-+Asd!!"; //Enter your password here
$mail->Port = 25;
$mail->IsHTML(true);
$mail->From = "info@myyhospital.com";
$mail->FromName = "Myy Hospital";
$mail->Sender = $fromserver; // indicates ReturnPath header
$mail->Subject = $subject;
$mail->Body = $body;
$mail->AddAddress($email_to);
if(!$mail->Send()){
echo "Mailer Error: " . $mail->ErrorInfo;
}else{
echo "<div class='error'>
<p>Parolanızı nasıl sıfırlayacağınızla ilgili bir mail gönderdik. Lütfen Mail kutunuzu kontrol edin.</p>
</div><br /><br /><br />";
 }
   }
}else{
?>
<form method="post" action="" name="reset"><br /><br />
<label><strong>Enter Your Email Address:</strong></label><br /><br />
<input type="email" name="email" placeholder="E-mail adres" />
<br /><br />
<input type="submit" value="Parolanızı sıfırlayın."/>
</form>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<?php } ?>