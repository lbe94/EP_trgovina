<?php
include('index_session.php');
include('artikel.php');

if(isset($_GET['action'])&& $_GET['action'] =="add"){
    $id = intval($_GET['id']);

    if(isset($_SESSION['cart'][$id])){
        $_SESSION['cart'][$id]['quantity'] ++;
    }

    else {
        $sql_s = "SELECT * FROM artikli WHERE idArtikla = '$id'";

        $query_s = mysqli_query($db, $sql_s);

        if(mysqli_num_rows($query_s) != 0){
            $row_s = mysqli_fetch_array($query_s, MYSQLI_ASSOC);

            $_SESSION['cart'][$row_s['idArtikla']] = array(
                "quantity" => 1,
                "artikel" => new artikel($row_s['idArtikla'], $row_s['Naziv'], $row_s['Opis'], $row_s['Zaloga'], $row_s['Cena'], $row_s['Aktiven'])
            );
        }
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
<nav class="navbar navbar-inverse">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="#" data-toggle="modal" data-target="#myModal"><span
                        class="glyphicon glyphicon-shopping-cart"></span>Košarica</a></li>
            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><?php echo $name ?>
                    <span class="glyphicon glyphicon-user"></span></a>
                <ul class="dropdown-menu col-md-10">
                    <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moji
                        nakupi</a>
                    <a href="#" class="btn btn-default btn-lg col-lg-10 col-lg-offset-1" style="margin-top: 1%">Moj
                        profil</a>
                    <a href="logout.php" class="btn btn-danger btn-lg col-md-10 col-lg-offset-1" style="margin-top: 1%">Odjava</a>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<div class="container">
    <?php
    $articles = array();
    while ($result = mysqli_fetch_array($select_articles, MYSQLI_ASSOC)) {
        $article = new artikel($result['idArtikla'], $result['Naziv'], $result['Opis'], $result['Zaloga'], $result['Cena'], $result['Aktiven']);
        array_push($articles, $article);
        ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h2 class="h2"><?php echo $result['Naziv'] ?></h2>
            </div>
            <div class="panel-body">
                <p1 class="h5"><?php echo $result['Opis'] ?></p1>
            </div>
            <div class="panel-footer">
                <p1 class="h3 text-danger pull-right"><?php echo $result['Cena'] . " " ?><span
                        class="glyphicon-euro"></span></p1>
                <a href="index.php?page=products&action=add&id=<?php echo $result['idArtikla'] ?>"
                   class="btn btn-success btn-lg">V košarico</a>
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
                <p>Body</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Zapri</button>
            </div>
        </div>
    </div>
</div>


</body>
</html>