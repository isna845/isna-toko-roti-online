<?php
session_start();
include 'koneksi/koneksi.php';
if (isset($_SESSION['kd_cs'])) {

    $kode_cs = $_SESSION['kd_cs'];
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ISNA-Cake Bakery</title>
    <link rel="stylesheet" type="text/css" href="css/styles.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/bootstrap-theme.css">
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <style>
        .navbar-nav>li>a {
            position: relative;
        }

        .navbar-nav>li>a::after {
            content: '';
            position: absolute;
            left: 0;
            bottom: -5px;
            width: 100%;
            height: 2px;
            background-color: #2F4F4F;
            transform: scaleX(0);
            transition: transform 0.2s ease-in-out;
        }

        .navbar-nav>li>a:hover::after {
            transform: scaleX(1);
        }

        .navbar-nav>li.active>a {
            font-weight: bold;
            color: #ffffff;
            /* Ubah warna sesuai keinginan */
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <div class="row top" style="background-color:#2F4F4F; color: #ffffff;">
            <center>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-earphone"></i> +62 812-2784-0370</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span><i class="glyphicon glyphicon-envelope"></i> ISNA_ISNI@gmail.com</span>
                </div>
                <div class="col-md-4" style="padding: 3px;">
                    <span>ISNA-cake bakery Indonesia</span>
                </div>
            </center>
        </div>
    </div>

    <nav class="navbar navbar-default" style="padding: 5px; background-color: #8FBC8F;">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#" style="color: #2F4F4F;"><b>ISNA-CAKE BAKERY</b></a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="<?= ($current_page == 'index.php') ? 'active' : '' ?>"><a href="index.php">Home</a></li>
                    <li class="<?= ($current_page == 'produk.php') ? 'active' : '' ?>"><a href="produk.php">Produk</a>
                    </li>
                    <li class="<?= ($current_page == 'about.php') ? 'active' : '' ?>"><a href="about.php">Tentang
                            Kami</a></li>
                    <li class="<?= ($current_page == 'manual.php') ? 'active' : '' ?>"><a href="manual.php">Panduan
                            Aplikasi</a></li>
                    <?php
                    if (isset($_SESSION['kd_cs'])) {
                        $kode_cs = $_SESSION['kd_cs'];
                        $cek = mysqli_query($conn, "SELECT kode_produk from keranjang where kode_customer = '$kode_cs' ");
                        $value = mysqli_num_rows($cek);
                    ?>
                        <li><a href="keranjang.php" style="color: #000;"><i class="glyphicon glyphicon-shopping-cart"></i>
                                <b>[ <?= $value ?> ]</b></a></li>
                    <?php
                    } else {
                        echo "<li><a href='keranjang.php' style='color: #000;'><i class='glyphicon glyphicon-shopping-cart'></i> [0]</a></li>";
                    }
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #000;"><i class="glyphicon glyphicon-user"></i> Akun
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="user_login.php">login</a></li>
                                <li><a href="register.php">Register</a></li>
                            </ul>
                        </li>
                    <?php
                    } else {
                    ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false" style="color: #000;"><i class="glyphicon glyphicon-user"></i>
                                <?= $_SESSION['user']; ?> <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="proses/logout.php">Log Out</a></li>
                            </ul>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>
</body>

</html>