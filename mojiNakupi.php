<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 8. 01. 2017
 * Time: 22:47
 */
include('artikel.php');
include('narocilo.php');
include('index_session.php');
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
            <a class="navbar-brand" href="index.php">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#myModal"><span
                        class="glyphicon glyphicon-shopping-cart"></span>Košarica<?php if (isset($_SESSION['cart'])) {
                        echo " <span class='label label-success label-as-badge'>" . $numberOfItemsInCart . "</span>";
                    } ?></a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="mojiNakupi.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1"
                       style="margin-top: 1%">Moji
                        nakupi</a>
                    <a href="profile.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1"
                       style="margin-top: 1%">Moj
                        profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="h1 text-center">Moji nakupi</h1>
    <?php
    $purchases = array();
    while ($result = mysqli_fetch_array($select_purchases, MYSQLI_ASSOC)) {
        $purchase = new narocilo($result['idNarocila'], $result['idStranke'], $result['DatumOddaje'], $result['Potrjeno'], $result['Znesek'], $result['DatumPotrditve']);
        array_push($purchases, $purchase);
        $tmpIdNarocila = $result['idNarocila'];
                $select_purchaseItems = mysqli_prepare($db, "SELECT * FROM narocila_det WHERE idNarocila = ?");

                //bind parameters to prevent sql code injection
                mysqli_stmt_bind_param($select_purchaseItems, 'i', $tmpIdNarocila);
                mysqli_stmt_execute($select_purchaseItems);
                $select_purchaseItems = $select_purchaseItems->get_result();

        $purchaseItems = array(); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="h2"><?php echo $purchase->getFormatedDate(); ?></h2>
                <span class="label label-default"><?php echo "Referenčna številka naročila: " . $result['idNarocila']?></span>
            </div>
            <div class="panel-body">
                <?php if ($purchase->getPotrjeno() == 1) {
                    echo "<div class='alert alert-info'>";
                    echo "<strong>Naročilo čaka na potrditev</strong> ";
                    echo "</div>";

                } else {
                    echo "<div class='alert alert-success'>";
                    echo "<strong>Naročilo je bilo potrjeno</strong> ";
                    echo "</div>";
                }
                ?>
                <table class="table">
                    <thead>
                    <tr>
                        <th>Artikel</th>
                        <th>Količina</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $pass = 0;
                    while ($resultDet = mysqli_fetch_array($select_purchaseItems, MYSQLI_ASSOC)) {
                        $idArt = $resultDet['idArtikla'];
                        $selectBasicArticle = mysqli_prepare($db, "SELECT * FROM artikli WHERE idArtikla = ?");

                        //bind parameters to prevent sql code injection
                        mysqli_stmt_bind_param($selectBasicArticle, 'i', $idArt);
                        mysqli_stmt_execute($selectBasicArticle);
                        $selectBasicArticle = $selectBasicArticle->get_result();

                        $basicArticleResult = mysqli_fetch_array($selectBasicArticle, MYSQLI_ASSOC);
                        $pass = $resultDet['Kolicina']; ?>
                        <tr>
                            <td>
                                <p1><?php echo $basicArticleResult['Naziv']; ?></p1>
                            </td>
                            <td>
                                <p1><?php echo $pass; ?></p1>
                            </td>
                        </tr>
                        <?php
                    } ?>
                    </tbody>
                    <tfoot>

                    </tfoot>
                </table>
            </div>
            <div class="panel-footer">
                <p1 class="h3 text-success "><?php echo "Znesek nakupa: " . $result['Znesek'] . " " ?><span
                        class="glyphicon-euro"></span></p1>
            </div>
        </div>
        <?php
    }
    ?>
</div>
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Košarica</h4>
            </div>
            <div class="modal-body">
                <?php
                if (isset($_SESSION['cart'])) { ?>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Artikel</th>
                            <th>Količina</th>
                            <th>Cena/kos</th>
                            <th>Skupaj</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $totalPrice = 0;
                        foreach ($_SESSION['cart'] as $sis) {
                            ?>
                            <tr>
                                <td><?php echo $sis['artikel']->getNaziv(); ?></td>
                                <td><?php echo $sis['quantity']; ?></td>
                                <td><?php echo $sis['artikel']->getCena(); ?></td>
                                <?php $totalOne = ($sis['artikel']->getCena() * $sis['quantity']);
                                $totalPrice += $totalOne;
                                ?>
                                <td><?php echo $totalOne ?></td>
                                <td>
                                    <form id="<?php echo $sis['artikel']->getIdArtikla() ?>">
                                        <input type="submit" class="btn btn-danger btn-sm" name="deleteFromCart"
                                               value="Odstrani"/>
                                    </form>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                        <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Znesek:</td>
                            <td><?php echo $totalPrice . "EUR" ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>DDV:</td>
                            <td>
                                <?php
                                $taxPercentage = ($tax * 100) - 100;
                                echo $taxPercentage . "%";
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>Znesek z DDV:</td>
                            <td>
                                <?php
                                $finalTaxPrice = number_format((float)$totalPrice * $tax, 2, '.', '');
                                echo $finalTaxPrice . "EUR";
                                ?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <a href="blagajna.php" class="btn btn-success btn-lg col-md-12 pull-right">Na blagajno</a>
                    <?php
                } else { ?>
                    <p class="text-primary text-center">Vaša košarica je prazna</p>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</body>
</html>