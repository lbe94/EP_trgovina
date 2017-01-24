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

    //constructor
    function __construct($idArtikla, $naziv, $opis, $zaloga, $cena, $aktiven){
        $this->idArtikla = $idArtikla;
        $this->naziv = $naziv;
        $this->opis = $opis;
        $this->zaloga = $zaloga;
        $this->cena = $cena;
        $this->aktiven = $aktiven;
    }

    //getters
    function getIdArtikla(){
        return $this->idArtikla;
    }

    function getNaziv(){
        return $this->naziv;
    }

    function getOpis(){
        return $this->opis;
    }

    function getZaloga(){
        return $this->zaloga;
    }

    function getCena(){
        return $this->cena;
    }

    function getAktiven(){
        return $this->aktiven;
    }

    // setters
    function setIdArtikla($idArtikla){
        $this->idArtikla = $idArtikla;
    }

    function setNaziv($naziv){
        $this->naziv = $naziv;
    }

    function setOpis($opis){
        $this->opis = $opis;
    }

    function setZaloga($zaloga){
        $this->zaloga = $zaloga;
    }

    function setCena($cena){
        $this->cena = $cena;
    }

    function setAktiven($aktiven){
        $this->aktiven = $aktiven;
    }

    //other methods
    function toString(){
        return $this->idArtikla . ' ' . $this->naziv . ' ' . $this->opis . ' ' . $this->zaloga . ' ' . $this->cena . ' ' . $this->aktiven;
    }

};