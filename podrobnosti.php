<?php
include('index_session.php');
$id = $_GET['id'];
$s = mysqli_query($db, "SELECT * FROM Narocila WHERE idNarocila = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);
$stranka = $result['idStranke'];
$select_customers = mysqli_query($db, "SELECT * FROM stranke WHERE idStranke = '$stranka'");
$result1 = mysqli_fetch_array($select_customers, MYSQLI_ASSOC);
$s2 = mysqli_query($db, "SELECT * FROM Narocila_det WHERE idNarocila = '$id'");

?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>E - trgovina</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/engine.js"></script>
    </head>
    <body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="prodajalec.php">E - trgovina</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="pregled_narocila.php">Naročila</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                        <span class="glyphicon glyphicon-user"></span></a>
                    <ul class="dropdown-menu col-md-10">
                        <a href="pregled_strank.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Stranke</a>
                        <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj profil</a>
                        <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
       <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="h2" >Naročilo <?php echo $result['idNarocila']?></h2>
                </div>
                <div class="panel-body">
                    <p1 class="h5">Stranka: <?php echo $result1['Ime']; echo  " "; echo $result1['Priimek'] ?></p1>
                    <br>
                    <p1 class="h5">Datum oddaje: <?php echo $result['DatumOddaje'] ?></p1>
                    <br>
                    <?php
                    if ($result['Potrjeno'] == 1) {
                        ?>
                        <p1 class="h5">Status: Potrjeno</p1>
                        <br>
                        <p1 class="h5">Datum potrditve: <?php echo $result['DatumPotrditve'] ?></p1>
                        <?php
                    }
                    else {
                        ?>
                        <p1 class="h5">Status: Ni potrjeno</p1>
                        <?php
                    }
                    ?>
                        <br>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Artikel</th>
                                    <th>Količina</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($result2 = mysqli_fetch_array($s2, MYSQLI_ASSOC)) {
                                    $id1 = $result2['idArtikla'];
                                    $nar = mysqli_query($db, "SELECT * FROM Artikli WHERE idArtikla = '$id1'");
                                    $result3 = mysqli_fetch_array($nar, MYSQLI_ASSOC);
                                ?>
                                <tr>
                                    <td><?php echo $result3['Naziv'] ?></td>
                                    <td><?php echo $result2['Kolicina'] ?></td>
                                </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>


                </div>
                <div class="panel-footer">
                    <p1 class="h3 text-danger pull-right"><?php echo $result['Znesek']." "?><span class="glyphicon-euro"></span></p1>
                    <a href="pregled_narocila.php" class="btn btn-success btn-lg">Nazaj</a>
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>
