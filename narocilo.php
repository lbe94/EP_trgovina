<?php

/**
 * Created by PhpStorm.
 * User: Luka
 * Date: 9. 01. 2017
 * Time: 08:42
 */
class narocilo
{
    public $idNarocila;
    public $idStranke;
    public $DatumOddaje;
    public $Potrjeno;
    public $Znesek;
    public $DatumPotrditve;

    function __construct($idNarocila, $idStranke, $DatumOddaje, $Potrjeno, $Znesek, $DatumPotrditve)
    {
        $this->idNarocila = $idNarocila;
        $this->idStranke = $idStranke;
        $this->DatumOddaje = $DatumOddaje;
        $this->Potrjeno = $Potrjeno;
        $this->Znesek = $Znesek;
        $this->DatumPotrditve = $DatumPotrditve;
    }

    function getIdNarocila(){
        return $this->idNarocila;
    }

    function getIdStranke(){
        return $this->idStranke;
    }

    function getDatumOddaje(){
        return $this->DatumOddaje;
    }

    function getPotrjeno(){
        return $this->Potrjeno;
    }

    function getZnesek(){
        return $this->Znesek;
    }

    function getDatumPotrditve(){
        return $this->DatumPotrditve;
    }

    function toString(){
        return $this->idNarocila . ' ' . $this->idStranke . ' ' . $this->DatumOddaje . ' ' . $this->Potrjeno . ' ' . $this->Znesek . ' ' . $this->DatumPotrditve;
    }
};
