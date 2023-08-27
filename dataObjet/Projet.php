<?php
include_once('Langage.php');
include_once('Experience.php');

class Projet{
    private $id;
    private $titre;
    private $text;
    private $adressImg;
    private array $langages;
    private $exp;

    function __construct($id, $titre, $text, $adressImg, array $langages, $ex = NULL)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->text = $text;
        $this->adressImg = $adressImg;
        $this->langages = $langages;
        $this->exp = $ex;
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
    public function GetLangs()
    {
        return $this->langages;
    }
    public function GetExp()
    {
        return $this->exp;
    }
}