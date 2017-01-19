<?php

/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 2. 01. 2017
 * Time: 12:12
 */
class artikel
{
    public $idArtikla;
    public $naziv;
    public $opis;
    public $zaloga;
    public $cena;
    public $aktiven;

    function __construct($idArtikla, $naziv, $opis, $zaloga, $cena, $aktiven){
        $this->idArtikla = $idArtikla;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->zaloga = $zaloga;
        $this->cena = $cena;
        $this->aktiven = $aktiven;
    }

    function getNaziv(){
        return $this->naziv;
    }

    function getCena(){
        return $this->cena;
    }

    function getIdArtikla(){
        return $this->idArtikla;
    }
};