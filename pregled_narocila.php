<?php
if(isset($_SESSION['idStranke'])){
    header("Location: login-staff.php");
}
include('navbar.php');
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
else {
    echo $navprodajalec;
}
?>
<div class="container">
    <?php

    while($result = mysqli_fetch_array($select_narocila, MYSQLI_ASSOC)){
        $stranka = $result['idStranke'];
        $select_customers = mysqli_query($db, "SELECT * FROM stranke WHERE idStranke = '$stranka'");
        $result1 = mysqli_fetch_array($select_customers, MYSQLI_ASSOC);
        $idNar = $result['idNarocila'];
        $sql = mysqli_query($db, "SELECT * FROM racuni WHERE idNarocila='$idNar'");
        $result2 = mysqli_fetch_array($sql, MYSQLI_ASSOC);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="h2" >Naročilo <?php echo $result['idNarocila']?></h2>
                <form method="post" action="spremeni.php">
                    <input type="hidden" name="id" value="<?php echo $result['idNarocila']?>">
                    <?php
                    if ($result['Potrjeno'] == 0) {
                        ?>
                        <input type="hidden" name="storniraj" value="0">
                        <button class="btn btn-danger btn-lg col-md-10
                       col-lg-offset-1" style="float: right; margin-top: -50px; width: 10%;">Storniraj
                        </button><?php

                    } else {
                        if ($result2['Aktiven'] == 1) {
                            ?>
                            <input type="hidden" name="storniraj" value="0">
                            <button class="btn btn-danger btn-lg col-md-10
                                col-lg-offset-1 disabled" style="float: right; margin-top: -50px; width: 10%;" disabled>Storniraj
                            </button><?php
                        }
                        else {
                            ?>
                            <button class="btn btn-success btn-lg" style="float: right; margin-top: -50px; width: 10%;">
                                Potrdi
                            </button><?php
                        }
                    }
                        ?>
                </form>
            </div>
            <div class="panel-body">
                <p1 class="h5">Stranka: <?php echo $result1['Ime']; echo  " "; echo $result1['Priimek'] ?></p1>
                <br>
                <br>
                <?php
                    if ($result['Potrjeno'] == 0) {
                        ?>
                        <p1 class="h5">Status: Potrjeno</p1><?php
                    }
                    else {
                         if ($result2['Aktiven'] == 1) { ?>
                             <p1 class="h5">Status: Stornirano</p1><?php
                         }
                         else {
                             ?>
                             <p1 class="h5">Status: Ni Potrjeno</p1><?php
                         }
                    }
                ?>
            </div>
            <div class="panel-footer">
                <p1 class="h3 text-danger pull-right"><?php echo $result['Znesek']." "?><span class="glyphicon-euro"></span></p1>
                <a href="podrobnosti.php?id=<?php echo $result['idNarocila'] ?>" class="btn btn-success btn-lg">Podrobnosti</a>
            </div>
        </div>
    <?php
    }
    ?>

</div>
</body>
</html>
