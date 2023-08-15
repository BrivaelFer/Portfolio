<?php
class Entreprise
{
    private $id;
    private $name;
    private $adress;

    public function __construct(string $i, string $n, string $adr) {
        $this->id = $i;
        $this->name = $n;
        $this->adress = $adr;
    }
    public function GetId(){return $this->id;}
    public function GetName(){return $this->name;}
    public function GetAdress(){return $this->adress;}
}