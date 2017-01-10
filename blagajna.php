<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 8. 01. 2017
 * Time: 22:22
 */
include('artikel.php');
include('index_session.php');

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
        <a href="#" class="btn btn-success btn-lg col-md-12 pull-right">Zaključi nakup</a>
        <?php
    } else { ?>
        <p>Vaša košarica je prazna</p>
        <?php
    }
    ?>
</div>
</body>
</html>
