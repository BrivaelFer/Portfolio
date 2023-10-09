<?php
class Langage
{
    private string $id;
    private string $name;
    private string $level;
    private string $adressImg;

    public function __construct(string $id, string $name, string $level, string $adressImg)
    {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
        $this->adressImg = $adressImg;
    }
    public function GetId(){return $this->id;}
    public function GetName(){return $this->name;}
    public function GetLevel(){return $this->level;}
    public function GetImg(){return $this->adressImg;}
}