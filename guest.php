<?php
/**
 * Created by PhpStorm.
 * User: Puska
 * Date: 15. 01. 2017
 * Time: 00:43
 */
include('artikel.php');
include('guest_script.php');

$sql_s = "SELECT * FROM artikli";

$query_s = mysqli_query($db, $sql_s);

if (mysqli_num_rows($query_s) != 0) {
 $row_s = mysqli_fetch_array($query_s, MYSQLI_ASSOC);
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
            <a class="navbar-brand" href="index.php">E - trgovina</a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="login.php">Prijava</a></li>
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
                <a href="login.php"
                   class="btn btn-success btn-lg">V košarico</a>
            </div>
        </div>
        <?php
    }
    ?>
</div>


</body>
</html>