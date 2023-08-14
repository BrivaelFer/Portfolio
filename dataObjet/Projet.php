<?php
include_once('');
class Projet{
    private $id;
    private $titre;
    private $text;
    private $adressImg;

    function __construct($id, $titre, $text, $adressImg)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->text = $text;
        $this->adressImg = $adressImg;
    }

    public function GetId()
    {
        return $this->id;
    }
    public function GetText()
    {
        return $this->text;
    }
    public function GetTitre()
    {
        return $this->titre;
    }
    public function GetAdressImg()
    {
        return $this->adressImg;
    }
}