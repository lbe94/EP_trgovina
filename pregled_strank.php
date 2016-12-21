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
    <?php
    while($result = mysqli_fetch_array($select_customers, MYSQLI_ASSOC)){?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="h3" ><?php echo $result['Ime']?> <?php echo $result['Priimek']?></h3>
                <a href="#" class="btn btn-success btn-lg" style="float: right; margin-top: -50px;">Uredi</a>
            </div>
            <div class="panel-body">
                <p1 class="h5">Elektronska pošta: <?php echo $result['Eposta']?></p1>
            </div>
            <div class="panel-footer">
                <p1 class="h5">Geslo: <?php echo $result['Geslo']?></p1>
            </div>
        </div>
        <?php
    }
    ?>
    <div class="panel panel-default">
        <div class="panel-heading" style="text-align: center">
            <a href="dodajanje_stranke.php">
                <img src="images/add_button.png" alt="button">
            </a>
        </div>
    </div>
</div>
</body>
</html>
