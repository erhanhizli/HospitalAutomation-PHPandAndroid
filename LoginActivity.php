<?php
$servername = "localhost";
$database = "myyhospital_1";
$username = "myyhospital_user";
$password = "qgR-@1xk8RGm";
 $conn = mysqli_connect($servername, $username, $password, $database);

    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
session_start();


 if(isset($_POST['submit']))
    {
      
            $query="SELECT * FROM HastaBilgiler WHERE HastaTC='".$_POST['HastaTC']."' and HastaParola='".$_POST['HastaParola']."'";
            $result=mysqli_query($conn,$query);
 
            if(mysqli_fetch_assoc($result))
            {
                $_SESSION['TC']=$_POST['HastaTC'];
               // echo ' Well Come ' . $_SESSION['TC'].'<br/>';
               header("location:HastaPanel/HastaPanel.php");
            }
            else
            {
               echo '<script>alert("Hasta TC veya Parola hatalı. Lütfen tekrar deneyiniz.")</script>';
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
                        <li><a class="nav-link active" href="#home">Anasayfa</a></li>
                        <li><a class="nav-link" href="#about">Hakkımızda</a></li>
                        <li><a class="nav-link" href="#services">Servislerimiz</a></li>
                        <li><a class="nav-link" href="#team">Doktorlarımız</a></li>
                        <li><a class="nav-link" href="LoginActivity.php">Giriş Yap</a></li>
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
    <div class="container login-container">
      <div class="row">
        <div class="col-md-6 ads">
          <h1><span id="fl">Myy</span><span id="sl">Hospital</span></h1>
        </div>
        <div class="col-md-6 login-form">
          <h3>Giriş Yap</h3>
          <form method="POST">
            <div class="form-group">
              <input type="text" class="form-control" name="HastaTC" placeholder="Hasta TC" value="">
            </div>
            <div class="form-group">
              <input type="password" class="form-control" name="HastaParola" placeholder="Hasta Parola" value="">
            </div>
            <div class="form-group">

              <input type="submit" name="submit" value="Giriş Yap" class="btn btn-primary"  >
            </div>
            <div class="form-group forget-password">
                <a href="#">Parolamı unuttum</a>
            </div>
          </form>
        </div>
      </div>
    </div>


</body>
