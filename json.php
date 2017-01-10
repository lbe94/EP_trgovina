<?php
include('config.php');
$sql = "SELECT * FROM artikli";
$s = mysqli_query($db, $sql);

$tabela = array();

while($result = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
    $t = array('Naziv' => $result['Naziv'], 'Opis' => $result['Opis'], 'Zaloga' => $result['Zaloga'],
        'Cena' => $result['Cena'], 'Aktiven' => $result['Aktiven']);
    $tabela[$result['idArtikla']] = $t;
}


$json = json_encode($tabela);

var_dump($tabela);
return $tabela;