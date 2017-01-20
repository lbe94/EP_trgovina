<?php
include('index_session.php')
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
            <a class="navbar-brand" href="prodajalec.php"><img src="images/logo.png" style="width: 10%; margin-top: -10px;"></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="pregled_narocila.php">Naročila</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="pregled_strank.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Stranke</a>
                    <a href="profile.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>


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
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center">
            <a href="dodajanje_narocila.php">
                <img src="images/add_button.png" alt="button">
            </a>
        </div>
    </div>
</div>
</body>
</html>
