<?php 
include('index_session.php');

$navprodajalec ='
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="prodajalec.php">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="pregled_narocila.php">Naročila</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $name . '
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="pregled_strank.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Stranke</a>
                    <a href="profile.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>';

$navadmin='
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="admin.php">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $name . '
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="pregled_prodajalcev.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Prodajalci</a>
					<a href="pregled_strank.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Stranke</a>
                    <a href="profile.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj Profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>';

$navuser='
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="index.php">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#myModal"><span
                        class="glyphicon glyphicon-shopping-cart"></span>Košarica</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">' . $name . '
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="mojiNakupi.php" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moji
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
'

?>