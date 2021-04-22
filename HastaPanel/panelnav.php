<?php session_start(); 

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


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Panel Nav</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/mainMenu.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <style>
        /* Set height of the grid so .sidenav can be 100% (adjust if needed) */
        .row.content {height: 1500px}

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: #f1f1f1;
            height: 100%;
        }

        /* Set black background color, white text and some padding */
        footer {
            background-color: #00cb86;
            color: white;
            padding: 15px;
        }

        /* On small screens, set height to 'auto' for sidenav and grid */
        @media screen and (max-width: 767px) {
            .sidenav {
                height: auto;
                padding: 15px;
            }
            .row.content {height: auto;}
        }
        
body {
    overflow-x: hidden;

}
.navbar{
    background-color: lightskyblue;
    margin-left: -1px;
}
.navheader{
    position: absolute;
    left: 50%;
    margin-left: -50px;
    text-align: center;
}

#sidebar-wrapper {

    background-color: #212529;
    min-height: 100vh;
    margin-left: -15rem;
    -webkit-transition: margin .25s ease-out;
    -moz-transition: margin .25s ease-out;
    -o-transition: margin .25s ease-out;
    transition: margin .25s ease-out;
}

#sidebar-wrapper .sidebar-heading {
    padding:20px;
    font-size: 1.2rem;
    text-align: center;
    color: #ffffff;
}
.header-image{
    width: 125px;
    border-radius: 20px;
    padding-bottom: 10px;
}

#sidebar-wrapper .list-group {
    width: 15rem;
    padding: 10px;
}
.list-group-item{
    background-color: #212529;
    color: #ffffff;
}
.list-group-item-action{
    transition: all 0.2s;
}

.list-group-item-action:hover{
    background-color: #00cb86;
}

#page-content-wrapper {
    min-width: 100vw;
}

#wrapper.toggled #sidebar-wrapper {
    margin-left: 0;
}

@media (min-width: 768px) {
    #sidebar-wrapper {
        margin-left: 0;
    }

    #page-content-wrapper {
        min-width: 0;
        width: 100%;
    }

    #wrapper.toggled #sidebar-wrapper {
        margin-left: -15rem;
    }
}
    </style>
</head>
<body>
<div class="d-flex" id="wrapper">

    <!-- Sidebar -->
    <div class="border-right" id="sidebar-wrapper">
        <div class="sidebar-heading">
           
            <?php
            $tc = $_SESSION["TC"];
            $query = "SELECT `HastaAd`,`HastaSoyad` FROM `HastaBilgiler` WHERE HastaTC='$tc'";
            $result = mysqli_query($conn,$query);

        while ($row = mysqli_fetch_assoc($result))
        {
            $ad = $row['HastaAd'];
            $soyad = $row['HastaSoyad'];
            $adSoyad = $ad." ".$soyad;
            echo $adSoyad;
        }
            ?></br>
            <?php  echo $_SESSION["TC"]; ?> 
        </div>
        <div class="list-group list-group-flush">
            <a href="HastaBilgiler.php" class="list-group-item list-group-item-action"><i class="icon-home"></i>Bilgilerim</a>
            <a href="RandevuAl.php" class="list-group-item list-group-item-action">Randevu Al</a>
            <a href="HastaRandevular.php" class="list-group-item list-group-item-action">Randevularım</a>
            <a href="HastaSonuclar.php" class="list-group-item list-group-item-action">Sonuçlar</a>
            <a href="HastaRaporlar.php" class="list-group-item list-group-item-action">Raporlar</a>
            <a href="HastaReceteler.php" class="list-group-item list-group-item-action">Reçeteler</a>
        
            <a href="HastaYorumEkle.php" class="list-group-item list-group-item-action">Yorum Ekle</a>
            <a href="../index.html" class="list-group-item list-group-item-action">Çıkış</a>
            
        </div>
    </div>
    <!-- /#sidebar-wrapper -->

   

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
