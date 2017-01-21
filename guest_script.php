<?php
/**
 * Created by PhpStorm.
 * User: Puska
 * Date: 15. 01. 2017
 * Time: 01:02
 */
include('config.php');


//display articles
$select_articles = mysqli_query($db, "SELECT * FROM artikli");

//get tax value (double)
$selectTax = mysqli_query($db, "SELECT * FROM ddv WHERE aktiven = '0' LIMIT 1");
$taxRow = mysqli_fetch_array($selectTax, MYSQLI_ASSOC);
$tax = $taxRow['Vrednost'];





?>