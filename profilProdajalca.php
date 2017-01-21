<?php

include('artikel.php');
include('navbar.php');

if(isset($_POST['changeCustomerAttributes'])) {

    $newName = strip_tags(($_POST['name']));
    $newSurname = strip_tags(($_POST['surname']));
    $newUsername = strip_tags(($_POST['username']));
    $newName = stripslashes(($_POST['name']));
    $newSurname= stripslashes(($_POST['surname']));
    $newUsername = stripslashes(($_POST['username']));
    $newName = mysqli_real_escape_string($db, ($_POST['name']));
    $newSurname = mysqli_real_escape_string($db, ($_POST['surname']));
    $newUsername = mysqli_real_escape_string($db, ($_POST['username']));

    $sql = "UPDATE Prodajalci SET Ime = '$newName', Priimek = '$newSurname', Eposta='$newUsername' WHERE idProdajalca= '$user_check'";
    if ($db->query($sql) === TRUE) {
        header("Location: profilProdajalca.php");
    } else {
        echo "Error updating record: " . $db->error;
    }
}
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
else if(isset($_SESSION['idProdajalca'])){
    echo $navprodajalec;
}
?>
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
            <input type="email" class="form-control" id="usr" name="username" value="<?php echo  $email ?>" required>
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
        <input type="submit" name="changeCustomerAttributes" class="btn btn-success btn-lg col-md-12" value="Posodobi vrednosti">
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
                                <td><a href="#" class="btn btn-danger btn-sm">Odstrani</a></td>
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
                            <td><?php echo $totalPrice ."EUR" ?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>DDV:</td>
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
                            <td>Znesek z DDV:</td>
                            <td>
                                <?php
                                $finalTaxPrice = $totalPrice * $tax;
                                echo $finalTaxPrice ."EUR";
                                ?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                    <a href="blagajna.php" class="btn btn-success btn-lg">Na blagajno</a>
                    <?php
                } else { ?>
                    <p>Vaša košarica je prazna</p>
                    <?php
                }
                ?>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Zapri</button>
            </div>
        </div>
    </div>
</body>
</html>