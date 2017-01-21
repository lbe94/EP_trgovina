<?php
include('config.php');
$sql = "SELECT * FROM stranke";
$s = mysqli_query($db, $sql);

$tabela = array();

while($result = mysqli_fetch_array($s, MYSQLI_ASSOC)) {
    $t = ['idStranke' => $result['idStranke'], 'Ime' => $result['Ime'], 'Priimek' => $result['Priimek'], 'Eposta' => $result['Eposta'],
        'Geslo' => $result['Geslo'], 'Aktiven' => $result['Aktiven']];
    $tabela[$result['idStranke']] = $t;
}

$tabela=array_values($tabela);
$json = json_encode($tabela);
echo $json;
return $json;