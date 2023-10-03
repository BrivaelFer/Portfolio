<?php
class OrganismeFormation
{
    private int $id;
    private string $nom;
    private string $ville;
    private string $codePostal;
    private string $adress;

    public function __construct(int $id, string $nom, string $ville, string $codePostal, string $adress) 
    {
        $this->id = $id;
        $this->ville = $ville;
        $this->codePostal = $codePostal;
        $this->nom = $nom;
        $this->adress = $adress;
    }

    public function GetId(){return $this->id;}
    public function GetNom(){return $this->nom;}
    public function GetVille(){return $this->ville;}
    public function GetCodeP(){return $this->codePostal;}
    public function GetAdress(){return $this->adress;}
}