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
            <a class="navbar-brand" href="#">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#"><span class="glyphicon glyphicon-shopping-cart"></span>Košarica</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                        <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moji nakupi</a>
                        <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj profil</a>
                        <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <?php
        while($result = mysqli_fetch_array($select_articles, MYSQLI_ASSOC)){?>
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h2 class="h2"><?php echo $result['Naziv']?></h2>
                </div>
                <div class="panel-body">
                    <p1 class="h5"><?php echo $result['Opis']?></p1>
                </div>
                <div class="panel-footer">
                    <p1 class="h3 text-danger pull-right"><?php echo $result['Cena']." "?><span class="glyphicon-euro"></span></p1>
                    <a href="#" class="btn btn-success btn-lg">V košarico</a>
                </div>
            </div>
    <?php
        }
    ?>
</div>
</body>
</html>
