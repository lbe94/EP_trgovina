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

    //constructor
    function __construct($idNarocila, $idStranke, $DatumOddaje, $Potrjeno, $Znesek, $DatumPotrditve)
    {
        $this->idNarocila = $idNarocila;
        $this->idStranke = $idStranke;
        $this->DatumOddaje = $DatumOddaje;
        $this->Potrjeno = $Potrjeno;
        $this->Znesek = $Znesek;
        $this->DatumPotrditve = $DatumPotrditve;
    }

    //getters
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

    //setters
    function setIdNarocila($idNarocila){
        $this->idNarocila = $idNarocila;
    }

    function setIdStranke($idStranke){
        $this->idStranke = $idStranke;
    }

    function setDatumOddaje($datumOddaje){
        $this->DatumOddaje = $datumOddaje;
    }

    function setPotrjeno($potrjeno){
        $this->Potrjeno = $potrjeno;
    }

    function setZnesek($znesek){
        $this->Znesek = $znesek;
    }

    function setDatumPotrditve($datumPotrditve){
        $this->DatumPotrditve = $datumPotrditve;
    }

    // other methods
    function toString(){
        return $this->idNarocila . ' ' . $this->idStranke . ' ' . $this->DatumOddaje . ' ' . $this->Potrjeno . ' ' . $this->Znesek . ' ' . $this->DatumPotrditve;
    }

    function getFormatedDate(){
        $time = strtotime($this->DatumOddaje);

        $newformat = date('d.m.Y',$time);
        return $newformat;
    }
};
