<?php
/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 2. 01. 2017
 * Time: 11:16
 */

include('index_session.php');
include('artikel.php');

if(isset($_POST['idArtikla'])){
    $id = $_POST['idArtikla'];

    if (isset($_SESSION['cart'][$id])) {
        $_SESSION['cart'][$id]['quantity']++;
    } else {
        $sql_s = "SELECT * FROM artikli WHERE idArtikla = ?";

        $query_s = mysqli_prepare($db, $sql_s);

        //bind parameters to prevent sql injection
        mysqli_stmt_bind_param($query_s, 'i', $id);

        mysqli_stmt_execute($query_s);
        $query_s = $query_s->get_result();

        if (mysqli_num_rows($query_s) != 0) {
            $row_s = mysqli_fetch_array($query_s, MYSQLI_ASSOC);

            $_SESSION['cart'][$row_s['idArtikla']] = array(
                "quantity" => 1,
                "artikel" => new artikel($row_s['idArtikla'], $row_s['Naziv'], $row_s['Opis'], $row_s['Zaloga'], $row_s['Cena'], $row_s['Aktiven'])
            );
        }
    }
    echo "Success";
}

else {
    header("Location: index.php");
}

?>