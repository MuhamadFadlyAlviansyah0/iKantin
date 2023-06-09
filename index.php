<?php
include 'controller.php';
$jumlah = new jumlah();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ikantin Wikrama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">


</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php" class="fs-1"><i class="fa fa-shopping-cart"></i> iKantin</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php"><i class="fa fa-home">
                            </i>Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-shopping-cart"></i> Beli</a>
                    </li>

                </ul>
            </div>

        </div>
    </nav>

    <div class="container">
        <div class="jumbotron mt-5 py-4 px-5 bg-primary ">
            <h1 class="display-7 text-white"> <i class="fa fa-shopping-cart"></i> Selamat Datang di iKantin Wikrama!
            </h1>
        </div>

        <div class="card">

            <div class="card-body">


                <img src="img/1.png" alt="" width="200" class="img-thumbnail rounded-circle" class="ms-5">
                <img src="img/2.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <img src="img/4.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <img src="img/5.jpg" alt="" width="200" class="img-thumbnail rounded-circle">
                <!-- Button trigger modal -->
                <h3>Spesial Menu, Beli Sekarang !</h3>
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    <i class="fa fa-shopping-cart"></i> Beli
                </button>

                <?php
                if (isset($_POST['check'])) {
                    $jmlBakwan = $_POST['bakwan'];
                    $jmlBakso = $_POST['bakso'];
                    $jmlKopi = $_POST['kopi'];
                    $jmlKue = $_POST['kue'];

                    $jumlah = new jumlah();

                    if ($jmlBakwan == null) {
                        $jumlah->getJumlah(0, $jmlBakso, $jmlKopi, $jmlKue);
                    } elseif ($jmlBakso == null) {
                        $jumlah->getJumlah($jmlBakwan, 0, $jmlKopi, $jmlKue);
                    } elseif ($jmlKopi == null) {
                        $jumlah->getJumlah($jmlBakwan, $jmlBakso, 0, $jmlKue);
                    } elseif ($jmlKue == null) {
                        $jumlah->getJumlah($jmlBakwan, $jmlBakso, $jmlKopi, 0);
                    } else {
                        $jumlah->getJumlah($jmlBakwan, $jmlBakso, $jmlKopi, $jmlKue);
                    }

                    $jumlah->setHarga();
                    $jumlah->cetakStruk();
                }

                ?>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Form Pembelian</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post" id="form">
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Croissant yang Dibeli</label>
                            <input type="number" class="form-control" name="bakwan" id="bakwan" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Apple Pie yang Dibeli</label>
                            <input type="number" class="form-control" name="bakso" id="bakso" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Coffe Latte yang Dibeli</label>
                            <input type="number" class="form-control" name="kopi" id="kopi" value="0">
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Masukkan Jumlah Cookies yang Dibeli</label>
                            <input type="number" class="form-control" name="kue" id="kue" value="0">
                        </div>

                        <div class="modal-footer">
                            <button type="button" id="btnbakwan" onclick="Onlybakwan()" class="btn btn-primary" style="float:left;">Croissant</button>
                            <button type="button" id="btnbakso" onclick="Onlybakso()" class="btn btn-primary" style="float:left;">Apple Pie</button>
                            <button type="button" id="btnkopi" onclick="Onlykopi()" class="btn btn-primary" style="float:left;">Coffe Latte</button>
                            <button type="button" id="btnkue" onclick="Onlykue()" class="btn btn-primary" style="float:left;">Cookies</button>
                            <button type="button" id="btnkeduanya" onclick="Semua()" class="btn btn-primary" style="float:left;"> Semua</button>
                            <div class="">
                                <button type="submit" onclick="exit()" class="btn btn-primary" data-dismiss="modal"><i class="fa fa-close"></i> Close</button>
                                <button type="submit" class="btn btn-primary" name="check"><i class="fa fa-check"></i>
                                    Cek Total</button>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>

</body>

</html>

<script type="text/javascript">
    function Onlybakwan() {
        document.getElementById("bakwan").readOnly = false;
        document.getElementById("bakso").readOnly = true;
        document.getElementById("kopi").readOnly = true;
        document.getElementById("kue").readOnly = true;
        document.getElementById("btnbakwan").disabled = true;
        document.getElementById("btnbakso").disabled = false;
        document.getElementById("btnkopi").disabled = false;
        document.getElementById("btnkue").disabled = false;

    }

    function Onlybakso() {
        document.getElementById("bakwan").readOnly = true;
        document.getElementById("bakso").readOnly = false;
        document.getElementById("kopi").readOnly = true;
        document.getElementById("kue").readOnly = true;
        document.getElementById("btnbakwan").disabled = false;
        document.getElementById("btnbakso").disabled = true;
        document.getElementById("btnkopi").disabled = false;
        document.getElementById("btnkue").disabled = false;
    }

    function Onlykopi() {
        document.getElementById("bakwan").readOnly = true;
        document.getElementById("bakso").readOnly = true;
        document.getElementById("kopi").readOnly = false;
        document.getElementById("kue").readOnly = true;
        document.getElementById("btnbakwan").disabled = false;
        document.getElementById("btnbakso").disabled = false;
        document.getElementById("btnkopi").disabled = true;
        document.getElementById("btnkue").disabled = false;

    }

    function Onlykue() {
        document.getElementById("bakwan").readOnly = true;
        document.getElementById("bakso").readOnly = true;
        document.getElementById("kopi").readOnly = true;
        document.getElementById("kue").readOnly = false;
        document.getElementById("btnbakwan").disabled = false;
        document.getElementById("btnbakso").disabled = false;
        document.getElementById("btnkopi").disabled = false;
        document.getElementById("btnkue").disabled = true;
    }

    function Semua() {
        document.getElementById("bakso").readOnly = false;
        document.getElementById("bakwan").readOnly = false;
        document.getElementById("btnbakwan").disabled = false;
        document.getElementById("btnbakso").disabled = false;
        document.getElementById("kopi").readOnly = false;
        document.getElementById("kue").readOnly = false;
        document.getElementById("btnkopi").disabled = false;
        document.getElementById("btnkue").disabled = false;
    }

    function exit() {
        document.getElementById("bakso").readOnly = true;
        document.getElementById("bakwan").readOnly = true;
        document.getElementById("kopi").readOnly = true;
        document.getElementById("kue").readOnly = true;
    }
</script>