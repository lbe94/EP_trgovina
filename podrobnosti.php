<?php
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
include('navbar.php');
$id = $_GET['id'];
$s = mysqli_query($db, "SELECT * FROM Narocila WHERE idNarocila = '$id'");
$result = mysqli_fetch_array($s, MYSQLI_ASSOC);
$stranka = $result['idStranke'];
$select_customers = mysqli_query($db, "SELECT * FROM stranke WHERE idStranke = '$stranka'");
$result1 = mysqli_fetch_array($select_customers, MYSQLI_ASSOC);
$s2 = mysqli_query($db, "SELECT * FROM Narocila_det WHERE idNarocila = '$id'");
$sql = mysqli_query($db, "SELECT * FROM racuni WHERE idNarocila='$id'");
$result5 = mysqli_fetch_array($sql, MYSQLI_ASSOC);
?>
    <html>
    <head>
        <meta charset="utf-8">
        <title>E - trgovina</title>
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <script src="js/jquery-3.1.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="engine.js"></script>
    </head>
    <body>
    <?php
    if(isset($_SESSION['idAdministrator'])){
        echo $navadmin;
    }
    else{echo $navprodajalec;}

    ?>

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
                    if ($result['Potrjeno'] == 0) {
                        ?>
                        <p1 class="h5">Status: Potrjeno</p1><?php
                    }
                    else {
                        if ($result5['Aktiven'] == 1) { ?>
                            <p1 class="h5">Status: Stornirano</p1><?php
                        }
                        else {
                            ?>
                            <p1 class="h5">Status: Ni Potrjeno</p1><?php
                        }
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
