<?php
include_once('OrganismeFormation.php');

class Formation
{
    private int $id;
    private string $intitule;
    private string $startDate;
    private string $endDate;
    private bool $end;
    private string $description;
    private array $langage;
    private OrganismeFormation $orga;

    public function __construct(
        int $id, string $intitule, string $startDate, 
        string $endDate, bool $end, string $description,
        array $langage, OrganismeFormation $orga) 
    {
        $this->id = $id;
        $this->intitule = $intitule;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->end = $end;
        $this->description = $description;
        $this->orga = $orga;
    }

    public function GetId(){return $this->id;}
    public function GetIntitule(){return $this->intitule;}
    public function GetStratDate(){return $this->startDate;}
    public function GetEndDate(){return $this->endDate;}
    public function GetEnd(){return $this->end;}
    public function GetDesc(){return $this->description;}
    public function GetLangs(){return $this->langage;}
    public function GetOrga(){return $this->orga;}
}
?>