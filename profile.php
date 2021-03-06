<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 8. 01. 2017
 * Time: 20:29
 */
include('artikel.php');
include('index_session.php');
if(isset($_POST['changeCustomerAttributes'])) {

    unset($_SESSION['updateProfileError']);
    unset($_SESSION['updateProfileSuccess']);

    //prevent sql injection
    $newName = strip_tags(($_POST['name']));
    $newSurname = strip_tags(($_POST['surname']));
    $newUsername = strip_tags(($_POST['username']));
    $newPassword = strip_tags(($_POST['password']));
    $newPasswordRepeat = strip_tags(($_POST['password2']));
    $newName = stripslashes(($_POST['name']));
    $newSurname= stripslashes(($_POST['surname']));
    $newUsername = stripslashes(($_POST['username']));
    $newPassword = stripslashes(($_POST['password']));
    $newPasswordRepeat = stripslashes(($_POST['password2']));
    $newName = mysqli_real_escape_string($db, ($_POST['name']));
    $newSurname = mysqli_real_escape_string($db, ($_POST['surname']));
    $newUsername = mysqli_real_escape_string($db, ($_POST['username']));
    $newPassword = mysqli_real_escape_string($db, ($_POST['password']));
    $newPasswordRepeat = mysqli_real_escape_string($db, ($_POST['password2']));


    // erase html characters
    $newName= htmlspecialchars($newName);
    $newSurname = htmlspecialchars($newSurname);
    $newUsername = htmlspecialchars($newUsername);
    $newPassword = htmlspecialchars($newPassword);
    $newPasswordRepeat = htmlspecialchars($newPasswordRepeat);

    if(!empty($newPassword)){
        if($newPassword == $newPasswordRepeat){
            $sql = "UPDATE stranke SET Ime = ?, Priimek = ?, Eposta=?, Geslo = ? WHERE idStranke= ?";
            $preparedStmt = mysqli_prepare($db, $sql);

            //bind parameters to prevent sql injection
            mysqli_stmt_bind_param($preparedStmt, 'ssssi', $newName, $newSurname, $newUsername, md5($newPassword), $user_check);

            if (mysqli_stmt_execute($preparedStmt) === TRUE) {
                $_SESSION['updateProfileSuccess'] = "Podatki (Ime, Priimek, E pošta in Geslo) so bili uspešno posodobljeni";
            } else {
                echo "Error updating record: " . $db->error;
            }
        }
        else {
            $_SESSION['updateProfileError'] = "Podatki niso bili posodobljeni. Prosimo preverite, ali ste pravilno vnesli in ponovili geslo!";
        }
    }
    else {
        $sql = "UPDATE stranke SET Ime = ?, Priimek = ?, Eposta=? WHERE idStranke= ?";
        $preparedStmt = mysqli_prepare($db, $sql);

        //bind parameters to prevent sql injection
        mysqli_stmt_bind_param($preparedStmt, 'sssi', $newName, $newSurname, $newUsername, $user_check);

        if (mysqli_stmt_execute($preparedStmt) === TRUE) {
            $_SESSION['updateProfileSuccess'] = "Podatki (Ime, Priimek in E-pošta) so bili uspešno posodobljeni";
        } else {
            echo "Error updating record: " . $db->error;
        }
    }

    header("Location: index.php");
}
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
    <form action="#" class="col-md-6 col-md-offset-3" method="post">
        <img src="./images/user.png" class="center-block">
        <h1 class="h1 text-center">Moj profil</h1>
        <div>
            <label for="name">Ime:</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $name ?>" required>
        </div>
        <div>
            <label for="surname">Priimek:</label>
            <input type="text" class="form-control" id="surname" name="surname" value="<?php echo $surname ?>" required>
        </div>
        <div>
            <label for="usr">Uporabniško ime:</label>
            <input type="email" class="form-control" id="usr" name="username" value="<?php echo $email ?>" required>
        </div>
        <div>
            <label for="pwd"> Geslo:</label>
            <input type="password" class="form-control" id="pwd" name="password">
        </div>
        <div>
            <label for="pwd2"> Ponovi geslo:</label>
            <input type="password" class="form-control" id="pwd2" name="password2">
        </div>
        <br>
        <input type="submit" name="changeCustomerAttributes" class="btn btn-success btn-lg col-md-12"
               value="Posodobi vrednosti">
    </form>
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
                                        <input type="submit" class="btn btn-danger btn-sm" name="deleteFromCart" value="Odstrani" />
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