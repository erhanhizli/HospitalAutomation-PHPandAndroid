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
if(empty($_POST['HastaTC']) || empty($_POST['HastaParola']) || empty($_POST['HastaAd']) || empty($_POST['HastaSoyad'])|| empty($_POST['HastaEmail'])|| empty($_POST['HastaTel'])) {
       echo '<script>alert("Lütfen TC kimlik numaranızı, Parolanızı, Adınızı, Soyadınızı, Email adresinizi ve Telefon numaranızı boş bırakmayınız.")</script>';
   } else {
    
        
   
$HastaTC = mysqli_real_escape_string($conn, $_POST['HastaTC']);
$HastaParola = mysqli_real_escape_string($conn, $_POST['HastaParola']);
$HastaAd = mysqli_real_escape_string($conn, $_POST['HastaAd']);
$HastaSoyad = mysqli_real_escape_string($conn, $_POST['HastaSoyad']);
$HastaEmail = mysqli_real_escape_string($conn, $_POST['HastaEmail']);
$HastaYas = mysqli_real_escape_string($conn, $_POST['HastaYas']);
$HastaKan = mysqli_real_escape_string($conn, $_POST['HastaKan']);
$HastaTel = mysqli_real_escape_string($conn, $_POST['HastaTel']);
$HastaAdres = mysqli_real_escape_string($conn, $_POST['HastaAdres']);

$sql = "INSERT INTO `HastaBilgiler`(`HastaTC`, `HastaParola`, `HastaAd`, `HastaSoyad`, `HastaEmail`, `HastaYas`, `HastaKan`, `HastaTel`, `HastaAdres`) VALUES ('$HastaTC', '$HastaParola', '$HastaAd', '$HastaSoyad', '$HastaEmail', '$HastaYas', '$HastaKan', '$HastaTel', '$HastaAdres')";
if(mysqli_query($conn, $sql)){
    echo '<script>alert("Hasta bilgileri başarı ile kaydedildi.")</script>';
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
}
}


mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en"><!-- Basic -->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   
   
    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
 
     <!-- Site Metas -->
    <title>Myy Hospital</title>  
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Pogo Slider CSS -->
    <link rel="stylesheet" href="css/pogo-slider.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">    
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">


    <style>
        body {
  font-family: 'Montserrat', sans-serif;
  transition: 3s;
}

.login-container {
  margin-top: 10%;
  border: 1px solid #CCD1D1;
  border-radius: 5px;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
  max-width: 50%;
}

.ads {
  background-color: #00cb86;
  border-top-left-radius: 5px;
  border-bottom-left-radius: 5px;
  color: #fff;
  padding: 15px;
  text-align: center;
}

.ads h1 {
  margin-top: 20%;
}

#fl {
  font-weight: 600;
}

#sl {
  font-weight: 100 !important;
}

.profile-img {
  text-align: center;
}

.profile-img img {
  border-radius: 50%;
  /* animation: mymove 2s infinite; */
}

@keyframes mymove {
  from {border: 1px solid #F2F3F4;}
  to {border: 8px solid #F2F3F4;}
}

.login-form {
  padding: 15px;
}

.login-form h3 {
  text-align: center;
  padding-top: 15px;
  padding-bottom: 15px;
}

.form-control {
  font-size: 14px;
}

.forget-password a {
  font-weight: 500;
  text-decoration: none;
  font-size: 14px;
}
    </style>
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body id="home" data-spy="scroll" data-target="#navbar-wd" data-offset="98">

    <!-- LOADER -->
     <!-- <div id="preloader">
        <div class="loader">
            <img src="images/preloader.gif" alt="" />
        </div>
    </div>end loader -->
    <!-- END LOADER -->
    
    
    
    <!-- Start header -->
    <header class="top-header">
        <nav class="navbar header-nav navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="images/logoSON.png" alt="image"></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-wd" aria-controls="navbar-wd" aria-expanded="false" aria-label="Toggle navigation">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <div class="collapse navbar-collapse justify-content-end" id="navbar-wd">
                    <ul class="navbar-nav">
                        <li><a class="nav-link active" href="index.html">Anasayfa</a></li>
                        <li><a class="nav-link" href="index.html">Hakkımızda</a></li>
                        <li><a class="nav-link" href="index.html">Servislerimiz</a></li>
                        <li><a class="nav-link" href="index.html">Doktorlarımız</a></li>
                        <li><a class="nav-link" href="Login.php">Giriş Yap</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- End header -->

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<body>
    
    
    
       <div class="kayit">  

            
    
    <div class="giris-tablolar"> 
  <div align="center">
    <center>
        <div class="hasta-yazi" style="float: left; padding: 1px; margin-top: 83px; font-size: 66px; width: 152px; margin-left: -130px; color: white;"><p style="writing-mode: tb;margin-left: 55px;">HASTA KAYIT </p></div>
    <div class="hasta-giris">
        <p style="background: #00cb86;border-top-right-radius: 10px; border-top-left-radius: 10px;font-size: 24px; color: #fff;">Hasta Kayıt</p>
        <p><img src="images/personel.png" style=" width: 265px; " alt="Hasta Giriş"></p>
        <p><form method="POST"  style="padding: 11px;">
   <div class="form-group">
    <label class="kayitbilgileri">Hasta TC:</label>
   
    <input type="website" class="form-control" id="HastaTC" name="HastaTC">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Parola:</label>
    <input type="text" class="form-control" id="HastaParola" name="HastaParola">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Ad:</label>
    <input type="text" class="form-control" id="HastaAd" name="HastaAd">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Soyad:</label>
    <input type="text" class="form-control" id="HastaSoyad" name="HastaSoyad">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Email:</label>

    <input type="text" class="form-control" id="HastaEmail" name="HastaEmail">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Yaş:</label>
    <input type="text" class="form-control" id="HastaYas" name="HastaYas">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Kan Grubu:</label>
    <input type="text" class="form-control" id="HastaKan" name="HastaKan">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Tel:</label>
    <input type="text" class="form-control" id="HastaTel" name="HastaTel">
  </div>
  <div class="form-group">
    <label class="kayitbilgileri">Hasta Adres:</label>
    <input type="text" class="form-control" id="HastaAdres" name="HastaAdres">
  </div>

  
  
  <input type="submit" name="submit" value="Kayıt Ol" class="btn btn-primary"  >
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
.btn-primary {color: #fff;background-color: #00cb86;border-color: #206c52;border-radius: 14px; width: 120px;}
.form-control {background: #206c52;width: 62%;float: right; font-size: 17px;border:0px;    margin-right: 10px;}


@media screen and (max-width: 992px) {
  
    .hasta-yazi{display:none;}
    
    .hasta-giris{ width: 95%;    margin-left: 10px;    margin-right: 10px;}
        .giris-tablolar{ margin-left: 0px;}
.kayitbilgileri { width: 38%; background: #206c52;}
.form-control {width: 50%; margin-bottom: 10px;    margin-right: 10px;}



}



    </style>
    
    
    
     



</body>

</html>