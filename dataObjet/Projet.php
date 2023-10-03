<?php
include_once('Langage.php');
include_once('Experience.php');
include_once('Formation.php');

class Projet{
    private int $id;
    private string $titre;
    private string $text;
    private string $adressImg;
    private array $langages;
    private Experience $exp;
    private Formation $formation;

    function __construct(int $id, string $titre, string $text, string $adressImg, array $langages, Experience $ex = NULL, Formation $formation)
    {
        $this->id = $id;
        $this->titre = $titre;
        $this->text = $text;
        $this->adressImg = $adressImg;
        $this->langages = $langages;
        $this->exp = $ex;
        $this->formation = $formation;
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