<?php
include_once('Entreprise.php');
include_once('Langage.php');

class Experience
{
    private string $id;
    private string $titre;
    private Entreprise $entreprise;
    private string $startDate;
    private string $endDate;
    private string $tache;
    private Array $langages;
    

    function __construct(string $id,string $titre, string $startDate, string $endDate, string $tache, Entreprise $ent, Array $lang) {
        $this->id = $id;
        $this->titre = $titre;
        $this->entreprise = $ent;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->tache = $tache;
        $this->langage = $lang;
    }

    public function GetId(){return $this->id;}
    public function GetTitre(){return $this->titre;}
    public function GetStartDate(){return $this->startDate;}
    public function GetEndDate(){return $this->endDate;}
    public function GetTache(){return $this->tache;}
}