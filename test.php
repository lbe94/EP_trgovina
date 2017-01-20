<?php
$link = mysqli_connect('127.0.0.1:8889', 'mkozmelj', 'rWvhnr2NwMh3EdUn');
if (!$link) {
    die('Could not connect: ' . mysqli_error());
}
echo 'Connected successfully';
mysqli_close($link);
?>