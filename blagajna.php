<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 8. 01. 2017
 * Time: 22:22
 */
include('artikel.php');
include('index_session.php');

/*if(isset($_POST['finishOrder'])) {

    /*$newName = strip_tags(($_POST['name']));
    $newSurname = strip_tags(($_POST['surname']));
    $newUsername = strip_tags(($_POST['username']));
    $newName = stripslashes(($_POST['name']));
    $newSurname= stripslashes(($_POST['surname']));
    $newUsername = stripslashes(($_POST['username']));
    $newName = mysqli_real_escape_string($db, ($_POST['name']));
    $newSurname = mysqli_real_escape_string($db, ($_POST['surname']));
    $newUsername = mysqli_real_escape_string($db, ($_POST['username']));

    $sql = "UPDATE stranke SET Ime = '$newName', Priimek = '$newSurname', Eposta='$newUsername' WHERE idStranke= '$user_check'";
    if ($db->query($sql) === TRUE) {
        header("Location: profile.php");
    } else {
        echo "Error updating record: " . $db->error;
    }

    $totalPrice = 0;

    foreach ($_SESSION['cart'] as $sis) {
        $totalPrice = $totalPrice + $sis['artikel'] -> getCena() * $sis['quantity'];
    }

    $dateNow = date("Y-m-d H:i:s");
    $sql = mysqli_query($db, "INSERT INTO narocila (idStranke, DatumOddaje, Potrjeno, Znesek) VALUES ('$customerId', '$dateNow', '1', '$totalPrice')");
    // get the last inserted value
    $idNarocila = mysqli_insert_id();

    if($sql == TRUE){
        foreach ($_SESSION['cart'] as $sis){
            $articleIdTmp = $sis['artikel'] -> getIdArtikla();
            $quantityTmp = $sis['quantity'];
            $separateSql = mysqli_query($db, "INSERT INTO narocila_det (idNarocila, idArtikla, Kolicina) VALUES ('$idNarocila', '$articleIdTmp', '$quantityTmp')");
        }
        header("Location: index.php");
    }
    else {
        header("Location: profile.php");
    }
}

        /*<tr>
            <td><?php echo $sis['artikel']->getNaziv(); ?></td>
            <td><?php echo $sis['quantity']; ?></td>
            <td><?php echo $sis['artikel']->getCena(); ?></td>
            <?php $totalOne = ($sis['artikel']->getCena() * $sis['quantity']);
            $totalPrice += $totalOne;
            ?>
            <td><?php echo $totalOne ?></td>
            <td><a href="#" class="btn btn-danger btn-sm">Odstrani</a></td>
        </tr>
        <?php
    }*/

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
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="mojiNakupi.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moji
                        nakupi</a>
                    <a href="profile.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj
                        profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <h1 class="h1 text-center">Blagajna</h1>
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
                    $totalPrice = $totalPrice + $totalOne;
                    ?>
                    <td><?php echo $totalOne ?></td>
                    <td><a href="#" class="btn btn-danger btn-sm">Odstrani</a></td>
                </tr>
                <?php
            }
            ?>
            </tbody>
            <hr>
            <tfoot>
            <tr>
                <td></td>
                <td></td>
                <td><b>Znesek:</b></td>
                <td><?php echo $totalPrice ."EUR" ?></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td><b>DDV:</b></td>
                <td>
                    <?php
                    $taxPercentage = ($tax * 100) - 100;
                    echo $taxPercentage ."%";
                ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td class="text"><b>Znesek z DDV:</b></td>
                <td>
                    <?php
                        $finalTaxPrice = $totalPrice * $tax;
                        echo $finalTaxPrice ."EUR";
                    ?>
                </td>
            </tr>
            </tfoot>
        </table>
        <hr>
        <form>
            <a href="zakljuciNakup.php" class="btn btn-success btn-lg col-md-12 pull-right">Zaključi nakup</a>
        </form>
        <?php
    } else { ?>
        <p>Vaša košarica je prazna</p>
        <?php
    }
    ?>
</div>
</body>
</html>
