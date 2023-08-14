<?php
class Langage
{
    private string $id;
    private string $name;
    private string $level;

    public function __construct(string $id, string $name, string $level) {
        $this->id = $id;
        $this->name = $name;
        $this->level = $level;
    }
    public function GetId(){return $this->id;}
    public function GetName(){return $this->name;}
    public function GetLevel(){return $this->level;}
}